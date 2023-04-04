<?php
session_start();
include "header.php";
include "../connect_DB.php";
if($_REQUEST['chk'] == "delete")
{
    $sql = " select * from members";
    $sql.= " where members_id = '$_REQUEST[members_id]'";
    $qdel = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($qdel);
    if ($num == 1)
    {
        $sql = " delete from members";
        $sql.= " where members_id = '$_REQUEST[members_id]'";
        mysqli_query($conn,$sql);
        echo"<script>window.location='member.php'</script>";
    }else{
        echo"<script>alert('ไม่พบข้อมูล')</script>";
    }
}
$conn
?>
            <div id="layoutSidenav_content">
                <main>
                        <div class="card mb-4">
                            <div class="card-header">
                                <center>
                                <h3>
                                <i class="fas fa-users"></i>
                                รายการสมาชิก
                                </h3>
                                </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                            <table id="example3" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        
                                                <th class="cell">ลำดับที่</th>
												<th class="cell">ชื่อบัญชี</th>
												<th class="cell">ชื่อ-นามสกุล</th>
												<th class="cell">แผนก</th>
												<th class="cell">ระดับชั้น</th>
												<th class="cell">โทรศัพท์</th>
												<th class="cell">สถานะ</th>
												<th class="cell">เครื่องมือ</th>
                                    </thead>
                               
                                
    <?php
//แสดงข้อมูล
$sql = "select * from members ";
$sql.= " inner join tbl_branch on (members.branch_id = tbl_branch.branch_id)";
$sql.= " inner join tbl_class on (members.class_id = tbl_class.class_id)";
$sql.= " inner join tbl_status on (members.status_id = tbl_status.status_id)";
$quser = mysqli_query($conn,$sql);
    ?>
<?php
$no=1;
  while($rs = mysqli_fetch_array($quser))	
  {

?>
										
											<tr>
                                                <td class="cell"><?php echo $no; ?></td>
												<td class="cell"><?php echo $rs['members_email']; ?></td>
												<td class="cell"><?php echo $rs['members_name']; ?></td>
												<td class="cell"><?php echo $rs['branch_name']; ?></td>
												<td class="cell"><?php echo $rs['class_name']; ?></td>
												<td class="cell"><?php echo $rs['members_tel']; ?></td>
												<td class="cell"><?php echo $rs['members_status'];?></td>
												<td>
                                                <a  class="btn btn-warning btn-sm edit btn-flat" href="member_form_edit.php?members_id=<?php echo $rs['members_id']; ?>"><i class='far fa-edit'></i> แก้ไข</a>
													<!-- <a href="?chk=delete&members_id=<?php echo $rs['members_id']; ?> 
         "onclick = "return confirm('ลบใช่หรือไม่')"<button type="button" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> ลบ</button></a>  -->
                                                </td>
											</tr>
										
										<?php 
                                        $no++;
                                        } ?>
										
                                     <a href="member_form_add.php"  class="btn btn-success btn-sm btn-flat" ><i class="fa fa-plus"></i> เพิ่มข้อมูล</a> <br>
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
"ordering": true,
"info": true,
"autoWidth": false,
});
});
</script>

       
    </body>

