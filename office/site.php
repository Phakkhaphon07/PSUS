<?php
include "header.php";
include "../connect_DB.php";
if($_REQUEST['chk'] == "delete")
{
    $sql = " select * from tbl_site";
    $sql.= " where site_id = '$_REQUEST[site_id]'";
    $qdel = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($qdel);
    if ($num == 1)
    {
        $sql = " delete from tbl_site";
        $sql.= " where site_id = '$_REQUEST[site_id]'";
        mysqli_query($conn,$sql);
        echo"<script>window.location='site.php'</script>";
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
                                <i class="fas fa-sort-numeric-up"></i>
                                รายการไซส์สินค้า
                                </h3>
                            </center>
                            </div>
                            <div class="card-body">
                            <div  class="table-responsive">
                            <table id="example3" class="table table-bordered table table-hover" role="grid" aria-describedby="example1_info">
                                    <thead>
                                                <th class="cell">ลำดับที่</th>
												<th class="cell">ไซส์</th>
                                                <th class="cell">เครื่องมือ</th>
											
                                    </thead>
                                
                                    <?php
//แสดงข้อมูล
$sql = "select * from tbl_site";
$quser = mysqli_query($conn,$sql);
?>
<?php
$no=1;
  while($rs = mysqli_fetch_array($quser))	
  {

?>
										
											<tr>
												<td class="cell"><?php echo $no; ?></td>
												<td class="cell"><?php echo $rs['site_name']; ?></td>
												<td>
                                                <a  class="btn btn-warning btn-sm edit btn-flat" href="site_form_edit.php?site_id=<?php echo $rs['site_id']; ?>"><i class='far fa-edit'></i> แก้ไข</a>
													<a href="?chk=delete&site_id=<?php echo $rs['site_id']; ?> 
         "onclick = "return confirm('ลบใช่หรือไม่')"<button type="button" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> ลบ</button></a> </td>
											</tr>
										
											<?php 
                                        $no++;
                                        } ?>
										
                                     <a href="site_form_add.php"  class="btn btn-success btn-sm btn-flat" ><i class="fa fa-plus"></i> เพิ่มข้อมูล</a> <br>
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

