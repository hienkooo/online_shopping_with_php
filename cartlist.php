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
                        <table class="table table-dark">
                         <thead>
                         <tr>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <td scope="col">Delete Items</td>
                        </tr> 
                        <?php
                        $total = 0;
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $id=>$value){
                                    $result = mysqli_query($conn,"SELECT * FROM items WHERE
                                    item_id='$id'") or die(mysqli_error($conn));
                                    while($rows = mysqli_fetch_array($result)){
                                        $total += $rows['price'];
                                        ?>
                                    <tr>
                                        <td scope="row"><?php echo "$rows[item_name]"; ?></td>
                                        <td><?php echo "$rows[price]"; ?></td>
                                        <td><img width="100px" src="images/<?php echo "$rows[photo]"; ?>"></td>
                                        <td>
                                            <div class="text-center" style="margin:auto;">
                                             <a href="deletecart.php?id=<?php echo "$rows[item_id]"; ?>">
                                             <i style="color:#FFFFFF;" class="fa fa-trash-o fa-4x" aria-hidden="true"></i>
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                            }
                        ?>
                        <tr>
                            <tbody>
                                <tr>
                                <td colspan="2"><b>Total price is</b></td>
                                <td><b><?php echo "$total"."MMK" ?></b></td>
                            </tr>
                            </tbody>
                        </tr>
                         </thead>   
                        </table>
                        <button type="button" class="btn btn-danger">
                            <a href="clearcart.php">Clear all</a>
                        </button>
                        <button type="button" class="btn btn-info">
                            <a href="index.php">Buy more</a>
                        </button>
                        <button type="button" class="btn btn-info">
                            <a href="register.php">Buy now</a>
                        </button>
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