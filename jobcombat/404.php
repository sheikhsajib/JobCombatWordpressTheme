<?php get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>

<section class="page404">
    <video autoplay muted loop class="w-100 page_404_video">
        <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/page404.mp4" type="video/mp4">
    </video>
    <div class="info">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="info404 text-center">
                    <h2 class="py-4"><?php _e("Look like you're lost ", "job_combat"); ?> </h2>
                    <h3 class="py-4"><?php _e(" the page you are looking for not avaible!", "job_combat"); ?> </h3>
                    <a href="<?php echo home_url(); ?>" class="btn-get-started mb-5" data-aos="fade-up" data-aos-delay="200"><?php _e(" Go to Home Page ", "job_combat"); ?> </a>
                </div>
            </div>
        </div>
    </div>

</section>



<?php get_template_part('template-parts/footer-widgets'); ?>
<?php get_template_part('template-parts/footer-copy'); ?>

<?php get_footer(); ?>