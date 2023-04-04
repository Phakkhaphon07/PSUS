
<?php
 session_start();
 require("../connect_DB.php");

?>

<!-- <style>
img.LLL {
  width: 400px;
  height: 450px;
  object-fit: cover;
}
</style> -->


<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<?php
 require("header.php");
?>

<?php
$sql = "select * from tbl_product ";
$sql.= "inner join tbl_site on (tbl_product.site_id = tbl_site.site_id) where product_id='$_REQUEST[product_id]'";
$qs = mysqli_query ($conn,$sql);
$rs=mysqli_fetch_array($qs);


?>


 <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
     
                <div class="row">
            <div class="col-md-6">
            
                <?php echo"<img src='../p_img/".$rs['p_img']."'width='100%' height='100%' id='myImg'>";?>


            </div>

                    <!-- <div class="shadow-lg p-3 mb-5 bg-body rounded "><img class="LLL" src="../p_img/<?php echo $rs['p_img'];?>" /></div> -->
                    <div class="col-md-6">
                        
                        <h1 class="display-5 fw-bolder"><?php echo $rs['product_name']; ?></h1>
                        <div class="fs-5 mb-5">
                            <h3><span>ราคา <?php echo $rs['price_name']; ?> บาท</span></h3>
                            <br>
                            <h3><span>ไซส์ : <?php echo $rs['site_name']; ?> </span></h3>
                        </div>
                        
                        <div class="fs-5 mb-5">
                        <h3><span>สินค้าคงเหลือ <?php echo $rs['qty_name']; ?> รายการ </span></h3>
                        </div>
                        <?php if($rs['qty_name'] > 0 ) { ?>
                        <p class="lead"></p>
                            <td><a  class="btn btn-outline-dark flex-shrink-0" href="cart.php?product_id=<?php echo $rs['product_id'];?>&act=add"><i class='bi-cart-fill me-1'></i>หยิบใส่ตะกร้า</a>
                        <?php }else{
                             echo '<button class="btn btn-danger" disabled>สินค้าหมด</button>';
                        } ?>
                </div>
            </div>
        </section>
      
        <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>							
									
    </body>
