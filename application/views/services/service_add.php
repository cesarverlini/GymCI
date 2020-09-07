<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ingrese detalles del servicio</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="<?php echo base_url('guardar_servicio'); ?>" method="POST" id="from_service">
                            <div class="row">
                                <div class="col-md-12 row">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" >
                                        <div id="infoMessage"><?php echo form_error(); ?></div></br>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nombre">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <br>
                                    <button type="submit" id="btn_save" class="btn btn-primary float-right">Guardar</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
</section>