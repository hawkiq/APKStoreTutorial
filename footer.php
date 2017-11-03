<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 05/09/2017
 * Time: 08:02 م
 * IQ TECH Tutorials
 * Project : apkstore
 * footer.php
 */
?>
<div class="row text-center">
    <div class="col-md-12">
		<div class="jumbotron">
		 Copyright 2017 IQ TECH
		</div>
       
    </div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/material.js"></script>
<script src="js/ripples.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script>
$.material.init();
</script>
<script>
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:false,
		autoplay:true,
		autoplayTimeout:3000,
		lazyLoad: true,
		autoplayHoverPause:false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:6
			}
		}
	});
</script>
</body>
</html>

