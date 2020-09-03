<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Empleados - Listado</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th>Empleado</th>                                    
                                    <th>Username</th>
                                    <th>Rol</th>
                                    <th style="width: 10%;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?php echo $user->id; ?></td>
                                                <td><?php echo $user->nombre." ".$user->apellido_paterno." ".$user->apellido_materno; ?></td>                                                
                                                <td><?php echo $user->username?></td>
                                                <td><?php echo $user->nombre_rol; ?></td>
                                                <td>
                                                    <div class="btn-group" style="text-align: center;">
                                                        <a href="<?php echo base_url('edit_user/' . $user->id) ?>" class="btn btn-warning btn_edit"><span class="fas fa-pencil-alt"></a>
                                                        <button type="button" class="btn btn-danger btn-remove btn_delete" value="<?php echo $user->id; ?>" id="<?php echo $user->username?>"><span class="fas fa-trash-alt"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
</section>