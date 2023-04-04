<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
session_start();
   include "connect_DB.php";
    $user =$_POST["username"];
    $pass =$_POST["password"];

    $sql_login = "
        select * from members where members_email = '$user' and members_password = '$pass'
    ";
    $rusult_login = $conn->query($sql_login);

    if($rusult_login->num_rows == 1 ){
       foreach($rusult_login as $key){
           $mem_id = $key['members_id'];
		   $user = $key['members_email'];
           $pass = $key['members_password'];
           $mem_name = $key['members_name'];
           $branch_id = $key['branch_id'];
           $class_id = $key['class_id'];
           $mem_tel = $key['members_tel'];
           $status_id = $key['status_id'];
    If ($status_id == 1) {
        $_SESSION["mem_id"] = "$mem_id";
		$_SESSION["username"] = "$user";
		$_SESSION["password"] = "$pass";
        $_SESSION["mem_name"] = "$mem_name";
		$_SESSION["branch_id"] = "$branch_id";
        $_SESSION["class_id"] = "$class_id";
        $_SESSION["mem_tel"] = "$mem_tel";
        $_SESSION["status_id"] = "$status_id";
?>
        <script>
			setTimeout(function() {
			swal({
					title: "ยินดีต้อนรับ",
					text: "<?php echo $mem_name ; ?>",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "office/index.php"; 
					});
			});
		</script>
<?php 

    }elseIf ($status_id == 2) {
        $_SESSION["mem_id"] = "$mem_id";
		$_SESSION["username"] = "$user";
		$_SESSION["password"] = "$pass";
        $_SESSION["mem_name"] = "$mem_name";
        $_SESSION["branch_id"] = "$branch_id";
        $_SESSION["class_id"] = "$class_id";
        $_SESSION["mem_tel"] = "$mem_tel";
        $_SESSION["status_id"] = "$status_id";
?>

<script>
			setTimeout(function() {
			swal({
					title: "ยินดีต้อนรับ",
					text: "<?php echo $mem_name ; ?>",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "member/index.php"; 
					});
			});
		</script>

<?php 

    }elseIf ($status_id == 3) {
        $_SESSION["mem_id"] = "$mem_id";
        $_SESSION["mem_name"] = "$mem_name";
        $_SESSION["status_id"] = "$status_id";
?>
  <script>
			setTimeout(function() {
			swal({
					title: "ยินดีต้อนรับ",
					text: "<?php echo $mem_name ; ?>",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "admin/index.php"; 
					});
			});
		</script>

<?php
           }
       }
        // echo $mem_id,$mem_name,$status_id;

    }else{
?>

<script>
			setTimeout(function() {
			swal({
					title: "เข้าสู่ระบบล้มเหลว",
					text: "Email หรือ Password ไม่ถูกต้อง",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "login_form.php"; 
					});
			});
		</script>

<?php
    }
?>
