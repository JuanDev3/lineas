<?php

class Database{
    public static function StartUp(){        
        $contraseña = '';
        $usuario = '';
        $nombreBaseDeDatos = '';
        # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto - \\MSSQLSERVER, 1433
        $rutaServidor = '';        
        $db = new PDO("sqlsrv:Server=$rutaServidor;Database=$nombreBaseDeDatos", $usuario, $contraseña);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $db;
    }
}
