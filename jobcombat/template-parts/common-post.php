<?php if (have_posts()) : ?>
	<article class="full wow fadeInUp">
		<article class="container">
			<div class="row">

				<?php while (have_posts()) :
					the_post();
				?>
					<div class="page_article mb-4">
						<div class="article">
							<?php if (has_post_thumbnail()) { ?>
								<figure class="featured_img">
									<?php the_post_thumbnail(); ?>
								</figure>
							<?php }
							get_template_part("post-formats/content", get_post_format()); ?>
							<h1>
								<?php the_title(); ?>
							</h1>
							<div class="excertp_post">

								<?php echo the_content(); ?>

							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</article>
	</article>
	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<div class="full">
		<div class="container">
			<div class="row">
				<p><?php _e("Sorry, no posts matched in Blog criteria.", "job_combat"); ?></p>
			</div>
		</div>
	</div>
<?php endif; ?>