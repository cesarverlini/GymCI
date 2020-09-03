<section class="content">
    <div class="center-content ">
        <div class="row col-md-6">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Usuario</h3>
                    </div>
                    <div class="card-body">
                        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?> 
                        <form id="form_new_user" method="POST" action="<?php echo base_url('guardar_usuario');?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="nombre">Empleado</label>
                                            <input type="text" class="form-control" id="employee" name="employee" required>
                                            <!-- <select class="form-control" name="employee" id="employee" required>
                                                <option value="" selected>Seleccionar...</option>
                                                <?php if (!empty($employees)) : ?>
                                                    <?php foreach ($employees as $employee) : ?>
                                                        <option value="<?php echo $employee->id; ?>"><?php echo $employee->nombre." ".$employee->apellido_paterno." ".$employee->apellido_materno; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select> -->
                                            <br class="error">
                                            <label for="nombre">Usuario</label>
                                            <input type="text" class="form-control" id="user" name="user"  required>
                                            <br class="error">
                                            <label for="nombre">Contraseña</label>
                                            <input type="text" class="form-control" id="password" name="password" required>
                                            <br class="error">
                                            <label for="nombre">Rol de usuario</label>
                                            <select class="form-control" name="user_rol" id="user_rol" required>
                                                <option value="" selected>Seleccionar...</option>
                                                <?php if (!empty($roles)) : ?>
                                                    <?php foreach ($roles as $rol) : ?>
                                                        <option value="<?php echo $rol->id_rol; ?>"><?php echo $rol->nombre_rol; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                            <br>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" id="btn_save" class="btn btn-primary float-right">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>