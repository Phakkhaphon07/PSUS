<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include "../connect_DB.php";


$product_name =$_POST['product_name'];
$type_id =$_POST['type_id'];
$site_id =$_POST['site_id'];
$price_name =$_POST['price_name'];
$qty_name =$_POST['qty_name'];
$unit_id =$_POST['unit_id'];


$imageFileType = strrchr($_FILES['p_img']['name'],".");
			$target_dir = "../p_img/";
			$filename='img'.time().$imageFileType;
			$target_file = $target_dir.$filename;
			move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file);


$sql_insert =
  "insert into tbl_product (product_name,type_id,site_id,price_name,qty_name,p_img)
  values ('$product_name','$type_id','$site_id','$price_name','$qty_name','$filename')
";

if ($conn->query($sql_insert) === TRUE) {
  ?>

<script>
			setTimeout(function() {
			swal({
					title: "เพิ่มสินค้า สำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "product.php"; 
					});
			});
		</script>

<?php
} else {
  ?>
  <script>
			setTimeout(function() {
			swal({
					title: "เพิ่มสินค้า ไม่สำเร็จ",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "product.php"; 
					});
			});
		</script>
<?php
}
?>