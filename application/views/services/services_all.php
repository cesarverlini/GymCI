<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Servicios - Listado</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th style="width: 10%;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($services)) : ?>
                                    <?php foreach ($services as $service) : ?>
                                        <tr>
                                            <td><?php echo $service->nombre; ?></td>
                                            <td><?php echo $service->descripcion; ?></td>
                                            <td>
                                                <div class="btn-group" style="text-align: center;">
                                                    <button type="button" class="btn btn-warning btn_edit" data-toggle="modal" data-target="#edit_modal" value="<?php echo $service->id; ?>"><span class="fas fa-pencil-alt"></span></button>
                                                    <button type="button" class="btn btn-danger btn-remove btn_delete" value="<?php echo $service->id; ?>" id="<?php echo $service->nombre; ?>"><span class="fas fa-trash-alt"></span></button>
                                                    <!-- <a href="<?php echo base_url(); ?>mantenimiento/clientes/delete/<?php echo $service->id; ?>" class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a> -->
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('guardar_servicio'); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="id" name="id" hidden>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>                            
                            <div class="col-md-6">
                                <label for="nombre">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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