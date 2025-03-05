<?php
class BD
{
    public static $instacia = null;
    public static function crearInstancia()
    {

        if (!isset(self::$instacia)) {
            $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instacia = new PDO('mysql:host=localhost; dbname=APLICACION_DEVELOTECA', 'root', '', $opciones);
            echo 'conectado...';
        }
        return self::$instacia;
    }
}
