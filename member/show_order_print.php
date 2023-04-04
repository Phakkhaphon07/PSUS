
<?php 
session_start();
include('../connect_DB.php'); 
include('../fpdf/fpdf.php'); 

$mem_id = $_SESSION['mem_id'];
$o_id = $_GET['o_id'];

 $sql = "select d.*,p.p_img, p.product_name, p.price_name,s.site_name, h.*,t.name_status
 from order_detail as d 
 inner join order_head as h on d.o_id = h.o_id
 inner join tbl_product as p on d.product_id = p.product_id
 inner join tbl_site as s on p.site_id = s.site_id
 inner join tbl_st as t on h.o_status = t.o_status
 where d.o_id=$o_id
 and h.members_id=$mem_id 
 ";
 $query = mysqli_query($conn, $sql);
 $rowd = mysqli_fetch_array($query);


$pdf = new FPDF( 'L','mm','A4'); 
$pdf->AddPage();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');


$pdf->SetFont('THSarabunNew','B',20);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874','ใบสั่งจองชุดนักเรียน/นักศึกษา'),0,1,'C');
$pdf->Cell(0,8, iconv('UTF-8', 'cp874','วิทยาลัยอาชีวศึกษาสุราษฎร์ธานี'),0,1,'C');

$pdf->SetFont('THSarabunNew','B',16);
$pdf->Cell(40,8, iconv('UTF-8','cp874','เลขออเดอร์'),0,0,);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874',$rowd['o_id']),0,1,);
$pdf->Cell(40,8, iconv('UTF-8','cp874','ชื่อ-นามสกุล ผู้สั่งจอง'),0,0,);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874',$rowd['members_name']),0,1,);
$pdf->Cell(40,8, iconv('UTF-8','cp874','วันที่สั่งจอง'),0,0,);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874',$rowd['o_dttm']),0,1,);
$pdf->Cell(40,8, iconv('UTF-8','cp874','สถานะการสั่งจอง'),0,0,);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874',$rowd['name_status']),0,1,);
$pdf->Cell(0,8, iconv('UTF-8', 'cp874',$rowd['']),0,1,);

// echo $pick_up_datetime;
$pdf->Cell(20,10, iconv('UTF-8','cp874','ลำดับ'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','รายการ'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','ไซส์'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','ราคา'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','จำนวน'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','ราคารวม'),1,1,'C');

$no=1;
do{
$pdf->SetFont('THSarabunNew','',14);
$pdf->Cell(20,10, iconv('UTF-8','cp874',$no),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['product_name']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['site_name']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['price_name']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['d_qty']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['d_subtotal']),1,1,'C');

$no++;
}
while($rowd=mysqli_fetch_assoc($query));

$sql = "select d.*,p.p_img, p.product_name, p.price_name,s.site_name, h.*,t.name_status
 from order_detail as d 
 inner join order_head as h on d.o_id = h.o_id
 inner join tbl_product as p on d.product_id = p.product_id
 inner join tbl_site as s on p.site_id = s.site_id
 inner join tbl_st as t on h.o_status = t.o_status
 where d.o_id=$o_id
 and h.members_id=$mem_id 
 ";
 $query = mysqli_query($conn, $sql);
 $rowd = mysqli_fetch_array($query);



$pdf->SetFont('THSarabunNew','B',14);
$pdf->Cell(220,10, iconv('UTF-8','cp874','รวม'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rowd['o_total']),1,1,'C');

$pdf->Output();


?>
