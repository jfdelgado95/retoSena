<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of TipoUsuario
 *
 * @author adora
 */
class TipoUsuario {
    private $codigo;
    
    public function __construct($codigo) {
        $this->codigo = $codigo;
    }
    
    public function getTipoUsuario(){
        switch ($this->codigo){
            case 'A': $nombreUsuario="Administrador";
                break;
            case 'U': $nombreUsuario="Usuario";
                break;
        }
        return $nombreUsuario; 
    }
    
    public function __toString() {
        return $this->getTipoUsuario();        
    }
}
?>

