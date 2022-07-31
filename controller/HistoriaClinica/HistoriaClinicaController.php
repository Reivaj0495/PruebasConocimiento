<?php
include_once '../model/Historia/HistoriaClinica/HistoriaClinicaModel.php';
include_once 'GstHistoriaClinica.php';

class HistoriaClinicaController{

    public function crearHistorial(){
        $Gst = new GstHistoriaClinica();
        $datos = $Gst->ConsultarMascota();
        include_once '../view/Historia/HistoriaClinica/crear.php';
    }
    
    public function crearHistoriaClinica(){
        $Gst = new GstHistoriaClinica();
        $insertar = $Gst->InsertarHistoriaClinica($_GET);
        return $insertar;
    }

    Public function listarHistorial(){
        $Gst = new GstHistoriaClinica();
        $datos = $Gst->ConsultarDatos();
        include_once '../view/Historia/HistoriaClinica/listar.php';
    }

    public function editarHistorial(){
        $Gst = new GstHistoriaClinica();
        $datos = $Gst->ConsultarMascota();
        $datosHistorial = $Gst->ConsultarDatosId($_GET['id_historiaclinica']);
        include_once '../view/Historia/HistoriaClinica/editar.php';
    }

    public function postEditarHistoriaClinica(){
        $Gst = new GstHistoriaClinica();
        $editar = $Gst->EditarHistoria($_POST);
        $this->listarHistorial();
    }

    public function eliminarHistorial(){
        $Gst = new GstHistoriaClinica();
        $datosHistorial = $Gst->ConsultarDatosId($_GET['id_historiaclinica']);
        $this->postEliminarHistoriaClinica($datosHistorial);
    }

    public function postEliminarHistoriaClinica($datos){
        $Gst = new GstHistoriaClinica();
        $respuesta = $Gst->eliminarHistorial($datos[0]);
        return($respuesta);
    }


}