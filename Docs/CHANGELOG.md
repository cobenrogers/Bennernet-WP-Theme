# Bennernet Theme - Changelog

All notable changes to the Bennernet WordPress theme are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

---

## [1.0.0] - 2025-12-07

### Added

#### Core Theme
- Initial theme release
- Complete WordPress theme structure with all standard templates
- Theme screenshot for WordPress admin preview

#### Typography
- Playfair Display font for headings (h1-h6)
- Source Sans Pro font for body text
- Google Fonts integration
- Responsive typography scaling

#### Color System
- Sage green primary color palette (#9eb89f)
- CSS custom properties for all theme colors
- WordPress Customizer color controls
- Live preview for color changes

#### Header
- Configurable header background image
- Header background color fallback
- Site branding with logo support
- Primary navigation menu
- Inline search form (always visible)
- Social media icons (Facebook, Twitter, Instagram, Pinterest, YouTube, TikTok)
- Mobile hamburger menu with slide animation
- Skip-to-content accessibility link

#### Footer
- 4 configurable widget areas
- Default widgets when none assigned:
  - Archives
  - Categories
  - Recent Posts
  - Search
- Configurable disclaimer text
- Custom footer links (up to 4)
- Copyright with dynamic year
- Scroll-to-top button

#### Print Features
- Comprehensive print stylesheet
- Print button on single posts
- Hide non-essential elements when printing
- URL display for external links
- Optimized typography for paper

#### Email Sharing
- Email button on single posts
- Pre-formatted mailto link with post title
- Excerpt included in email body
- Source URL attribution

#### Post Formats
- Standard post format
- Image post format
- Video post format
- Audio post format
- Gallery post format with lightbox
- Quote post format

#### WooCommerce
- Full WooCommerce theme support
- Custom wrapper templates
- Styled product pages
- Cart and checkout compatibility

#### Homepage
- Featured posts slider
- Category filter for slider content
- Configurable slide count (1-10)
- Auto-advance with pause on hover
- Navigation dots and arrow controls
- Custom homepage template

#### Customizer Sections
- Theme Colors (primary, dark, text, background)
- Header Settings (background, text color, social toggle)
- Social Media URLs (6 platforms)
- Layout Settings (sidebar position, excerpt length)
- Footer Settings (columns, disclaimer, links)
- Homepage Slider (enable, category, count)

#### JavaScript Features
- Mobile menu toggle
- Smooth scroll for anchor links
- Homepage slider with keyboard navigation
- Image lazy loading via IntersectionObserver
- Scroll-to-top visibility toggle
- Keyboard focus management
- Gallery lightbox

#### Accessibility
- WCAG AA color contrast compliance
- Keyboard navigation support
- Screen reader text for icons
- Skip links
- Focus visible indicators
- ARIA labels on interactive elements

#### Deployment
- GitHub Actions workflow for FTP deployment
- Automatic deploy on push to main branch
- Manual workflow dispatch option
- Deployment summary in GitHub
- Failure notification job

### Technical Details

- WordPress 6.0+ compatible
- PHP 7.4+ required
- Vanilla JavaScript (no jQuery dependency)
- Mobile-first responsive design
- Breakpoints: 600px, 900px, 1200px

---

## [Unreleased]

### Planned
- Dark mode toggle
- Reading time estimates
- Related posts section
- Schema.org structured data
- Translation files (.pot)
- Additional post format styling refinements

---

## Version History

| Version | Date | Description |
|---------|------|-------------|
| 1.0.0 | 2025-12-07 | Initial release |

---

## Upgrade Notes

### From Development to 1.0.0

This is the initial release. No upgrade path required.

### Future Upgrades

When upgrading:
1. Backup your site
2. Note any customizations made
3. Test in staging environment first
4. Clear any caching after update
