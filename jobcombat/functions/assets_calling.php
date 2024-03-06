<?php
function job_combat_calling_resources()
{
    /*************** Calling Resources ***********************/

    /***************** font Awesome CSS **************************/
    // wp_enqueue_style("font-awesome_css", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css", "", "1.0");
    wp_enqueue_style("jcFontastic_css",  get_template_directory_uri() . '/assets/fonts/jcFontastic/jcFontasticStyles.css', "", VERSION);

    /*************** JQUERY  ************************/
    // jquery wordpress Load It automatically.
    wp_enqueue_script("jquery");




    wp_enqueue_script("draggable_jquery", "//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js", "", "3.6.0", true);
    wp_enqueue_script("draggable_jqueryui", "//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", "draggable_jquery", "1.12.1", true);
    wp_enqueue_script("draggable_touch", "//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js", "draggable_jqueryui", "0.2.3", true);



    /*************** Bootstrap ************************/
    // Bootstrap CSS
    wp_enqueue_style("bootstrap_css", "//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css", "", "5.3.2", "all");
    //Proper js For Bootstrap
    wp_enqueue_script("proper_js", "//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", "js", "1.0", true);
    //Bootstrap_js
    wp_enqueue_script("js_bootstrap", "//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js", "js", "5.3.2", true);







    /*************** CDN AOS Animation on Scroll ************************/
    wp_enqueue_style("AOS_animate", "//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css", "", "2.3.4");
    wp_enqueue_script("AOS_js", "//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js", "", "2.3.4", true);

    /*************** Animation on Scroll Plugin From Local  ************************/
    //Animation on Scroll = AOS assets\extensions\aos\aos.css
    // wp_enqueue_style("aos_css", get_template_directory_uri() . "/assets/extensions/aos/aos.css", "", "2.3.4");
    //AOS Js for animation
    // wp_enqueue_script("aos_js", get_template_directory_uri() . "/assets/extensions/aos/aos.js", "", "2.3.4", true);





    /******* Head Room CDN ***************/
    //Head Room Js CDN
    // wp_enqueue_script("head_room_js", "https://unpkg.com/headroom.js", "", "0.12.0", true);

    /******* Head Room for hide menu on scroll ***************/
    //Head Room Js  + Some CSS + Some JS for Activation
    wp_enqueue_script("head_room_js", get_template_directory_uri() . "/assets/extensions/headroom/headroom.js", "0.12.0", VERSION, true);




    /************* Isotope Gallery For Easy Filter *****************/
    //isotope js Gallery for Portfolio Gallary
    wp_enqueue_script("isotop_filter_js", get_template_directory_uri() . "/assets/extensions/isotope-layout/isotope.pkgd.min.js", "", VERSION, true);
    // wp_enqueue_script("isotop_main", get_template_directory_uri() . "/assets/extensions/isotope/isotope_main.js", "", VERSION, true);




    /***************** Auto Typer For typing Effect *******************/
    //Auto Typer JavaScript File
    // wp_enqueue_script("typer_js", get_theme_file_uri("/assets/js/typer.js"), "", VERSION, true);

    /******* Smooth Scroll For soft Scroolling ***************/
    //Smooth Scroll JS
    wp_enqueue_script("smooth_scroll", get_template_directory_uri() . "/assets/extensions/smooth-scroll/smooth-scroll.js", "", VERSION, true);

    /******* Pure Counter For Counter Animation ***************/
    //Smooth Scroll JS
    wp_enqueue_script("pure_counter_js", get_template_directory_uri() . "/assets/extensions/purecounter/purecounter_vanilla.js", "", VERSION, true);






    /*************** Quiz Design for QSM Plugins    **************/
    wp_enqueue_style('quiz_style_css', get_template_directory_uri() . '/assets/css/qsm_style.css', '', VERSION);


    /***************** Main CSS And JS files *******************/
    // Main Stylesheet
    wp_enqueue_style('main_css', get_template_directory_uri() . '/assets/css/main.css', '', VERSION);
    // Stylesheet
    wp_enqueue_style('style_css', get_stylesheet_uri(), 'null', VERSION);

    //Main JavaScript File
    wp_enqueue_script("main_js", get_template_directory_uri() . "/assets/js/main.js", array('jquery'), VERSION, true);

    // wp_enqueue_script('js', '//code.jquery.com/jquery-3.4.1.min.js', '', '1.0', true);
    //('Unique Name ','File Location directory or location','$Dependency','Version', 'Where to load header or footer if footer type ===> true');
}
add_action("wp_enqueue_scripts", "job_combat_calling_resources");
