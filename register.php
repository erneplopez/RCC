<?php

include("converters/FormDataToGuestConverterImpl.php");
include("services/GuestServiceImpl.php");

$message="";
$messageType="";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $guestRepository=new GuestRepositoryMySqlImpl();
        $formDataToGuestConverter=new FormDataToGuestConverterImpl();
        $guestService=new GuestServiceImpl();

        $guest=$formDataToGuestConverter->convert($_POST);
        $response=$guestService->register($guest);
        $messageType="success";
        $message="Guest successfully registered";

    }catch(Exception $e){
        $messageType="error";
        $message=$e->getMessage();
    }


}


include_once("views/registerForm.php");