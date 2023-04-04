<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  
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
        members_tel='$_REQUEST[members_tel]'
        where members_id='$_REQUEST[members_id]'";
                 $qs = mysqli_query ($conn,$sql);
                 echo "<script>window.location='index.php'</script>";
    }

?>
<div class="container col-sm-12 col-xl-6">
                        <div class="rounded h-100 p-12">
							<br>
                            <h3 Align=center>แก้ไขข้อมูลส่วนตัว</h3>
        <form method="post" action="?page=up" >
        <div class="row mb-3">
        <label class="col-sm-2 col-form-label">อีเมล</label>
            <div class="col-sm-10">
        <input type="text" class="form-control" name="members_email" readonly value="<?php echo $rs['members_email']?>"
                                                placeholder="กรอกข้อมูล" required="">
        <input type="hidden" class="form-control" name="members_id" readonly value="<?php echo $rs['members_id']?>"
                                                placeholder="กรอกข้อมูล" required="">                                     
            </div>
        </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">รหัสผ่าน</label>
        <div class="col-sm-10">
        <input type="password" class="form-control" name="members_password" value="<?php echo $rs['members_password']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">ชื่อ-นามสกุล</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="members_name" value="<?php echo $rs['members_name']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
      </div>
      <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="branch_id">แผนก </label>
      <div class="col-sm-10">
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
          </div>
          <div class="row mb-3">
      <label class="col-sm-2 col-form-label" for="class_id">ระดับชั้น</label>
      <div class="col-sm-10">
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
          </div>
       <div class="row mb-3">
        <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="members_tel" value="<?php echo $rs['members_tel']?>"
                                                placeholder="กรอกข้อมูล" >
      </div>
      </div>
	  

        <br>
        <p Align=right>
      <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-user-check"></i> แก้ไขข้อมูล</button>
        </p>
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