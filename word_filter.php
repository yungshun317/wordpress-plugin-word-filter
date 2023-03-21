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
            $main_page_hook = add_menu_page( 'Words to Filter', 'Word Filter', 'manage_options', 'word_filter', array( $this, 'word_filter' ), 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIGlkPSJf5ZyW5bGkXzIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDExNTkuOTggNTAzLjkyIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6IzNjM2MzZjt9PC9zdHlsZT48L2RlZnM+PGcgaWQ9IkxvZ29fVjJf5ou36LKdIj48Zz48cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Im01NTEuNywxOTUuMzlsLTU2LjU3LDU2LjU3LTEyMS41OSwxMjEuNTljLTY3LjA0LDY3LjA1LTE3Ni4xMyw2Ny4wNS0yNDMuMTgsMC02Ny4wNC02Ny4wNC02Ny4wNC0xNzYuMTQsMC0yNDMuMTgsMzIuNDgtMzIuNDgsNzUuNjYtNTAuMzcsMTIxLjU5LTUwLjM3czg5LjEyLDE3Ljg5LDEyMS41OSw1MC4zN2w2NS4wMyw2NS4wMiw1Ni41Ni01Ni41Ny02NS4wMi02NS4wMkMzODIuNTIsMjYuMjEsMzE5LjI1LDAsMjUxLjk1LDBTMTIxLjM4LDI2LjIxLDczLjc5LDczLjhDMjYuMjEsMTIxLjM5LDAsMTg0LjY2LDAsMjUxLjk2czI2LjIxLDEzMC41Nyw3My43OSwxNzguMTZjNDcuNTksNDcuNTksMTEwLjg2LDczLjgsMTc4LjE2LDczLjhzMTMwLjU3LTI2LjIxLDE3OC4xNi03My44bDEyMS41OS0xMjEuNTksNTYuNTctNTYuNTctNTYuNTctNTYuNTdaIi8+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJtMTAyOS42MSw3My44Qzk4Mi4wMiwyNi4yMSw5MTguNzUsMCw4NTEuNDUsMHMtMTMwLjU3LDI2LjIxLTE3OC4xNiw3My44bC0xMjEuNTksMTIxLjU5LTU2LjU3LDU2LjU3LDU2LjU3LDU2LjU3LDU2LjU3LTU2LjU3LDEyMS41OS0xMjEuNTljMzIuNDgtMzIuNDgsNzUuNjYtNTAuMzcsMTIxLjU5LTUwLjM3czg5LjEyLDE3Ljg5LDEyMS41OSw1MC4zN2MzMi40OCwzMi40OCw1MC4zNyw3NS42Niw1MC4zNywxMjEuNTksMCwzMi4yOS04Ljg0LDYzLjIxLTI1LjM4LDkwLjAyLTYuOTgsMTEuMzMtMTUuMzQsMjEuOTItMjQuOTksMzEuNTctOS43Myw5LjczLTIwLjM0LDE4LjA1LTMxLjU5LDI0Ljk2LTY2LjIzLDQwLjY4LTE1NC4yNywzMi4zNi0yMTEuNTktMjQuOTZsLTY1LjAyLTY1LjAyLTU2LjU3LDU2LjU3LDY1LjAyLDY1LjAyYzQ3LjU5LDQ3LjU5LDExMC44Niw3My44LDE3OC4xNiw3My44LDUzLjc3LDAsMTA0Ljk4LTE2LjczLDE0Ny42Ni00Ny43NCwxMC43NC03Ljc5LDIwLjkzLTE2LjQ5LDMwLjUtMjYuMDZzMTguMjctMTkuNzcsMjYuMDYtMzAuNTFjMzEuMDEtNDIuNjgsNDcuNzQtOTMuODgsNDcuNzQtMTQ3LjY1LDAtNjcuMy0yNi4yMS0xMzAuNTctNzMuOC0xNzguMTZaIi8+PHBvbHlnb24gY2xhc3M9ImNscy0xIiBwb2ludHM9IjkwOC4wMiAyNTEuOTcgMTE1OS45OCA1MDMuOTIgMTA0Ni44NCA1MDMuOTIgNzk0LjkxIDI1MS45NCA5MDguMDIgMjUxLjk3Ii8+PC9nPjwvZz48L3N2Zz4=', 100);
            add_submenu_page( 'word_filter', 'Words to Filter', 'Words List', 'manage_options', 'word_filter', array( $this, 'word_filter' ));
            add_submenu_page( 'word_filter', 'Word Filter Options', 'Options', 'manage_options', 'word_filter_options', array( $this, 'word_filter_options') );
            add_action( "load-{$main_page_hook}", array( $this, 'main_page_assets') );
        }

        function handle_form() {
            if ( wp_verify_nonce( $_POST['word_filer_nonce'] , 'save_filter_words' ) AND current_user_can( 'manage_options' ) ) {
                update_option( 'plugin_words_to_filter', sanitize_text_field( $_POST['plugin_words_to_filter'] ) ); ?>
                <div class="updated">
                    <p>Your filtered words were saved.</p>
                </div>
            <?php } else { ?>
                <div class="error">
                    <p>Sorry, you do not have permission to perform that action.</p>
                </div>
            <?php }
        }

        function word_filter() {
            ?>
            <div class="wrap">
                <h1>Word Filter</h1>
                <?php if ( $_POST['just_submitted'] == 'true' ) $this->handle_form(); ?>
                <form method="POST">
                    <input type="hidden" name="just_submitted" value="true">
                    <?php wp_nonce_field( 'save_filter_words', 'word_filter_nonce') ?>
                    <label for="plugin_words_to_filter"><p>Enter a <strong>comma-separated</strong> list of words to filter from your site's content.</p></label>
                    <div class="word-filter__flex-container">
                        <textarea name="plugin_words_to_filter" id="plugin_words_to_filter" placeholder="bad, mean, awful, horrible">
                            <?php echo esc_textarea( get_option( 'plugin_words_to_filter' ) ); ?>
                        </textarea>
                    </div>
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                </form>
            </div>
            <?php
        }

        function word_filter_options() {
            ?>
            Hello world from the option page.
            <?php
        }

        function main_page_assets() {
            wp_enqueue_style( 'word_filter_admin_css', plugin_dir_url( __FILE__ ) . 'styles.css' );
        }
    }

    $word_filter = new Word_Filter();
}