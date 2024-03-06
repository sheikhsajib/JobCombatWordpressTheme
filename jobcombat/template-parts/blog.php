<article class="full">
	<article class="container" data-aos="fade-up">

		<h2 class="text-center py-4">
			<?php
			if (is_category()) {
				echo single_cat_title();
			} elseif (is_page()) {
				the_title();
			} else {
			?>
				<?php _e("All Circulars and Job Solutions", "job_combat"); ?>

			<?php }
			?>
		</h2>
		<div class="row">
			<div class="col-lg-12 d-flex justify-content-center">
				<ul id="isotop_filter-flters">
					<li data-filter="*" class="filter-active">All</li>
					<?php

					$allCategories = get_categories(array(
						'parent' => 0
					));
					foreach ($allCategories as $category) {
						$catname = $category->cat_name;
						$catId = $category->cat_ID;
						echo '<li data-filter=".catId' . $catId . '">' . $catname . '</li>';
					}
					?>

				</ul>
			</div>
		</div>
		<div class="row isotop_filter-container">
			<?php
			// the Portfloio Posts Query including Child category
			// start the wordpress loop For Category Post!
			if (have_posts()) :
				while (have_posts()) :	the_post(); 	// create our link now that the post is setup ? 
			?>
					<div class="col-lg-4 col-md-6 col-sm-12 mb-4 isotop_filter-item <?php
																					foreach ((get_the_category()) as $category) {
																						$parent_category_id = $category->parent;
																						$catId = $category->cat_ID;

																						echo 'catId' . $catId . ' catId' . $parent_category_id . " ";
																					}
																					?> ">
						<a href="<?php the_permalink(); ?>">
							<div class="card card_hover" style="text-align: justify;">
								<?php if (has_post_thumbnail()) { ?>
									<figure class="featured_img card card_hover">
										<?php the_post_thumbnail(); ?>

									</figure>
								<?php } ?>

								<div class="card-body">
									<h3>
										<?php the_title(); ?>
									</h3>
									<div>
										<p><?php echo excerpt('18'); ?></p>
										<div class="d-flex align-items-center flex-wrap">
											<span class="badge bg_col_1st text-light"><?php the_category(' , '); ?></span>
											<span class="badge bg_col_4th text-light"> Exam date <?php echo get_the_date('j M, y'); ?> </span>
											<span class="badge bg_col_5th text-light"> Updated <?php echo get_the_modified_date('j M, y'); ?> </span>
										</div>
										<?php // comments_popup_link("No Comment", "1 Comment", "% Comments", "job_combat_comment_class", "Comment Block"); 
										?>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php
				endwhile;
			else : ?>

				<div class="full">
					<div class="container">
						<div class="row">
							<p><?php _e("Sorry, no posts matched in Blog criteria.", "job_combat"); ?></p>
						</div>
					</div>
				</div>
			<?php endif; //All Posts Loop Done 
			?>


		</div>
	</article>
</article>