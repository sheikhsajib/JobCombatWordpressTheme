<?php
// the Portfloio Posts Query
$portfolio_posts_query = new WP_Query(array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => 'portfolio',
	'posts_per_page' => is_home() ? 3 : get_option('posts_per_page'),
));

if ($portfolio_posts_query->have_posts()) : ?>
	<!-- ======= Portfolio Section ======= -->
	<section id="" class="portfolio">
		<div class="container">
			<h2 class="text-center py-4">
				<a href="<?php
							$port_slug = get_category_by_slug('portfolio');
							$port_link = get_category_link($port_slug);
							echo esc_url($port_link); ?>"><?php _e("My Portfolios", "job_combat"); ?></a>
			</h2>
			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-12 d-flex justify-content-center">
					<ul id="portfolio-flters">
						<li data-filter="*" class="filter-active">All</li>
						<?php
						$portfolioCategories = get_categories(
							array('parent' => get_cat_ID('portfolio'))
						);
						foreach ($portfolioCategories as $category) {
							$catname = $category->cat_name;
							$catId = $category->cat_ID;
							echo '<li data-filter=".catId' . $catId . '">' . $catname . '</li>';
						}
						?>

					</ul>
				</div>
			</div>
			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200"> <!-- the loop -->
				<?php
				while ($portfolio_posts_query->have_posts()) :
					$portfolio_posts_query->the_post();
				?>
					<div class="col-lg-4 col-md-6 portfolio-item catId<?php
																		foreach ((get_the_category()) as $category) {
																			$postcat = $category->cat_ID;
																			//$catname = $category->cat_name;
																			echo $postcat;
																		}
																		?> ">
						<div class="portfolio-wrap">
							<?php if (has_post_thumbnail()) { ?>
								<?php the_post_thumbnail(); ?>
							<?php } ?>
							<div class="portfolio-info">
								<?php
								/* grab the url for the full size featured image */
								$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
								?>
								<a href="<?php echo esc_url($featured_img_url); ?>" class="portfolio-lightbox" style="height: 100%; width:100%">
									<div style="height: 100%; width:100%">View Image</div>
								</a>
								<h2><a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a></h2>
								<p>
									<span class="badge bg-success"><?php
																	foreach ((get_the_category()) as $category) {
																		$catname = $category->cat_name;
																		echo $catname;
																	}
																	?></span>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<div class="full">
		<div class="container">
			<div class="row">
				<p><?php _e('Sorry, no posts matched in Portfolio criteria.', "job_combat"); ?></p>
			</div>
		</div>
	</div>
<?php endif; ?>