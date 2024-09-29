<?php


class create
{
    public $dbhost;
    public $dbname;
    public $dbuser;
    public $dbpass;

    function createdatabase($dbhost,$dbuser,$dbpass){
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        try {
            $link = new PDO("mysql:host=$this->dbhost",$this->dbuser,$this->dbpass);

            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE db1";

            $link->exec($sql);

            echo "Database created successfully<br>";

        } catch (PDOException $e) {
            echo "Not create: ". $e->getMessage();
        }
        $link = null;
    }

    function createtable($dbhost,$dbname,$dbuser,$dbpass){
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        try {
            $link = new PDO("mysql:host=$this->dbhost; dbname=$this->dbname",$this->dbuser,$this->dbpass);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE members (id int AUTO_INCREMENT PRIMARY KEY,gpname VARCHAR(65535) NOT NULL , pjname VARCHAR(65535) NOT NULL,avg float NOT NULL,percent float NOT NULL)";
            $link->exec($sql);
            echo "Table users created successfully";
        } catch (PDOException $e){
            echo "Table not create: ". "<br>" . $e->getMessage();
        }
        $link = null;
    }
}

$cr = new create();
$cr->createdatabase("localhost","root","");
$cr->createtable("localhost","db1","root","");