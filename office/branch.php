<?php
include "header.php";
include "../connect_DB.php";
if($_REQUEST['chk'] == "delete")
{
    $sql = " select * from tbl_branch";
    $sql.= " where branch_id = '$_REQUEST[branch_id]'";
    $qdel = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($qdel);
    if ($num == 1)
    {
        $sql = " delete from tbl_branch";
        $sql.= " where branch_id = '$_REQUEST[branch_id]'";
        mysqli_query($conn,$sql);
        echo"<script>window.location='branch.php'</script>";
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
                                <i class="fas fa-chalkboard-teacher"></i>
                                รายการแผนก
                                </h3>
                            </center>
                            </div>
                            <div class="card-body">
                            <table id="example3" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                                <th class="cell">ลำดับที่</th>
												<th class="cell">แผนก</th>
                                                <th class="cell">เครื่องมือ</th>
											
                                    </thead>
                                
                                    <?php
//แสดงข้อมูล
$sql = "select * from tbl_branch";
$quser = mysqli_query($conn,$sql);
?>
<?php
$no=1;
  while($rs = mysqli_fetch_array($quser))	
  {

?>
										
											<tr>
                                                <td class="cell"><?php echo $no; ?></td>
												<td class="cell"><?php echo $rs['branch_name']; ?></td>
												<td>
                                                <a  class="btn btn-warning btn-sm edit btn-flat" href="branch_form_edit.php?branch_id=<?php echo $rs['branch_id']; ?>"><i class='far fa-edit'></i> แก้ไข</a>
													<a href="?chk=delete&branch_id=<?php echo $rs['branch_id']; ?> 
         "onclick = "return confirm('ลบใช่หรือไม่')"<button type="button" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> ลบ</button></a> </td>
											</tr>
										
											<?php 
                                        $no++;
                                        } ?>
										
                                     <a href="branch_form_add.php"  class="btn btn-success btn-sm btn-flat" ><i class="fa fa-plus"></i> เพิ่มข้อมูล</a> <br>
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

