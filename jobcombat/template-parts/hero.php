<div class="full hero_bg nav_head_room">
	<div id="hero_container" class="container">
		<div class="row <?php echo get_theme_mod('job_combat_menu_position'); ?>">
			<div class="col-md-4">
				<div class="d-flex justify-content-between align-items-center">
					<?php
					if (current_theme_supports("custom-logo")) {
					?>
						<div class="logo ">
							<?php the_custom_logo("custom-logo"); ?>
						</div> <!--Site Logo Side-->
					<?php
					}
					?>
					<div class="heading ">
						<h1>
							<a href="<?php echo home_url(); ?>">
								<?php bloginfo('name'); ?>
							</a>
						</h1>
					</div><!-- Site Title -->
					<nav class="navbar navbar-expand-md">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</nav>
				</div><!-- row-->
			</div><!-- Brand Side-->

			<nav class="col-md-8 navbar navbar-expand-md p-0">
				<div class="container">
					<div class="collapse navbar-collapse" id="main-menu">
						<form class="my-2 me-3">
							<?php get_search_form(); ?>
						</form>
						<div class="gazi_main_menu d-flex align-items-center">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => '',
								'fallback_cb' => '__return_false',
								'items_wrap' => '<ul id="%1$s" class="w-100 navbar-nav me-auto %2$s">%3$s</ul>',
								'depth' => 2,
								'add_li_class'	=> '',
								'walker' => new bootstrap_5_wp_nav_menu_walker()
							));
							?>
						</div>
					</div>
				</div>
			</nav><!-- Menu Side-->
		</div>
	</div>
</div>