</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url('assets/template/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>dist/js/adminlte.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>dist/js/demo.js"></script>
<script src="<?php echo base_url('assets/sweetalert/dist/sweetalert2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/select2/dist/js/select2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/template/plugins/jquery-ui/jquery-ui.js'); ?>"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<?php
$ruta = ($this->router->fetch_method() == 'vista') ? $this->uri->segment(2) : $this->router->fetch_method();
$JSFile = 'assets/js/' . $this->router->fetch_class() . '/' . $ruta . '.js';

// if (is_file($JSFile)) {
    echo '<script src="'.base_url().$JSFile.'"></script>';
// }

?>

<script type="text/javascript">
        	// FUNCIONES PARA CARGAR AJAX DESDE CUALQUIER ARCHIVO JS o <script> DEL SISTEMA
        	var cargar_ajax = {
        		run_server_ajax: function(_url, _data = null) {
        			var json_result = $.ajax({
        				url: '<?= base_url(); ?>' + _url,
        				dataType: "json",
        				method: "post",
        				async: false,
        				type: 'post',
        				data: _data,
        				done: function(response) {
        					return response;
        				}
        			}).responseJSON;
        			return json_result;
        		}
        	}
        </script>

</body>

</html>