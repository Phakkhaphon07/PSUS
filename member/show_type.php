
<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");

?>
<style>
img.AAA {
  width: 240px;
  height: 200px;
  object-fit: cover;
  margin-left: auto;
  margin-right: auto;
}
</style>
<body>
<?php
//แสดงข้อมูล
$type_id = $_GET['type_id'];
$sql = "select * from tbl_product";
$sql.= " inner join tbl_site on (tbl_product.site_id = tbl_site.site_id)";
$sql.= " WHERE tbl_product.type_id=$type_id";
$quser = mysqli_query($conn,$sql);
?>
<section class="py-2">
<div class="container px-4 px-lg-5 mt-2 ">

    <div class="row">
    <?php
  while($rs = mysqli_fetch_array($quser))	
  {
?>
        <div class="col-sm-3" style="margin-bottom: 20px;">
            <div class="shadow-lg p-3 mb-5 bg-body rounded card h-100">
                <!-- Product image-->
                <img  src="../p_img/<?php echo $rs['p_img'];?>" width="100%" />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <td class="fw-bolder"><?php echo $rs['product_name']; ?></td>
                        <br>
                       ราคา <td class="fw-bolder"><?php echo $rs['price_name']; ?> บาท </td>
                       <br>
                       ไซส์ <td class="fw-bolder"><?php echo $rs['site_name']; ?></td>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="list_product.php?product_id=<?php echo $rs[0]; ?>">รายละเอียด</a></div>
                </div>
            </div>
        </div>
        <?php } ?>											
    </body>
    <?php include('footer1.php'); ?>
