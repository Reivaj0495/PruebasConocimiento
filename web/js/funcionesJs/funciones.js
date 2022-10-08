    
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
          title: 'ESeguro desea '+accion+'?',
      text: "Notificación!",
      type: 'warning',
      width: '35%',
      showCancelButton: true,
      confirmButtonText: 'Si,'+accion+'!',
      cancelButtonText: 'No,'+accion+'!',
      reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          swalWithBootstrapButtons.fire(
            'Notificación!',
        'Proceso '+accion+' iniciado.',
        'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Notificación',
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

    function validaVacio(valor) {
      valor = valor.replace("&nbsp;", "");
      valor = valor == undefined ? "" : valor;
      if (!valor || 0 === valor.trim().length) {
          return true;
          }
      else {
          return false;
          }
      }

/* 
    Este codigo se encarga del cambio de estado del usuario por medio del click en el boton
*/  
    function postFuncion($ejecutar){
    let nombre = document.getElementById('nombre').value;
    let correo = document.getElementById('email').value;
    let sexo = $('input[name="sexo"]:checked').val();
    let area = document.getElementById('area').value;
    let descripcion = document.getElementById('descripcion').value;
    let rol = $('input[name="rol"]:checked').val();
    
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if ( !expr.test(correo) ){
        alert("Error: La dirección de correo " + correo + " es incorrecta.");
        return false;
    }
    
    if ( validaVacio(nombre) ){

      alert("Error: El campo nombre no puede estar vacio");
      document.getElementById('nombre').focus();
      return false;

    }else if ( validaVacio(correo)){
      alert("Error: El campo correo no puede estar vacio");
      document.getElementById('email').focus();
      return false;
    }else if ( sexo == undefined || sexo == null || sexo == ""){
      alert("Error: El campo sexo no puede estar vacio");
      document.getElementById('sexo').focus();
      return false;
    }else if (validaVacio(area) ){
      alert("Error: El campo area no puede estar vacio");
      document.getElementById('area').focus();
      return false;
    }else if (validaVacio(descripcion)){
      alert("Error: El campo descripcion no puede estar vacio");
      $('#descripcion').focus();
      return false;
    }else if (rol == undefined || rol == null || rol == "" ) { 
      alert("Error: El campo rol no puede estar vacio");
      document.getElementById('rol').focus();
      return false;
    }
    
    if($ejecutar == '1'){
        postCrearUsuario(nombre,correo,sexo,area,descripcion,rol);
    }else{
      $id_empleado = document.getElementById('id_empleado').value;
      if($id_empleado == "" || $id_empleado == null || $id_empleado == undefined || Number.isInteger($id_empleado)){
        alert("Error: El campo id_empleado no puede estar vacio");
      }else{
        posteditarUsuarioid(nombre,correo,sexo,area,descripcion,rol,id_empleado);
      }
    }
      
    }
    
    function postCrearUsuario(nombre,correo,sexo,area,descripcion,rol){
      $(".btnCrearUsuario").attr("disabled", true);
      let boletin = document.getElementById('boletin');
      
      if (boletin.checked) {
        boletin = 1;
      }else if (!boletin.checked) {
        boletin = 0;
      }
      data = { "nombre" : nombre,
              "correo" : correo,
              "sexo" : sexo,
              "area" : area,
              "descripcion" : descripcion,
              "rol" : rol,
              "boletin" : boletin
            };

      
      $.ajax({
            type:"post",
            url: "index.php?modulo=Usuario&controlador=Usuario&funcion=postCrearUsuario",
            data: data,
            success:function(result){
                alertProcess('Notificación',"Se registro correctamente",'success');
                
                url = 'index.php?modulo=Usuario&controlador=Usuario&funcion=listarUsuario';
                setTimeout(redirect(url)
                ,4000);
                
                   
            }, error :function(result){
                alertProcess('Notificación',"No se pudo registrar",'error');
                setTimeout('document.location.reload()',2000);
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
              alertProcess('Notificación',"Se elimino el registro",'success');
                setTimeout('document.location.reload()',1000);
            },error:function(respuesta){
                alertProcess('Notificación',"No se pudo eliminar",'error');
            }
        });
    }

    function editarUsuario(id){
      var id_dato = id;
      Swal.fire({
        title: 'seguro quieres editar?',
        text: "Te llevara a la pagina de editar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, editar esto!'
          }).then((result) => {
            if (result.isConfirmed) {
              editarUsuarioid(id_dato);
            }
      })
    }

    function editarUsuarioid(id_dato){  

      var url = "index.php?modulo=Usuario&controlador=Usuario&funcion=editarUsuario&id="+id_dato;
      window.location.replace(url);
      
      
    }

    

  function posteditarUsuarioid(nombre,correo,sexo,area,descripcion,rol,id_empleado){  

    //$(".btnEditarUsuario").attr("disabled", true);
    (function a() {
      a();
  })();
      data = { "nombre" : nombre,
              "correo" : correo,
              "sexo" : sexo,
              "area" : area,
              "descripcion" : descripcion,
              "rol" : rol,
              "id_empleado" : id_empleado
            };

      
      $.ajax({
            type:"post",
            url: "index.php?modulo=Usuario&controlador=Usuario&funcion=postEditarUsuario",
            data: data,
            success:function(result){
                alertProcess('Notificación',"Se edito correctamente",'success');
                
                url = 'index.php?modulo=Usuario&controlador=Usuario&funcion=listarUsuario';
                setTimeout(redirect(url)
                ,4000);
                
                   
            }, error :function(result){
                alertProcess('Notificación',"No se pudo editar usuario",'error');
                setTimeout('document.location.reload()',2000);
            }
        });
   
    
    
  }
    
    