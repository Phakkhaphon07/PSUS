
<?php
 session_start();
 require("../connect_DB.php");
 require("header.php");

// echo'<pre>';
// 	print_r($_SESSION);
// 	echo'<pre>';


$sql = "select h.*,b.branch_name,c.class_name, m.*
from order_head as h 
inner join members as m on h.members_id = m.members_id
inner join tbl_branch as b on m.branch_id = b.branch_id
inner join tbl_class as c on m.class_id = c.class_id
where o_status = 4
 ";
$query = mysqli_query($conn, $sql);
// echo $sql;
?>

<div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header"><center>
                                <h3><i class="fas fa-times"></i>
                                รายการที่ยกเลิก
                                </h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                            <table id="example3" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                                <th class="cell"><center>ลำดับที่</center></th>
                                                <th class="cell"><center>เลขที่ออเดอร์</center></th>
                                                <th class="cell"><center>ชื่อผู้สั่งจองที่ยกเลิก</center></th>
												                        <th class="cell"><center>วัน/เวลา ที่ยกเลิกสั่งจอง</center></th>
                                                <th class="cell"><center>ราคาที่ยกเลิก/บาท</center></th>
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
                                    <td class="cell"><?php echo $no; ?></td>
												            <td class="cell"><center><?php echo $row['o_id']; ?></center></td>
                                    <td class="cell"><center>  
                                    <?php
                                    echo '<b>';
                                     echo $row['members_name'];
                                     echo '</b><br>';
                                     echo 'แผนก: '.$row['branch_name'];
                                     echo '<br>';
                                     echo 'ระดับชั้น: '.$row['class_name'];
                                     echo '<br>';
                                     echo 'เบอร์โทรศัพท์. '.$row['members_tel'];

                                     ?>
                                </center></td>
												<td class="cell"><center><?php echo $new_date; ?></center></td>
												<td class="cell"><center><?php echo number_format($row['o_total'],2); ?> บาท</center></td>
												<td class="cell"><center>
                                    <?php $o_id = $row['o_id'];
                                    echo "<a href='order_detail_cancel.php?o_id=$o_id' class='btn btn-info btn-sm far fa-eye'> ดูรายการยกเลิก  </a>"; ?>
                                    </center></td>
                           
   
											</tr>
										
											<?php 
                                        $no++;
                                        } ?>
									
                                    <br>
            </div>
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
http://fordev22.com/
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>
       
    </body>