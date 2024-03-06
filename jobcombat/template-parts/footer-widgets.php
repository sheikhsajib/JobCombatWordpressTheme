<footer class="full footerbg" data-aos="fade-up">
	<div class="container">
		<aside class="row">
			<aside class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="fade-up">
				<aside class="footer_widgets">
					<?php if (!is_category()) { ?>


						<div class="recent-posts">

							<div class="related-posts-after-content">
								<?php
								$orig_post = $post;
								global $post;
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
									$tag_ids = array();
									foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
									$args = array(
										"tag__in" => $tag_ids,
										"post__not_in" => array($post->ID),
										"posts_per_page" => 5, // Number of related posts to display.
										"caller_get_posts" => 1
									);
									$tag_based_post = new wp_query($args); ?>
									<h2><?php _e("You Might Also Like", "job_combat"); ?></h2>

									<?php while ($tag_based_post->have_posts()) {
										$tag_based_post->the_post();
									?>
										<div class="row d-flex align-items-center recent_posts_item">
											<figure class="col-4 footer_recent_post_thumb">
												<?php if (has_post_thumbnail()) {
													the_post_thumbnail();
												} ?>
											</figure>
											<div class="col-8 footer_recent_post_title">
												<h4>
													<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
												</h4>
											</div>
										</div>
										<!-- End recent post item-->
								<?php }
								}
								$post = $orig_post;
								wp_reset_query();
								?>
							</div>


							<?php // if (is_active_sidebar('footer_widget_1')) {
							// dynamic_sidebar('footer_widget_1');
							// } 
							?>
						</div>
					<?php } ?>
				</aside><!-- Widget -->
			</aside><!-- Col -->

			<aside class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="fade-up">
				<aside class="footer_widgets">
					<div class="recent-posts">
						<div class="recent-posts">
							<h2><?php _e("Recent Posts", "job_combat"); ?></h2>
							<?php
							// Define our WP Query Parameters
							$footer_recent_posts = new WP_Query('posts_per_page=5');
							while ($footer_recent_posts->have_posts()) : $footer_recent_posts->the_post();
								// Display the Post Title with Hyperlink
							?>
								<div class="row d-flex align-items-center recent_posts_item">
									<figure class="col-4 footer_recent_post_thumb">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									</figure>
									<div class="col-8 footer_recent_post_title">
										<h4>
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
										</h4>
									</div>
								</div>
								<!-- End recent post item-->
							<?php
							// Repeat the process and reset once it hits the limit
							endwhile;
							wp_reset_postdata();
							?>
						</div>

					</div>
				</aside><!--Widget -->
			</aside><!--Col -->


			<aside class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="fade-up">
				<aside class="footer_widgets">
					<div class="recent-posts">
						<?php
						$args = [
							'post_type' => 'post',
							'posts_per_page' => 3,
							'post_status' => 'publish',
							'category_name' => 'job-circulars',
							'meta_key' => 'post_views_count',
							'orderby' => 'meta_value_num',
							'order' => 'desc'
						];
						$popular = new WP_Query($args);
						if ($popular->have_posts()) { ?>
							<h2><?php _e("Popular Circulars", "job_combat"); ?></h2>
							<?php while ($popular->have_posts()) {
								$popular->the_post();
							?>
								<div class="row d-flex align-items-center recent_posts_item">
									<figure class="col-4 footer_recent_post_thumb">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									</figure>
									<div class="col-8 footer_recent_post_title">
										<h4>
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
										</h4>
										<p><?php
											//add single.php  file to increase view count
											// jc_get_views_post(get_the_ID());
											//Display total view count
											echo jc_get_post_views(get_the_ID());
											?> Players Participated</p>
									</div>
								</div>
								<!-- End recent post item-->
						<?php }
							wp_reset_postdata();
						}
						?>
					</div>
				</aside><!--Widget -->
			</aside><!--Col -->

			<aside class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="fade-up">
				<aside class="footer_widgets">
					<?php if (is_active_sidebar('footer_widget_3')) {
						dynamic_sidebar('footer_widget_3');
					} ?>
					<div class="recent-posts">

						<?php
						$catArgs = array(
							'category__in' => wp_get_post_categories($post->ID),
							'posts_per_page' => 5, //display number of posts
							'post_status' => 'publish',
							'orderby' => 'rand', //display random posts
							'post__not_in' => array($post->ID)
						);
						$cat_post_query = new WP_Query($catArgs);
						if ($cat_post_query->have_posts()) { ?>
							<h2 class="mt-3"><?php _e("Related Posts", "job_combat"); ?></h2>
							<?php
							while ($cat_post_query->have_posts()) {
								$cat_post_query->the_post(); ?>
								<div class="row d-flex align-items-center recent_posts_item">
									<figure class="col-4 footer_recent_post_thumb">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} ?>
									</figure>
									<div class="col-8 footer_recent_post_title">
										<h4>
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
										</h4>
										<p><?php
											//add single.php  file to increase view count
											// jc_get_views_post(get_the_ID());
											//Display total view count
											echo jc_get_post_views(get_the_ID());
											?> Players Participated</p>
									</div>
								</div>
								<!-- End recent post item-->
						<?php }
							wp_reset_postdata();
						}
						?>
					</div>
					<?php  ?>

				</aside><!--Widget -->
			</aside><!--Col -->

		</aside><!-- Widgets -->


	</div>
</footer>