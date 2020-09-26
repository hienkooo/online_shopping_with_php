<?php
    ob_start();
    include("nav.php");
    include("DBconnect.php");
?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Update Category</h3>
                    <fieldset class="p-4">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <!-- Update category to the database -->
                        <?php
                           $user_id = $_REQUEST['iden'];
                            $result = mysqli_query($conn,"SELECT * FROM items 
                            where item_id ='$user_id'");
                            while( $rows = mysqli_fetch_array($result)){
                                ?>
                        <input type="text" value="<?php echo $rows['item_name'] ?>" name="itm_name" required placeholder="Item Name" class="border p-3 w-100 my-2">
                        <input type="text" value="<?php echo $rows['brand'] ?>" name="brand" required placeholder="Description" class="border p-3 w-100 my-2">
                        <input type="text" value="<?php echo $rows['review'] ?>" name="review" required placeholder="Review" class="border p-3 w-100 my-2">
                        <input type="text" value="<?php echo $rows['qty'] ?>" name="qty" required placeholder="Quantity" class="border p-3 w-100 my-2">
                        <input type="text" value="<?php echo $rows['price'] ?>" name="price" required placeholder="Price" class="border p-3 w-100 my-2">
                        <input type="file" name="photo">
                            <?php
                                }
                            ?>
                        <button type="submit" name="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Update</button>
                        </fieldset>

                    </form>
                    <?php
                     if(isset($_POST['submit'])){
                        $name = $_POST['itm_name']; 
                        $brand = $_POST['brand'];
                        $review = $_POST['review'];
                        $qty_val = $_POST['qty'];
                        $price = $_POST['price'];
                        $image = $_FILES['photo']['name'];
                        $tmp = $_FILES['photo']['tmp_name'];
                        if($image){
                            move_uploaded_file($tmp,'images/'.$image);
                        }
                        mysqli_query($conn,"UPDATE items SET item_name='$name',brand='$brand',
                        price='$price',review='$review',qty='$qty_val',
                        photo='$image' WHERE item_id = '$user_id'") or
                              die(mysqli_error($conn));
                            header('location:validate.php');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
   

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>
<?php
    ob_flush();
?>