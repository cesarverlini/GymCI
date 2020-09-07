<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Planes - Listado</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <!-- <th class="center">Codigo</th> -->
                                    <th class="center">Nombre</th>
                                    <th class="center">Descripción</th>
                                    <th class="center">Detalles</th>
                                    <!-- <th class="center">Dias</th> -->
                                    <!-- <th class="center">Costo</th> -->
                                    <!-- <th class="center">Estatus</th> -->
                                    <th class="center" style="width: 10%;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($planes)) : ?>
                                    <?php foreach ($planes as $plan) : ?>
                                        <tr>
                                            <!-- <td class="center"><?php echo $plan->codigo; ?></td> -->
                                            <td class="center"><?php echo $plan->nombre; ?></td>
                                            <td class="center"><?php echo $plan->detalles; ?></td>
                                            <td class="center"><button type="button" class="btn btn-info btn_info" data-toggle="modal" data-target="#edit_modal" value="<?php echo $plan->id; ?>">Ver Detalles</td>
                                            <!-- <td class="center"><?php echo $plan->dias; ?></td> -->
                                            <!-- <td class="center"><?php echo $plan->costo; ?></td> -->
                                            <!-- <td class="center"><?php echo $plan->status == 0 ? "Activo" : "Inactivo"; ?></td> -->
                                            <td class="center">
                                                <div class="btn-group" style="text-align: center;">
                                                    <a href="<?php echo base_url('editar_plan/'.$plan->id); ?>" class="btn btn-warning btn_edit"><span class="fas fa-pencil-alt"></span></a>
                                                    <!-- <a href="<?php echo base_url('eliminar_plan/'.$plan->id); ?>" id="<?php echo $plan->nombre; ?>" value="<?php echo $plan->id; ?>" class="btn btn-danger btn-remove"><span class="fas fa-trash-alt"></span></a> -->
                                                    <button id="<?php echo $plan->nombre; ?>" value="<?php echo $plan->id; ?>" class="btn btn-danger btn-remove btn_delete"><span class="fas fa-trash-alt"></span></button>
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
                <form action="<?php echo base_url('guardar_servicio'); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 row">
                                <label>Codigo: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_codigo"></p>
                            </div>
                            <div class="col-md-12 row">
                                <label>Nombre: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_nombre"></p>
                            </div>
                            <div class="col-md-12 row">
                                <label>Descripción: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_descripcion"></p>
                            </div>
                            <div class="col-md-12 row">
                                <label>Dias: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_dias"></p>
                            </div>
                            <div class="col-md-12 row">
                                <label>Costo: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_costo"></p>
                            </div>
                            <div class="col-md-12 row">
                                <label>Estatus: </label>&nbsp;&nbsp;&nbsp;
                                <p id="lbl_estatus"></p>
                            </div>
                            <div>
                                <label>Servicios Ofrecidos: </label>
                                <ul id="ul_servicios"></ul>
                                <!-- <label id="lbl_servicios"></label> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>