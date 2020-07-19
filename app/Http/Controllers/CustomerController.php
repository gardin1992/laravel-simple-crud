<?php

namespace App\Http\Controllers;

use App\Entities\Customer;
use App\Utils\CustomPagination;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    private $_repository;
    /**
     * @var CustomPagination
     */
    private $_pagination;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->_repository = \App\Entities\Customer::class;
        $this->_pagination = new CustomPagination($em, $this->_repository);
    }

    /**
     * @param String $str
     * @return String
     */
    private function _onlyNumbers(String $str) {
        return preg_replace('/[^0-9]/','', $str);
    }

    private function _processData(array $data) {
        $data['cpf'] = $this->_onlyNumbers($data['cpf']);
        $data['phone'] = $this->_onlyNumbers($data['phone']);
        $data['address']['postalcode'] = $this->_onlyNumbers($data['address']['postalcode']);

        return $data;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = empty($request->input('page')) ? 1 : $request->input('page');

        $where = [];
        if ($request->input('name')) {
            $where["name"] = $request->input('name');
        }

        $customers = $this->_pagination->paginate($page, $where);

        return view('customer.index', [
            'customers' => $customers,
            'pager' => [
                'totalItems' =>  $this->_pagination->totalItems,
                'pageCount' => $this->_pagination->pageCount,
                'page' => $page
            ]
        ])->with('query', $request->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.edit', [
            'customer' => compact(new Customer()),
            'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $this->_processData($request->all());
            $customer = new Customer();
            $customer->hydrate($data);
            $this->em->persist($customer);
            $this->em->flush();
            return redirect()->route('index')->with('status', 'Cliente salvo!');
        } catch (UniqueConstraintViolationException $ex) {
            return redirect()->back()->withInput($request->input())->with('statusError', $ex->getPrevious()->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->em->find($this->_repository, $id);

        if ($customer == null) {
            return redirect()->route('index')->with('statusError', 'Cliente não encontrado!');
        }

        return view('customer.edit', [
            'customer' =>  $customer->_toArray(),
            'action' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->em->find($this->_repository, $id);

        if ($customer == null) {
            return redirect()->route('index')->with('statusError', 'Cliente não encontrado!');
        }

        return view('customer.edit', [
            'customer' => $customer->_toArray(),
            'action' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $customer = $this->em->find($this->_repository, $id);

            if ($customer == null) {
                return redirect()->route('index')->with('statusError', 'Cliente não encontrado!');
            }
    
            $data = $this->_processData($request->all());
            $customer->hydrate($data);
            $this->em->flush();
    
            return redirect()->route('index')->with('status', 'Cliente atualizado!');
        } catch (UniqueConstraintViolationException $ex) {
            return redirect()->back()->withInput($request->input())->with('statusError', $ex->getPrevious()->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->em->find($this->_repository, $id);

        if ($customer == null) {
            return redirect()->route('index')->with('statusError', 'Cliente não encontrado!');
        }

        $customer->setEnable(!$customer->getEnable());
        $this->em->flush();

        return redirect()->route('index')->with('status', 'Cliente desabilitado!');
    }
}
