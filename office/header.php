<?php
  session_start();
  if($_SESSION["status_id"] !=1){
?>
  <script type="text/javascript">
  alert ("ล้มเหลว ลองใหม่");
  window.location.href="../index.php";
  </script>
<?php
  }else{
?>

<style>
img.fluke {
  width: 150px;
  height: 150px;
  object-fit: cover;
}
</style>


 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purchase Uniform</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
 <!--  http://fordev22.com/ -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <!-- http://fordev22.com/ -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->

  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

  <link href="assets/plugins/bootstrap-tagsinput/tagsinput.css?v=11" rel="stylesheet" type="text/css">

  <!-- ckeditor -->
  <script src="assets/adminlte/bower_components/ckeditor/ckeditor.js"></script>


  <style>
    body {
      font-family: 'Kanit', sans-serif;
      
      /*font-size: 14px;*/
    }
  </style>
</head>


 
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
 


<!-- เปลี่ยนสีตรงนี้ -->
 <nav class="main-header  navbar navbar-expand navbar-info navbar-dark" >
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($menu == "index"){echo "active";} ?>"  href="index.php"><i class="fas fa-home"></i> หน้าหลัก</a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <div class="dropdown dropleft text-light">
    <a class="dropdown-toggle" data-toggle="dropdown">
    <i class="fas fa-user-alt"></i> <?php echo $_SESSION["mem_name"];?>
  </a>
  <?php



$mem_id = $_SESSION['mem_id'];

//แสดงข้อมูล
$sql = "select * from members ";
$sql.= " inner join tbl_branch on (members.branch_id = tbl_branch.branch_id)";
$sql.= " inner join tbl_class on (members.class_id = tbl_class.class_id)";
$sql.= " inner join tbl_status on (members.status_id = tbl_status.status_id)";
$sql.= "where members.members_id=$mem_id ";
$quser = mysqli_query($conn,$sql);
$rs = mysqli_fetch_array($quser);	
  {
?>
    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
    <a href="show_profile_edit.php?members_id=<?php echo $rs['members_id']; ?>" class="dropdown-item"><i class="fas fa-user-cog"></i> ข้อมูลส่วนตัว</a>
    <a href="logout.php" class="dropdown-item text-danger"><i class="	fas fa-power-off"></i> ออกจากระบบ</a>
    </div>
  </div>
  <?php }?>
      </li>
    </ul>
  </nav>





 <!--  http://fordev22.com/ -->
  <!-- /.navbar -->



<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <!-- Brand Logo เปลี่ยนสีตรงนี้ -->
    <a href="" class="brand-link bg-info"> 
      <img src="assets/dist/img/svc.jpg"
           alt="svc Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> Purchase Uniform.SVC</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class=" mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <a><i class="far fa-user-circle"></i></a>
        </div>
        <div class="info">
          <a > ชื่อผู้ใช้งาน : <?php echo $_SESSION["mem_name"];?></a>
        </div> -->
 
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-header">สถิติ</li>
          <li class="nav-item" >
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>รายงานรายได้ </p>
            </a>
          </li>

          <li class="nav-header">เมนู</li>


          <li class="nav-item" >
            <a href="list_order_new.php" class="nav-link <?php if($menu=="list_order_new"){echo "active";} ?> ">
              <i class="nav-icon fas fa-history"></i>
              <p>สินค้ารอชำระเงิน </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="list_order_paid.php" class="nav-link <?php if($menu=="list_order_paid"){echo "active";} ?> ">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>สินค้าชำระเงินเรียบร้อย</p>
            </a>
          </li>

           <li class="nav-item">
            <a href="list_order_cancel.php" class="nav-link <?php if($menu=="list_order_cancel"){echo "active";} ?> ">
              <i class="nav-icon fas fa-times"></i>
              <p>สินค้าที่ยกเลิก</p>
            </a>
          </li>



          <li class="nav-header">จัดการสินค้า</li>



      
<li class="nav-item" >
  <a href="product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
    <i class="nav-icon	fas fa-shopping-basket"></i>
    <p>รายการสินค้า </p>
  </a>
</li>


 <li class="nav-item">
  <a href="site.php" class="nav-link <?php if($menu=="site"){echo "active";} ?> ">
    <i class="nav-icon fas fa-sort-numeric-up"></i>
    <p>รายการไซส์สินค้า</p>
  </a>
</li>

<li class="nav-item">
  <a href="type.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
    <i class="nav-icon 	fas fa-dolly-flatbed"></i>
    <p>รายการประเภทสินค้า</p>
  </a>
</li>





          <li class="nav-header">จัดการสมาชิก</li>

            <li class="nav-item">
            <a href="member.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>รายการสมาชิก</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="branch.php" class="nav-link <?php if($menu=="branch"){echo "active";} ?> ">
              <i class="nav-icon 	fas fa-chalkboard-teacher"></i>
              <p>รายการแผนก</p>
            </a>
          </li>

      

          <li class="nav-item">
            <a href="class.php" class="nav-link <?php if ($menu == "class"){echo "active";} ?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>รายการระดับชั้น</p>
            </a>
          </li>


      <div class="user-panel mt-2 pb-3 mb-2 d-flex">
  
      </div>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <p>ออกจากระบบ</p>
            </a>
          </li>
  


          
        </ul>
      </nav>

    </div>

  </aside>



    <div class="content-wrapper">

<?php
  }
?>
