
<?php
/*
Template Name: Contact Me/Us
*/

 get_header();?>
<?php get_template_part('template-parts/hero');?>
<?php get_template_part('template-parts/common-post');?>


<div class="contact_form">
<?php //Show Contact form 7 here
	if(get_field("contact_form")){
	echo do_shortcode(get_field("contact_form"));
}
?>
</div>




<?php get_template_part('template-parts/footer-copy');?>

<?php get_footer();?>