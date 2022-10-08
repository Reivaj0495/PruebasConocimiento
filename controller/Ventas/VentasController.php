<?php
include_once '../model/Ventas/VentasModel.php';
include_once 'GstVentas.php';

class VentasController{

    private $gstVentas;
 	
 	
 	function __construct(){
 		$this->gstVentas = new GstVentas();
 	}

     Public function listarVentasProductos(){
        $datos = $this->gstVentas->consultarVentasProductos();
        $prodMasVnt = $this->gstVentas->productoMasVendido();
        $prodMasStock = $this->gstVentas->productoMasStock();
        include_once '../view/Ventas/Ventas/listarVentasProductos.php';
    }


}