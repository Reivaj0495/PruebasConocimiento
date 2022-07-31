<?php
	include_once '../model/Historia/DetalleHistoriaClinica/DetalleHistoriaClinicaModel.php';

	Class GstDetalleHistoriaClinica{
	
		public function ConsultarDetallesHistorialClinicoId($datos){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$sql = "select * from detalle_historia_clinica where id_historia_clinica=".$datos['id_historia_clinica'];
			$detalle_historia = $ObjFuncion->consultarArray($sql);
			$detalle_historia = $this->ConsultarColaborador($detalle_historia);
			return $detalle_historia;
		}
		public function ConsultarDetallesHistorialClinicoId_Detalle($datos){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$sql = "select * from detalle_historia_clinica where id=".$datos['id_detalle_historia_clinica'];
			$detalle_historia = $ObjFuncion->consultarArray($sql);
			$detalle_historia = $this->ConsultarColaborador($detalle_historia);
			return $detalle_historia;
		}
		// Funcion para consultar el colaborador por medio de su ID y traer todos los datos enviados mas el nombre del colaborador
		public function ConsultarColaborador($datos){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$i=0;
			foreach($datos as $dato){
				$sql = "select nombre from colaborador where id=".$dato['id_colaborador'];
				$nombres = $ObjFuncion->consultarArray($sql);
				foreach($nombres as $nombre){
					$datos[$i]['nombre_colaborador'] = $nombre['nombre'];
				}
				$i++;
			}
			return $datos;
		}

		public function ConsultarColaboradores(){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$sql = "select * from colaborador ";
			$nombres = $ObjFuncion->consultarArray($sql);
			return $nombres;
		}

		public function crearNuevoDetalleHistorial($datos){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$temperatura=$datos['temperatura'];
			$peso=$datos['peso'];
			$frecuencia_cardiaca=$datos['frecuencia_cardiaca'];
			$frecuencia_respiratoria=$datos['frecuencia_respiratoria'];
			$fecha = date("Y-m-d H:i:s");
			$alimentacion = $datos['alimentacion'];
			$habitad = $datos['habitad'];
			$observacion = $datos['observacion'];
			$id_colaborador=$datos['id_colaborador'];
			$id_historia_clinica=$datos['id_historia_clinica'];

			$sql="insert into detalle_historia_clinica values('',$temperatura,$peso,$frecuencia_cardiaca,$frecuencia_respiratoria,'$fecha','$alimentacion','$habitad','$observacion',$id_colaborador,$id_historia_clinica)";
			$respuesta = $ObjFuncion->insertar($sql);
			return $respuesta;
		}

		public function editarDetalleHistoria($datos){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$id = $datos['id'];
			$temperatura=$datos['temperatura'];
			$peso=$datos['peso'];
			$frecuencia_cardiaca=$datos['frecuencia_cardiaca'];
			$frecuencia_respiratoria=$datos['frecuencia_respiratoria'];
			$alimentacion = $datos['alimentacion'];
			$habitad = $datos['habitad'];
			$observacion = $datos['observacion'];
			$id_colaborador=$datos['id_colaborador'];
			$id_historia_clinica=$datos['id_historia_clinica'];
			
			$sql = "update detalle_historia_clinica set temperatura=$temperatura, peso=$peso, frecuencia_cardiaca=$frecuencia_cardiaca, frecuencia_respiratoria=$frecuencia_respiratoria, alimentacion='$alimentacion', habitad='$habitad',observacion='$observacion',id_colaborador=$id_colaborador where id =".$id." AND id_historia_clinica =".$id_historia_clinica;
			$respuesta = $ObjFuncion->editar($sql);
			return $respuesta;
		}

		public function eliminarDetalleHistoria($id){
			$ObjFuncion = new DetalleHistoriaClinicaModel();
			$sql ="delete from detalle_historia_clinica where id=".$id['id'];
			$resultado = $ObjFuncion->eliminar($sql);
		}
	}