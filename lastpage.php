<?php
    session_start();
    ob_start();
    include("indexnav.php");
    include('DBconnect.php');
    if(isset( $_SESSION['customerid'])){
        $id = $_SESSION['customerid'];
    }
?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 style="text-align: center;" class="bg-gray p-4">Customer Information</h3>
                    <form action="" method="POST">
                        <table class="table table-striped table-dark">
                             <?php
                                $result = mysqli_query($conn,"SELECT * FROM
                                customer WHERE id='$id'") or die(mysqli_error($conn));
                                while($row = mysqli_fetch_array($result)){
                                    ?>
                                <thead>
                                    <tr>
                                    <th scope="col">Name =></th>
                                    <th><?php echo "$row[name]"; ?></th>      
                                    </tr>
                                    <tr>
                                    <th scope="col">Address =></th>
                                    <th><?php echo "$row[address]"; ?></th>      
                                    </tr>
                                    <tr>
                                    <th scope="col">Phone =></th>
                                    <th><?php echo "$row[phone]"; ?></th>      
                                    </tr>
                                    <tr>
                                    <th scope="col">Email; =></th>
                                    <th><?php echo "$row[email]"; ?></th>      
                                    </tr>
                                </thead>
                                <?php
                                }
                            ?>
                        </table>
                        <table class="table table-dark">
                            <tr>
                                <th>Items</th>
                                <th>Price</th>
                            </tr>
                            <?php
                                $total = 0;
                                foreach($_SESSION['cart'] as $id =>$values){
                                    $result = mysqli_query($conn,"SELECT * FROM items WHERE
                                    item_id='$id'") or die(mysqli_error($conn));
                                
                                while($rows = mysqli_fetch_array($result))
                                { $total += $rows['price'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['item_name']; ?></td>
                                        <td><?php echo $rows['price']."MMK"; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td>Total Price =></td>
                                <td><?php echo $total."MMK"; ?></td>
                            </tr>
                        </table>
                        <button style="margin:10px;" type="submit" name="submit"
                         class="btn btn-info p-3">Finish</button>
                         <!-- <input style="margin:10px;" type="submit" class="btn btn-info p-3"
                          name="submit" value="Finish"> -->

                    </form>
                    <?php
                        include('DBconnect.php');
                        if(isset($_POST['submit'])){
                            order_customer();
                            session_destroy();
                            header("location:index.php");
                        }
                        function order_customer(){
                            include('DBconnect.php');
                            $results = mysqli_query($conn,"SELECT MAX(order_id)
                            as oid from order_customer");
                            while($row = mysqli_fetch_array($result)){
                                $order_id = $row['oid'];
                                $order_id++;
                            } 
                            mysqli_query($conn,"INSERT INTO order_customer(order_id, customer_id, day)
                             VALUES ('$order_id','$id',now())") or 
                             die(mysqli_error($conn));
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