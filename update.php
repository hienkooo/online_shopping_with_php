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
                    <form action="#" method="post">
                        <!-- Update category to the database -->
                        <?php
                            $id = $_REQUEST["id"];
                            $result = mysqli_query($conn,"SELECT * FROM pro_catories WHERE 
                            id='$id'");
                            while( $rows = mysqli_fetch_array($result)){
                                ?>
                                <input type="text" name="txt1" placholder="Name"
                            value="<?php echo"$rows[name]"; ?>" class="border p-3 w-100 my-2">
                            <input type="text" name="txt2" placeholder="Descreiption" 
                            value="<?php echo"$rows[description]" ?>" class="border p-3 w-100 my-2">
                            <?php
                                }
                            ?>
                        <button type="submit" name="submit" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Update</button>
                        </fieldset>

                    </form>
                    <?php
                       if(isset($_POST['submit'])){
                           $name = $_POST['txt1'];
                           $des = $_POST['txt2'];
                           mysqli_query($conn,"UPDATE pro_catories SET
                           name='$name',description='$des' WHERE id='$id'");
                           header("location:validate.php");

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