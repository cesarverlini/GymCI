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
                                    <th>Fotografia</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                    <th style="width: 10%;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($employes)) : ?>
                                    <?php foreach ($employes as $employe) : ?>
                                        <?php if ($employe->tipo_persona == 0) : ?>
                                            <!-- verificar que la persona sea un empleado -->
                                            <tr>
                                                <td><?php echo $employe->id; ?></td>
                                                <?php if ($employe->photo) : ?>
                                                    <td style="text-align: center;"><img src="assets/img/<?php echo $employe->photo ?>" style="width: 40px; height: 40;" id="imagefield"></td>
                                                <?php else : ?>
                                                    <td style="text-align: center;"><img src="assets/img/silueta.png" style="width: 40px; height: 40;" id="imagefield"></td>
                                                <?php endif; ?>
                                                <td><?php echo $employe->nombre . " " . $employe->apellido_paterno . " " . $employe->apellido_materno; ?></td>
                                                <td><?php echo $employe->direccion; ?></td>
                                                <td><?php echo $employe->telefono; ?></td>
                                                <td><?php echo $employe->correo; ?></td>
                                                <td>
                                                    <div class="btn-group" style="text-align: center;">
                                                        <a href="<?php echo base_url('edit_empleado/' . $employe->id) ?>" class="btn btn-warning btn_edit"><span class="fas fa-pencil-alt"></a>
                                                        <!-- <button type="button" class="btn btn-warning btn_edit" data-toggle="modal" data-target="#edit_modal" value="<?php echo $employe->id; ?>" ><span class="fas fa-pencil-alt"></span></button> -->
                                                        <button type="button" class="btn btn-danger btn-remove btn_delete" value="<?php echo $employe->id; ?>" id="<?php echo $employe->nombre . " " . $employe->apellido_paterno . " " . $employe->apellido_materno; ?>"><span class="fas fa-trash-alt"></span></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
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