<?php
/**
 * @package imroz
 */
if( !class_exists('imroz_Recent_Post') ){
    class imroz_Recent_Post extends WP_Widget{
        /**
         * Register widget with WordPress.
         */
        function __construct(){

            $widget_options = array(
                'description'                   => esc_html__('Imroz: Recent post here', 'imroz'),
                'customize_selective_refresh'   => true,
            );

            parent:: __construct('imroz_Recent_Post', esc_html__( 'Imroz: Recent Post', 'imroz'), $widget_options );

        }
        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance){

            if ( ! isset( $args['widget_id'] ) ) {

            $args['widget_id'] = $this->id;

        }
        
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts','imroz' );
        
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $show_item = ( ! empty( $instance['show_item'] ) ) ? absint( $instance['show_item'] ) : 3;
        $num_title_word = ( ! empty( $instance['num_title_word'] ) ) ? absint( $instance['num_title_word'] ) : 7;

    
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : true;
        $show_read_time = isset( $instance['show_read_time'] ) ? $instance['show_read_time'] : true;


            echo $args['before_widget']; 
            if( $title ): 
            echo $args['before_title'];  
            echo esc_html( $title );  
            echo $args['after_title']; 
            endif; 

                $posts = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => $show_item,
                    'ignore_sticky_posts' => 1
                ));

                ?>
               <div class="inner">
                    <?php

                    while($posts->have_posts()) : $posts->the_post();  ?>
                        <div class="small-post">
                            <?php if ( has_post_thumbnail()): ?>
                                <div class="thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
                                </div>
                            <?php endif ?>
                            <div class="content">
                                <h6><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $num_title_word,' '); ?></a></h6>
                                <?php
                                if($show_date && $show_read_time){ ?>
                                    <ul class="blog-meta">
                                        <?php if ($show_date): ?>
                                            <li><?php echo get_the_time(get_option('date_format')); ?></li>
                                        <?php endif ?>
                                        <?php if ($show_read_time):
                                            if (function_exists('imroz_content_estimated_reading_time')){ ?>
                                                <li><?php echo imroz_content_estimated_reading_time(get_the_content()); ?></li>
                                            <?php  } ?>
                                        <?php endif ?>
                                    </ul>
                                <?php }  ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>

            <?php echo $args['after_widget']; ?>
            
            <?php wp_reset_postdata();
        }
        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field( $new_instance['title'] );
            $instance['show_item'] = (int) $new_instance['show_item'];
            $instance['num_title_word'] = (int) $new_instance['num_title_word'];
            $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */

        public function form( $instance ) {
        $title              = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $show_item          = isset( $instance['show_item'] ) ? absint( $instance['show_item'] ) : 3;
        $num_title_word     = isset( $instance['num_title_word'] ) ? absint( $instance['num_title_word'] ) : 7;
        $show_date          = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
        $show_read_time          = isset( $instance['show_read_time'] ) ? (bool) $instance['show_read_time'] : true;
    ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:','imroz' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'show_item' )); ?>"><?php echo esc_html__( 'No. of Item of posts to show:','imroz' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'show_item' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_item' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($show_item); ?>" size="3" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'num_title_word' )); ?>"><?php echo esc_html__( 'Title Word','imroz' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr(esc_attr($this->get_field_id( 'num_title_word' ))); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_title_word' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($num_title_word); ?>" size="3">
        </p>
        
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?','imroz' ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $show_read_time ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_read_time' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_read_time' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_read_time' )); ?>"><?php echo esc_html__( 'Display Read Time?','imroz' ); ?></label>
        </p>
    <?php
        }
    }
}



// register Contact  Widget widget
function imroz_Recent_Post(){
    register_widget('imroz_Recent_Post');
}
add_action('widgets_init','imroz_Recent_Post');
