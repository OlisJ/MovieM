<?php
    $host='localhost';
    $user='root';
    $pass='';
    $dbname='mmp';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname" $user,$pass);
    }catch(Exception $e){
        echo 'error' . $e->getMessage();
    }

?>