<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imroz
 */

?>
</main>
<!-- End Page Wrapper -->
<?php
$imroz_options          = Helper::imroz_get_options();
$footer_layout 			= Helper::imroz_footer_layout();
$footer_area 			= $footer_layout['footer_area'];
$footer_style 			= $footer_layout['footer_style'];
if( "no" !== $footer_area && "0" !== $footer_area ){
    get_template_part('template-parts/footer/footer', $footer_style);
}
?>

<?php if($imroz_options['imroz_scroll_to_top_enable'] != 'no'){ ?>
    <!-- Start Top To Bottom Area  -->
    <div class="rn-back-top">
        <i class="feather-arrow-up"></i>
    </div>
    <!-- End Top To Bottom Area  -->
<?php } ?>


</div>
<!-- End main page -->
<?php wp_footer(); ?>
</body>
</html>
