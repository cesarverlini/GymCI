<section class="content">
    <div class="center-content ">
        <div class="row col-md-6">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Introduzca los detalles del plan </h3>
                    </div>
                    <div class="card-body">
                        <form id="form_new_plan" method="POST" action="<?php echo base_url('guardar_plan'); ?>" enctype="multipart/form-data">
                            <?php if (!empty($plan)) : ?>
                                <input type="text" id="id_plan" value="<?php echo $plan?>" hidden>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="nombre">Codigo</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                                    <br class="error">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    <br class="error">
                                    <label for="nombre">Detalles</label>
                                    <input type="text" class="form-control" id="detalles" name="detalles" required>
                                    <br class="error">
                                    <label for="nombre">Dias</label>
                                    <input type="text" class="form-control" id="dias" name="dias" required>
                                    <br class="error">
                                    <label for="nombre">Costo</label>
                                    <input type="text" class="form-control" id="costo" name="costo" required>
                                    <br class="error">
                                    <label for="nombre">Servicio</label>
                                    <div class="row col-md-12">
                                        <select class="form-control col-md-11" name="service" id="service">
                                            <option value="" selected>Seleccionar...</option>
                                            <?php if (!empty($services)) : ?>
                                                <?php foreach ($services as $service) : ?>
                                                    <option value="<?php echo $service->id; ?>"><?php echo $service->nombre; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <button type="button" class="btn btn-success col-md-1" id="add_service"><span class="fa fa-plus-square"></span></button>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr id="titulos">
                                                    <th>Nombre</th>
                                                    <th style="width: 10%;">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <label for="nombre">Estatus</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="" selected>Seleccionar...</option>
                                        <option value="0">Activo</option>
                                        <option value="1">Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <button type="submit" id="btn_save" class="btn btn-primary float-right">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>