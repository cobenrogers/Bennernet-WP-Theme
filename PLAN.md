# Bennernet WordPress Theme - Implementation Plan

## Overview

Create a custom WordPress theme named "Bennernet" that combines:
- **Ovation Blog's** configuration capabilities and WordPress integration
- **Glyc's** styling, typography, print-friendly features, and simplicity

## Requirements Summary

| Feature | Source | Implementation |
|---------|--------|----------------|
| Customizer (colors, fonts, layouts) | Ovation Blog | Adapt existing customizer.php |
| Footer widgets (Archives, Categories, Recent Posts, Search) | Ovation Blog | Keep footer-widgets.php pattern |
| Typography (Playfair Display + Source Sans Pro) | Glyc | Replace font system |
| Color palette (sage green, warm tones) | Glyc | New CSS variables |
| Print styles | Glyc | Add comprehensive @media print rules |
| Email sharing | Glyc | Add email button with formatted text |
| Configurable footer disclaimer | Glyc | New customizer section |
| Configurable header background & font colors | New | New customizer section |

---

## Theme Architecture

```
bennernet/
├── style.css                    # Main stylesheet with theme metadata
├── functions.php                # Theme setup and functions
├── header.php                   # Header template
├── footer.php                   # Footer template
├── index.php                    # Main posts listing
├── single.php                   # Single post template
├── page.php                     # Static page template
├── archive.php                  # Archive pages
├── search.php                   # Search results
├── 404.php                      # Not found page
├── sidebar.php                  # Default sidebar
├── comments.php                 # Comments template
├── searchform.php               # Search form
├── screenshot.png               # Theme screenshot
│
├── assets/
│   ├── css/
│   │   ├── print.css            # Print-specific styles
│   │   ├── blocks.css           # Gutenberg block styles
│   │   └── editor-style.css     # Editor styles
│   ├── js/
│   │   └── bennernet.js         # Theme JavaScript
│   └── images/
│       └── default-header.jpg   # Default header image
│
├── inc/
│   ├── customizer.php           # Theme Customizer settings
│   ├── customizer-footer.php    # Footer customizer section
│   ├── customizer-header.php    # Header customizer section
│   ├── template-functions.php   # Helper functions
│   ├── template-tags.php        # Template tags
│   ├── email-format.php         # Email formatting function
│   └── print-styles.php         # Print style generation
│
├── template-parts/
│   ├── header/
│   │   └── site-branding.php    # Logo and site title
│   ├── footer/
│   │   ├── footer-widgets.php   # Widget columns
│   │   └── footer-disclaimer.php # Disclaimer and links
│   ├── post/
│   │   ├── content.php          # Standard post content
│   │   ├── content-single.php   # Single post view
│   │   └── content-none.php     # No posts found
│   └── components/
│       ├── print-button.php     # Print button component
│       └── email-button.php     # Email button component
│
└── languages/
    └── bennernet.pot            # Translation template
```

---

## Phase 1: Core Theme Setup

### 1.1 Create style.css with theme metadata
- Theme name: Bennernet
- Author: Benjamin Rogers
- Version: 1.0.0
- CSS custom properties from Glyc recipe-card theme:
  ```css
  :root {
    --primary: #9eb89f;           /* Sage green */
    --primary-dark: #7a9a7b;      /* Darker sage */
    --secondary: #d4c4a8;         /* Warm tan */
    --background: #faf9f7;        /* Off-white */
    --surface: #ffffff;           /* White */
    --text: #3d3d3d;              /* Dark gray */
    --text-light: #6b6b6b;        /* Medium gray */
    --border: #e8e4df;            /* Light warm gray */
    --accent: #8b7355;            /* Brown accent */
  }
  ```

### 1.2 Create functions.php
- Theme setup (menus, widgets, post formats)
- Enqueue Google Fonts (Playfair Display, Source Sans Pro)
- Register widget areas:
  - Sidebar
  - Footer Widget 1-4
- Custom image sizes
- Theme support features

### 1.3 Create base templates
- header.php with configurable background image
- footer.php with widget areas + disclaimer
- index.php, single.php, page.php, archive.php, search.php, 404.php

---

## Phase 2: Customizer Integration

### 2.1 Color Settings (inc/customizer.php)
Customize colors via WordPress Customizer:
- Primary color
- Primary dark color
- Background color
- Text color
- Header background color/image
- Header text color

### 2.2 Typography Settings
- Body font selector (keep Source Sans Pro as default)
- Heading font selector (keep Playfair Display as default)

