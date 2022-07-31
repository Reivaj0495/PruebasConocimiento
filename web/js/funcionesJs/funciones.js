    
    // esta funcion sera usada para continuar con eventos (Crear eliminar etc)
    function alerta(accion,message){
    
    const swalWithBootstrapButtons = Swal.mixin({
                                      customClass: {
                                        confirmButton: 'btn btn-success',
                                        cancelButton: 'btn btn-danger'
                                      },
                                      buttonsStyling: false
                                    })

                                    swalWithBootstrapButtons.fire({
                                        title: '�Seguro desea '+accion+'?',
		                                text: "Notificaci�n!",
		                                type: 'warning',
		                                width: '35%',
		                                showCancelButton: true,
		                                confirmButtonText: 'Si,'+accion+'!',
		                                cancelButtonText: 'No,'+accion+'!',
		                                reverseButtons: true
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        swalWithBootstrapButtons.fire(
                                          'Notificaci�n!',
		                                  'Proceso '+accion+' iniciado.',
		                                  'success'
                                        )
                                      } else if (
                                        /* Read more about handling dismissals below */
                                        result.dismiss === Swal.DismissReason.cancel
                                      ) {
                                        swalWithBootstrapButtons.fire(
                                          'Notificaci�n',
		                                  'Proceso '+accion+' cancelado:)',
		                                  'error'
                                        )
                                      }
                                    })
    }
    // esta funcion sera usada para messages de error 
    function alertProcess(accion,descripcion,type){
	    Swal.fire(
  		    accion,
  		    descripcion,
  		    type
	    )
    }





/* 
    Este codigo se encarga del cambio de estado del usuario por medio del click en el boton
*/  
    function postFuncion(){

      var form = $("#formCrearUsuario").serialize();
      postCrearUsuario(form);
    }

    function postCrearUsuario(form){
      
      $.ajax({
            type:"post",
            url: "index.php?modulo=Usuario&controlador=Usuario&funcion=postCrearUsuario",
            data: form,
            success:function(result){
                alertProcess('Notificacion',"Se registro correctamente",'success');
                url = 'index.php?modulo=Usuario&controlador=Usuario&funcion=listarUsuario';
                setTimeout(redirect(url)
                ,4000);
                   
            }, error :function(result){
                alertProcess('Notificacion',"No se pudo registrar",'error');
            }
        });

        
    }
    function redirect(url,){
      window.location.replace(url);
    }

    function eliminarUsuarios(id){
    var id_dato = id;
    Swal.fire({
      title: 'seguro quieres eliminar?',
      text: "No podras revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar esto!'
        }).then((result) => {
          if (result.isConfirmed) {
            eliminarUsuario(id_dato);
          }
    })
    }
    function eliminarUsuario(id){
 
      var url = "index.php?modulo=Usuario&controlador=Usuario&funcion=postEliminarUsuario";
      $.ajax({
            type:"POST",
            url:url,
            data:"id="+id,
            success:function(respuesta){
              alertProcess('Notificacion',"Se elimino el registro",'success');
                setTimeout('document.location.reload()',2000);
            },error:function(respuesta){
                alertProcess('Notificacion',"No se pudo eliminar",'error');
            }
        });
    }

    function eliminarDetalleHistoria(id){
    var id_dato = id;
    Swal.fire({
      title: 'seguro quieres eliminar?',
      text: "No podras revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar esto!'
        }).then((result) => {
          if (result.isConfirmed) {
            eliminarDelleHistorialClinica(id_dato);
            Swal.fire(
              'Eliminado!',
              'El detalle ha sido eliminado.',
              'success'
             )
          }
    })
    }
    function eliminarDelleHistorialClinica(id){
 
      var url = "index.php?modulo=DetalleHistoriaClinica&controlador=DetalleHistoriaClinica&funcion=eliminarDetalleHistoria";
        $.ajax({
            type:"GET",
            url:url,
            data:{id},
            success:function(respuesta){
               setTimeout('document.location.reload()',1000);
            }
        });
    }
    