
<?php
include "header.php";
include "../connect_DB.php";
?>

    
<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                เพิ่มสินค้า
                            </div>
				    
				<div class="tab-content" id="orders-table-tab-content">
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" enctype="multipart/form-data" aria-labelledby="orders-all-tab">
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <form action="insert_product.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>รายการสินค้า</label>
        <input type="text" name="product_name" class="form-control" required>
      </div>

      <label for="type_id">ประเภท : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="type_id">
          <?php
          $sql = "select * from tbl_type";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rs['type_id'] == $rp['type_id'])
              {
                  echo "<option value=".$rs['type_id']." selected>".$rp['type_name']."</option>";    
              } else {
                  echo "<option value=".$rp['type_id'].">".$rp['type_name']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>
          <br>

      <!-- เปิดคำสั่งดรอป ดาวน์ -->
      <br>
      <label for="site_id">ไซส์ : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="site_id">
          <?php
          $sql = "select * from tbl_site";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rs['site_id'] == $rp['site_id'])
              {
                  echo "<option value=".$rs['site_id']." selected>".$rp['site_name']."</option>";    
              } else {
                  echo "<option value=".$rp['site_id'].">".$rp['site_name']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>
        </br>
         <!-- ปิดคำสั่งดรอป ดาวน์ -->
        <br>
      <div class="form-group">
        <label>ราคา/บาท</label>
        <input type="number" name="price_name" min="1" class="form-control" required>
      </div>
	   <br>
      <div class="form-group">
        <label>จำนวน</label>
        <input type="number" name="qty_name" min="1" class="form-control" required>
      </div>
      
        <div class="form-group">
        <label>รูปภาพ</label>
        <input type="file" name="p_img" class="form-control" required>
      </div>
        <br>
      <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> บันทึก</button>
      <a href="product.php" class="btn btn-danger btn-flat"><i class="fas fa-times"></i> ยกเลิก</a>
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
</html> 

