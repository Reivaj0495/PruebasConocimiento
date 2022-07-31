<?php
include_once '../model/Historia/DetalleHistoriaClinica/DetalleHistoriaClinicaModel.php';
include_once'GstDetalleHistoriaClinica.php';

class DetalleHistoriaClinicaController{

    Public function crearDetalleHistoriaClinica(){
        $Gst = new GstDetalleHistoriaClinica();
        $colaboradores = $Gst->consultarColaboradores();
        include_once '../view/Historia/DetalleHistoriaClinica/crear.php';
    }
    public function postcrearDetalleHistoriaClinica(){
        $Gst = new GstDetalleHistoriaClinica();
        $insertar = $Gst->crearNuevoDetalleHistorial($_POST);
        $this->listarDetalleHistoriaClinicaId($_POST['id_historia_clinica']);
    }
    public function listarDetalleHistoriaClinica(){
        $Gst = new GstDetalleHistoriaClinica();
        $datos = $Gst->ConsultarDetallesHistorialClinicoId($_GET);
        include_once '../view/Historia/DetalleHistoriaClinica/listar.php';
    }

    public function listarDetalleHistoriaClinicaId($id){
        $Gst = new GstDetalleHistoriaClinica();
        $_GET['id_historia_clinica'] = $id;
        $datos = $Gst->ConsultarDetallesHistorialClinicoId($_GET);
        include_once '../view/Historia/DetalleHistoriaClinica/listar.php';
    }

    public function editarDetalleHistoria(){
        $Gst = new GstDetalleHistoriaClinica();
        $datos = $Gst->ConsultarDetallesHistorialClinicoId_Detalle($_GET);
        $colaboradores = $Gst->consultarColaboradores();
        include_once '../view/Historia/DetalleHistoriaClinica/editar.php';
    }

    public function posteditarDetalleHistoriaClinica(){
        $Gst = new GstDetalleHistoriaClinica();
        $actualizar = $Gst->editarDetalleHistoria($_POST);
        $this->listarDetalleHistoriaClinicaId($_POST['id_historia_clinica']);
    }

    public function eliminarDetalleHistoria(){
        $Gst = new GstDetalleHistoriaClinica();
        $eliminar = $Gst->eliminarDetalleHistoria($_GET);
        return $eliminar;
    }
}