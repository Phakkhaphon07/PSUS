<?php
  session_start();
  if($_SESSION["status_id"] !=2){
?>
  <script type="text/javascript">
  alert ("ล้มเหลว ลองใหม่");
  window.location.href="../index.php";
  </script>
<?php
  }else{
?>


 <!-- เรียก css มาใช้ -->
 <style Type="text/css">

    @import url("css/header.css");
    .myfont{
          line-height: 18px; color:#CC0000;

    }
    </style>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<head>


<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">

  </head>
  <body> 

  
                       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ตะกร้าสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      $product_id = mysqli_real_escape_string($conn, $_GET['product_id']); 
      $act = mysqli_real_escape_string($conn, $_GET['act']);
    
      if($act=='add' && !empty($product_id))
      {
        if(isset($_SESSION['cart'][$product_id]))
        {
          $_SESSION['cart'][$product_id];
        }
        else
        {
          $_SESSION['cart'][$product_id]=1;
        }
      }
    
    
      if($act=='remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
      {
        unset($_SESSION['cart'][$product_id]);
      }
    
    
      if($act=='update')
      {
        $amount_array = $_POST['amount']; 
        foreach($amount_array as $product_id=>$amount)
        {
          $_SESSION['cart'][$product_id]=$amount;
        }
      }
    
    
      if($act=='cancel')  //ยกเลิกการสั่งซื้อทั้งหมด
      {
        unset($_SESSION['cart']);
      }
    
    
    
    
    
    ?>
<style>
img.fluke {
  width: 100px;
  height: 100px;
  object-fit: cover;
}
.banner {

  object-fit: cover;
}
</style>  

<div class="card-body">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
<div  class="table-responsive">
<table class=" table table-hover" role="grid" aria-describedby="example1_info"> 
<thead>
                         <th class="cell">ลำดับ</th>
												<th class="cell">รูปภาพ</th>
												<th class="cell">รายการสินค้า</th>
												<th class="cell">ราคา</th>
												<th class="cell">จำนวน</th>
												<th class="cell">รวม(บาท)</th>
												<th class="cell">ลบ</th>
                                    </thead>
                                    <?php
$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $product_id=>$qty)
	{
		$sql = "select * from tbl_product 
        inner join tbl_site on tbl_product.site_id = tbl_site.site_id
		where product_id=$product_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price_name'] * $qty;
		$total += $sum;
		$qty_name =$row['qty_name']; //จำนวนสินค้าในสต็อก

		echo "<tr>";
		echo "<td>" . $i +=1 . "</td>";
		echo "<td>" ."<img src='../p_img/" . $row["p_img"] ." 'class='fluke'>" . "</td>";
		echo "<td>" 
		.$row["product_name"]
		."<br>"
		.'ไซส์ : '
		.$row["site_name"]
		."<br>"
		.'สินค้าคงเหลือ : '
		.$row["qty_name"]
		.' รายการ'
		 . "</td>";
		// echo "<td>" . $row["site_name"] . "</td>";
		echo "<td width='15 align='right'>" .number_format($row["price_name"],2) . "</td>";
		echo "<td align='right'>";  
		echo "<input type='number' name='amount[$product_id]' value='$qty' class='form-control' min='1' max='$qty_name' /></td>";
		echo "<td align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td align='center'> <a  class='btn btn-danger btn-sm ' href='cart.php?product_id=$product_id&act=remove'>ลบ</a> </td>";

		echo "</tr>";
	}

	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}

