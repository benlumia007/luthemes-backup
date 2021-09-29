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

    public function form( $instance ) {
 
        $title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title']  : esc_html__( '', 'luthemes' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'luthemes' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
 
    }
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        };
        
        $portfolios = get_posts( array(
            'post_type'     => 'portfolio',
            'post_status'   => 'publish',
            'include' => array( get_queried_object_id() ),
        
        ) );
        
        if( !empty( $portfolios ) ){
            $taxonomies = [];
            
            foreach( $portfolios as $portfolio ){
                $taxonomies[] = get_the_terms( $portfolio->ID, 'portfolio_category' );
    
            }
    
            $terminologies = [];
    
            foreach( $taxonomies as $categories ) {
                foreach( $categories as $category ) {
                    $terminologies[] = array(
                        'name'      => $category->name,
                        'slug'      => $category->slug
                    );
                }
            }

            $terms = array_unique( $terminologies, SORT_REGULAR) ;
            echo '<ul>';
                foreach ( $terms as $term ) {
                    echo '<li>' . $term['name'] . '</li>';
                }
            echo '</ul>';
        }

        echo $args['after_widget']; 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = [];
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }

    public function boot() {
        add_action('widgets_init', function() {
            register_widget( 'Luthemes\\Widget\\Portfolio\\Component' );
        } );
    }
}