<section id="hero" class="hero  ">
	<div class="info d-flex align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center my_title">
					<h4> <?php _e("Hi, I'm", "job_combat"); ?> </h4>
					<h2 data-aos="fade-down"><?php the_title(); ?></h2>
					<h3><?php _e("Pro", "job_combat"); ?><span class="typer" id="main" data-words="<?php bloginfo('description'); //use comma on tagline Dashboard For showing Typing Effect
																									?>" data-delay="100" data-deleteDelay="1000">
						</span>
						<span class="cursor" data-owner="main"></span>
					</h3>

					<a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started mb-5"> Check Me Out</a>
				</div>
			</div>
		</div>
	</div>

</section>





<section class="full wow fadeIn">
	<div class="container">
		<div class="row ">
			<?php if (get_header_image()) : ?>
				<div class="col-md-6">
					<div class="my_img">
						<img src="<?php header_image(); ?>" alt="" />
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>