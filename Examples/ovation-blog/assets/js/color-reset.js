(function($) {
    function resetColorsToDefault() {
        // Define default values for your color settings
        const defaultColors = {
            'background_color': '#ffffff',
            'ovation_blog_primary_color': '#7eaf83',
            'ovation_blog_top_head_color': '#fafafa',
            'ovation_blog_heading_color': '#323232',
            'ovation_blog_text_color': '#a8a8a8',
            'ovation_blog_primary_fade' :'#cddfcf',
            'ovation_blog_footer_bg': '#323232',
            'ovation_blog_post_bg': '#ffffff',
        };

        // Iterate over each setting and set it to its default value
        for (let settingId in defaultColors) {
            wp.customize(settingId).set(defaultColors[settingId]);
        }

        // Optionally refresh the preview
        wp.customize.previewer.refresh();
    }

    // Attach reset function to global scope
    window.resetColorsToDefault = resetColorsToDefault;

    $(document).ready(function() {
        $('.color-reset-btn').val('RESET'); // This adds the 'RESET' text inside the button
    });
})(jQuery);