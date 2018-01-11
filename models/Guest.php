<?php

class Guest{
    private $_personalIdentification;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_includeEmailList;
    private $_brand;
    private $_ship;
    private $_sailDate;
    private $_comments;

    public function getPersonalIdentification()
    {
        return $this->_personalIdentification;
    }

    public function setPersonalIdentification($personalIdentification)
    {
        $this->_personalIdentification = $personalIdentification;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getIncludeEmailList()
    {
        return $this->_includeEmailList;
    }

    public function setIncludeEmailList($includeEmailList)
    {
        $this->_includeEmailList = $includeEmailList;
    }

    public function getBrand()
    {
        return $this->_brand;
    }

    public function setBrand($brand)
    {
        $this->_brand = $brand;
    }

    public function getShip()
    {
        return $this->_ship;
    }

    public function setShip($ship)
    {
        $this->_ship = $ship;
    }

    public function getSailDate()
    {
        return $this->_sailDate;
    }

    public function setSailDate($sailDate)
    {
        $this->_sailDate = $sailDate;
    }

    public function getComments()
    {
        return $this->_comments;
    }

    public function setComments($comments)
    {
        $this->_comments = $comments;
    }

    public function __toString()
    {
        return $this->getPersonalIdentification()."\n"
                .$this->getFirstName()."\n"
                .$this->getLastName()."\n"
                .$this->getEmail()."\n"
                .$this->getIncludeEmailList()."\n"
                .$this->getBrand()."\n"
                .$this->getShip()."\n"
                .$this->getSailDate()."\n"
                .$this->getComments();

    }

}
