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
        };
        
        $get_all_posts = get_posts( array(
            'post_type'     => 'portfolio',
            'post_status'   => 'publish',
            'include' => array( get_queried_object_id() ),
        
        ) );
        
        if( !empty( $get_all_posts ) ){
            $post_terms = [];
            
            foreach( $get_all_posts as $all_posts ){
                $post_terms[] = get_the_terms( $all_posts->ID, 'portfolio_category' );
    
            }
    
            $post_terms_array = [];
    
            foreach($post_terms as $new_arr){
                foreach($new_arr as $arr){
                    $post_terms_array[] = array(
                        'name'      => $arr->name,
                        'slug'      => $arr->slug
                    );
                }
            }

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