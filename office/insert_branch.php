<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include "../connect_DB.php";


$branch_name =$_POST['branch_name'];

$sql_insert =
  "insert into tbl_branch (branch_name)
  values ('$branch_name')
";

if ($conn->query($sql_insert) === TRUE) {
  ?>
  <script>
			setTimeout(function() {
			swal({
					title: "เพิ่มแผนก สำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "branch.php"; 
					});
			});
		</script>
<?php
} else {
  ?>
  <script>
			setTimeout(function() {
			swal({
					title: "เพิ่มแผนก ไม่สำเร็จ",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "branch.php"; 
					});
			});
		</script>
<?php
}
?>