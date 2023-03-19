<?php

/*
 * Plugin Name: Word Filter
 * Plugin URI: https://www.wordpress.org/word-counter
 * Description: My plugin's description
 * Version: 1.0
 * Requires at least: 5.6
 * Author: Chouqin Info Co.
 * Author URI: https://www.chouqin.com.tw
 * Text Domain: word-filter
 * Domain Path: /languages
 */

if ( ! defined (  'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Word_Filter' ) ) {
    class Word_Filter {
        function __construct() {
            add_action( 'admin_menu', array( $this, 'admin_menu' ) );
        }

        function admin_menu() {
            add_menu_page( 'Words to Filter', 'Word Filter', 'manage_options', 'word_filter', array( $this, 'word_filter' ), 'dashicons-smiley', 100);
            add_submenu_page( 'word_filter', 'Words to Filter', 'Words List', 'manage_options', 'word_filter', array( $this, 'word_filter' ));
            add_submenu_page( 'word_filter', 'Word Filter Options', 'Options', 'manage_options', 'word_filter_options', array( $this, 'word_filter_options') );
        }

        function word_filter() {
            ?>
            Hello world.
            <?php
        }

        function word_filter_options() {
            ?>
            Hello world from the option page.
            <?php
        }
    }

    $word_filter = new Word_Filter();
}