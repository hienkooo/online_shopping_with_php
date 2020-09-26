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
                    <h3 class="bg-gray p-4">Product Category</h3>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <!-- Add New category to the database -->
                        <fieldset class="p-4">
                        <select name="category">
                            <option value="">Choose Category</option>
                        
                        <?php
                            $result = mysqli_query($conn,"SELECT * FROM pro_catories") or
                            die(mysqli_error($conn));
                            while($rows = mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $rows["id"]; ?>">
                                     <?php echo $rows["name"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                            </select>
                        <input type="text" name="itm_name" required placeholder="Item Name" class="border p-3 w-100 my-2">
                        <input type="text" name="brand" required placeholder="Description" class="border p-3 w-100 my-2">
                        <input type="text" name="review" required placeholder="Review" class="border p-3 w-100 my-2">
                        <input type="text" name="qty" required placeholder="Quantity" class="border p-3 w-100 my-2">
                        <input type="text" name="price" required placeholder="Price" class="border p-3 w-100 my-2">
                        <input type="file" name="photo">
                            <button type="submit" name="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Add Items</button>
                        </fieldset>
                    </form>
                    <?php
                        
                        if(isset($_POST['submit'])){
                            $cat = $_POST['category'];
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

                            mysqli_query($conn,"INSERT INTO items(item_name, brand,
                             price, review, category_id, qty, photo,reach_date)
                             VALUES ('$name','$brand','$price', '$review','$cat','$qty_val','$image ',now())") or
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