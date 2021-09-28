<?php
namespace Luthemes\Widget\Portfolio;
use Benlumia007\Backdrop\Contracts\Bootable;
use WP_Widget;

class Component extends WP_Widget implements Bootable {
    function __construct() {
 
        parent::__construct(
            'theme-details',  // Base ID
            'Theme Details'   // Name
        ); 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
 
    }
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget">';
            echo esc_html__( $instance['text'], 'text_domain' );
        echo '</div>';
        
        $get_all_posts = get_posts( array(
            'post_type'     => 'portfolio',
            'post_status'   => 'publish',
            'include' => array( get_queried_object_id() ),
        
        ) );
        
            if( !empty( $get_all_posts ) ){
        
                //First Empty Array to store the terms
                $post_terms = array();
                
                //2. Loop through the posts array and retrieve the terms attached to those posts
                foreach( $get_all_posts as $all_posts ){
        
                    /**
                     * 3. Store the new terms objects within `$post_terms`
                     */
                    $post_terms[] = get_the_terms( $all_posts->ID, 'portfolio_category' );
        
                }
        
                //Second Empty Array to store final term data in key, value pair
                $post_terms_array = array();
        
                /**
                 * 4. loop through `$post_terms` as it's a array of term objects.
                 */
        
                foreach($post_terms as $new_arr){
                    foreach($new_arr as $arr){
        
                        /**
                         * 5. store the terms with our desired key, value pair inside `$post_terms_array`
                         */
                        $post_terms_array[] = array(
                            'name'      => $arr->name,
                            'term_id'   => $arr->term_id,
                            'slug'      => $arr->slug
                        );
                    }
                }
        
                //6. Make that array unique as duplicate entries can be there
                $terms = array_unique($post_terms_array, SORT_REGULAR);
                echo '<ul>';
                    foreach ( $terms as $term ) {
                        echo '<li>' . $term['name'] . '</li>';
                    }
                echo '</ul>';
            }

        echo $args['after_widget']; 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }

    public function boot() {
        add_action('widgets_init', function() {
            register_widget( 'Luthemes\\Widget\\Portfolio\\Component' );
        } );
    }
}