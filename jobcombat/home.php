<?php get_header();

// Blog Page Using This Template as heirarcy;
?>
<?php get_template_part('template-parts/hero'); ?>

<?php get_template_part('template-parts/custom-quizzes'); ?>

<?php get_template_part('template-parts/blog'); ?>

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

<?php get_template_part('template-parts/footer-widgets'); ?>
<?php get_template_part('template-parts/footer-copy'); ?>

<?php get_footer(); ?>