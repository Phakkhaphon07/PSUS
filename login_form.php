<?php session_start(); ?>

<head>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>ระบบสั่งจองชุดนักเรียน</title>

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
img.fluke {
  width: 300px;
  height: 300px;
  object-fit: cover;
}
</style>

<body class="bg-info">

<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-6 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
<div align="center">
<div class=""><a ><img class="logo-icon me-4" style="margin-top:50px; " height="200" weight="200" src="b_img/svc.png" alt="logo"></a></div>
</div>
	<!-- Nested Row within Card Body -->
					<div class="row">
						<!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
			

						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4 "> Purchase Uniform.SVC</h1>
								</div>
								<form class="user" action="chk_login.php" method="post">
									<div class="form-group">
										<input type="email" class="form-control form-control-user"
										name="username" id="exampleInputEmail" aria-describedby="emailHelp"
											placeholder="อีเมล"required>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user"
										name="password" id="exampleInputPassword" placeholder="รหัสผ่าน"required>
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck">จดจำรหัสผ่าน</label>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										เข้าสู่ระบบ
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="register.php">สมัครสมาชิก</a>
								</div>
								<!-- <div class="text-center">
									<a class="small" href="register.html">Create an Account!</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

</body>

