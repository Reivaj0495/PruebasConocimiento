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
                        echo "<td>" ;
                        echo "<input type='button' class='btn btn-primary' value='Editar' onclick='editarUsuarios(".$value['id'].");'>";
                        echo " <input type='button' class='btn btn-danger' value='Eliminar' onclick='eliminarUsuarios(".$value['id'].");'></td>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
                
    