<?php 
/**
 * Style Switcher
 */

$imroz_options = Helper::imroz_get_options();
$header_layout = Helper::imroz_header_layout();
$header_area = $header_layout['header_area'];
$header_style = $header_layout['header_style'];

if (isset($imroz_options['show_ld_switcher_form_user_end'])) {
    if ($imroz_options['show_ld_switcher_form_user_end'] === 'on' || $imroz_options['show_ld_switcher_form_user_end'] == 1) {
        ?>
        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sun-01.svg" alt="Sun images">
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/vector.svg" alt="Vector Images">
                    </a>
                </li>
            </ul>
        </div>
        <?php
    }
}
?>