<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Evento
 *
 * @author Usuario
 */
class Carta {
    private $id;
    private $nombre;
    private $imagen;   
    private $valor;   
    private $titulo;   
    private $jugador;   
    
    public function __construct($campo, $valor) {
        if($campo != null){
            if(!is_array($campo)){
                $cadenaSQL = "select id, nombre, imagen, valor, titulo, jugador from carta where $campo=$valor";  
                //echo $cadenaSQL, '<p>';
                $campo = conectorBD::ejecutarQuery($cadenaSQL)[0];
            }            
            $this->id = $campo['id'];
            $this->nombre = $campo['nombre'];
            $this->imagen = $campo['imagen'];                        
            $this->valor = $campo['valor'];            
            $this->titulo = $campo['titulo'];            
            $this->jugador = $campo['jugador'];            
        }
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getJugador() {
        return $this->jugador;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function setValor($valor): void {
        $this->valor = $valor;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setJugador($jugador): void {
        $this->jugador = $jugador;
    }

        
    /*public function guardar(){
        $cadenaSQL="insert into carta(id, nombre, imagen, valor, titulo, jugador) values('{$this->nombre}','{$this->descripcion}')";
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public function modificar(){
        $cadenaSQL="update carta set nombre='{$this->nombre}', descripcion='{$this->descripcion}' where id={$this->id}";
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public function eliminar(){
        $cadenaSQL ="delete from carta where id={$this->id}";
        conectorBD::ejecutarQuery($cadenaSQL);
    }*/
    
    public static function getLista($filtro, $orden){//pone where y order by si necesario
        if($filtro == null || $filtro == '') $filtro = '';
        else $filtro = " where $filtro";
        
        if($orden == null || $orden == '') $orden = '';
        else $orden = " order by $orden";
        
        $cadenaSQL = "select id, nombre, imagen, valor, titulo, jugador from carta $filtro $orden";        
        return conectorBD::ejecutarQuery($cadenaSQL);        
    }
    
    public static function getListaEnObjetos($filtro, $orden){
        $resultado = Carta::getLista($filtro, $orden);
        $lista = array();
        for ($i = 0; $i < count($resultado); $i++) {
            $carta = new Carta($resultado[$i], null);                       
            $lista[$i] = $carta;
        }
        return $lista;        
    }

}
