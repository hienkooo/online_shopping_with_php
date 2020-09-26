<?php
// $start_time = time();
// $cache_file = "customer_cahe.php";
// $cache_time = 10;
// $cache_value = mysqli_query($conn,);
session_start();
header('Cache-Control:store , cache , must-revalidate');
header('Pragam:cache');
include("DBconnect.php");
$flag = false;
    if(isset($_POST["submit"])){
        $name = $_POST["txt1"];
        $paswd = $_POST["txt2"];
        $result = mysqli_query($conn,"SELECT * FROM users WHERE username='".$name."' and password='".$paswd."' ") 
        or die(mysqli_error('$conn'));
        
        if(mysqli_num_rows($result)>0){
            $flag = true;
             $_SESSION['adm'] = $name;
        }
    }
        if($flag == false && !isset($_SESSION['adm'])){
            $message = "Please try again!Wrong Username or Password";
            header('location:login.php?Message='.$message);
        }elseif($flag ==  true || isset($_SESSION['adm'])){
            include("nav.php");
            
?>
<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Product Category</h3>
                    <form action="#" method="post">
                        <!-- select category from the database -->
                        <?php
                            $result_1 = mysqli_query($conn,"SELECT * FROM pro_catories");
                            if(mysqli_num_rows( $result_1)>0){
                                while($row = mysqli_fetch_array($result_1)) {
                                ?>
                                <ul>
                                    <li style="list-style-type: disc; margin-left:20px;">
                                        <div class="row">
                                        <div class="col-5">
                                            <a href="item.php?id=<?php echo "$row[id]"; ?>">
                                            <?php echo "$row[name]"; ?></a>
                                        </div>
                                    </li>
                                    <div class="col" style="padding:4px" align="right">
                                        <a class="badge badge-pill badge-dark" href="update.php?id=<?php echo"$row[id]"; ?>">Update</a>&nbsp;&nbsp;
                                        <a class="badge badge-pill badge-danger" onclick="javascript: return confirm('Please confirm ur delete?');" 
                                        href="delete.php?id=<?php echo "$row[id]"; ?>">Delete</a>
                                    </div>
                                </ul>
                                <?php    
                                }
                            }
                        ?>
                        <a  class="badge badge-pill badge-primary btn-lg" href="AddNewCart.php">Add new Category</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");

}
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
 