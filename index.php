<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php' ?>

<body class="main-body">
  <main>
	   
  	<?php include 'include/navbar.php' ?>

	<!-- News Feed -->
	<div class="container main-container g-px-10 g-mt-80">

		<!-- Top Row -->
		<div class="row">
            <div class = "col-lg-8 g-pa-10">
				
				<div class = "row g-mx-10 g-mb-10">
					<div class="col-lg-12 col-sm-12 g-pa-0">
						<?php include 'include/classRecruitHome.php' ?>
					</div>
				</div>

				<!-- Guild News -->
				<div class = "row g-mx-10 g-mb-10">
					<div class="col-lg-12 col-sm-12 g-pa-0">
                        <div class="g-brd-around bg-color-black g-bg-black-opacity-0_9 g-rounded-10 g-pa-10">
						  <?php include 'include/guildNews.php' ?>
                        </div>
					</div>
				</div>
				<!-- End Guild News -->

			</div>
			<div class = "col-lg-4 g-pa-10">
				<!-- Run Sales -->
				<div class = "row g-mx-10 g-my-0">
					<div class="col-lg-12 col-sm-12 g-pa-0">
                        
						<article class="text-center g-color-white g-overflow-hidden g-rounded-top-5" >
					     	 <div class="u-block-hover--scale g-min-height-100 g-flex-middle g-bg-cover g-bg-bluegray-opacity-0_3--after g-transition-0_5" data-bg-img-src="img/home/sales.jpg">
					        	<div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-50 g-px-20 bg-black-0-70">
						        	<h4 class="text-uppercase">
						        		Loot & Achievement Sales!
						        	</h4>
					          		<!-- <p class="text-left">
                                        Mythic 5/9 ToS No Loot: 999,999,999,999 gold <br/>
                                        Heroic ToS w/ Personal Loot: 999,999,999 gold <br/>
                                        Fake Price #3: 1 gold
                                    </p> -->
					          		<a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase g-my-10" href="#">
					          			Contact Us!
					          		</a>
					       		</div>
					      	</div>
					    </article>
                        
					</div>
				</div>
				<!-- End Run Sales -->

				<div class = "row g-mx-10 g-my-0">
					
                    <?php include 'include/raidProgress.php' ?>

				</div>

			</div>
		</div>
		<!-- End Top Row -->

	</div>  
	<!-- End News Feed -->
	
  </main>

  <?php include 'include/scripts.php' ?>
  
	<!-- JS Plugins Init. -->
	<script >
		$(document).on('ready', function () {

			// initialization of countdowns
			$.HSCore.components.HSPopup.init('.js-fancybox');
						
		});
	</script>
  
</body>

</html>


	