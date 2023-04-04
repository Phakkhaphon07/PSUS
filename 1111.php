<?php 
require('connect_DB.php'); 
require('fpdf/fpdf.php'); 

$pick_up_datetime = $_POST["pick_up_datetime"];

$sql1="select * from tblist";
$sql1.=" where pick_up_datetime ='$_POST[pick_up_datetime]'";
$quser=mysqli_query($conn,$sql1);
$num=mysqli_num_rows($quser);


if( $num >= 1 ){
$pdf = new FPDF( 'L','mm','A4'); 
$pdf->AddPage();
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');


$pdf->SetFont('THSarabunNew','B',14);
$pdf->Cell(0,10, iconv('UTF-8', 'cp874', $pick_up_datetime),0,1,'C');


// echo $pick_up_datetime;


$sql="select * from tblist ";
$sql.=" inner join  tbcustomer on (tblist.customer_ID = tbcustomer.customer_ID)     
where pick_up_datetime = '$_POST[pick_up_datetime]'";
$qly=mysqli_query($conn,$sql);
$rs=mysqli_fetch_assoc($qly);

$pdf->Cell(20,10, iconv('UTF-8','cp874','ลำดับ'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','รหัส'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','ชื่อ-นามสกุล'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','เบอร์โทรศัพท์'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','วันที่รับ'),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874','รวม'),1,1,'C');


do{
$pdf->SetFont('THSarabunNew','',14);
$pdf->Cell(20,10, iconv('UTF-8','cp874',$rs['list_ID']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rs['customer_ID']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rs['customer_name']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rs['customer_phone']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rs['pick_up_datetime']),1,0,'C');
$pdf->Cell(50,10, iconv('UTF-8','cp874',$rs['total']),1,1,'C');
}while($rs=mysqli_fetch_assoc($qly));

$pdf->Output();
}else{
    echo "ไม่พบรายการ";
}

?>