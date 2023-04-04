<?php
	session_start();
	// echo'<pre>';
	// print_r($_SESSION);
	// echo'<pre>';
  
	require("../connect_DB.php");
	require("header.php");
?>

<style>
img.fluke {
  width: 100px;
  height: 100px;
  object-fit: cover;
}
</style>

<body>
	<div class ="container">
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header" align="center">
                                <i class="bi-cart-fill me-1"></i>
                               <h3> ยืนยันการจอง </h3>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                                <table class="table table-striped">
						
    <tr>
	  <th width="5%" bgcolor="#EAEAEA" >#</th>
	  <th width="10%" bgcolor="#EAEAEA" >รูปภาพ</th>
      <th width="50%" bgcolor="#EAEAEA" >รายการสินค้า</th>
      <!-- <th width="20%" bgcolor="#EAEAEA" >ไซส์</th> -->
      <th width="15%" align="center" bgcolor="#EAEAEA" >ราคา</th>
      <th width="10%" align="center" bgcolor="#EAEAEA" >จำนวน</th>
      <th width="10%" align="center" bgcolor="#EAEAEA" >รวม(บาท)</th>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $product_id=>$qty)
	{
		$sql = "select * from tbl_product
    inner join tbl_site on tbl_product.site_id = tbl_site.site_id
    where product_id=$product_id";
    
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price_name'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td>" . @$i +=1 . "</td>";
		echo "<td>" ."<img src='../p_img/" . $row["p_img"] ." ' class='fluke'>" . "</td>";
		echo "<td>" 
    . $row["product_name"]
    ."<br>"
		.'ไซส์ : '
		.$row["site_name"]
    . "</td>";
    // echo "<td>" . $row["site_name"] . "</td>";
		echo "<td width='15 align='right'>" .number_format($row["price_name"],2) . "</td>";
		echo "<td align='right'>";  
		echo "<input type='number' name='amount[$product_id]' value='$qty' class='form-control'readonly/></td>";
		echo "<td align='right'>".number_format($sum,2)."</td>";
		
		echo "</tr>";
	}

	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
	echo "</tr>";
}
?>
</table>
</div>
<br>
<div class="card-header" align="center">
<h3>ข้อมูลผู้สั่งจอง</h3>
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
        <input type="hidden" class="form-control" name="members_id" value="<?php echo $_SESSION['mem_id']?>"
                                                placeholder="กรอกข้อมูล" required="">                                     
      </div>
      <div class="form-group">
        <label>ชื่อ-สกุล</label>
        <input type="text" class="form-control" name="members_name" readonly value="<?php echo $_SESSION['mem_name']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
      <!-- <div class="form-group"> -->
        <!-- <label>แผนก</label> -->
        <input type="hidden" class="form-control" name="branch_id" readonly value="<?php echo $_SESSION['branch_id']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
        <!-- <br>
      <div class="form-group"> -->
        <!-- <label>ระดับชั้น</label> -->
        <input type="hidden" class="form-control" name="class_id" readonly value="<?php echo $_SESSION['class_id']?>"
                                                placeholder="กรอกข้อมูล" >
      </div>
	   <br>
      <div class="form-group">
        <label>เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" name="members_tel" readonly value="<?php echo $_SESSION['mem_tel']?>"
                                                placeholder="กรอกข้อมูล" >
        <input type="hidden" class="form-control" name="total" value="<?php echo $total;?>">
        <br>
        <h5>รูปแบบการจัดส่งและรับสินค้า</h5>
        <br>
        <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    มารับสินค้าที่หน้าร้าน พร้อมใบสั่งจอง
  </label>
  </div>
  <br>
  <h4>ชำระเงินและรับสินค้า ณ ห้องงานส่งเสริมผลิตผลการค้าและประกอบธุรกิจ วิทยาลัยอาชีวศึกษาสุราษฎร์ธานี</h4>

      </div>
      
</br>
        <br>
        <td colspan="7" align="right">
      <button type="submit" class="btn btn-success btn-flat"><i class="	fas fa-check"></i> ยืนยันการจอง</button>
      <a href="cart.php" class="btn btn-danger btn-flat"><i class="fas fa-times"></i> ยกเลิก</a>
</br>
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







</form>
</div>
</body>
<?php include('footer1.php'); ?>