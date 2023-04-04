</div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->


<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- http://fordev22.com/ -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1"></script>
<!-- Select2 -->
<!-- http://fordev22.com/ -->
<script src="assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- http://fordev22.com/ -->

<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<!-- ค้นหาภาษาไทย table id="example3" -->
<script type="text/javascript">
$(function(){
    $("#example3").DataTable({
        "language": {   
            "decimal":        "",
            "emptyTable":     "ไม่มีรายการข้อมูล",
            "info":           "แสดงรายการที่ _START_ ถึง _END_ จาก _TOTAL_ รายการ",
            "infoEmpty":      "ไม่มีรายการข้อมูล",
            "infoFiltered":   "(กรองจากทั้งหมด _MAX_ รายการ)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "แสดง  _MENU_ รายการ",
            "loadingRecords": "กำลังโหลดข้อมูล...",
            "processing":     "กำลังประมวลผล...",
            "search":         "ค้นหา:",
            "zeroRecords":    "ไม่พบรายการที่ค้นหา",
            "paginate": {
                "first":      "หน้าแรก",
                "last":       "หน้าสุดท้าย",
                "next":       "ถัดไป",
                "previous":   "ก่อนหน้า"
            },
            "aria": {
                "sortAscending":  ": เรียงข้อมูลจากน้อยไปมาก",
                "sortDescending": ": เรียงข้อมูลจากมากไปน้อย"
            }               
        }       
    });
});
</script>
<!-- ค้นหาภาษาไทย table id="example3" -->


<!-- http://fordev22.com/ -->