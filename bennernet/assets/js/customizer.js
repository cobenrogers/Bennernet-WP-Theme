/**
 * Bennernet Theme Customizer Live Preview
 *
 * @package Bennernet
 */

(function($) {
    'use strict';

    // Site title
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    // Site description
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Primary color
    wp.customize('bennernet_primary_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary', to);
        });
    });

    // Primary dark color
    wp.customize('bennernet_primary_dark_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--primary-dark', to);
        });
    });

    // Text color
    wp.customize('bennernet_text_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--text', to);
        });
    });

    // Background color
    wp.customize('bennernet_background_color', function(value) {
        value.bind(function(to) {
            document.documentElement.style.setProperty('--background', to);
        });
    });

    // Header background color
    wp.customize('bennernet_header_bg_color', function(value) {
        value.bind(function(to) {
            $('.site-header').css('background-color', to);
        });
    });

    // Header text color
    wp.customize('bennernet_header_text_color', function(value) {
        value.bind(function(to) {
            $('.site-title a, .site-description').css('color', to);
        });
    });

    // Footer disclaimer
    wp.customize('bennernet_footer_disclaimer', function(value) {
        value.bind(function(to) {
            $('.footer-disclaimer p').html(to);
        });
    });

})(jQuery);
