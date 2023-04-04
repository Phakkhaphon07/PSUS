<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
    session_start();
    if($_SESSION["status_id"] !=2){
?>


<script>
			setTimeout(function() {
			swal({
					title: "ล้มเหลว ลองใหม่อีกครั้ง",
					type: "error",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "index.php"; 
					});
			});
		</script>
<?php
    }else{
        session_unset();
        session_destroy();
?>
<script>
			setTimeout(function() {
			swal({
					title: "ออกจากระบบสำเร็จ",
					type: "success",
					timer: 1000, 
					showConfirmButton: false 
				}, function(){
					window.location.href = "../login_form.php"; 
					});
			});
		</script>
<?php
    }
?>