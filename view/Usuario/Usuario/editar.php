
<form rule="formEditarUsuario" name="formEditarUsuario" id="formEditarUsuario" action="postEditarUsuario" method="post" enctype="multipart/form-data">
    
        
    
    <div class="form-group">
        <div class="form-group">
                <h1 class="page-header">Editar Empleado</h1>
        </div>
        
        <div class="form-group col-md-7 col-lg-7" style="background-color: #BFF3F7">
            <h3> Los campos con asteriscos (*) son obligatorios</h3>
        </div>
    <?php foreach ($datos as $key => $value) { ?>
        
        
        <input type="hidden" name="id_empleado" id="id_empleado" value="<?php echo $value['id']; ?>">


        <div class="input-group">   

            <div class="form-group col-xl-5 col-md-5">
                <label>Nombre Completo *</label>
                <input class="form-control" name="nombre" id="nombre" placeholder="Nombre" type="text" value="<?php echo $value['nombre']; ?>" required="required">
                <p class="help-block">Nombre del empleado.</p>
            </div>

            <div class="form-group col-xl-5 col-md-5">
                <label>Correo Electrónico *</label>
                <input class="form-control" name="email" id="email" type="email" placeholder="Correo" value="<?php echo $value['email']; ?>" required="required">
                <p class="help-block">Correo del empleado.</p>
            </div>
             
         </div>

        
        <div class="form-group col-xl-12 col-md-12 row">

            <div class="form-group col-xl-5 col-md-5">
        
                        <label>Sexo *</label>
                    <?php if($value['sexo'] == 'F'){ ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexo" value="M"> Masculino
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexo" value="F" checked="checked"> Femenino
                        </label>
                    </div>
                    <?php } else{ ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexo" value="M" checked="checked"> Masculino
                        </label>
                        
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexo" value="F"> Femenino
                        </label>
                    </div>
                    <?php } ?>
                        
                    <p class="help-block">Sexo del empleado.</p>

                        
            </div>            

        

            <div class="form-group col-xl-5 col-md-5 form-area">
                <label>Area *</label><br>
                <select class="form-control form-select" aria-label="Default select example" id="area" name="area" placeholder="Area" required="required">
                    <?php foreach ($areas as $key => $val) { ?>
                        <option value="<?php echo $val['id']; ?>" <?php if($value['area_id'] == $val['id']){ echo 'selected="selected"'; } ?>><?php echo $val['nombre']; ?></option>
                    <?php } ?>
                </select>
                <p class="help-block">Area del usuario.</p>
            </div>
        </div>
            
        <div class="input-group">   
        
            <div class="form-group col-md-5">
                <label>Descripción *</label>
                <textArea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required="required"><?php echo $value['descripcion']; ?></textArea>
                <p class="help-block">Descripcion de experiencia empleado.</p>

            <div class="form-group col-md-5">
            
                <label>Roles *</label>
                
                <?php foreach ($roles as $key => $val) { ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="rol" id="rol" value="<?php echo $val['id']; ?>">
                            <?php echo $val['nombre']; ?>
                        </label>
                    </div>
                <?php } ?>
                

         </div>
        
                
     <?php } ?>    
        <div class="input-group">  
            <div class="form-group col-md-5">
                <input type='button' class='btn btn-success btnEditarUsuario' value='Guardar' onclick='postFuncion(2)'>
            </div>
        </div>
    </div>
</form>