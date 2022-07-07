<?php

class Database{
    public static function StartUp(){
        $db = new PDO('mysql:host=localhost;dbname=azsnovtq_portal;charset=utf8', 'azsnovtq_portalUser', '-d9!v3;-+fup');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $db;
    }
}