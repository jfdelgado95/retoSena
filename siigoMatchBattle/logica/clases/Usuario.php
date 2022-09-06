<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Persona
 *
 * @author Usuario
 */
class Usuario {    
    private $id;
    private $tipoUsuario;
    private $nombre;
    private $clave;
    
    public function __construct($campo, $valor) {
        if($campo != null){
            if(!is_array($campo)){//Faltaba cambiar persona por usuario
                $cadenaSQL = "select id, tipoUsuario, nombre, clave from usuario where $campo=$valor";
                //echo $cadenaSQL.'<br>';
                $campo = conectorBD::ejecutarQuery($cadenaSQL)[0];
            }            
            $this->id = $campo['id'];
            $this->tipoUsuario = $campo['tipoUsuario'];
            $this->nombre = $campo['nombre'];
            $this->clave = $campo['clave'];
        }
    }
    public function getId() {
        return $this->id;
    }
    
    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }
    
    public function getTipoUsuarioEnObejto() {
        return new TipoUsuario($this->tipoUsuario);
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setId($id): void {
        $this->id = $id;
    }
  
    public function setTipoUsuario($tipoUsuario): void {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setClave($clave): void {
        $this->clave = $clave;
    }
    
    public function guardar(){   
        $cadenaSQL = "insert into usuario(tipoUsuario, nombre, clave) values('$this->tipoUsuario', '$this->nombre', md5('$this->clave'))";
        echo $cadenaSQL;
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    
    public function modificar(){
        if(strlen($this->clave)<32)$this->clave = md5($this->clave);
        $cadenaSQL = "  update usuario set tipoUsuario='$this->tipoUsuario', nombre='$this->nombre', clave=md5('$this->clave') where id='$this->id'";
        echo $cadenaSQL;
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public function eliminar(){
        $cadenaSQL = "delete from usuario where id=$this->id";
        conectorBD::ejecutarQuery($cadenaSQL);
    }
       
    public static function getLista($filtro, $orden){//verifica si hay algun where o order by necesarios. Si no, manda todo
        if($filtro == null || $filtro == '') $filtro = '';
        else $filtro = " where $filtro";
        
        if($orden == null || $orden == '') $orden = '';
        else $orden = " order by $orden";
        
        $cadenaSQL = "select id, tipoUsuario, nombre, clave from usuario $filtro $orden";
        //echo '<br>'.$cadenaSQL.'<br>';
        return conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public static function getListaEnObjetos($filtro, $orden){
        $resultado = Usuario::getLista($filtro, $orden);
        $lista = array();
        for ($i = 0; $i < count($resultado); $i++) {            
            $usuario = new Usuario($resultado[$i], null);
            $lista[$i] = $usuario;
        }
        return $lista;
    }
    
    public static function validar($nombre, $clave){
        $resultado = Usuario::getListaEnObjetos("nombre = '$nombre' and clave=md5('$clave')", null);
        $nombre = null;
        if (count($resultado) > 0){
            $nombre = $resultado[0];
            //echo 'el usuario existe';
        }
        return $nombre;
    }
}
