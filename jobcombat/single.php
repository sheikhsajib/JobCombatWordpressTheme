<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>

<div class="quiz_counter text-center">
	<?php if ('post' == get_post_type()) { ?>
		<div class="total_quiz_counter"> <span class="total_Question">0</span></div>
	<?php } ?>

	<div class="right_answer_counter"> <span class="correct-answer-count">0</span></div>
	<div class="wrong_answer_counter"> <span class="incorrect-answer-count">0</span></div>
</div>

<article class="full">
	<article class="container">

		<div class="row d-flex justify-content-center mt-4">

			<div class="col-md-8 card">
				<?php while (have_posts()) :
					the_post();
				?>

					<div class="single_blog_article  card-body">
						<h1 class="single_blog_heading "> <?php the_title(); ?> </h1>
						<?php if ('post' == get_post_type()) { ?>
							<div class="row d-flex justify-content-between">
								<div class="col-4 float-start"><span class="badge bg_col_4th text-light"> Exam date <?php echo get_the_date('j M, y'); ?> </span> </div>
								<div class="col-4 float-end"><span class="badge bg_col_5th text-light float-end"> Updated <?php echo get_the_modified_date('j M, y'); ?> </span> </div>
							</div>
						<?php } ?>

						<figure class="single_featured_img card">
							<?php the_post_thumbnail("single_featured"); ?>
						</figure>

						<div class="">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; ?>

				<!-- <div class="author card-body">
					<div class="author_image">
						<?php // echo get_avatar(get_the_author_meta("ID")); 
						?>
					</div>
					<div class="author_detail">
						<h4 class="author_name">
							<?php // echo get_the_author_meta("display_name"); 
							?>
						</h4>
						<p class="author_bio">
							<?php // echo get_the_author_meta("description"); 
							?>
						</p>
					</div>
				</div> -->
				<!-- Single Post Author Meta=> get_the_author_meta();-->

				<div class="comments">
					<?php comments_template(); ?>
				</div>
			</div>


			<?php if (is_active_sidebar('single_sidbar_widget')) {
			?>
				<div class="col-md-4 pb-4 d-flex justify-content-center" data-aos="fade-up">
					<div>
						<!-- ======= Counts Section ======= -->
						<div class="card text-center m-auto">
							<div class="card-body">
								<h5 class="card-title">
									<?php esc_html_e("Don't worry! You are not alone, The Model Test is Attended by more ", "job_combat"); ?>
								</h5>

								<h3 class="p-2 bg-warning m-auto d-inline-block" style=" border-radius:5px">
									<span data-purecounter-start="0" data-purecounter-end="<?php //add single.php  file to increase view count
																							jc_get_views_post(get_the_ID());
																							//Display total view count
																							echo jc_get_post_views(get_the_ID()); ?>" data-purecounter-duration="1" class="purecounter"></span>
								</h3>
								<h5>
									<?php esc_html_e(' Participants', 'job_combat'); ?>
								</h5>
							</div>
						</div>

						<div class="sidebar_widgets mt-4">
							<aside class="">
								<div class="single_blog_sidbar">
									<?php dynamic_sidebar('single_sidbar_widget'); //Follow Me Widget

									?>
								</div>
							</aside> <!--Single Widget-->
						</div> <!--stick Part-->
						<div class="sidebar_hire sticky-top stick_top_100">
							<aside class="">
								<div class="single_blog_sidbar">

								</div>
							</aside> <!--Single Widget-->
						</div> <!--stick Part-->


					</div>
				</div>
			<?php } ?>
			<!-- Advertisment Part -->
		</div>
	</article>
</article>



<?php get_template_part('template-parts/service'); ?>

<?php get_template_part('template-parts/footer-widgets'); ?>
<?php get_template_part('template-parts/footer-copy'); ?>

<?php get_footer();
