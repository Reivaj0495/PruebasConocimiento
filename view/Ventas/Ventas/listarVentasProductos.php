
<div class="d-flex">
<div class="form-group col-xl-2 col-md-2">
    <label for="exampleInput">Producto con mas stock</label>
    <input type="text" class="form-control" value="<?php echo $prodMasStock[0]["prod_nombre"] ?>" readonly="true">
</div>

<div class="form-group col-xl-2 col-md-2">
    <label for="exampleInput">Producto Mas Vendido</label>
    <input type="text" class="form-control" value="<?php echo $prodMasVnt[0]["prod_nombre"] ?>" readonly="true">
</div>
</div>


    
    <div class="col-lg-12">
        <h1 class="page-header">Listar Ventas Productos</h1>
    </div>
    
                        
    
        <div class="form-group">
            
            <table class="table table-bordered table-striped border-primary">
                <thead>
                    <tr>
                        <th><i class="fas fa-cart-plus"></i> Producto </th>
                        <th><i class="fas fa-tag"></i> Referencia </th>
                        <th><i class="fas fa-briefcase"></i> Categoria </th>
                        <th><i class="fas fa-chart-pie"></i> Cantidad </th>
                        <th><i class="far fa-money-bill-alt"></i> Precio</th>
                        <th><i class="fas fa-chart-pie"></i> Total Venta </th>
                        <th><i class="far fa-calendar-alt"></i> Fecha Venta </th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        echo "<td>".$value['prod_nombre']."</td>";
                        echo "<td>".$value['prod_ref']."</td>";
                        echo "<td>".$value['prod_categoria']."</td>";
                        echo "<td>".$value['vnt_cant_prod']."</td>";
                        echo "<td>".$value['prod_prec']."</td>";
                        echo "<td>".$value['vnt_prec_total_prod']."</td>";
                        echo "<td>".$value['vnt_fecha']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div> 
    