if($total > 0){

?>
<tr>
<td colspan="7" align="right">
<a  class='btn btn-dark btn-sm btn-flat' href="show_product.php"><i class='fas fa-reply'></i> หน้าสินค้า</a>
<input type="button" class="btn btn-danger btn-sm btn-flat" name="btncancel" value="ยกเลิกรายการทั้งหมด" onclick="window.location='cart.php?act=cancel';" />
    <input type="submit" class="btn btn-warning btn-sm btn-flat" name="button" id="button" value="ปรับปรุง" />

<?php if($act=='update'){ ?>

	<input type="button" class="btn btn-success" name="Submit2"  value="สั่งจอง" onclick="window.location='confirm.php';" />
<?php } ?>
   
</td>
</tr>
<?php } else{
	echo '<h4 align="center"> -ไม่มีสินค้าในตะกร้า กรุณาเลือกสินค้า- </h4>';
}

?>
</table>
</div>
</form>
</div>

</div>
    </div>
  </div>
</div>
<!-- ปิด modal -->
<header>

  <nav class="shadow-lg p-3 mb-5 bg-body rounded navbar navbar-expand-md navbar-dark fixed-top bg-info">
    <a class="navbar-brand" href="#">Purchase Uniform.SVC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show_product.php">สินค้า</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">youtube</a>
        </li> -->

 <!-- แสดงข้อมูล dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link" name="type_id" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ประเภทสินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
$sql = "SELECT t.* , COUNT(p.product_id) as ptotal
FROM  tbl_type as t
LEFT JOIN tbl_product as p ON t.type_id=p.type_id
GROUP BY t.type_id ";
$quser = mysqli_query($conn,$sql);
?>
<?php while($rs = mysqli_fetch_array($quser))	
  {
    ?>
          <a class="dropdown-item" href="show_type.php?act=showbytype&type_id=<?php echo $rs['type_id']; ?>&name=<?php echo $rs['type_name']; ?>">
          <?php echo $rs['type_name']; ?> 
          <span class="badge bg-dark text-white ms-1 rounded-pill"> <?php echo $rs['ptotal']; ?></span> </a>
          <?php
          }
    ?>
        </div>
      </li>
 <!-- แสดงข้อมูล dropdown -->
      </ul>
      <!-- ค้นหาข้อมูล -->

 <form class="form-inline" method="get">
    <input class="form-control mr-sm-2" type="text" placeholder="ค้นหา" name="search" required>
    <button class="btn btn-success" type="submit" name="act" value="q">ค้นหา</button>
  </form>
 
        &nbsp;
        &nbsp;
  <!-- ค้นหาข้อมูล -->
  <!-- ตะกร้าสินค้า -->
      <form class="form-inline mt-2 mt-md-0">
      <tb>
       <a  href="login.php" type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-shopping-cart"> </i><span class= "text-dark ms-1 rounded-pill"> <?php echo $i;?></span></a>
    </tb>
    &nbsp;
    <tb>
    <div class="dropdown">
  <a class="btn btn-white text-white  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-user-tie"></i> <?php echo $_SESSION["mem_name"];?>
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

  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <a class="dropdown-item" type="button" href="show_profile_edit.php?members_id=<?php echo $rs['members_id']; ?>"><i class="fas fa-user-cog"></i> ข้อมูลส่วนตัว</a>
    <a class="dropdown-item" type="button" href="list_order.php"><i class="	far fa-calendar-alt"></i> ประวัติการสั่งจอง</a>
    <a class="dropdown-item" type="button" href="list_order_new.php"><i class="fas fa-history"></i> รอชำระเงิน</a>
    <a class="dropdown-item" type="button" href="list_order_paid.php"><i class="fas fa-hand-holding-usd"></i> ชำระเงินเรียบร้อย</a>
    <a class="dropdown-item" type="button" href="list_order_cancel.php"><i class="fas fa-times"></i> ยกเลิก</a>
    <a class="dropdown-item text-danger" type="button" href="logout.php"><i class='fas fa-sign-out-alt'></i> ออกจากระบบ</a>
  </div>

  <?php }?>

</div>
    </tb>
      </form>
    </div>

  </nav>

<div class="shadow-lg p-3 mb-5 bg-body rounded"style="margin-top:75px;">
  
  </div>
  



 
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js"></script>

  </body>

  <?php
}

?>
