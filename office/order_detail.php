
<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");

 
// echo'<pre>';
// 	print_r($_SESSION);
// 	echo'<pre>';


$o_id = $_GET['o_id'];

 $sql = "select d.*,p.p_img, p.product_name, p.price_name,s.site_name, h.*
 from order_detail as d 
 inner join order_head as h on d.o_id = h.o_id
 inner join tbl_product as p on d.product_id = p.product_id
 inner join tbl_site as s on p.site_id = s.site_id
 inner join tbl_st as t on h.o_status = t.o_status
 where d.o_id=$o_id
 ";
$query = mysqli_query($conn, $sql);
$rowd = mysqli_fetch_array($query);

// วัน/เดือน/ปี
$o_dttm = $rowd ['o_dttm'];
$time=strtotime($o_dttm);
$new_date = date("d-m-Y H:i:s",$time);
// วัน/เดือน/ปี

// echo'<pre>';
// 	print_r($rowd);
// 	echo'<pre>';
?>


<style>
img.fluke {
  width: 100px;
  height: 100px;
  object-fit: cover;
}
</style>

<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header"><center>
                                <h3><i class="bi-cart-fill me-1"></i>
                                รายละเอียดการสั่งจอง
                                </h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                                <table class="table table-bordered">

                            <h3> ชื่อผู้สั่งจอง : <?php echo $rowd['members_name']; ?> </h3>
                            <h3> วันเวลาที่สั่งจอง : <?php echo $new_date; ?> </h3>
                            <h3> สถานะปัจจุบัน : <?php 
                            $st = $rowd['o_status']; 
                                echo '<font color="blue">';
                             if($st==1){
                                echo 'รอชำระเงิน';
                             } elseif ($st==2) {
                                echo 'ชำระเงินเรียบร้อย';
                             }
                             elseif ($st==3) {
                                echo 'ตรวจสอบเลข EMS';
                             }
                             else { 
                                echo 'ยกเลิก';
                             }
                             echo '</font>';
                            
                            ?> </h3>
          </select>
          </div>

                            <div class="card-body">
                                <table class="table table-striped">
						
    <tr>
	  <th width="5%" bgcolor="#EAEAEA" >#</th>
	  <th width="10%" bgcolor="#EAEAEA" >รูปภาพ</th>
      <th width="30%" bgcolor="#EAEAEA" >รายการสินค้า</th>
      <!-- <th width="20%" bgcolor="#EAEAEA" >ไซส์</th> -->
      <th width="15%" align="center" bgcolor="#EAEAEA" >ราคา</th>
      <th width="10%" align="center" bgcolor="#EAEAEA" >จำนวน</th>
      <th width="5%" align="center" bgcolor="#EAEAEA" >รวม(บาท)</th>
    </tr>
<?php
$total=0;
foreach($query as $rowd){

    $total += $rowd["d_subtotal"]; //ราคารวมทั้งออเดอร์

		
		echo "<tr>";
		echo "<td>" . @$i +=1 . "</td>";
		echo "<td>" ."<img src='../p_img/" . $rowd["p_img"] ." ' class='fluke'>" . "</td>";
		echo "<td>" 
        . $rowd["product_name"] 
        ."<br>"
		.'ไซส์ : '
		.$rowd["site_name"]
        . "</td>";
		echo "<td width='15 align='right'>" .number_format($rowd["price_name"],2) . "</td>";
        echo "<td width='15 align='right'>" .number_format($rowd["d_qty"]) . "</td>";
		echo "<td align='right'>".number_format($rowd["d_subtotal"],2)."</td>";
		
		echo "</tr>";

	}

	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
	echo "</tr>";

?>
</table>
    </body>


    <?php
if(@$_REQUEST['page']=='up')
{
        $sql = "UPDATE order_head SET";
        $sql.= "
        o_dttm='$_REQUEST[o_dttm]', 
        o_status='$_REQUEST[o_status]'
        where o_id='$_REQUEST[o_id]'";
                 $qs = mysqli_query ($conn,$sql);
                 echo "<script>window.location='list_order_new.php'</script>";
    }

?>


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
        <input type="hidden" class="form-control" name="o_id" value="<?php echo $rowd['o_id']?>"
                                                placeholder="กรอกข้อมูล" required="">                                     
      </div>
      <div class="form-group w-50">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <label>เลือก วัน/เดือน/ปี ที่ชำระเงินหรือยกเลิก</label>
        <input type="datetime-local" class="form-control" name="o_dttm"  value="<?php echo $rowd['o_dttm']?>"
                                                placeholder="กรอกข้อมูล" required="">
      </div>
	   <br>
       <label for="o_status">เปลี่ยนสถานะ : </label>
      <div class="btn-group">
          <select class="custom-select mr-sm-2" name="o_status" value="<?php echo $rowd['o_status']?>" placeholder="กรอกข้อมูล" required="">
          <?php
          $sql = "select * from tbl_st";
          $qp = mysqli_query($conn,$sql);
          while ($rp = mysqli_fetch_array($qp) )
          {     
              if($rowd['o_status'] == $rp['o_status'])
              {
                  echo "<option value=".$rowd['o_status']." selected>".$rp['name_status']."</option>";    
              } else {
                  echo "<option value=".$rp['o_status'].">".$rp['name_status']."</option>"; 
              }           
             
          }
          ?>
          </select>
          </div>



        <td colspan="7" align="right">
      <button type="submit" class="btn btn-success btn-flat"><i class="	fas fa-check"></i> ยืนยันการเปลี่ยนสถานะ</button>
      <a href="list_order_new.php" class="btn btn-danger btn-flat"><i class="fas fa-reply"></i> ย้อนกลับ</a>
</br>
</div>

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
