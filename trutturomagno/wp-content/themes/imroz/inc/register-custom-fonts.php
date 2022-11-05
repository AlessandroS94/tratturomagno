<?php
/**
 * Register custom fonts.
 */

if ( !function_exists( 'rbt_fonts_url' ) ) :
    function rbt_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Nunito+Sans Sans, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'imroz' ) ) {
            $fonts[] = 'Montserrat:400,400i,500,600,700,800,900';
        }

        /* translators: If there are characters in your language that are not supported by Nunito+Sans Sans, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'imroz' ) ) {
            $fonts[] = 'Poppins:300,400,500,600,700,700i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw($fonts_url);
    }
endif;

