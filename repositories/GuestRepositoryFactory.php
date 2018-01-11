<?php
include_once("GuestRepositoryMySqlImpl.php");
include_once("services/ApplicationPropertiesParserImpl.php");

class GuestRepositoryFactory{
    public function getImplementation(){
        $applicationPropertiesParser=new ApplicationPropertiesParserImpl();
        $databaseProperties=$applicationPropertiesParser->getDatabaseConnectionInfo();
        if($databaseProperties["type"]=="mysql"){
            return new GuestRepositoryMySqlImpl();
        }
        else{
            throw new Exception("Select a valid database implementation on the application.properties files");
        }
    }
}