<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Roles - Listado</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th>Nombres</th>
                                    <th style="width: 10%;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($roles)) : ?>
                                    <?php foreach ($roles as $rol) : ?>
                                        <tr>
                                            <td><?php echo $rol->id_rol; ?></td>
                                            <td><?php echo $rol->nombre_rol; ?></td>
                                            <td>
                                                <div class="btn-group" style="text-align: center;">
                                                    <button type="button" class="btn btn-warning btn_edit" data-toggle="modal" data-target="#edit_modal" value="<?php echo $rol->id_rol; ?>"><span class="fas fa-pencil-alt"></span></button>
                                                    <button type="button" class="btn btn-danger btn-remove btn_delete" value="<?php echo $rol->id_rol; ?>" id="<?php echo $rol->nombre_rol; ?>"><span class="fas fa-trash-alt"></span></button>
                                                    <!-- <a href="<?php echo base_url(); ?>mantenimiento/clientes/delete/<?php echo $rol->id_rol; ?>" class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a> -->
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

<!-- Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('guardar_rol'); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="id" name="id" hidden>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <label for="">Permisos</label>
                                <div class="row">
                                    <div class="col-md-4 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="administracion" name="administracion">
                                        <label class="custom-control-label" for="usuarios">Adminsitración</label>
                                    </div>
                                    <div class="col-md-4 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="servicios" name="servicios">
                                        <label class="custom-control-label" for="servicios">Servicios</label>
                                    </div>
                                    <div class="col-md-4 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="planes" name="planes">
                                        <label class="custom-control-label" for="planes">Planes</label>
                                    </div>
                                    <div class="col-md-4 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="miembros" name="miembros">
                                        <label class="custom-control-label" for="miembros">Miembros</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_edit">Guardar</button>
            </div>
        </div>
    </div>
</div>