<!-- /.content -->
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">Golden Eye Capital</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.1.0</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $assets ?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $assets ?>/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $assets ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= $assets ?>/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= $assets ?>/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= $assets ?>/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= $assets ?>/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $assets ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $assets ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= $assets ?>/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $assets ?>/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $assets ?>/admin/dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= $assets ?>/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $assets ?>/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>

</html>