<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include "../connect_DB.php";


$site_name =$_POST['site_name'];

$sql_insert =
  "insert into tbl_site (site_name)
  values ('$site_name')
";

if ($conn->query($sql_insert) === TRUE) {
  ?>
<script>
			setTimeout(function() {
			swal({
					title: "เพิ่มไซส์ สำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "site.php"; 
					});
			});
		</script>
<?php
} else {
  ?>

<script>
			setTimeout(function() {
			swal({
					title: "เพิ่มไซส์  ไม่สำเร็จ",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "site.php"; 
					});
			});
		</script>

<?php
}
?>