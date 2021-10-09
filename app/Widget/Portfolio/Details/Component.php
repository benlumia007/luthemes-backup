<?php
namespace Luthemes\Widget\Portfolio\Details;
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

        $name    = get_post_meta( get_the_ID(), 'Name', true );
        $version = get_post_meta( get_the_ID(), 'Version', true );
        $release = get_post_meta( get_the_ID(), 'Release Date', true );
        $updated = get_post_meta( get_the_ID(), 'Last Updated', true );
        $type    = get_post_meta( get_the_ID(), 'Type', true );

        echo '<table class="details">';
            echo '<tbody>';
                echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<td>' . $name . '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Release Date</th>';
                    echo '<td>' . $release . '</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Last Updated</th>';
                    echo '<td>' . $updated . '</td>';
                echo '</tr>';
                echo '<tr>';
                    if ( isset( $type ) ) {
                        echo '<th>Type</th>';
                        echo '<td>' . $type . '</td>';
                    }
                echo '</tr>';
                echo '<tr>';
                    echo '<th>Version</th>';
                    echo '<td>' . $version . '</td>';
            echo '</tr>';
            echo '</tbody>';
        echo '</table>';
    

        echo $args['after_widget']; 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = [];
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }

    public function boot() {
        add_action('widgets_init', function() {
            register_widget( 'Luthemes\\Widget\\Portfolio\\Details\\Component' );
        } );
    }
}