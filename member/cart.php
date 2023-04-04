<?php
	session_start();
	// echo'<pre>';
	// print_r($_SESSION);
	// echo'<pre>';

	require("../connect_DB.php");
	require("header.php");
	$product_id = mysqli_real_escape_string($conn, $_GET['product_id']); 
	$act = mysqli_real_escape_string($conn, $_GET['act']);

	if($act=='add' && !empty($product_id))
	{
		if(isset($_SESSION['cart'][$product_id]))
		{
			$_SESSION['cart'][$product_id];
		}
		else
		{
			$_SESSION['cart'][$product_id]=1;
		}
	}


	if($act=='remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$product_id]);
	}


	if($act=='update')
	{
		$amount_array = $_POST['amount']; 
		foreach($amount_array as $product_id=>$amount)
		{
			$_SESSION['cart'][$product_id]=$amount;
		}
	}


	if($act=='cancel')  //ยกเลิกการสั่งซื้อทั้งหมด
	{
		unset($_SESSION['cart']);
	}





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
<form id="frmcart" name="frmcart" method="post" action="?act=update">
<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header" align="center">
                                <i class="bi-cart-fill me-1"></i>
                               <h3> ตะกร้าสินค้า </h3>
                            </div>
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
      <th width="5%" align="center" bgcolor="#EAEAEA" >ลบ</th>
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
		$qty_name =$row['qty_name']; //จำนวนสินค้าในสต็อก

		echo "<tr>";
		echo "<td>" . @$i +=1 . "</td>";
		echo "<td>" ."<img src='../p_img/" . $row["p_img"] ." 'class='fluke'>" . "</td>";
		echo "<td>" 
		.$row["product_name"]
		."<br>"
		.'ไซส์ : '
		.$row["site_name"]
		."<br>"
		.'สินค้าคงเหลือ : '
		.$row["qty_name"]
		.' รายการ'
		 . "</td>";
		// echo "<td>" . $row["site_name"] . "</td>";
		echo "<td width='15 align='right'>" .number_format($row["price_name"],2) . "</td>";
		echo "<td align='right'>";  
		echo "<input type='number' name='amount[$product_id]' value='$qty' class='form-control' min='1' max='$qty_name' /></td>";
		echo "<td align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td align='center'> <a  class='btn btn-danger btn-sm ' href='cart.php?product_id=$product_id&act=remove'>ลบ</a> </td>";

		echo "</tr>";
	}

	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}

if($total > 0){

?>
<tr>
<td colspan="7" align="right">
<a  class='btn btn-dark btn-sm btn-flat' href="show_product.php"><i class='fas fa-reply'></i> หน้าสินค้า</a>
<input type="button" class="btn btn-danger btn-sm btn-flat" name="btncancel" value="ยกเลิกรายการทั้งหมด" onclick="window.location='cart.php?act=cancel';" />
    <input type="submit" class="btn btn-warning btn-sm btn-flat" name="button" id="button" value="ปรับปรุง" />

<?php if($act=='update'){ ?>

	<input type="button" class="btn btn-success" name="Submit2"  value="สั่งจอง" onclick="window.location='confirm.php';" />
<?php } ?>
   
</td>
</tr>
<?php } else{
	echo '<h4 align="center"> -ไม่มีสินค้าในตะกร้า กรุณาเลือกสินค้า- </h4>';
}

?>
</table>
</form>
</div>
</body>
</html>
