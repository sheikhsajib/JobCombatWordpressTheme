<?php
// the query
$quiz_posts_query = new WP_Query(array(
	'post_type' => 'unlimited-quiz',
	'post_status' => 'publish',
));
?>
<?php if ($quiz_posts_query->have_posts()) : ?>

	<article class="full">
		<article class="container" data-aos="fade-up">
			<h2 class="text-center py-4">
				<?php _e("Unlimited Quiz Practice", "job_combat"); ?>
			</h2>
			<div class="row">
				<?php while ($quiz_posts_query->have_posts()) :
					$quiz_posts_query->the_post();	?>

					<div class="my-2 col-6 col-md-4 col-lg-3 text-center custom_quiz">
						<a href="<?php the_permalink(); ?>">
							<div class="custom_quiz_card card_hover">
								<div class="d-flex justify-content-center my-4">
									<figure class="custom_quiz_card_featured_img ">
										<?php the_post_thumbnail(); ?>
									</figure>
								</div>

								<div class="card-body">
									<h3> <?php the_title(); ?> </h3>
								</div>
							</div>
						</a>
					</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</article>
	</article>

<?php endif; ?>