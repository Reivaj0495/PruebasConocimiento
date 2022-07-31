<?php
	include_once '../model/Historia/HistoriaClinica/HistoriaClinicaModel.php';

	Class GstHistoriaClinica{
	
		public function ConsultarMascota(){
			$ObjFuncion = new HistoriaClinicaModel();
			$sql="select * from mascota";
			$datos = $ObjFuncion->consultarArray($sql);
			return $datos;
		}
		public function InsertarHistoriaClinica($datos){
		
			$ObjFuncion = new HistoriaClinicaModel();
			$id_mascota = $datos['id'];
			$fecha = $datos['fecha'];
			$sql ="insert into historia_clinica values ('',$id_mascota,'$fecha')";
			$resultado = $ObjFuncion->insertar($sql); 
			return $resultado;
		}
		public function ConsultarDatos(){
			$ObjFuncion = new HistoriaClinicaModel();
			$sql = "select * from historia_clinica";
			$datos = $ObjFuncion->consultarArray($sql);
			$datos = $this->getNombreMascota($datos);
			return $datos;
		}
		// Funcion para traerme organizado los datos con el nombre de la mascota en el mismo arreglo que le envio
		public function getNombreMascota($datos){
			$ObjFuncion = new HistoriaClinicaModel();
			$i=0;
			foreach($datos as $dato){
				$sql = "select nombre from mascota where id=".$dato['id_mascota'];
				$resultados = $ObjFuncion->ConsultarArray($sql);
				foreach($resultados as $resultado){
					$datos[$i]['nombre_mascota'] = $resultado['nombre'];
				}
			$i++;
			}
			return $datos;
		}

		public function ConsultarDatosId($id){
			$ObjFuncion = new HistoriaClinicaModel();
			$sql = "select * from historia_clinica where id=".$id;
			$datos = $ObjFuncion->consultarArray($sql);
			$datos = $this->getNombreMascota($datos);
			return $datos;
		}

		public function EditarHistoria($datos){
			$ObjFuncion = new HistoriaClinicaModel();
			$id = $datos['id'];
			$id_mascota = $datos['id_mascota'];
			$fecha = $datos['fecha'];
			$sql ="update historia_clinica set id_mascota = $id_mascota, fecha_creacion ='$fecha' where id=".$id;
			$resultado = $ObjFuncion->editar($sql);
			return $resultado;
		}

		public function eliminarHistorial($datos){
			$ObjFuncion = new HistoriaClinicaModel();
			$id = $datos['id'];
			$sql ="delete from detalle_historia_clinica where id_historia_clinica=".$id;
			$resultado1 = $ObjFuncion->eliminar($sql);
			$id_mascota = $datos['id_mascota'];
			$sql ="delete from historia_clinica where id=".$id." AND id_mascota=".$id_mascota;
			$resultado = $ObjFuncion->eliminar($sql);
			return $resultado;
			
		}
	}