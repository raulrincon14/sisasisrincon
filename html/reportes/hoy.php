<?php
include("html/public/head.php");
 ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>
      Reportes
        <small>alumno</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?view=adm"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">hoy</li>
      </ol>
    </section>
    <section class="content">

      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Reporte de Asistencia de hoy</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="">
            <div class="box-body">
              <div class="form-group">
                <label>Grado</label>
                <select class="form-control" name="grado" required>
                  <option value="">Seleccionar</option>
                  <option value="Primero">Primero</option>
                  <option value="Segundo">Segundo</option>
                  <option value="Tercero">Tercero</option>
                  <option value="Cuarto">Cuarto</option>
                  <option value="Quinto">Quinto</option>
                </select>
              </div>
              <div class="form-group">
                <label>Sección</label>
                <select class="form-control" name="seccion" required>
                  <option value="">Seleccionar</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="U">U</option>
                </select>
              </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="hoy">Consultar</button>
            </div>
          </form>
        </div>
        <?php
        if(isset($_POST["hoy"])){
          $gra=$_POST['grado'];
          $sec=$_POST['seccion'];
            ?>
        <script>//window.location.href ='?view=stockgeneral&mode=stockp';
         window.open("?view=reporte&mode=hoypdf&g=<?php echo $gra;?>&s=<?php echo $sec;?>", '_blank');</script>
          <?php
        }
         ?>
        <!-- /.box -->

        <!-- Form Element sizes -->



        <!-- Input addon -->

        <!-- /.box -->

      </div>
      <!-- /.row -->

    </section>

    <!-- modals -->

    <!-- /.modal -->


    <!-- /.modal -->





    <!-- /fin modals -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://rincosoft.com">RINCOSOFT</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="views/plantilla/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/plantilla/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/plantilla/dist/js/adminlte.min.js"></script>



   <script src="views/datatables/jquery.dataTables.min.js"></script>
   <script src="views/datatables/dataTables.min.js"></script>
    <script src="views/datatables/dataTables.buttons.min.js"></script>
    <script src="views/datatables/buttons.html5.min.js"></script>
    <script src="views/datatables/buttons.colVis.min.js"></script>
    <script src="views/datatables/jszip.min.js"></script>
    <script src="views/datatables/pdfmake.min.js"></script>
    <script src="views/datatables/vfs_fonts.js"></script>
    <script src="views/app/js/alumnos.js"></script>
    <script src="views/app/js/fecha.js"></script>


    <script src="views/plantilla/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="views/plantilla/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="views/plantilla/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/plantilla/dist/js/demo.js"></script>

</body>
</html>
