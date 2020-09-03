<section class="content">
    <div class="center-content ">
        <div class="row col-md-6">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Empleado</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_new_employee" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="">Fotografia</label>
                                            <div class="col-md-12 form-group center-content">
                                                <?php if (!empty($employe)) : ?>
                                                    <?php if (!$employe[0]->photo) : ?>
                                                        <img src="../assets/img/silueta.png" style="width: 100px; height: 100;" id="imagefield">
                                                    <?php else : ?>
                                                        <img src="../assets/img/<?php echo $employe[0]->photo ?>" style="width: 100px; height: 100;" id="imagefield">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img src="assets/img/silueta.png" style="width: 100px; height: 100;" id="imagefield">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input class="form-control-file" type="file" placeholder="Foto" name="fotografia" id="fotografia" onchange="previewImage(event)"></input>
                                                <input type="text" name="noeditimg" id="noeditimg" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php if (!empty($employe)) : ?>
                                                <input type="text" hidden id="id" name="id" value="<?php echo $employe[0]->id ?>">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $employe[0]->nombre ?>">
                                                <label for="nombre">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="paterno" name="paterno" value="<?php echo $employe[0]->apellido_paterno ?>">
                                                <label for="nombre">Apellido Materno</label>
                                                <input type="text" class="form-control" id="materno" name="materno" value="<?php echo $employe[0]->apellido_materno ?>">
                                                <label for="nombre">Direccion</label>
                                                <input type="text" class="form-control" id="adress" name="direccion" value="<?php echo $employe[0]->direccion ?>">
                                                <label for="nombre">Telefono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $employe[0]->telefono ?>">
                                                <label for="nombre">Correo</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $employe[0]->correo ?>">
                                            <?php else : ?>
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                                <label for="nombre">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="paterno" name="paterno">
                                                <label for="nombre">Apellido Materno</label>
                                                <input type="text" class="form-control" id="materno" name="materno">
                                                <label for="nombre">Direccion</label>
                                                <input type="text" class="form-control" id="adress" name="direccion">
                                                <label for="nombre">Telefono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono">
                                                <label for="nombre">Correo</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                            <?php endif; ?>
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