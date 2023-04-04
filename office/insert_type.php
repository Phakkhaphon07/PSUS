<?php
include "../connect_DB.php";


$type_name =$_POST['type_name'];

$sql_insert =
  "insert into tbl_type (type_name)
  values ('$type_name')
";

if ($conn->query($sql_insert) === TRUE) {
  ?>
    <script>
			setTimeout(function() {
			swal({
					title: "เพิ่มประเภท สำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "type.php"; 
					});
			});
		</script>
<?php
} else {
  ?>
<script>
			setTimeout(function() {
			swal({
					title: "เพิ่มประเภท  ไม่สำเร็จ",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "type.php"; 
					});
			});
		</script>
<?php
}
?>