
<form rule="formVentaProducto" name="formVentaProducto" id="formVentaProducto" action="postVentaProducto" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <div class="form-group">
                <h1 class="page-header"> Vender Producto </h1>
        </div>
        
        <div class="form-group col-md-7 col-lg-7" style="background-color: #BFF3F7">
            <h3> Los campos con asteriscos (*) son obligatorios</h3>
        </div>
        
        <?php foreach ($data as $key => $value) { ?>
            <input type="hidden" name="idproducto" id="idproducto" value="<?php echo $value['id_prod']; ?>">
        
            <div class="input-group">   

            <div class="form-group col-xl-6 col-md-6">
                <label>Nombre Producto *</label>
                <input class="form-control" name="nom_producto" id="nom_producto" placeholder="Producto" type="text" required="required" value="<?php echo $value['prod_nombre']; ?>" readonly="true">
                <p class="help-block">Nombre del producto.</p>
            </div>

            <div class="form-group col-xl-6 col-md-6">
                <label>Referencia Producto *</label>
                <input class="form-control" name="ref_producto" id="ref_producto" placeholder="Referencia" type="text" required="required" value="<?php echo $value['prod_referencia']; ?>" readonly="true">
                <p class="help-block">Referencia del producto.</p>
            </div>
             
         </div>

        
        <div class="form-group col-xl-12 col-md-12 row">
          
            <div class="form-group col-xl-4 col-md-4">
                <label>Precio Producto *</label>
                <input class="form-control" name="prec_producto" id="prec_producto" placeholder="Precio" type="number" required="required" value="<?php echo $value['prod_precio']; ?>" readonly="true">
                <p class="help-block">Precio del producto.</p>
            </div>

            <div class="form-group col-xl-4 col-md-4">
                <label>Categoria *</label>
                <input class="form-control" name="cat_producto" id="cat_producto" placeholder="Categoria" type="text" required="required" value="<?php echo $value['prod_categoria']; ?>" readonly="true">
                <p class="help-block">Categoria del producto.</p>
            </div>

            <div class="form-group col-xl-4 col-md-4">
                <label>Stock Producto (Cantidad) *</label>
                <input class="form-control" name="stock_producto" id="stock_producto" placeholder="Stock" type="number" required="required" value="<?php echo $value['prod_stock']; ?>" readonly="true">
                <p class="help-block">Stock del producto.</p>
            </div>
            
        
        </div>
        
        <div class="form-group col-xl-12 col-md-12 row">
          
            <div class="form-group col-xl-5 col-md-5">
                <label>Cantidad (Venta) *</label>
                <input class="form-control" name="cant_producto" id="cant_producto" placeholder="Cantidad Venta" type="number" value="0" required="required">
                <p class="help-block">Cantidad del producto.</p>
            </div>

            <div class="form-group col-xl-5 col-md-5">
                <label>Precio Ventas *</label>
                <input class="form-control" name="prec_venta" id="prec_venta" placeholder="Precio Venta" type="number" required="required" readonly="true">
                <p class="help-block">Stock del producto.</p>
            </div>
        
        </div>
        
        
        <?php } ?>          
        
        <div class="input-group">  
            <div class="form-group col-md-5">
                <input type='button' class='btn btn-success btnCrearProducto' value='Vender Producto' onclick='postVentaProducto()'>
                <a class='btn btn-danger' href="<?php echo getUrl("Producto", "Producto", "listarProductos"); ?>" >Cancelar</a></button>
            </div>
        </div>
    </div>
</form>

