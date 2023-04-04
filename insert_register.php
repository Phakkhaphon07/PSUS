<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- sweet alert js & css -->
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	</head>

<?php
include "connect_DB.php";

$m_email =$_POST['email'];
$m_password =$_POST['password'];
$m_fullname =$_POST['fullname'];
$branch_id =$_POST['branch_id'];
$class_id =$_POST['class_id'];
$m_tel =$_POST['tel'];
$status_id =$_POST['status_id'];
// เช็ครหัสผ่าน
$_POST['password']==$_POST['passwords'];


$check = "
SELECT members_name , members_email
FROM members
WHERE members_name = '$m_fullname'
OR members_email = '$m_email'
";
$result1 = mysqli_query ($conn,$check );
$num = mysqli_num_rows ($result1);
if ($num > 0){
?>

	<script>
			setTimeout(function() {
			swal({
					title: "ข้อมูลซ้ำ!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
					text: "ชื่อ-สกุล หรือ Email นี้มีอยู่แล้ว", //ข้อความเปลี่ยนได้ตามการใช้งาน
					type: "error", //success, warning, error
					timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
					showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
				}, function(){
					window.location.href = "register.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
					});
			});
		</script>

	<?php
}elseif($_POST['password']!=$_POST['passwords']){
  ?>
<script>
			setTimeout(function() {
			swal({
					title: "รหัสผ่านให้ตรงกัน!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
					text: "กรุณากรอกรหัสผ่านให้ตรงกัน", //ข้อความเปลี่ยนได้ตามการใช้งาน
					type: "error", //success, warning, error
					timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
					showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
				}, function(){
					window.location.href = "register.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
					});
			});
		</script>


<?php
} else {
 //เช็ครหัสผ่าน

$sql_insert =
  "insert into members (members_email,members_password,members_name,branch_id,class_id,members_tel,status_id)
  values ('$m_email','$m_password','$m_fullname','$branch_id','$class_id','$m_tel','2')
";

}


if ($conn->query($sql_insert) === TRUE) {
  ?>

<script>
			setTimeout(function() {
			swal({
					title: "สำเร็จ!", //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
					text: "สมัครสมาชิกสำเร็จ", //ข้อความเปลี่ยนได้ตามการใช้งาน
					type: "success", //success, warning, error
					timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
					showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
				}, function(){
					window.location.href = "login_form.php"; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
					});
			});
		</script>

<?php
}  
?>

