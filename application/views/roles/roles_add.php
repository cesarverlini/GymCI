<section class="content">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nuevo Rol</h3>
                    </div>

                    <!-- /.card-header -->

                    <div class="card-body">
                        <form action="<?php echo base_url('guardar_rol');?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                    <hr>
                                    <div class="col-md-6">
                                        <label for="">Permisos</label>
                                        <div class="row">
                                            <div class="custom-control custom-checkbox add-margin">
                                                <input type="checkbox" class="custom-control-input" id="servicios" name="servicios">
                                                <label class="custom-control-label" for="servicios">Servicios</label>
                                            </div>
                                            <div class="custom-control custom-checkbox add-margin">
                                                <input type="checkbox" class="custom-control-input" id="planes" name="planes">
                                                <label class="custom-control-label" for="planes">Planes</label>
                                            </div>
                                            <div class="custom-control custom-checkbox add-margin">
                                                <input type="checkbox" class="custom-control-input" id="miembros" name="miembros">
                                                <label class="custom-control-label" for="miembros">Miembros</label>
                                            </div>
                                            <div class="custom-control custom-checkbox add-margin">
                                                <input type="checkbox" class="custom-control-input" id="administracion" name="administracion">
                                                <label class="custom-control-label" for="usuarios">Adminsitración</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
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