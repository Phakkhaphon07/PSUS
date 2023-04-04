
<?php
include "header.php";
include "../connect_DB.php";
?>

    
<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                เพิ่มข้อมูสมาชิก
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
        <form action="insert_member.php" method="post">
      <div class="form-group">
        <label>อีเมล</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label>รหัสผ่าน</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <label>ชื่อ-นามสกุล</label>
        <input type="text" name="fullname" class="form-control" required>
      </div>
      <br>
      <label for="branch_id">แผนก : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="branch_id">
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
          <select class="custom-select mr-sm-2" name="class_id">
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
        <input type="text" name="tel" class="form-control" required>
      </div>
</br>
	  
<br>
      <label for="status_id">สถานะสมาชิก : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="status_id">
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
      <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> บันทึก</button>
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

