<?php
/**
 * File: functions.php
 *
 * Extended functionality for theme.
 *
 * @package Vue_Classic
 */

function vueclassic_styles() {
    $base_url = get_template_directory_uri();
    wp_enqueue_style('vueclassic-styles', $base_url . '/dist/styles.min.css', array(), date("H:i:s"));

    // Enqueue all scripts in this specific order.
    wp_enqueue_script('vueclassic-manifest-script', $base_url . '/dist/manifest.js', array(), date("H:i:s"), true);
    wp_enqueue_script('vueclassic-vendor-scripts', $base_url . '/dist/vendor.js', array(), date("H:i:s"), true);
    wp_enqueue_script('vueclassic-scripts', $base_url . '/dist/main.js', array(), date("H:i:s"), true);
}
add_action('wp_enqueue_scripts', 'vueclassic_styles');
