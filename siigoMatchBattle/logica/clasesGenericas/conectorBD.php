<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of conectorBD
 *
 * @author Usuario
 */
class conectorBD {
    private $servidor;
    private $puerto;
    private $baseDatos;
    private $controlador;
    private $usuario;
    private $clave;
    
    private $conexion;
    
    public function __construct() {
        $ruta = dirname(__FILE__) .'/../../configuracion.ini';              
        if (!file_exists($ruta)){
            echo 'Error: No existe el archivo de configuración en la base de datos. Nombre del archivo: ' . $ruta;
        } else {
            $parametros = parse_ini_file($ruta);
            if(!$parametros){
                echo 'Error: No se pudo procesar el archivo de configuracion. Nombre del archivo: '.$ruta;                
            }else {                
                $this->servidor = $parametros['servidor'];
                $this->puerto = $parametros['puerto'];
                $this->baseDatos = $parametros['baseDatos'];
                $this->controlador = $parametros['controlador'];
                $this->usuario = $parametros['usuario'];
                $this->clave = $parametros['clave'];                
            }
        } //echo 'conectado';
    }
    
    public function conectar(){
        try {                              
            $this->conexion = new PDO("$this->controlador:host=$this->servidor;port=$this->puerto;dbname=$this->baseDatos", $this->usuario, $this->clave);//"" estas comillas permiten poner variables sin concatenar con .
            //echo 'Conectado a la Base de datos';
            return true;
        } catch (Exception $ex) {
            echo "No se pudo conectar a la Base de datos.".$ex->getMessage();
            return false;
        }
    }
    
    public function desconectar(){
        $this->conexion = null;
    }
    
    public static function ejecutarQuery($cadenaSQL){
        $conectorBD = new conectorBD();
        if ($conectorBD->conectar()){
            $sentencia = $conectorBD->conexion->prepare($cadenaSQL);            
            if(!$sentencia->execute()) $consulta = false; 
            else{
                $consulta = $sentencia->fetchAll();
                $sentencia->closeCursor();
            }
        } else echo 'No se pudo conectar a la BD';
        $conectorBD->desconectar();
        return $consulta;
    }
}
