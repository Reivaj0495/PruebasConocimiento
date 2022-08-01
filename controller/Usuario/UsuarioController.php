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
        $roles = $Gst->getRoles();
        include_once '../view/Usuario/Usuario/crear.php';
    }

    public function postCrearUsuario(){
        $Gst = new GstUsuario();
        $datos = $Gst->postIngresarEmpleado($_POST);
        return JSON_encode($datos);
    }

    public function editarUsuario(){
        
        $Gst = new GstUsuario();
        $datos = $Gst->ConsultarEmpleado($_GET['id']);
        $areas = $Gst->getAreas();
        $roles = $Gst->getRoles();
        include_once '../view/Usuario/Usuario/editar.php';
    }

    public function postEditarUsuario(){
        $Gst = new GstUsuario();
        $datos = $Gst->UpdateEmpleados($_POST);
        return JSON_encode($datos);
    }

    public function postEliminarUsuario(){
        $Gst = new GstUsuario();
        $datos = $Gst->eliminarUsuario($_POST['id']);
        return JSON_encode($datos);
    }



}