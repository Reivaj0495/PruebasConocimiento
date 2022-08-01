<?php

include_once '../model/Usuario/UsuarioModel.php';


Class GstUsuario{
	
    public function ConsultarEmpleado($id){
        $ObjFuncion = new UsuarioModel();

        try{    
            $sql="select id,nombre,email,sexo,area_id,boletin,descripcion from empleado where id =".$id;
            $datos = $ObjFuncion->consultarArray($sql);
        }catch(e){
            echo "Error al consultar empleado";
            $ObjFuncion->Cerrar();
            $datos = array();
        }
        
        return $datos;
    }

    public function UpdateEmpleados($datos){
    
        $ObjFuncion = new UsuarioModel();
        
        $id_empleado = $datos['id'];
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $sexo = $datos['sexo'];
        $area_id = $datos['area_id'];
        
        $usuario = $this->ConsultarEmpleado($id_empleado);

        if($usuario != null){

            try{
                $sql = "Update empleado set nombre = '".$nombre."', email = '".$email."', sexo = '".$sexo."', area_id = '".$area_id."' where id = ".$id_empleado;
                $respuesta = $ObjFuncion->editar($sql);
                $resultado = true;
            }catch(e){
                echo "Error al insertar";
            }
            
        }else{

            $resultado = false;
        }
        return $resultado;
    }

    public function ConsultarEmpleados(){
        $ObjFuncion = new UsuarioModel();
        $sql = "select id,nombre,email,sexo,area_id,boletin from empleado";
        $datos = $ObjFuncion->consultarArray($sql);
        $datos = $this->getNombreArea($datos);
        return $datos;
    }


    // Funcion para traerme organizado los datos con el nombre de la mascota en el mismo arreglo que le envio
    public function getNombreArea($datos){
        $ObjFuncion = new UsuarioModel();
        $i=0;
        foreach($datos as $dato){
            $sql = "select nombre from areas where id=".$dato['area_id'];
            $resultados = $ObjFuncion->ConsultarArray($sql);
            foreach($resultados as $resultado){
                $datos[$i]['area_descripcion'] = $resultado['nombre'];
            }
        $i++;
        }
        return $datos;
    }

    public function getAreas(){
        
        $ObjFuncion = new UsuarioModel();
        $sql = "select id,nombre from areas";
        $datos = $ObjFuncion->consultarArray($sql);
        return $datos;
    }

    public function postIngresarEmpleado($datos){
        $ObjFuncion = new UsuarioModel();
        
        $nombre = $datos['nombre'];
        $email = $datos['correo'];
        $sexo = $datos['sexo'];
        $area_id = $datos['area'];
        $boletin = $datos['boletin'];
        $descripcion = $datos['descripcion'];

        $sql ="insert into empleado values ('','$nombre','$email','$sexo',$area_id,$boletin,'$descripcion')";
        $resultado = $ObjFuncion->insertar($sql); 
        return $resultado;
    }

    public function getRoles(){
        $ObjFuncion = new UsuarioModel();
        $sql = "select id,nombre from roles";
        $datos = $ObjFuncion->consultarArray($sql);
        return $datos;
    }

    public function eliminarUsuario($id){
        $ObjFuncion = new UsuarioModel();
        $sql ="delete from empleado where id=".$id;

        try{
            $resultado = $ObjFuncion->eliminar($sql);
        }catch(e){
            echo "Error al eliminar";
        }
        return $resultado;
        
    }

}