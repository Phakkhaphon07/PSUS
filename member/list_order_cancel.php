
<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");

 $mem_id = $_SESSION['mem_id'];
// echo'<pre>';
// 	print_r($_SESSION);
// 	echo'<pre>';

 $sql = "select * from order_head  where members_id=$mem_id and o_status= 4";
$query = mysqli_query($conn, $sql);
// echo $sql;
?>

<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header"><center>
                                <h3><i class="bi-cart-fill me-1"></i>
                                รายการที่ยกเลิก
                                </h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive-sm">
                            <table id="example3" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <th class="cell"><center>ลำดับที่</center></th>
                                                <th class="cell"><center>เลขที่ออเดอร์</center></th>
												<th class="cell"><center>วัน/เวลา ที่สั่งจอง</center></th>
                                                <th class="cell"><center>ราคาที่ต้องชำระ/บาท</center></th>
                                                <th class="cell"><center>สถานะ</center></th>
												<th class="cell"><center>เครื่องมือ</center></th>
                                    </thead>
    <?php
    $no=1;
  while($row = mysqli_fetch_array($query))	
  {
// วัน/เดือน/ปี
   $o_dttm = $row ['o_dttm'];
   $time=strtotime($o_dttm);
   $new_date = date("d-m-Y H:i:s",$time);
// วัน/เดือน/ปี
?>
 	<tr>
                                    <td class="cell"><center><?php echo $no; ?></center></td>
												<td class="cell"><center><?php echo $row['o_id']; ?></center></td>
												<td class="cell"><center><?php echo $new_date; ?></center></td>
												<td class="cell"><center><?php echo number_format($row['o_total'],2); ?> บาท</center></td>
                                    <td class="cell"><center>
                                       <?php 
                                 
                                       $st = $row['o_status']; 
                                    if($st==1){
                                       echo '<font color="orange">';
                                       echo 'รอชำระเงิน';
                                       echo '</font>';
                                    } elseif ($st==2) {
                                       echo '<font color="blue">';
                                       echo 'ชำระเงินเรียบร้อย';
                                       echo '</font>';
                                    }
                                    elseif ($st==3) {
                                       echo '<font color="green">';
                                       echo 'ตรวจสอบเลข EMS';
                                       echo '</font>';
                                    }
                                    else { 
                                       echo '<font color="red">';
                                       echo 'ยกเลิก';
                                       echo '</font>';
                                    }
                                    echo '</font>';
                                    ?></center></td>

												<td class="cell"><center>

                                    <?php 

                                 $o_id = $row['o_id']; //order id
                              if($st==1){
                                 
                                 echo "<a href='show_order.php?o_id=$o_id' class='btn btn-info btn-sm'> ดูรายการจอง  </a>";

                              } elseif ($st==2) {
                                 echo "<a href='show_order.php?o_id=$o_id' class='btn btn-info btn-sm'> ดูรายการจอง  </a>";
                              }
                              elseif ($st==3) {
                                 echo "<a href='show_order.php?o_id=$o_id' class='btn btn-info btn-sm'> ดูรายการจอง </a>";
                              }
                              else { 
                                 echo "<a href='show_order.php?o_id=$o_id' class='btn btn-info btn-sm'> ดูรายการจอง </a>";
                              }
                              echo '</font>';
                              ?>
                                    </center></td>
                           
   
											</tr>
										
											<?php 
                              $no++;
                              } ?>
    <br>
            </div>
  </br>
            </div>

        <?php include('footer.php'); ?>
        <script>
$(function () {
$(".datatable").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>

    </body>