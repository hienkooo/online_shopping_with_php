<?php
    session_start();
    ob_start();
    include("indexnav.php");
    $flag = false;
    $i=0;
    if(isset( $_SESSION['customerid'])){
        header("location:lastpage.php");
    }
?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Customer Registeration</h3>
                    <form action="" method="POST">
                        <!-- Add New category to the database -->
                        <fieldset class="p-4">
                            <input type="text" name="name" required placeholder="Name" class="border p-3 w-100 my-2">
                            <input type="email" name="email" required placeholder="Your Email" class="border p-3 w-100 my-2">
                            <input type="phone" name="phone" required placeholder="Phone No" class="border p-3 w-100 my-2">
                            <input type="text" name="address" required placeholder="Address" class="border p-3 w-100 my-2">
                            <button type="submit " name="submit" class="d-block py-3 px-5 bg-primary
                             text-white border-0 rounded font-weight-bold mt-3">Register</button>
                        </fieldset>
                    </form>
                    <?php
                        include('DBconnect.php');
                        if(isset($_POST['submit'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            
                            $result = mysqli_query($conn,"SELECT * FROM customer
                             WHERE email='".$email."'") or die(mysqli_error($conn));
                            while($rows = mysqli_fetch_array($result)){
                                $flag = true;
                                $i = $rows['id'];
                            }
                            
                            if($flag == false){
                                $res = mysqli_query($conn,"SELECT MAX(id) as id from customer")
                                 or die(mysqli_error($conn));
                                while($row = mysqli_fetch_array($res)){
                                    $i = $row['id'];
                                    $i++;
                                }
                                mysqli_query($conn,"INSERT INTO customer(id,name,email,phone,address)
                                VALUES ('$i','$name','$email','$phone','$address')") or 
                                die(mysqli_error($conn));
                            }
                            $_SESSION['customerid']= $i;
                            header("location:lastpage.php");
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