<?php
    ob_start();
include("indexnav.php");
    include("DBconnect.php");
?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Items List</h3>
                    <form action="#" method="post">
                        <!--Show category from the database -->
                       <?php
                            $brand = $_REQUEST['id'];
                            $catid = $_REQUEST['id2'];
                            $result = mysqli_query($conn,"SELECT items.*, pro_catories.name from 
                            pro_catories INNER JOIN items ON items.category_id = pro_catories.id 
                            where items.category_id = '$catid' and brand='$brand'") or die(mysqli_error($conn));
                            if(mysqli_num_rows($result)>0){
                                while($rows = mysqli_fetch_array($result))
                                {
                                ?>
                                    <ul class="p-4">
                                        <li>
                                            <div class="row">
                                                <div class="col-6">
                                                    <!-- item information -->
                                                    <b><?php echo "$rows[name]";  ?></b>
                                                    <i>by <?php echo $rows["brand"];  ?></i>
                                                    <small><?php echo "($rows[item_name])";  ?></small> 
                                                    MKS<?php echo "$rows[price]"; ?> 
                                                    <div> <?php echo "$rows[review]"; ?>
                                                    <a href="cart.php?id=<?php echo "$rows[item_id]" ?>">
                                                    <img src="images\Add-To-Cart.jpg" name="images"
                                                     alt="submit" width="75%">
                                                    </a>
                                                    
                                                    </div> 
                                                    <a href="Deleteitem.php?iden=<?php
                                                     echo $rows['item_id']; ?>" class="badge badge-success">Delete</a>
                                                    <a href="Updateitem.php?iden=<?php
                                                     echo $rows['item_id']; ?>" class="badge badge-danger">Update</a>
                                                </div>
                                                <div class="col" align="right">
                                                    <!-- item image -->
                                                    <img src="images/<?php echo $rows["photo"]; ?>" height="100"
                                                    alt="Polo Shirt">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                <?php
                                   }
                                }
                                 ?>
                                <a href="addNewItems.php" class="badge badge-info">Add New Items</a>
                    </form>
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