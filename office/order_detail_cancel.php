
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
                            <h3> วันเวลาที่ยกเลิก : <?php echo $new_date; ?> </h3>
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
