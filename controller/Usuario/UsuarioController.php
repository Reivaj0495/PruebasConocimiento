<?php
include_once '../model/Usuario/UsuarioModel.php';
include_once 'GstUsuario.php';
class UsuarioController{

    Public function listarUsuario(){
        
        $Gst = new GstUsuario();
        $datos = $Gst->ConsultarEmpleados();
        include_once '../view/Usuario/Usuario/listar.php';
    }

    public function crearUsuario(){
        $Gst = new GstUsuario();
        $datos = $Gst->getAreas();
        include_once '../view/Usuario/Usuario/crear.php';
    }

    public function postCrearUsuario(){
        $Gst = new GstUsuario();
        $datos = $Gst->postIngresarEmpleado($_POST);
        $this->listarUsuario();
    }



}