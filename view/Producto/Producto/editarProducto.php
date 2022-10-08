
<form rule="formCrearProducto" name="formCrearProducto" id="formCrearProducto" action="postCrearProducto" method="post" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <div class="form-group">
                <h1 class="page-header">Editar Producto</h1>
        </div>
        
        <div class="form-group col-md-7 col-lg-7" style="background-color: #BFF3F7">
            <h3> Los campos con asteriscos (*) son obligatorios</h3>
        </div>
        
        <?php foreach ($datos as $key => $value) { ?>

             <input type="hidden" name="idproducto" id="idproducto" value="<?php echo $value['id_prod']; ?>">

        <div class="input-group"> 

            <div class="form-group col-xl-5 col-md-5">
                <label>Nombre Producto *</label>
                <input class="form-control" name="nom_producto" id="nom_producto" placeholder="Producto" type="text" value="<?php echo $value['prod_nombre']; ?>" required="required">
                <p class="help-block">Nombre del producto.</p>
            </div>

            <div class="form-group col-xl-5 col-md-5">
                <label>Referencia Producto *</label>
                <input class="form-control" name="ref_producto" id="ref_producto" placeholder="Referencia" type="text" value="<?php echo $value['prod_referencia']; ?>" required="required">
                <p class="help-block">Referencia del producto.</p>
            </div>
             
         </div>

        
        <div class="form-group col-xl-12 col-md-12 row">
          
            <div class="form-group col-xl-5 col-md-5">
                <label>Precio Producto *</label>
                <input class="form-control" name="prec_producto" id="prec_producto" placeholder="Precio" type="number" value="<?php echo $value['prod_precio']; ?>" required="required">
                <p class="help-block">Precio del producto.</p>
            </div>

            <div class="form-group col-xl-5 col-md-5">
                <label>Peso Producto *</label>
                <input class="form-control" name="peso_producto" id="peso_producto" placeholder="peso_producto" type="number" value="<?php echo $value['prod_peso']; ?>" required="required">
                <p class="help-block">Peso del producto.</p>
            </div>
        
        </div>
        
        <div class="form-group col-xl-12 col-md-12 row">
          
            <div class="form-group col-xl-5 col-md-5">
                <label>Categoria *</label>
                <input class="form-control" name="cat_producto" id="cat_producto" placeholder="Categoria" type="text" value="<?php echo $value['prod_categoria']; ?>" required="required">
                <p class="help-block">Categoria del producto.</p>
            </div>

            <div class="form-group col-xl-5 col-md-5">
                <label>Stock Producto (Cantidad) *</label>
                <input class="form-control" name="stock_producto" id="stock_producto" placeholder="Stock" type="number" value="<?php echo $value['prod_stock']; ?>" required="required">
                <p class="help-block">Stock del producto.</p>
            </div>
        
        </div>
        
    <?php } ?>      
        
        <div class="input-group">  
            <div class="form-group col-md-5">
                <input type='button' class='btn btn-success btnEditarProducto' value='Guardar' onclick='postProducto("editar")'>
            </div>
        </div>
    </div>
</form>

