# Bennernet WordPress Theme - AI Assistant Context

## Project Overview

Bennernet is a custom WordPress theme for bennernet.com, combining:
- **Ovation Blog** theme's configuration capabilities and WordPress integration
- **Glyc** project's styling, typography, print-friendly features, and simplicity

**Live Site:** https://bennernet.com
**Repository:** https://github.com/cobenrogers/Bennernet-WP-Theme
**Version:** 1.0.0

## Key Design Decisions

### Typography
- **Headings:** Playfair Display (serif)
- **Body:** Source Sans Pro (sans-serif)
- Loaded via Google Fonts in functions.php

### Color Palette
```css
--primary: #9eb89f;        /* Sage green */
--primary-dark: #7a9a7b;   /* Darker sage */
--secondary: #d4c4a8;      /* Warm tan */
--background: #faf9f7;     /* Off-white */
--surface: #ffffff;        /* White */
--text: #3d3d3d;           /* Dark gray */
--text-light: #6b6b6b;     /* Medium gray */
--border: #e8e4df;         /* Light warm gray */
--accent: #8b7355;         /* Brown accent */
```

### Print-Friendly Design
- Comprehensive print styles in `assets/css/print.css`
- `.no-print` class hides elements when printing
- Print and Email buttons on single posts

## File Structure

```
Bennernet-WP-Theme/
├── .github/workflows/
│   └── deploy.yml              # FTP deployment workflow
├── bennernet/                  # WordPress theme directory
│   ├── style.css               # Main stylesheet + theme metadata
│   ├── functions.php           # Theme setup, enqueues, widgets
│   ├── header.php              # Site header with search
│   ├── footer.php              # Footer with widgets + disclaimer
│   ├── index.php               # Main posts listing
│   ├── single.php              # Single post (print/email buttons)
│   ├── page.php                # Static pages
│   ├── archive.php             # Archive pages
│   ├── search.php              # Search results
│   ├── 404.php                 # Not found page
│   ├── sidebar.php             # Sidebar template
│   ├── comments.php            # Comments template
│   ├── searchform.php          # Search form with icon button
│   ├── woocommerce.php         # WooCommerce wrapper
│   ├── screenshot.png          # Theme preview (1200x900)
│   │
│   ├── assets/
│   │   ├── css/
│   │   │   ├── print.css       # Print-specific styles
│   │   │   └── editor-style.css # Gutenberg editor styles
│   │   ├── js/
│   │   │   ├── bennernet.js    # Theme JavaScript
│   │   │   └── customizer.js   # Live preview JS
│   │   └── images/
│   │       └── IMG_4231.png    # Header background
│   │
│   ├── inc/
│   │   ├── customizer.php      # All Customizer settings
│   │   ├── template-functions.php # Helper functions
│   │   └── template-tags.php   # Template tags
│   │
│   ├── template-parts/
│   │   ├── header/
│   │   │   └── site-branding.php
│   │   ├── footer/
│   │   │   ├── footer-widgets.php
│   │   │   └── footer-disclaimer.php
│   │   └── post/
│   │       ├── content.php
│   │       ├── content-audio.php
│   │       ├── content-video.php
│   │       ├── content-gallery.php
│   │       ├── content-image.php
│   │       ├── content-quote.php
│   │       ├── content-search.php
│   │       └── content-none.php
│   │
│   ├── page-template/
│   │   └── custom-home-page.php # Homepage with slider
│   │
│   └── woocommerce/
│       └── global/
│           ├── wrapper-start.php
│           └── wrapper-end.php
│
├── Docs/
│   ├── REQUIREMENTS.md         # Feature requirements
│   ├── DESIGN.md               # Architecture decisions
│   └── CHANGELOG.md            # Version history
│
├── Examples/                   # Reference themes
│   └── ovation-blog/
│
├── CLAUDE.md                   # This file
├── PLAN.md                     # Implementation plan
└── README.md                   # Project readme
```

## Critical Files

### Theme Configuration
- **`bennernet/inc/customizer.php`** - All WordPress Customizer settings
- **`bennernet/functions.php`** - Theme setup, widget registration, enqueues

### Templates
- **`bennernet/header.php`** - Header with inline search form
- **`bennernet/footer.php`** - Footer with 4 widget areas + disclaimer
- **`bennernet/single.php`** - Single posts with print/email buttons

### Styling
- **`bennernet/style.css`** - Main stylesheet with CSS custom properties
- **`bennernet/assets/css/print.css`** - Print-optimized styles

### Deployment
- **`.github/workflows/deploy.yml`** - GitHub Actions FTP deployment

## Customizer Sections

| Section | Key Settings |
|---------|--------------|
| **Theme Colors** | Primary, dark, text, background colors |
| **Header Settings** | Background image/color, text color, social icons toggle |
| **Social Media** | URLs for Facebook, Twitter, Instagram, Pinterest, YouTube, TikTok |
| **Layout Settings** | Sidebar position, excerpt length |
| **Footer Settings** | Widget columns (1-4), disclaimer text, custom links |
| **Homepage Slider** | Enable/disable, category filter, post count |

## Development Notes

### Local Development
Use Local by Flywheel:
1. Create new site
2. Symlink or copy `bennernet/` to `wp-content/themes/`
3. Activate theme in WordPress admin

### Deployment
Automatic FTP deployment via GitHub Actions on push to `main` branch.

**Required Secrets:**
- `FTP_SERVER` - FTP host (e.g., ftp.example.com)
- `FTP_USERNAME` - FTP username
- `FTP_PASSWORD` - FTP password
- `FTP_SERVER_DIR` - Server directory (e.g., `bennernet/`)

**Note:** FTP user should be restricted to the themes directory for security.

### Code Conventions
- PHP: WordPress coding standards
- CSS: BEM-inspired class naming
- JS: Vanilla JavaScript (no jQuery dependency)
- Use `.no-print` class for elements that shouldn't print

## Common Tasks

### Adding a New Customizer Setting
1. Add setting in `inc/customizer.php`
2. Add control in same file
3. Output CSS in `bennernet_customizer_css()` function
4. Add live preview JS in `assets/js/customizer.js`

### Adding a New Post Format
1. Add format to `add_theme_support('post-formats', [...])` in functions.php
2. Create `template-parts/post/content-{format}.php`
3. Add styles in style.css

### Modifying Print Output
Edit `assets/css/print.css`. Key rules:
- `.no-print` - Hidden when printing
- Page break controls with `page-break-inside`, `page-break-before`
- URL display for links with `a[href]::after`

## Related Projects

- **IBDMovement-WP-Theme** - Sister project with similar structure
- **Glyc** - Recipe card styling inspiration
- **Ovation Blog** - WordPress integration patterns
