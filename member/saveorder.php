<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<?php
	session_start();
	require("../connect_DB.php");
?>
<meta  charset=utf-8>

<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

// echo'<pre>';
// 	print_r($_SESSION);
// 	echo'<pre>';

// 	echo 'hr';

// echo'<pre>';
// 	print_r($_POST);
// 	echo'<pre>';

// exit;



	$members_id = $_POST["members_id"];
	$members_name = $_POST["members_name"];
	$branch_id = $_POST["branch_id"];
	$class_id = $_POST["class_id"];
	$members_tel = $_POST["members_tel"];
	//$total_qty = $_POST["total_qty"];
	$total = $_POST["total"];
	//เวลาของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	$dttm = Date("Y-m-d H:i:s");
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($conn, "BEGIN"); 
	$sql1	= "insert into order_head 
	values
	(null,'$members_id', '$dttm', '$members_name', '$branch_id', '$class_id', '$members_tel', '$total',1 )";
	$query1	= mysqli_query($conn, $sql1) or die ("Error in query: $sql1" . mysqli_error($sql1));

	// echo $sql1;
	// exit;
	
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(o_id) as o_id from order_head where members_id='$members_id' and o_dttm='$dttm' ";
	$query2	= mysqli_query($conn, $sql2) or die ("Error in query: $sql2" . mysqli_error($sql2));
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];


	// echo '<br>';
	// echo $sql2;
	// echo '<br>';
	// echo $o_id;
	//exit;


//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $product_id=>$qty)
	{
		$sql3	= "select * from tbl_product where product_id=$product_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$pricetotal	= $row3['price_name']*$qty;
		$count=mysqli_num_rows($query3);



		$sql4	= "insert into order_detail values(null, $o_id, $product_id, $qty, $pricetotal)";
		$query4	= mysqli_query($conn, $sql4);

					//ตัดสต๊อก
					for($i=0; $i<$count; $i++){
						$instock =  $row3['qty_name']; //จำนวนสินค้าที่มีอยู่
						
						$updatestock = $instock - $qty; // จำนวนที่มีอยู่ ลบ จำนวนที่สั่งซื้อ
						
						$sql5 = "UPDATE tbl_product SET  
						qty_name=$updatestock
						WHERE  product_id=$product_id ";
						$query5 = mysqli_query($conn, $sql5);  
						}
						
						/*   stock  */


	}
	// echo '<br>';
	// echo $sql3;
	// echo '<br>';
	// echo $query4;

	// exit;

	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "สั่งจองเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "สั่งจองไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='order_detail.php?o_id=<?php echo $o_id; ?>';
</script>
