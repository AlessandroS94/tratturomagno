<?php 
/**
 * Comment Form navigation
 *
 * @package imroz
 */
?>
<nav class="comment-navigation" role="navigation">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="post-link-nav">
				<i class="rbt feather-arrow-left"></i>
				<?php previous_comments_link( esc_html__( 'Older Comments', 'imroz' ) ) ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<div class="post-link-nav">
				<?php next_comments_link( esc_html__( 'Newer Comments', 'imroz' ) ) ?>
				<i class="rbt feather-arrow-right"></i>
			</div>
		</div>
	</div><!-- .row -->
</nav>