### 2.3 Header Settings (inc/customizer-header.php)
- Header background image upload
- Header background color fallback
- Header text color
- Header overlay opacity

### 2.4 Footer Settings (inc/customizer-footer.php)
- Disclaimer text (textarea)
- Footer link 1-4 (text + URL pairs)
- Widget column count (1-4)
- Show/hide Archives, Categories, Recent Posts, Search

### 2.5 Layout Settings
- Post layout options (right sidebar, left sidebar, full width)
- Single post layout
- Archive layout

---

## Phase 3: Print & Email Features

### 3.1 Print Styles (assets/css/print.css)
From Glyc's print stylesheet:
```css
@media print {
  /* Hide non-printable elements */
  .no-print, header nav, footer, .sidebar,
  .comments-area, .post-navigation { display: none !important; }

  /* Optimize for paper */
  body { background: white; color: black; font-size: 12pt; }
  a { color: black; text-decoration: underline; }

  /* Show URLs for external links */
  a[href]::after { content: " (" attr(href) ")"; }
  a[href^="#"]::after, a[href^="javascript"]::after { content: ""; }

  /* Prevent page breaks inside content */
  .entry-content { page-break-inside: avoid; }
  li { page-break-inside: avoid; }
}
```

### 3.2 Print Button Component
Add print button to single posts:
```php
<button class="btn-print no-print" onclick="window.print()">
  Print Recipe
</button>
```

### 3.3 Email Sharing (inc/email-format.php)
PHP function to format post content for email:
- Title with separator
- Description/excerpt
- Content sections
- Source URL attribution

### 3.4 Email Button Component
Mailto link with formatted content:
```php
<a href="mailto:?subject=<?php echo urlencode($title); ?>&body=<?php echo urlencode($email_body); ?>"
   class="btn-email no-print">
  Email Recipe
</a>
```

---

## Phase 4: Footer Widgets

### 4.1 Footer Widget Areas
Register 4 widget areas in functions.php:
```php
register_sidebar([
  'name' => 'Footer Widget 1',
  'id' => 'footer-1',
  ...
]);
```

### 4.2 Default Footer Content (template-parts/footer/footer-widgets.php)
When widgets not assigned, show defaults:
- Archives (wp_get_archives)
- Categories (wp_list_categories)
- Recent Posts (WP_Query)
- Search (get_search_form)

### 4.3 Configurable Disclaimer (template-parts/footer/footer-disclaimer.php)
Pull from customizer:
```php
$disclaimer = get_theme_mod('bennernet_footer_disclaimer',
  'Content is for informational purposes only.');
```

---

## Phase 5: Styling & Polish

### 5.1 Typography Implementation
- Import Google Fonts
- Apply Playfair Display to h1-h6
- Apply Source Sans Pro to body, paragraphs
- Maintain Glyc's letter-spacing and line-heights

### 5.2 Button Styles
Match Glyc button aesthetics:
- Primary: sage green, uppercase, letter-spacing
- Secondary: white with border
- Active scale transform feedback

### 5.3 Card & Surface Styles
- Subtle shadows (Glyc shadow values)
- Rounded corners (4px radius)
- Warm borders

### 5.4 Responsive Design
- Mobile-first approach
- Breakpoints at 600px, 900px
- Collapsible navigation

---

## Implementation Order

1. **style.css** - Theme metadata + CSS variables + base styles
2. **functions.php** - Theme setup, enqueue scripts/styles, register widgets
3. **header.php** - Configurable header with background image support
4. **footer.php** - Widget areas + disclaimer section
5. **index.php** - Main posts template
6. **single.php** - Single post with print/email buttons
7. **template-parts/** - Reusable components
8. **inc/customizer.php** - All customizer settings
9. **assets/css/print.css** - Print styles
10. **inc/email-format.php** - Email formatting

---

## Questions/Clarifications Needed

1. **Theme Name**: "Bennernet" - is this the correct name?
2. **Default Header Image**: Should I use one of the Ovation images or create a placeholder?
3. **WooCommerce Support**: Do you need e-commerce integration like Ovation has?
4. **Post Formats**: Do you need support for audio, video, gallery, quote formats?
5. **Slider/Featured Section**: Do you want the homepage slider from Ovation?

---

## Estimated File Count

- **Core templates**: ~12 files
- **Template parts**: ~8 files
- **Includes**: ~6 files
- **Assets**: ~4 files
- **Total**: ~30 files

This is a focused theme without the bloat of the original Ovation theme (which has 100+ files), while retaining its key configuration capabilities.
