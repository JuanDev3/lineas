<?php

class Database{
    public static function StartUp(){        
        $contraseña = 'usersql$$nisira';
        $usuario = 'sa';
        $nombreBaseDeDatos = 'NSFAJA';
        # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto - \\MSSQLSERVER, 1433
        $rutaServidor = '192.168.1.7';        
        $db = new PDO("sqlsrv:Server=$rutaServidor;Database=$nombreBaseDeDatos", $usuario, $contraseña);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $db;
    }
}