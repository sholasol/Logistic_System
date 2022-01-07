<?php

function dbConnect(){
    try{
        $username='root';
        $pass='';
        $con= new pdo("mysql:host=localhost; dbname=lapp", $username, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $con;
        
    } catch (PDOException $e) {
        echo 'ERROR', $e->getMessage();
    }
}

