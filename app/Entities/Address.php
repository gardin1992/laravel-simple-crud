<?php

namespace App\Entities;

use App\Utils\Objects;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="address")
 */
class Address
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
    protected $postalcode;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**
     * @ORM\Column(type="string")
     */
    protected $number;
    /**
     * @ORM\Column(type="string")
     */
    protected $district;
    /**
     * @ORM\Column(type="string")
     */
    protected $complement;
    /**
     * @ORM\Column(type="string")
     */
    protected $city;
    /**
     * @ORM\Column(type="string")
     */
    protected $uf;

    public function getId() {
        return $this->id;
    }

    public function getAddress() {
        return $this->address;
    }

    public function hydrate($data)
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function _toArray() 
    {
        return Objects::object_to_array($this);
    }
}
