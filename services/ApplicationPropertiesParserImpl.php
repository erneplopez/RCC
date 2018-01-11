<?php
include_once("ApplicationPropertiesParser.php");
class ApplicationPropertiesParserImpl implements ApplicationPropertiesParser{

    public function getDatabaseConnectionInfo()
    {
        $database=[];
        $database["password"]="";
        $database["user"]="root";
        $applicationPropertiesFile=fopen( "resources/application.properties.txt","r");
        while(!feof($applicationPropertiesFile)) {
            $line=fgets($applicationPropertiesFile);
            if (strpos($line,"database") !== false) {
                if (strpos($line,"type") !== false) {
                    $database["type"]=trim(explode ( "=" , $line)[1]);
                }
                if (strpos($line,"host") !== false) {
                    $database["host"]=trim(explode ( "=" , $line)[1]);
                }
                if (strpos($line,"dbname") !== false) {
                    $database["dbname"]=trim(explode ( "=" , $line)[1]);
                }
                if (strpos($line,"user") !== false) {
                    $database["user"]=trim(explode ( "=" , $line)[1]);
                }
                if (strpos($line,"password") !== false) {
                    $database["password"]=trim(explode ( "=" , $line)[1]);
                }
            }
        }


        return $database;

    }
}