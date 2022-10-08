<?php

include_once '../model/Producto/ProductoModel.php';


Class GstProducto{

    private $gstProducto;
 	
 	function __construct(){
 		$this->modelProducto = new ProductoModel();
 	}

    public function postCrearProducto($datos){
        
        $prod_nom = $datos['prod_nombre'];
        $prod_ref = $datos['prod_ref'];
        $prod_prec = $datos['prod_prec'];
        $prod_peso = $datos['prod_peso'];
        $prod_cat = $datos['prod_cat'];
        $prod_stock = $datos['prod_stock'];
        $prod_fecha = date('Y-m-d H:i:s');

        try {
            $sql ="insert into producto values ('0','$prod_nom','$prod_ref',$prod_prec,$prod_peso,'$prod_cat',$prod_stock,'$prod_fecha')";
            $resultado = $this->modelProducto->insertar($sql); 
            return $resultado;
        }catch(Exception $e){
            echo "Error al insertar producto";
            var_dump($e);
        }
    }

    public function consultarProductos(){
        $sql = "select id_prod, prod_nombre,prod_referencia, prod_precio, prod_categoria, prod_stock, prod_fecha_creacion from producto";
        $datos = $this->modelProducto->consultarArray($sql);
        return $datos;
    }

    public function postEliminarProducto($id){
        
        $sql ="delete from producto where id_prod=".$id;

        try{
            $resultado = $this->modelProducto->eliminar($sql);
        }catch(Exception $e){
            echo "Error al eliminar producto";
        }
        return $resultado;
        
    }

    public function consultarProducto($id){

        $sql = "select id_prod, prod_nombre,prod_referencia, prod_peso, prod_precio, prod_categoria, prod_stock from producto where id_prod=".$id;
        $datos = $this->modelProducto->consultarArray($sql);
        return $datos;

    }

    public function postVentaProducto($data){

        $id_prod = $data['id_prod'];
        $cant_prod = $data['cant_prod'];
        $prod_ref = $data['ref_prod'];
        $prod_prec = $data['prec_prod'];
        $prod_total = $data['prec_venta'];
        $prod_fecha_vnt = date('Y-m-d H:i:s');

        try {
            $sql ="insert into ventas values ('0',$id_prod,'$prod_ref',$prod_prec,$cant_prod,$prod_total,'$prod_fecha_vnt')";
            $resultado = $this->modelProducto->insertar($sql); 
            return $resultado;
        }catch(Exception $e){
            echo "Error al insertar venta";
            var_dump($e);
        }

    }

    public function updateProductoVenta($data){
        
        $id_prod = $data['id_prod'];
        $cant_prod = $data['cant_prod'];

        $producto = $this->consultarProducto($id_prod);
        $stock =  $producto[0]['prod_stock'];
        $stock = $stock - $cant_prod;
        
        try {
            $sql ="Update producto set prod_stock = $stock where id_prod = $id_prod";
            $resultado = $this->modelProducto->editar($sql); 
            return $resultado;
        }catch(Exception $e){
            echo "Error al insertar editarProducto";
            var_dump($e);
        }

    }


    public function postEditarProducto($datos){
        
        $id_prod = $datos['prod_id'];
        $prod_nom = $datos['prod_nombre'];
        $prod_ref = $datos['prod_ref'];
        $prod_prec = $datos['prod_prec'];
        $prod_peso = $datos['prod_peso'];
        $prod_cat = $datos['prod_cat'];
        $prod_stock = $datos['prod_stock'];
        
        try {
            $sql ="Update producto set prod_nombre = '$prod_nom', prod_referencia = '$prod_ref', prod_precio = $prod_prec, prod_peso = $prod_peso, prod_categoria = '$prod_cat', prod_stock = $prod_stock  where id_prod=".$id_prod;
            $resultado = $this->modelProducto->editar($sql); 
            return $resultado;
        }catch(Exception $e){
            echo "Error al editar producto";
            var_dump($e);
        }
        
    }

    


}