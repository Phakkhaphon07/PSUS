
<?php
include "header.php";
include "../connect_DB.php";
?>

<?php
$sql = "select * from tbl_type where type_id='$_REQUEST[type_id]'";
$qs = mysqli_query ($conn,$sql);
$rs=mysqli_fetch_array($qs);
?>
<!-- ============================================================== -->
<!--add-->
    <?php
if(@$_REQUEST['page']=='up')
{
        $sql = "UPDATE tbl_type SET";
        $sql.= "
        type_name='$_REQUEST[type_name]'
        where type_id='$_REQUEST[type_id]'";
                 $qs = mysqli_query ($conn,$sql);
                 echo "<script>window.location='type.php'</script>";
    }

?>


<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แก้ไขข้อมูลประเภท
                            </div>
				    
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <form method="post" action="?page=up" >
      <div class="form-group">
        <label>ประเภท</label>
        <input type="text" class="form-control" name="type_name"  value="<?php echo $rs['type_name']?>"
                                                placeholder="กรอกข้อมูล" required="">
        <input type="hidden" class="form-control" name="type_id" readonly value="<?php echo $rs['type_id']?>"
                                                placeholder="กรอกข้อมูล" required="">                                     
      </div>
        <br>
      <button type="submit" class="btn btn-success btn-flat"><i class="far fa-edit"></i> แก้ไขข้อมูล</button>
      <a href="type.php" class="btn btn-danger btn-flat"><i class="fas fa-times"></i> ยกเลิก</a>
      <br>
    </form>
    </div>
  </div>
</div>
									</table>
						        </div><!--//table-responsive-->
						       
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->			


	   <!-- Javascript -->          
	   <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
</body>

