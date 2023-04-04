<?php session_start(); 
include "connect_DB.php";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สมัครสมาชิก</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<!-- <body class="bg-gradient-info"> -->
<body class="bg-info">
<div class="container" >
<div class="row justify-content-center">

<div class="col-xl-8 col-lg-12 col-md-10">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
        <div align="center">
        <div class=""><a ><img class="logo-icon me-4" style="margin-top:50px; " height="200" weight="200" src="b_img/svc.png" alt="logo"></a></div>
       
</div>                  
            <!-- Nested Row within Card Body -->
            <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> Purchase Uniform.SVC</h1>
                            </div>
                            <form class="user" action="insert_register.php" method="post">
                                
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="อีเมล"required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="รหัสผ่าน" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="passwords" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="ใส่รหัสผ่านอีกครั้ง"required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fullname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="ชื่อ-นามสกุล" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="tel" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="เบอร์โทรศัพท์" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                    <label for="branch_id">แผนก : </label>
                                        <div class="btn-group">
                                            <select class="custom-select mr-sm-2" name="branch_id">
                                            <?php
                                            $sql = "select * from tbl_branch";
                                            $qp = mysqli_query($conn,$sql);
                                            while ($rp = mysqli_fetch_array($qp) )
                                            {     
                                                if($rs['branch_id'] == $rp['branch_id'])
                                                {
                                                    echo "<option value=".$rs['branch_id']." selected>".$rp['branch_name']."</option>";    
                                                } else {
                                                    echo "<option value=".$rp['branch_id'].">".$rp['branch_name']."</option>"; 
                                                }           
                                                
                                            }
                                            ?>
                                            </select>
                                            </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                    <label for="class_id">ระดับชั้น : </label>
                                        <div class="btn-group">
                                            <select class="custom-select mr-sm-2" name="class_id">
                                            <?php
                                            $sql = "select * from tbl_class";
                                            $qp = mysqli_query($conn,$sql);
                                            while ($rp = mysqli_fetch_array($qp) )
                                            {     
                                                if($rs['class_id'] == $rp['class_id'])
                                                {
                                                    echo "<option value=".$rs['class_id']." selected>".$rp['class_name']."</option>";    
                                                } else {
                                                    echo "<option value=".$rp['class_id'].">".$rp['class_name']."</option>"; 
                                                }           
                                                
                                            }
                                            ?>
                                            </select>
                                            </div>
                                    </div>
                                </div>

                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    สมัครสมาชิก
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login_form.php">เข้าสู่ระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
