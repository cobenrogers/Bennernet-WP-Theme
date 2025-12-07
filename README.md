# Bennernet WordPress Theme

A clean, printer-friendly WordPress blog theme combining elegant typography with powerful customization. Perfect for recipe blogs and content that needs to look great both on screen and on paper.

**Live Site:** https://bennernet.com
**Repository:** https://github.com/cobenrogers/Bennernet-WP-Theme
**Version:** 1.0.0
**Last Updated:** December 7, 2025

---

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
- **Footer Configuration**: Disclaimer text, custom links, widget columns (1-4)
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

---

## Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher

---

## Installation

### From WordPress Admin
1. Download the theme ZIP file
2. Go to **Appearance > Themes > Add New > Upload Theme**
3. Upload the ZIP file and click **Install Now**
4. Activate the theme

### Manual Installation
1. Upload `bennernet/` folder to `/wp-content/themes/`
2. Go to **Appearance > Themes**
3. Activate **Bennernet**

### Local Development with Local by Flywheel
1. Create a new site in Local
2. Link or copy `bennernet/` folder to the themes directory
3. Activate and customize

---

## Configuration

### Customizer Sections

Access via **Appearance > Customize**:

| Section | Options |
|---------|---------|
| **Theme Colors** | Primary, dark, text, background colors |
| **Header Settings** | Background image/color, text color, social icons toggle |
| **Social Media** | URLs for Facebook, Twitter, Instagram, Pinterest, YouTube, TikTok |
| **Layout Settings** | Sidebar position, excerpt length |
| **Footer Settings** | Widget columns (1-4), disclaimer text, custom links |
| **Homepage Slider** | Enable/disable, category filter, slide count |

### Social Media Icons
Icons appear in the header when URLs are configured. Leave blank to hide.

### Footer Disclaimer
Configure custom disclaimer text in **Customize > Footer Settings**.

---

## Deployment

This repository includes GitHub Actions for automated FTP deployment.

### Setup FTP Deployment

1. Go to repository **Settings > Secrets and variables > Actions**
2. Add the following secrets:

| Secret | Description |
|--------|-------------|
| `FTP_SERVER` | FTP host (e.g., ftp.example.com) |
| `FTP_USERNAME` | FTP username |
| `FTP_PASSWORD` | FTP password |
| `FTP_SERVER_DIR` | Server directory (e.g., `bennernet/`) |

**Note:** For security, the FTP user should be restricted to the themes directory.

### Automatic Deployment
Pushes to `main` branch automatically deploy changes to the server.

### Manual Deployment
Use **Actions > Deploy to Production > Run workflow** for manual deployment.

---

## File Structure

```
Bennernet-WP-Theme/
├── .github/workflows/
│   └── deploy.yml              # FTP deployment workflow
│
├── bennernet/                  # WordPress theme directory
│   ├── style.css               # Main stylesheet
│   ├── functions.php           # Theme setup
│   ├── header.php              # Header with search
│   ├── footer.php              # Footer with widgets
│   ├── index.php               # Main template
│   ├── single.php              # Single post (print/email)
│   ├── page.php                # Page template
│   ├── archive.php             # Archive pages
│   ├── search.php              # Search results
│   ├── 404.php                 # Not found page
│   ├── sidebar.php             # Sidebar
│   ├── comments.php            # Comments
│   ├── searchform.php          # Search form
│   ├── woocommerce.php         # WooCommerce integration
│   ├── screenshot.png          # Theme preview
│   │
│   ├── assets/
│   │   ├── css/
│   │   │   ├── print.css       # Print styles
│   │   │   └── editor-style.css
│   │   ├── js/
│   │   │   ├── bennernet.js    # Theme JavaScript
│   │   │   └── customizer.js   # Customizer preview
│   │   └── images/
│   │
│   ├── inc/
│   │   ├── customizer.php      # Customizer settings
│   │   ├── template-functions.php
│   │   └── template-tags.php
│   │
│   ├── template-parts/
│   │   ├── header/
│   │   ├── footer/
│   │   └── post/
│   │
│   ├── page-template/
│   │   └── custom-home-page.php
│   │
│   └── woocommerce/
│
├── Docs/
│   ├── REQUIREMENTS.md         # Feature requirements
│   ├── DESIGN.md               # Architecture decisions
│   └── CHANGELOG.md            # Version history
│
├── Examples/                   # Reference themes
│
├── CLAUDE.md                   # AI assistant context
├── PLAN.md                     # Implementation plan
└── README.md                   # This file
```

---

## Documentation

- [CLAUDE.md](CLAUDE.md) - AI assistant context for development
- [PLAN.md](PLAN.md) - Implementation plan (complete)
- [Docs/REQUIREMENTS.md](Docs/REQUIREMENTS.md) - Feature requirements
- [Docs/DESIGN.md](Docs/DESIGN.md) - Architecture and design decisions
- [Docs/CHANGELOG.md](Docs/CHANGELOG.md) - Version history and changes

---

## Credits

- **Fonts**: Google Fonts (Playfair Display, Source Sans Pro)
- **Icons**: Font Awesome 6
- **Inspiration**: Ovation Blog theme structure, Glyc project styling

---

## License

GNU General Public License v2 or later

---

## Support

For issues or questions, please open an issue on GitHub.
