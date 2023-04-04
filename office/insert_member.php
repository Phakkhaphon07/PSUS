<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include "../connect_DB.php";

$m_email =$_POST['email'];
$m_password =$_POST['password'];
$m_fullname =$_POST['fullname'];
$branch_id =$_POST['branch_id'];
$class_id =$_POST['class_id'];
$m_tel =$_POST['tel'];
$status_id =$_POST['status_id'];

$sql_insert =
  "insert into members (members_email,members_password,members_name,branch_id,class_id,members_tel,status_id)
  values ('$m_email','$m_password','$m_fullname','$branch_id','$class_id','$m_tel','$status_id')
";

if ($conn->query($sql_insert) === TRUE) {
  ?>
<script>
			setTimeout(function() {
			swal({
					title: "เพิ่มสมาชิก สำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "member.php"; 
					});
			});
		</script>
<?php
} else {
  ?>
  <script>
			setTimeout(function() {
			swal({
					title: "เพิ่มสมาชิก ไม่สำเร็จ",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "member.php"; 
					});
			});
		</script>
<?php
}
?>