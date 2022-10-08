<?php
include_once '../model/Producto/ProductoModel.php';
include_once 'GstProducto.php';

class ProductoController{

    private $modelProducto;
 	
 	
 	function __construct(){
 		$this->gstProducto = new GstProducto();
 	}
    
    public function crearProducto(){
        
        include_once '../view/Producto/Producto/crearProducto.php';
    }

    public function postCrearProducto(){

        $datos = $this->gstProducto->postCrearProducto($_POST);
        return JSON_encode($datos);
    }


    Public function listarProductos(){
        
        $datos = $this->gstProducto->consultarProductos();
        include_once '../view/Producto/Producto/listarProductos.php';
    }

    public function postEliminarProducto(){
        
        $datos = $this->gstProducto->postEliminarProducto($_POST['id']);
        return JSON_encode($datos);
    }

    public function vistaVentaProducto(){

        $data = $this->gstProducto->consultarProducto($_REQUEST["idProd"]);
        include_once '../view/Producto/Producto/ventaProducto.php';
    }

    public function postVentaProducto(){
        
        $data = $this->gstProducto->postVentaProducto($_REQUEST);
        $this->UpdateProducto();
    }   

    public function UpdateProducto(){
        $update = $this->gstProducto->updateProductoVenta($_REQUEST);
    }
    
    public function vistaEditarProducto(){
        $datos = $this->gstProducto->consultarProducto($_REQUEST['idProd']);
        include_once '../view/Producto/Producto/editarProducto.php';
    }

    public function postEditarProducto(){
        
        $datos = $this->gstProducto->postEditarProducto($_REQUEST);
        return JSON_encode($datos);
    }

}