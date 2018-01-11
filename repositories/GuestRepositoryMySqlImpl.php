<?php
include_once("GuestRepository.php");
include_once("services/ApplicationPropertiesParserImpl.php");

class GuestRepositoryMySqlImpl implements GuestRepository{
    private function openConnection(){
        $applicationPropertiesParser=new ApplicationPropertiesParserImpl();
        $databaseProperties=$applicationPropertiesParser->getDatabaseConnectionInfo();
        $dsn=$databaseProperties["type"].":host=".$databaseProperties["host"].";dbname=".$databaseProperties["dbname"];
        $user=$databaseProperties["user"];
        $password=$databaseProperties["password"];
        $conn=new PDO($dsn,$user,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    public function save($guest)
    {
        $conn=$this->openConnection();
        $query="INSERT INTO guest_registration
                (personal_id,first_name,last_name,email_address,email_list_flag,brand,ship,sail_date,comments)
                VALUES
                ('".$guest->getPersonalIdentification()."','".$guest->getFirstName()."','".$guest->getLastName()."','".$guest->getEmail()."',".$guest->getIncludeEmailList().",'".
                 $guest->getBrand()."','".$guest->getShip()."','".$guest->getSailDate()."','".$guest->getComments()."')";

        $conn->query($query);
        $conn=null;
    }

    public function findAll()
    {
        $guests=[];
        $conn=$this->openConnection();
        $query="SELECT * FROM guest_registration";
        $rows=$conn->query($query);
        foreach ($rows as $row){
            $guest=new Guest();
            $guest->setPersonalIdentification($row["personal_id"]);
            $guest->setFirstName(($row["first_name"]));
            $guest->setLastName(($row["last_name"]));
            $guest->setEmail($row["email_address"]);
            $guest->setIncludeEmailList(($row["email_list_flag"]));
            $guest->setBrand($row["brand"]);
            $guest->setShip($row["ship"]);
            $guest->setSailDate($row["sail_date"]);
            $guest->setComments($row["comments"]);
            array_push($guests,$guest);
        }
        return $guests;
    }
}

