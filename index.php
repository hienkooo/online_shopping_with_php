<?php
	include("indexnav.php");
	include("DBconnect.php");
?>
<!--==========================================
=            All Category Section            =
===========================================-->

<section row=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
				</div>
				<div class="row">
					<?php
					$result = mysqli_query($conn,"SELECT * FROM pro_catories")
					or die(mysqli_error($conn));
					while($rows = mysqli_fetch_array($result)){
						?>
						<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-laptop icon-bg-1"></i> 
								<h4><?php echo $rows["name"]; ?></h4>
							</div>
							<?php
								$result2 = mysqli_query($conn,"SELECT brand, COUNT(brand)
								 AS Counter FROM items WHERE category_id ='$rows[id]' GROUP BY brand")
								 or die(mysqli_error($conn));

								 while($row = mysqli_fetch_array($result2)){?>
									<ul class="category-list" >
										<li><a href="showitems.php? id=<?php echo $row['brand']; ?>
										& id2=<?php echo $rows['id']; ?>  ">
										<?php echo $row['brand']; ?>
										<span><?php echo $row['Counter']; ?></span></a></li>
									</ul>
							<?php
								 }
							?>
							
						</div>
					</div> 
					<?php
					}
					?>
					<!-- Category list -->
					<!-- /Category List -->
					<!-- Category list -->
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->


<?php
	include("indexfooter.php");
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



