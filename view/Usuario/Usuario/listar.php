<a class='btn btn-success' href="<?php echo getUrl("Usuario", "Usuario", "crearUsuario"); ?>" >Registrar Empleado</a></button>
    
    <div class="col-lg-12">
        <h1 class="page-header">Listar Empleados</h1>
    </div>
    
                        
    
        <div class="form-group">
            
            <table class="table table-bordered table-striped border-primary">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> Nombre </th>
                        <th><i class="fad fa-at"></i> Correo </th>
                        <th><i class="fas fa-hand-receiving"></i> Sexo</th>
                        <th><i class="fas fa-briefcase"></i> Area</th>
                        <th><i class="fas fa-envelope-open-text"></i> Boletin</th>
                        <th><i class="far fa-user-cog"></i> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $key => $value) {
                        echo "<tr>";
                        echo "<td>".$value['nombre']."</td>";
                        echo "<td>".$value['email']."</td>";

                        if($value['sexo'] == 'F'){
                            echo "<td>Femenino</td>";
                        }else{
                            echo "<td>Masculino</td>";
                        }
                        echo "<td>".$value['area_descripcion']."</td>";
                        echo "<td>".$value['boletin']."</td>";
                        echo "<td> <a href='".getUrl("HistoriaClinica", "HistoriaClinica", "editarHistorial",array("id_historiaclinica"=>$value['id']))."' class='btn btn-primary'>Editar</a></button>";
                        echo " <input type='button' class='btn btn-danger' value='Eliminar' onclick='eliminarHistoria(".$value['id'].");'></td>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    /*
                        foreach($productosBd as $producto){
                            echo 
                              "<tr>"
                                . "<td>" . $producto['producto']['pro_nombre'] . "</td>"
                                . "<td>" . $producto['producto']['pro_descripcion'] . "</td>"
                                . "<td>" . $producto['producto']['pro_anio'] . "</td>"
                                . "<td>" . $producto['producto']['pro_jugadores'] . "</td>"
                                . "<td>"; 
                            foreach($producto['genero'] as $genero){
                                echo $genero['gen_descripcion']."<br>";
                            } 
                            echo "</td>"
                                . "<td>"; 
                            foreach($producto['plataforma'] as $plataforma){
                                echo $plataforma['pla_descripcion']."<br>";
                            } 
                            echo "</td>"
                                . "<td>" . $producto['producto']['pro_precio'] . "</td>"
                                . "<td>" . $producto['producto']['pro_cantidad'] . "</td>"
                                . "<td><button type='button' class='btn btn-success agregarCarrito' data-valor='" . $producto['producto']['pro_id'] . "' data-url='" . getUrl("Venta","Carrito","agregar",false,"ajax") . "'>Comprar</button></td>"
                            . "</tr>";
                        }
                    */
                    ?>
                </tbody>
            </table>
        </div>
                
    