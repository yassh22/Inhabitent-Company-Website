<?php
/**
 * Plugin Name
 *
 * @package     Business_hours
 * @author      Yash
 * @copyright   2019 RH
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Business Hours Display
 * Description: Lets users add their store business hours.
 * Version:     1.0.0
 * Author:      Yash
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

//Prevent direct file access
if( ! defined ('ABSPATH')) {
    exit;
}

class Business_Hours extends WP_Widget {
    protected $widget_slug = 'biz-hours';

    public function __construct() {
        parent::__construct(
            $this->get_widget_slug(),
            'Business Hours Display',
            array(
                'classname' => $this->get_widget_slug() . '-class',
                'description' => "Add the store's business hours."
            )
        );
    }

    public function get_widget_slug() {
        return $this->widget_slug;
    }

    public function widget($args, $instance) {
        if( ! isset( $args['widget_id'])) {
            $args['widget_id'] = $this->$id;
        }

        extract($args, EXTR_SKIP);

        $widget_string = $before_widget;

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $mon_fri = empty($instance['mon_fri']) ? '' : apply_filters('mon_fri', $instance['mon_fri']);
        $sat = empty($instance['sat']) ? '' : apply_filters('sat', $instance['sat']);
        $sun = empty($instance['sun']) ? '' : apply_filters('sun', $instance['sun']);

        ob_start();

        if($title) {
            $widget_string .= $before_title;
            $widget_string .= $title;
            $widget_string .= $after_title;
        }

        include( plugin_dir_path(__FILE__) . 'views/widget.php');
        $widget_string .= ob_get_clean();
        $widget_string .= $after_widget;

        print $widget_string;
    }
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['mon_fri'] = strip_tags($new_instance['mon_fri']);
        $instance['sat'] = strip_tags($new_instance['sat']);
        $instance['sun'] = strip_tags($new_instance['sun']);

        return $instance;
    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title' => 'Business Hours',
                'mon_fri' => '',
                'sat' => '',
                'sun' => ''
            )
        );

        $title = strip_tags($instance['title']);
        $mon_fri = strip_tags($instance['mon_fri']);
        $sat = strip_tags($instance['sat']);
        $sun = strip_tags($instance['sun']);

        include(plugin_dir_path(__FILE__) . 'views/admin.php');

    }
}

add_action('widgets_init', function() {
    register_widget('Business_Hours');
});

 ?>