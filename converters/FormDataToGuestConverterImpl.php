<?php
include_once("FormDataToGuestConverter.php");

class FormDataToGuestConverterImpl implements FormDataToGuestConverter {
    public function convert($formData){
        $guest= new Guest();
        $guest->setPersonalIdentification($formData["personalIdentification"]);
        $guest->setFirstName($formData["firstName"]);
        $guest->setLastName($formData["lastName"]);
        $guest->setEmail($formData["email"]);
        $guest->setIncludeEmailList("0");
        if(array_key_exists("includeEmailList",$formData)){
            $guest->setIncludeEmailList($formData["includeEmailList"]);
        }
        $guest->setBrand($formData["brand"]);
        $guest->setShip($formData["ship"]);
        $guest->setSailDate($formData["sailDate"]);
        $guest->setComments($formData["comments"]);
        return $guest;
    }
}



