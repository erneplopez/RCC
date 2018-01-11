<?php
include_once("models/Guest.php");
include_once("repositories/GuestRepositoryFactory.php");
include_once("GuestService.php");

class GuestServiceImpl implements GuestService{

    public function register($guest)
    {
        $guestRepositoryFactory=new GuestRepositoryFactory();
        $guestRepository=$guestRepositoryFactory->getImplementation();
        $existingGuests=$guestRepository->findAll();
        foreach ($existingGuests as $existingGuest) {
            if($existingGuest->getPersonalIdentification()==$guest->getPersonalIdentification()){
                throw new Exception("Guest already exists");
            }
        }
        $guestRepository->save($guest);
        return;
    }
}