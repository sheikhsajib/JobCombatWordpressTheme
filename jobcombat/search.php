<?php get_header();

// Blog Page Using This Template as heirarcy;

?>
<?php get_template_part('template-parts/hero'); ?>
<div class="full ">
	<div class="container">
		<div class="row">

			<div class="m-lg-auto blog_cat_menu hero_bg">

				<nav class="">
					<?php
					//blog Home page for define the category vased article
					$blog_cat_menus = array(
						'theme_location' => 'blog_cat_menu',
						'menu_id' => 'menuid',
						'menu_class' => 'navmenu cat_menu collapse d-lg-block'
					);
					wp_nav_menu($blog_cat_menus);
					?>
				</nav>

			</div>
			<a class="menu_toggle px-2 hero_bg d-lg-none" data-toggle="collapse" href=".cat_menu">&#9776;</a>

		</div>
	</div>
</div>

<article class="full wow fadeInUp">

	<div class="text-center mt-1">
		<h2 class="text-center"> You are looking for : <span class="bg-success text-light p-1"> <?php the_search_query(); ?></span></h2>
	</div>

	<?php
	// start the wordpress loop For Category Post!
	if (have_posts()) : ?>

		<article class="container">
			<div class="row">

				<?php while (have_posts()) : the_post();
					// create our link now that the post is setup ?  
				?>



					<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
						<figure class="featured_img">
							<?php the_post_thumbnail(); ?>
						</figure>
						<?php get_template_part("post-formats/content", get_post_format()); ?>
						<h1>
							<a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
							</a>
						</h1>
						<div class="excertp_post">
							<p><?php echo excerpt("30"); ?>
								<a href="<?php the_permalink(); ?>">Read More </a>

								<?php the_category(' , '); ?>
								<?php the_author(); ?>
								<?php comments_popup_link("No Comment", "1 Comment", "% Comments", "job_combat_comment_class", "Comment Block"); ?>
							</p>
						</div>
					</div>

				<?php
				endwhile; ?>
			</div>
		</article>
	<?php
	else : ?>
		<h3 class="text-center text-warning mt-5">
			<?php esc_html_e('Ooopss, looks like nothing matches your result.', "job_combat"); ?>
		</h3>
	<?php endif; //All Posts Loop Done 
	?>




</article>

<div class="full">
	<div class="wrap">
		<div class="pagination">
			<?php
			// Best And Easies Pagination Way Ever;
			echo paginate_links();

			?>
		</div>
	</div>
</div> <!-- padination div -->
<div class="mt-5">
	<?php //get_template_part('template-parts/portfolio');
	?>
</div>
<?php get_template_part('template-parts/service'); ?>


<?php get_footer(); ?>