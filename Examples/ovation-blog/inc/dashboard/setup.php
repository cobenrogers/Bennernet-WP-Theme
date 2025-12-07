<?php //to use wp udpate plugin

    $home_id=''; $blog_id=''; $page_id=''; $about_id='';


    // Function to check if a page with a specific title exists
    function page_exists_by_title($title) {
      $page_query = new WP_Query(array(
          'post_type'   => 'page',
          'title'       => $title,
          'post_status' => 'publish',
          'numberposts' => 1
      ));
      
      if ($page_query->have_posts()) {
          // Return the ID of the first matching page
          $page = $page_query->posts[0];
          return $page->ID;
      }
    
      return false; // Return false if no page found
    }

    //Homepage
    $home_title = 'Home';
    if (!page_exists_by_title($home_title)) {
      $home_content = '';
      $home = array(
        'post_type'    => 'page',
        'post_title'   => $home_title,
        'post_content' => $home_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_name'    => 'home'
      );

      $home_id = wp_insert_post($home);
      
      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');

    }else {
      // Get the ID of the existing page
      $home_id = page_exists_by_title($home_title);

      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');
    }
    


    // Create a Page if it doesn't exist
    if ( !page_exists_by_title('Page') ) {
      $page_title = 'Page';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page'
      );
      $page_id = wp_insert_post($ot_page);
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page');
    }

    if ( !page_exists_by_title('Page Left Sidebar') ) {
      $page_title = 'Page Left Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-left'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/left-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Left Sidebar');
    }

    if ( !page_exists_by_title('Page Right Sidebar') ) {
      $page_title = 'Page Right Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-right'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/right-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Right Sidebar');
    }

    // ------- Create Left Menu --------
    $menuname =  'Main Menu';
    $bpmenulocation = 'primary';
    $menu_exists = wp_get_nav_menu_object( $menuname );

    if (!$menu_exists) {
      // Create the menu
      $menu_id = wp_create_nav_menu($menuname);

      // Add the HOME item
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Home', 'ovation-blog'),
          'menu-item-classes' => 'home',
          'menu-item-url'     => home_url('/index.php/home/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the PAGE item
      $parent_page_item_id = wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Pages', 'ovation-blog'),
          'menu-item-classes' => 'page',
          'menu-item-url'     => home_url('/index.php/page/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the Page Left Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Left Sidebar', 'ovation-blog'),
          'menu-item-classes' => 'page-left',
          'menu-item-url'     => home_url('/index.php/page-left/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      // Add the Page Right Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Right Sidebar', 'ovation-blog'),
          'menu-item-classes' => 'page-right',
          'menu-item-url'     => home_url('/index.php/page-right/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('About Us', 'ovation-blog'),
          'menu-item-classes' => 'about-us',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Shop', 'ovation-blog'),
          'menu-item-classes' => 'shop',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Articles', 'ovation-blog'),
          'menu-item-classes' => 'articles',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));
      
      // Assign the menu to the desired location if not already assigned
      if (!has_nav_menu($bpmenulocation)) {
          $locations = get_theme_mod('nav_menu_locations');
          $locations[$bpmenulocation] = $menu_id;
          set_theme_mod('nav_menu_locations', $locations);
      }
    }
       
    // --------Header------------------------

    set_theme_mod( 'ovation_blog_twitter', 'https://www.twitter.com/' ); 

    set_theme_mod( 'ovation_blog_linkedin', 'https://www.linkedin.com/' ); 

    set_theme_mod( 'ovation_blog_youtube', 'https://www.youtube.com/' ); 

    set_theme_mod( 'ovation_blog_instagram', 'https://www.instagram.com/' ); 

    //-------------- Slider-----------------------

    set_theme_mod('ovation_blog_slider_count','4');

    for($i=1;$i<=4;$i++){

      $title = 'Great Beauty';
      $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Aster ipsum dolor Tur adipiscing elit, sed do eiusmod. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';

      // Create post object
      $ovation_blog_my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
      );

      $ovation_blog_slider_post_id = wp_insert_post($ovation_blog_my_post);

      $ovation_blog_post_image_url = get_template_directory_uri().'/assets/images/slider.jpg';

      $ovation_blog_image_name = 'slider.jpg';
      $ovation_blog_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $ovation_blog_image_data       = file_get_contents($ovation_blog_post_image_url); 
       
      // Get image data
      $ovation_blog_unique_file_name = wp_unique_filename( $ovation_blog_upload_dir['path'], $ovation_blog_image_name ); 
      // Generate unique name
      $filename= basename( $ovation_blog_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $ovation_blog_upload_dir['path'] ) ) {
          $file = $ovation_blog_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $ovation_blog_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $ovation_blog_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $ovation_blog_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'post',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $ovation_blog_attachment, $file, $ovation_blog_slider_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $ovation_blog_slider_post_id, $attach_id );

      // Set theme mod for each post created
      set_theme_mod('ovation_blog_post_setting' . $i, $ovation_blog_slider_post_id);

    }

    //-------------- Post Categories----------------------- 

    $ovation_blog_top_post_category = wp_create_category('Post Catgories'); 

    set_theme_mod( 'ovation_blog_top_post_count', '6' );

    for($i=1;$i<=6;$i++){

      $title = 'Vestibulum sem non tortor rhoncus tempus';
      $content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

      // Create post object
      $ovation_blog_my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($ovation_blog_top_post_category),
      );

      $ovation_blog_top_post_id = wp_insert_post($ovation_blog_my_post);

      $ovation_blog_top_post_image_url = get_template_directory_uri().'/assets/images/image'.$i.'.jpg';

      $ovation_blog_top_image_name = 'image'.$i.'.jpg';
      $ovation_blog_top_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $ovation_blog_top_image_data       = file_get_contents($ovation_blog_top_post_image_url); 
       
      // Get image data
      $ovation_blog_top_unique_file_name = wp_unique_filename( $ovation_blog_top_upload_dir['path'], $ovation_blog_top_image_name ); 
      // Generate unique name
      $filename= basename( $ovation_blog_top_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $ovation_blog_top_upload_dir['path'] ) ) {
          $file = $ovation_blog_top_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $ovation_blog_top_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $ovation_blog_top_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $ovation_blog_top_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'post',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $ovation_blog_top_attachment, $file, $ovation_blog_top_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $ovation_blog_top_post_id, $attach_id );

    }

    set_theme_mod( 'ovation_blog_post_category_setting', 'Post Catgories' );


    //-------------- Top Categories----------------------- 

    set_theme_mod('ovation_blog_top_category_text','HEADING HERE');

    set_theme_mod('ovation_blog_top_category_heading','Top Categories');

    $ovation_blog_top_cat_category = wp_create_category('Top Catgories'); 

    set_theme_mod( 'ovation_blog_top_post_count', '3' );
    for($i=1;$i<=3;$i++){

      $title = 'Vestibulum sem non tortor rhoncus tempus';
      $content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

      // Create post object
      $ovation_blog_my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($ovation_blog_top_cat_category) 
      );

      $ovation_blog_top_cat_post_id = wp_insert_post($ovation_blog_my_post);

      $ovation_blog_top_cat_post_image_url = get_template_directory_uri().'/assets/images/picture'.$i.'.jpg';

      $ovation_blog_top_cat_image_name = 'picture'.$i.'.jpg';
      $ovation_blog_top_cat_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $ovation_blog_top_cat_image_data       = file_get_contents($ovation_blog_top_cat_post_image_url); 
       
      // Get image data
      $ovation_blog_top_cat_unique_file_name = wp_unique_filename( $ovation_blog_top_cat_upload_dir['path'], $ovation_blog_top_cat_image_name ); 
      // Generate unique name
      $filename= basename( $ovation_blog_top_cat_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $ovation_blog_top_cat_upload_dir['path'] ) ) {
          $file = $ovation_blog_top_cat_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $ovation_blog_top_cat_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $ovation_blog_top_cat_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $ovation_blog_top_cat_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'post',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $ovation_blog_top_cat_attachment, $file, $ovation_blog_top_cat_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $ovation_blog_top_cat_post_id, $attach_id );

    }

    set_theme_mod( 'ovation_blog_top_category_setting', 'Top Catgories' );
?>