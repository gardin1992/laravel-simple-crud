<?php

namespace App\Utils;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CustomPagination {
    /**
     * @var Paginator
     */
    public $paginator;
    public $totalItems;
    public $pageCount;

    private $_repository;
    private $_em;
    private $_query;
    private $_alias;

    /**
     * @param EntityManagerInterface $em
     * @param String $repository
     * @param String $alias
     */
    public function __construct(EntityManagerInterface $em, $repository, $alias = 'c') {
        $this->_em = $em;
        $this->_repository = $repository;
        $this->_alias = $alias;
    }

    public function paginate($page, $where) {
        $pageSize = '5';
        $developers = $this->_em->getRepository($this->_repository);

        $this->_query = $developers
            ->createQueryBuilder('c')
            ->orderBy("$this->_alias.id", 'ASC');

        if (is_array($where)) {

            foreach($where as $key => $value) {
                $this->_query->where("c.".$key, ":$key");

                $this->_query
                ->where("c.$key LIKE :$key")
                ->setParameter($key, "%$value%");
            }
        }

        $this->_query
            ->setFirstResult($pageSize * ($page -1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($this->_query->getQuery());
        $totalItems = count($paginator);
        $pageCount = ceil($totalItems/$pageSize);

        $this->paginator = $paginator;
        $this->totalItems = $totalItems;
        $this->pageCount = $pageCount;

        return $this->paginator;
    }
}
