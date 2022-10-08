<?php

include_once '../model/Ventas/VentasModel.php';


Class GstVentas{

    private $modelVentas;
 	
 	function __construct(){
 		$this->modelVentas = new VentasModel();
 	}

    public function consultarVentasProductos() {
        
        $sql = " SELECT vnt.id_prod,pr.prod_nombre, vnt.prod_ref, vnt.prod_prec, pr.prod_categoria,vnt.vnt_cant_prod, vnt_fecha, vnt_prec_total_prod FROM producto pr INNER JOIN ventas vnt ON pr.id_prod = vnt.id_prod ORDER BY 6 desc";
        $datos = $this->modelVentas->consultarArray($sql);
    
        return $datos;
    }

    public function productoMasVendido(){

        $sql = "SELECT vnt.id_prod,pr.prod_nombre, vnt.prod_ref, vnt.prod_prec, pr.prod_categoria, sum(vnt.vnt_cant_prod) as vntTotal FROM producto pr INNER JOIN ventas vnt ON pr.id_prod = vnt.id_prod GROUP BY vnt.id_prod ORDER BY 6 desc limit 1";
            $datos = $this->modelVentas->consultarArray($sql);
            return $datos;
    }

    public function productoMasStock() {
        $sql = "SELECT prod_nombre, prod_stock FROM producto ORDER BY 2 desc LIMIT 1";
            $datos = $this->modelVentas->consultarArray($sql);
            return $datos;
        
    }
        
    

}


