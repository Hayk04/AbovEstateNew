<?php
/**
 * Enqueue theme assts
 *
 * @package Abovestate
 */

namespace Abovestate_Theme\Inc;

use ABOVESTATE_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions and filters

        /**
         * Actions.
         */

        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        // Register Styles
        wp_register_style(
            'style-css',
            get_stylesheet_uri(),
            [],
            filemtime(ABOVESTATE_DIR_PATH . '/style.css'),
            'all'
        );

        // Enqueue Styles
        wp_enqueue_style('style-css');
    }

    public function register_scripts()
    {
        // Register Scripts
        wp_register_script(
            'main-js',
            ABOVESTATE_DIR_URI . '/assets/main.js',
            [],
            filemtime(ABOVESTATE_DIR_PATH . '/assets/main.js'),
            true
        );

        // Enqueue Scripts
        wp_enqueue_script('main-js');
    }
}
