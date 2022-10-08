function redireccionarPagina(url) {
  window.location = url;
}

function alertProcess(accion, descripcion, type) {
  Swal.fire(
    accion,
    descripcion,
    type
  )
}


function validaCampoVacio(valor) {
  valor = valor.replace("&nbsp;", "");
  valor = valor == undefined ? "" : valor;
  if (!valor || 0 === valor.trim().length) {
    return true;
  }
  else {
    return false;
  }
}

function isNumeric(val) {
  return isNaN(val);
}

function postProducto($ejecutar) {

  let nom_Prod = document.getElementById('nom_producto').value;
  let ref_Prod = document.getElementById('ref_producto').value;
  let prec_Prod = document.getElementById('prec_producto').value;
  let peso_Prod = document.getElementById('peso_producto').value;
  let cat_Prod = document.getElementById('cat_producto').value;
  let stock_Prod = document.getElementById('stock_producto').value;

  if (validaCampoVacio(nom_Prod)) {

    alertProcess('Notificación', "El campo nombre no puede estar vacio", 'error');
    document.getElementById('nom_producto').focus();
    return false;

  } else if (validaCampoVacio(ref_Prod)) {
    alertProcess('Notificación', "El campo referencia no puede estar vacio", 'error');
    document.getElementById('ref_producto').focus();
    return false;
  }

  else if (prec_Prod <= 0 || isNumeric(prec_Prod) || validaCampoVacio(prec_Prod)) {
    alertProcess('Notificación', "El campo precio no puede estar vacio y debe ser un numero mayor a 0", 'error');
    document.getElementById('prec_producto').focus();
    return false;
  }

  else if (isNumeric(peso_Prod) || validaCampoVacio(peso_Prod) || parseInt(peso_Prod) < 0) {
    alertProcess('Notificación', "El campo peso no puede estar vacio y debe ser un numero mayor a 0", 'error');
    document.getElementById('peso_producto').focus();
    return false;
  }


  else if (validaCampoVacio(cat_Prod)) {
    alertProcess('Notificación', "El campo referencia no puede estar vacio", 'error');
    document.getElementById('cat_producto').focus();
    return false;
  }
  else if (isNumeric(stock_Prod) || validaCampoVacio(stock_Prod) || parseInt(stock_Prod) < 0) {
    alertProcess('Notificación', "El campo stock no puede estar vacio y debe ser un numero mayor o igual a 0", 'error');
    document.getElementById('stock_producto').focus();
    return false;
  }


  if ($ejecutar == 'crear') {
    postCrearProducto(nom_Prod, ref_Prod, prec_Prod, peso_Prod, cat_Prod, stock_Prod);
  } else {
    $id_product = document.getElementById('idproducto').value;
    if ($id_product == "" || $id_product == null || $id_product == undefined || Number.isInteger($id_product)) {
      alertProcess('Notificación', "No se debe eliminar el campo del producto", 'error');
    } else {
      postEditarProducto( $id_product,nom_Prod, ref_Prod, prec_Prod, peso_Prod, cat_Prod, stock_Prod);
    }
  }
}

function postCrearProducto(nom_Prod, ref_Prod, prec_Prod, peso_Prod, cat_Prod, stock_Prod) {
  
  $(".btnCrearProducto").attr("disabled", true);
  data = {
    "prod_nombre": nom_Prod,
    "prod_ref": ref_Prod,
    "prod_prec": prec_Prod,
    "prod_peso": peso_Prod,
    "prod_cat": cat_Prod,
    "prod_stock": stock_Prod,
  };


  $.ajax({
    type: "POST",
    url: "index.php?modulo=Producto&controlador=Producto&funcion=postCrearProducto",
    data: data,
    success: function (result) {

      alertProcess('Notificación', "Se registro correctamente el producto", 'success');
      url = 'index.php?modulo=Producto&controlador=Producto&funcion=listarProductos';
      setTimeout("redireccionarPagina('"+url+"')", 2000);
      


    }, error: function (result) {
      alertProcess('Notificación', "No se pudo registrar el producto", 'error');
      setTimeout('document.location.reload()', 2000);
    }
  });

}

