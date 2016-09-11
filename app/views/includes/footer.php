</div><!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="<?php //echo base_url('front');?>" target="blank">AMG</a>.</strong> All rights reserved.
</footer>


<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->



<!-- jQuery 2.1.4 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo ASSET_URL; ?>bootstrap/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo ASSET_URL; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo ASSET_URL; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSET_URL; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->

<script src="<?php echo ASSET_URL; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo ASSET_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo ASSET_URL; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo ASSET_URL; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo ASSET_URL; ?>plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSET_URL; ?>dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php echo ASSET_URL; ?>dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ASSET_URL; ?>dist/js/demo.js"></script>


<script src="<?php echo ASSET_URL; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo ASSET_URL; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo ASSET_URL; ?>plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo ASSET_URL; ?>plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo ASSET_URL; ?>plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


<!-- dataTables SCRIPTS -->
<script type="text/javascript">
    $(function () {
        //$("#example1").dataTable();

//            $("#baccount").dataTable({
//                //aaSorting: [[0, 'desc']]
//
//            });



        //$("#example11").dataTable();
        //$("#example111").dataTable();

    });</script>

<script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    
    
    
    
    
    
    <script>
        function delete_selected_rows() {

        $('input:checked').each(function () {
        $(this).closest('tr').remove();
        });
        }
        function select_all_check_box(){

        if ($('#all_select').prop('checked')){
        $('.thumb_chk').prop('checked', true);
        }
        }

        $(window).bind("load", function() {
        //$('#third_row').addClass('float_left');
        });
                $(document).ready(function(){


        $('.preview canvas').addClass('thumbnail');
        });</script>  


</body>
</html>
