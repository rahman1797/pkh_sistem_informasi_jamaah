 <!-- footer content -->

<footer>

  <div class="pull-right">

    <h5>Gentelella - Bootstrap Admin Template by Colorlib</h5>

  </div>

  <div class="clearfix" id="time"></div>

</footer>

<!-- JAVASCRIPT-->



    <!-- jQuery -->
    <script src="assets/theme/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- MDB -->
    <script src="assets/mdb/js/mdb.min.js"></script>
    <script src="assets/mdb/js/popper.min.js"></script>

    <!-- FastClick -->
    <script src="assets/theme/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/theme/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/theme/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/theme/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/theme/vendors/moment/min/moment.min.js"></script>
    <script src="assets/theme/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
     <!-- bootstrap-datetimepicker -->    
    <script src="assets/theme/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="assets/theme/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="assets/theme/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="assets/theme/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="assets/theme/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="assets/theme/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="assets/theme/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="assets/theme/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="assets/theme/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="assets/theme/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="assets/theme/vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="assets/theme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/theme/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/theme/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/theme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/theme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/theme/vendors/pdfmake/build/vfs_fonts.js"></script>
     <!-- jQuery Smart Wizard -->
    <script src="assets/theme/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
     <!-- validator -->
    <script src="assets/theme/vendors/validator/validator.js"></script>

    
    <!-- Custom theme Scripts -->
    <script src="assets/theme/build/js/custom.min.js"></script>
    <script src="assets/js/notify.js"></script>

 <!-- /footer content -->
 <script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>