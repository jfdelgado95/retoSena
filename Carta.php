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
    private $codigo;
    private $nombre;
    private $imagen;   
    private $valor;   
    private $titulo;   
    private $jugador;   
    
    public function __construct($campo, $valor) {
        if($campo != null){
            if(!is_array($campo)){
                $cadenaSQL = "select id, codigo, nombre, imagen, valor, titulo, jugador from carta where $campo=$valor";  
                //echo $cadenaSQL, '<p>';
                $campo = conectorBD::ejecutarQuery($cadenaSQL)[0];
            }            
            $this->id = $campo['id'];
            $this->codigo = $campo['codigo'];
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
    
    public function getCodigo() {
        return $this->codigo;
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
    
    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
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

        
    public function guardar(){
        $cadenaSQL="insert into carta(id, nombre, imagen, valor, titulo, jugador) values('{$this->id}', '{$this->nombre}', '{$this->imagen}', '{$this->valor}', '{$this->titulo}', '{$this->jugador}')";
        echo $cadenaSQL;
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public function modificar(){
        $cadenaSQL="update carta set nombre='{$this->nombre}', imagen='{$this->imagen}', titulo='{$this->titulo}', valor='{$this->valor}', jugador='{$this->jugador}' where id={$this->id}";
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public function eliminar(){
        $cadenaSQL ="delete from carta where id={$this->id}";
        conectorBD::ejecutarQuery($cadenaSQL);
    }
    
    public static function getLista($filtro, $orden){//pone where y order by si necesario
        if($filtro == null || $filtro == '') $filtro = '';
        else $filtro = " where $filtro";
        
        if($orden == null || $orden == '') $orden = '';
        else $orden = " order by $orden";
        
        $cadenaSQL = "select id, codigo, nombre, imagen, valor, titulo, jugador from carta $filtro $orden";        
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
    
    public static function getArray(){
        $cadenaSQL= "select * from carta";
        $resultado= conectorBD::ejecutarQuery($cadenaSQL);
        return $resultado;                
    }
    
}
