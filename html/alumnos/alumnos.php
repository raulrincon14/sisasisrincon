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
      Alumnos
        <small>Agregar,editar Alumnos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?view=adm"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Alumnos</li>
      </ol>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registro de alumnos</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alumnoModal"><i class="fa fa-user-plus"></i> Nuevo Alumno</button>
                <a class="btn btn-primary" href="?view=generar" target="_blank" role="button"><i class="fa fa-address-card"></i> Generar Carnets</a>
                <p></p>
              <table id="alumno_data" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                            <th width="8%">idalumno</th>
                                            <th width="20%">Apellidos</th>
                                            <th width="20%">Nombres</th>
                                            <th width="5%">DNI</th>
                                            <th width="6%">F. Nac.</th>
                                            <th width="7%">Nivel</th>
                                            <th width="6%">Grado</th>
                                            <th width="3%">Seccion</th>
                                            <th width="6%">Duplicado</th>
                                            <th width="6%">Estado</th>
                                            <th width="7%">Editar</th>
                                            <th width="8%">Eliminar</th>


                                            </tr>
                                        </thead>

                                        <tbody>


                                        </tbody>


                                      </table>
                                       <div id="resultados_ajax"></div>

            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

    <!-- modals -->
    <div class="modal fade" id="alumnoModal">
      <div class="modal-dialog">
          <form method="post" id="alumno_form">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Nuevo Alumno</h4>



          </div>
          <div class="modal-body">
              <!-- form start -->

                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" placeholder="Escriba Apellidos" name="apellido" id="apellido" required>
                  </div>
                  <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" placeholder="Escriba Nombres" name="nombre" id="nombre" required>
                  </div>
                  <div class="form-group">
                    <label>DNI</label>
                    <input type="number" class="form-control" placeholder="Escriba dni o codigo" name="dni" id="dni" required>
                  </div>
                  <div class="form-group">
                    <label>Fecha de Nacimiento</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" name="fn" id="fn" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="2000-12-03">
                    </div>
                    <!-- /.input group -->
                  </div>

                  <div class="form-group">
                    <label>Nivel</label>
                    <select class="form-control" name="nivel" id="nivel" required>
                      <option value="">Seleccione</option>
                      <option value="Primaria">Primaria</option>
                      <option value="Secundaria">Secundaria</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Grado</label>
                    <select class="form-control" name="grado" id="grado" required>
                      <option value="">Seleccione</option>
                      <option value="Primero">Primero</option>
                      <option value="Segundo">Segundo</option>
                      <option value="Tercero">Tercero</option>
                      <option value="Cuarto">Cuarto</option>
                      <option value="Quinto">Quinto</option>
                      <option value="Sexto">Sexto</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sección</label>
                    <select class="form-control" name="seccion" id="seccion" required>
                      <option value="">Seleccione</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="U">U</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" name="estado" id="estado" required>
                      <option value="">Seleccione</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Duplicado</label>
                    <select class="form-control" name="duplicado" id="duplicado" required>
                      <option value="">Seleccione</option>
                      <option value="si">Si</option>
                      <option value="no">No</option>
                    </select>
                  </div>

                <!-- /.box-body -->
          </div>
          <div class="modal-footer">

         <input type="hidden" name="idalumno" id="idalumno"/>



            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          </div>
        </div>
        <!-- /.modal-content -->
        </form>
      </div>

      <!-- /.modal-dialog -->
    </div>
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
