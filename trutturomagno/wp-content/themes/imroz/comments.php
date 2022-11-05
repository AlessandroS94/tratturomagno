<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imroz
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if( post_password_required() ){
	return;
} 

?>
<div id="comments" class="comments-area">
	<div class="leave-comment-form">
        <?php
        if( have_comments() ):
            echo '<div class="imroz-blog-comment mt--40 mt_md--40 mt_sm--30">';
            $comments_number = absint( get_comments_number() );
            ?>
            <h4 class="comment-title mb--40 theme-gradient">
                <?php
                if ( ! have_comments() ) {
                    esc_html_e( 'Leave a comment', 'imroz' );
                } elseif ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'imroz' ), esc_html( get_the_title() ) );
                } else {
                    echo sprintf(
                    /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s reply on &ldquo;%2$s&rdquo;',
                            '%1$s replies on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'imroz'
                        ),
                        number_format_i18n( $comments_number ),
                        esc_html( get_the_title() )
                    );
                }

                ?>
            </h4>

            <ul class="comment-list">
                <?php
                wp_list_comments(
                    array(
                        'style'     => 'ul',
                        'callback'  => 'imroz_comment',
                        'type'      => 'all',
                        'format'    => current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
                    )
                );
                ?>
            </ul>

            <?php imroz_get_post_navigation(); ?>

            <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
                ?> <p class="no-comments alert alert-warning"><?php echo esc_html__( 'Comments are closed.', 'imroz' ); ?></p> <?php
            endif; ?>

            <?php
            echo '</div>';
        endif;
        ?>
        <div class="imroz-comment-form mt--40 mt_md--40 mt_sm--30">
            <div class="comment-box-inner">
                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = ( $req ? 'required aria-required="true"' : '' );
                $aria_req_star = ( $req ? '*' : '' );
                $consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

                $fields = array(

                    'author' =>
                        '<div class="row"><div class="col-12 col-md-4"><div class="form-group"><input id="author" name="author" type="text" placeholder="'.esc_attr__('Full Name', 'imroz').' '. $aria_req_star .'" value="' . esc_attr( $commenter['comment_author'] ) . '" '. $aria_req .' /></div></div>',
                    'email' =>
                        '<div class="col-12 col-md-4"><div class="form-group"><input id="email" name="email" class="input_half" type="email" placeholder="'.esc_attr__('Email ', 'imroz').' '. $aria_req_star .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" '. $aria_req .' /></div></div>',
                    'url' =>
                        '<div class="col-12 col-md-4"><div class="form-group"><input id="url" name="url" type="text"  placeholder="'.esc_attr__('Website', 'imroz').'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'

                );

                $args = array(
                    'class_submit' => 'imroz-button btn-large btn-transparent',
                    'label_submit' => esc_html__( 'Post Comment', 'imroz' ),
                    'comment_field' =>
                        '<div class="row"><div class="col-12 col-md-12"><div class="form-group"><textarea id="comment" name="comment" rows="5" placeholder="'.esc_attr__('Write your comment here… ', 'imroz').' '. $aria_req_star .'" required aria-required="true"></textarea></div></div></div>',
                    'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                    'title_reply' => esc_html__('Leave a Reply','imroz'),
                    'format'            => 'xhtml'
                );

                comment_form( $args );

                ?>
            </div>
        </div>
	</div>
</div><!-- .comments-area -->