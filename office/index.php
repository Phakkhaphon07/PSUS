
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> -->

<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");
?>


<style>

.grey-bg {  
    background-color: #F5F7FA;
}
</style>


<?php

//แสดงจำนวนนับออเดอร์

// wait_order
$sqlw="SELECT COUNT(o_id) as wtotal FROM order_head WHERE o_status = 1 ";
$rsw = mysqli_query($conn,$sqlw) or die ("Error in query: $sqlw" . mysqli_error());
$roww = mysqli_fetch_array($rsw);

//wash_success
$sqls="SELECT COUNT(o_id) as stotal FROM order_head WHERE o_status = 2 ";
$rss = mysqli_query($conn,$sqls) or die ("Error in query: $sqls" . mysqli_error());
$rows = mysqli_fetch_array($rss);

//payment_success
$sqlp="SELECT COUNT(o_id) as ptotal FROM order_head WHERE o_status = 4 ";
$rsp = mysqli_query($conn,$sqlp) or die ("Error in query: $sqlp" . mysqli_error());
$rowp = mysqli_fetch_array($rsp);
?>
<br>

<div align="center">

<div class="row">
<a href="list_order_new.php"  class="text-Info">
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-history"  style="font-size:60px; color:#FFCC00;"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $roww['wtotal']; ?></h3>
                  <span>รายการรอชำระเงิน</span>
                </div>
              </div>
            </div>
          </div>
        </div>
</a>
      </div>

      <a href="list_order_paid.php"  class="text-Info">
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-hand-holding-usd"  style="font-size:60px; color:#33CC33;"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $rows['stotal']; ?></h3>
                  <span>รายการชำระเงินเรียบร้อย</span>
                </div>
              </div>
            </div>
          </div>
        </div>
</a>
      </div>


      <a href="list_order_cancel.php"  class="text-Info">
      <div class="col-xl-4 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-times"  style="font-size:60px; color:red;"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $rowp['ptotal']; ?></h3>
                  <span>รายการยกเลิก</span>
                </div>
              </div>
            </div>
          </div>
        </div>
</a>
      </div>



</div>
<br>


<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header"><center>
                                <h3><i class="fas fa-tachometer-alt"></i>
                                รายงานรายได้
                                </h3>
                                </center>
                            </div>
 
                            <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 align="left" style="margin-top: 20px"></h2>
			<a href="index.php" class="btn btn-primary btn-flat">รายวัน</a> 
			<a href="index.php?act=m" class="btn btn-success btn-flat">รายเดือน</a> 
			<a href="index.php?act=y" class="btn btn-warning btn-flat">รายปี</a> 
            <a href="index.php?act=date" class="btn btn-danger btn-flat">เรียกดูตามวัน</a> 
            <?php
  $act = (isset($_GET['act']) ? $_GET['act'] : '');

  if($act=='m'){
    include("index_m.php");
} elseif ($act=='y'){
    include("index_y.php");
} elseif ($act=='date'){
    include("index_date.php");
} elseif ($act=='rangedate'){
    include("index_rangedate.php");
 } else{
    include("index_d.php");
 }

?>
		</div>
	</div>
</div>



