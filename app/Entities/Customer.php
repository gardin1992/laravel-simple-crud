<?php

namespace App\Entities;

use App\Utils\Objects;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers")
 */
class Customer
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     */
    protected $cpf;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enable;

    /**
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="addressId", referencedColumnName="id", nullable=false)
     * @var Address
     */
    protected $address;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {

        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getEnable()
    {
        return $this->enable;
    }

    public function setEnable($enable) {
        $this->enable = $enable;
        return $this;
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            if ($key != 'address')
                $this->$key = $value;
        }

        if (isset($data['address'])) {
            $this->address = new Address();
            $this->address->hydrate($data['address']);
        }
    }
    
    public function _toArray()
    {
        $data = $this;
        $data->address = $this->address->_toArray();

        return Objects::object_to_array($data);
    }
}
