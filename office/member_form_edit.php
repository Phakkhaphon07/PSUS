
<?php
include "header.php";
include "../connect_DB.php";
?>

<?php
$sql = "select * from members where members_id='$_REQUEST[members_id]'";
$qs = mysqli_query ($conn,$sql);
$rs=mysqli_fetch_array($qs);
?>
<!-- ============================================================== -->
<!--add-->
    <?php
if(@$_REQUEST['page']=='up')
{
        $sql = "UPDATE members SET";
        $sql.= "
        members_email='$_REQUEST[members_email]', 
        members_password='$_REQUEST[members_password]', 
        members_name='$_REQUEST[members_name]', 
        branch_id='$_REQUEST[branch_id]', 
        class_id='$_REQUEST[class_id]', 
        members_tel='$_REQUEST[members_tel]', 
        status_id='$_REQUEST[status_id]'
        where members_id='$_REQUEST[members_id]'";
                 $qs = mysqli_query ($conn,$sql);
                 echo "<script>window.location='member.php'</script>";
    }

?>


<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แก้ไขข้อมูสมาชิก
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
        <label>อีเมล</label>
        <input type="text" class="form-control" name="members_email" readonly value="<?php echo $rs['members_email']?>"
                                                placeholder="กรอกข้อมูล" required="">
        <input type="hidden" class="form-control" name="members_id" readonly value="<?php echo $rs['members_id']?>"
                                                placeholder="กรอกข้อมูล" required="">                                     
      </div>
      <div class="form-group">
        <label>รหัสผ่าน</label>
        <input type="text" class="form-control" name="members_password" value="<?php echo $rs['members_password']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
      <div class="form-group">
        <label>ชื่อ-นามสกุล</label>
        <input type="text" class="form-control" name="members_name" value="<?php echo $rs['members_name']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
      <br>
      <label for="branch_id">แผนก : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="branch_id" value="<?php echo $rs['branch_id']?>">
          <?php
          $sql = "select * from tbl_branch";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rs['branch_id'] == $rp['branch_id'])
              {
                  echo "<option value=".$rs['branch_id']." selected>".$rp['branch_name']."</option>";    
              } else {
                  echo "<option value=".$rp['branch_id'].">".$rp['branch_name']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>
        </br>

        <br>
      <label for="class_id">ระดับชั้น : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="class_id" value="<?php echo $rs['class_id']?>">
          <?php
          $sql = "select * from tbl_class";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rs['class_id'] == $rp['class_id'])
              {
                  echo "<option value=".$rs['class_id']." selected>".$rp['class_name']."</option>";    
              } else {
                  echo "<option value=".$rp['class_id'].">".$rp['class_name']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>
        </br>

	   <br>
      <div class="form-group">
        <label>เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" name="members_tel" value="<?php echo $rs['members_tel']?>"
                                                placeholder="กรอกข้อมูล" >
      </div>
</br>
	  
<br>
      <label for="status_id">สถานะสมาชิก : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="status_id"  value="<?php echo $rs['status_id']?>">
          <?php
          $sql = "select * from tbl_status";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rs['status_id'] == $rp['status_id'])
              {
                  echo "<option value=".$rs['status_id']." selected>".$rp['members_status']."</option>";    
              } else {
                  echo "<option value=".$rp['status_id'].">".$rp['members_status']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>
        </br>
        <br>
      <button type="submit" class="btn btn-success btn-flat"><i class="far fa-edit"></i> แก้ไขข้อมูล</button>
      <a href="member.php" class="btn btn-danger btn-flat"><i class="fas fa-times"></i> ยกเลิก</a>
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

