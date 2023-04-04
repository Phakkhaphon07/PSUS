<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");

 
// echo'<pre>';
// 	print_r($_SESSION);
// 	echo'<pre>';


$mem_id = $_SESSION['mem_id'];
$o_id = $_GET['o_id'];

 $sql = "select d.*,p.p_img, p.product_name, p.price_name,s.site_name, h.*
 from order_detail as d 
 inner join order_head as h on d.o_id = h.o_id
 inner join tbl_product as p on d.product_id = p.product_id
 inner join tbl_site as s on p.site_id = s.site_id
 where d.o_id=$o_id
 and h.members_id=$mem_id
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



<body>
<div class="card mb-4">
                            <div class="card-header" align="center">
                            <div align="right">
                            <a class = "btn btn-success" target="_blank"  href ='show_order_print.php?o_id=<?php echo $rowd['o_id']?>'><i class='fas fa-print'></i> พิมพ์ใบสั่งจอง</a>
                            </div>
                            <h3> <i class="bi-cart-fill me-1"></i>
                                รายละเอียดการสั่งจอง </h3>
                            </div> 
                            <h3> ออเดอร์ที่ : <?php echo $rowd['o_id']; ?> </h3>
                            <h3> ชื่อผู้สั่งจอง : <?php echo $rowd['members_name']; ?> </h3>
                            <h3> วันเวลาที่สั่งจอง : <?php echo $new_date; ?> </h3>
                            <h3> สถานะ : <?php 
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
                            <div class="card-body">
                            <div  class="table-responsive">
                                <table class="table table-striped">
						
    <tr>
	  <th width="5%" bgcolor="#EAEAEA" >#</th>
	  <th width="10%" bgcolor="#EAEAEA" >รูปภาพ</th>
      <th width="50%" bgcolor="#EAEAEA" >รายการสินค้า</th>
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
</div>

    </body>
    <?php include('footer1.php'); ?>