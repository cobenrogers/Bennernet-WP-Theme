# Bennernet WordPress Theme

A clean, printer-friendly WordPress blog theme combining elegant typography with powerful customization. Perfect for recipe blogs and content that needs to look great both on screen and on paper.

## Features

### Design
- **Typography**: Playfair Display for headings, Source Sans Pro for body text
- **Color Palette**: Warm sage green palette with customizable colors
- **Responsive**: Mobile-first design that looks great on all devices
- **Clean & Simple**: Focus on content with minimal distractions

### Printer & Email Friendly
- **Comprehensive Print Styles**: Optimized CSS for paper output
- **Print Button**: One-click printing on single posts
- **Email Sharing**: Share posts via email with formatted content
- **No-print Classes**: Automatically hides navigation, sidebars, and controls when printing

### Customization
- **Theme Customizer Integration**: All settings accessible via WordPress Customizer
- **Configurable Colors**: Primary, secondary, text, and background colors
- **Header Options**: Custom background image, colors, and social icons
- **Footer Configuration**: Disclaimer text, custom links, widget columns
- **Layout Options**: Right sidebar, left sidebar, or full width
- **Homepage Slider**: Featured posts slider with category selection

### Footer Widgets
Default widgets when none assigned (like Ovation Blog):
- Archives
- Categories
- Recent Posts
- Search

### Post Formats
- Standard
- Image
- Video
- Audio
- Gallery
- Quote

### WooCommerce Ready
Full e-commerce integration with styled product pages.

## Installation

1. Download the theme
2. Upload to `/wp-content/themes/bennernet/`
3. Activate through WordPress admin
4. Configure via Appearance → Customize

## Local Development with Local by Flywheel

1. Create a new site in Local
2. Link this theme folder to the themes directory
3. Activate and customize

## Deployment

This repository includes GitHub Actions for automated FTP deployment.

### Setup FTP Deployment

1. Go to repository Settings → Secrets
2. Add the following secrets:
   - `FTP_SERVER`: Your FTP host
   - `FTP_USERNAME`: FTP username
   - `FTP_PASSWORD`: FTP password

Pushes to `main` branch will automatically deploy to your server.

## File Structure

```
bennernet/
├── style.css              # Main stylesheet
├── functions.php          # Theme setup
├── header.php             # Header template
├── footer.php             # Footer template
├── index.php              # Main template
├── single.php             # Single post (with print/email)
├── page.php               # Page template
├── archive.php            # Archive pages
├── search.php             # Search results
├── 404.php                # Not found page
├── sidebar.php            # Sidebar
├── comments.php           # Comments
├── woocommerce.php        # WooCommerce integration
├── assets/
│   ├── css/
│   │   ├── print.css      # Print styles
│   │   └── editor-style.css
│   └── js/
│       ├── bennernet.js   # Theme JavaScript
│       └── customizer.js  # Customizer preview
├── inc/
│   ├── customizer.php     # Customizer settings
│   ├── template-functions.php
│   └── template-tags.php
├── template-parts/
│   ├── header/
│   ├── footer/
│   └── post/
├── page-template/
│   └── custom-home-page.php
└── woocommerce/
```

## Customizer Sections

1. **Theme Colors**: Primary, dark, text, background colors
2. **Header Settings**: Background color/image, text color, social icons
3. **Social Media**: URLs for Facebook, Twitter, Instagram, etc.
4. **Layout Settings**: Sidebar position, excerpt length
5. **Footer Settings**: Columns, disclaimer, custom links
6. **Homepage Slider**: Enable/disable, category, count

## Credits

- **Fonts**: Google Fonts (Playfair Display, Source Sans Pro)
- **Icons**: Font Awesome 6
- **Inspiration**: Ovation Blog theme structure, Glyc project styling

## License

GNU General Public License v2 or later