function postEditarProducto($id_product,nom_Prod, ref_Prod, prec_Prod, peso_Prod, cat_Prod, stock_Prod){

  $(".btnEditarProducto").attr("disabled", true);

  data = {
    "prod_id": $id_product,
    "prod_nombre": nom_Prod,
    "prod_ref": ref_Prod,
    "prod_prec": prec_Prod,
    "prod_peso": peso_Prod,
    "prod_cat": cat_Prod,
    "prod_stock": stock_Prod,
  };

  $.ajax({
    type: "POST",
    url: "index.php?modulo=Producto&controlador=Producto&funcion=postEditarProducto",
    data: data,
    success: function (result) {

      alertProcess('Notificación', "Se edito correctamente el producto", 'success');
      url = 'index.php?modulo=Producto&controlador=Producto&funcion=listarProductos';
      setTimeout("redireccionarPagina('"+url+"')", 2000);

    }, error: function (result) {
      alertProcess('Notificación', "No se pudo registrar el producto", 'error');
      setTimeout('document.location.reload()', 2000);
    }
  });


}

function eliminarProducto(id) {

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
      eliminarPostProducto(id);
    }
  })
}

function eliminarPostProducto(id) {

  let url = "index.php?modulo=Producto&controlador=Producto&funcion=postEliminarProducto";
  $.ajax({
    type: "POST",
    url: url,
    data: "id=" + id,
    success: function (respuesta) {
      alertProcess('Notificación', "Se elimino el producto correctamente", 'success');
      setTimeout('document.location.reload()', 2000);
    }, error: function (respuesta) {
      alertProcess('Notificación', "No se pudo eliminar", 'error');
    }
  });
}


function ventaProducto(id) {

  Swal.fire({
    title: 'seguro quieres vender este producto?',
    text: "No podras revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, vender esto!'
  }).then((result) => {
    if (result.isConfirmed) {
      var url = "index.php?modulo=Producto&controlador=Producto&funcion=vistaVentaProducto&idProd=" + id;
      redirect(url);
    }
  })
}

$("#cant_producto").on("change", function () {

  let cant_prod = $("#cant_producto").val()
  let stock_Prod = $("#stock_producto").val()

  if (!isNaN(cant_prod) && !isNaN(stock_Prod)) {

    if (parseInt(stock_Prod) - parseInt(cant_prod) < 0) {
      alertProcess('Notificación', "Cantidad maxima de stock.", "error");
      $("#cant_producto").val(stock_Prod);
    }

  }

  if (cant_prod <= 0) {
    alertProcess('Advertencia', "La cantidad del producto debe ser mayor a 0", "error");
    $("#cant_producto").val(1);
  }

  $("#prec_venta").val($("#cant_producto").val() * $("#prec_producto").val());

});

function postVentaProducto() {

  let cant_prod = document.getElementById('cant_producto').value;
  let id_prod = document.getElementById('idproducto').value;
  let stock_Prod = document.getElementById('stock_producto').value;
  let ref_Prod = document.getElementById('ref_producto').value;
  let prec_venta = document.getElementById('prec_venta').value;
  let precio_prod = document.getElementById('prec_producto').value;


  if (parseInt(stock_Prod) - parseInt(cant_prod) < 0) {
      alertProcess('Notificación', "Sin unidades suficientes para esta compra.", "error");
      return;
  }
  if (parseInt(cant_prod) <= 0) {
    alertProcess('Notificación', "Sin unidades para esta compra.", "error");
    return;
  }

  data = {
    "cant_prod": cant_prod,
    "id_prod": id_prod,
    "ref_prod": ref_Prod,
    "prec_venta": prec_venta,
    "prec_prod": precio_prod
  };


  $.ajax({
    type: "GET",
    url: "index.php?modulo=Producto&controlador=Producto&funcion=postVentaProducto",
    data: data,
    success: function (result) {

      alertProcess('Notificación', "Se realizo la venta correctamente", 'success');
      url = 'index.php?modulo=Producto&controlador=Producto&funcion=listarProductos';
      setTimeout("redireccionarPagina('"+url+"')", 2000);


    }, error: function (result) {

      alertProcess('Notificación', "No se pudo registrar la venta", 'error');
      setTimeout('document.location.reload()', 2000);

    }
  });
}


function editarProducto(id) {

  var url = "index.php?modulo=Producto&controlador=Producto&funcion=vistaEditarProducto&idProd=" + id;
  redirect(url);    

}

