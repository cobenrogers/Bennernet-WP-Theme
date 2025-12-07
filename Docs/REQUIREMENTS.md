# Bennernet Theme - Requirements

## Overview

Create a custom WordPress theme named "Bennernet" that combines the configuration capabilities of Ovation Blog with the elegant styling and print-friendly features of the Glyc project.

**Target Site:** https://bennernet.com
**Theme Name:** Bennernet
**Version:** 1.0.0

---

## Functional Requirements

### FR-1: Typography System

| ID | Requirement | Status |
|----|-------------|--------|
| FR-1.1 | Use Playfair Display for all headings (h1-h6) | Complete |
| FR-1.2 | Use Source Sans Pro for body text | Complete |
| FR-1.3 | Load fonts via Google Fonts API | Complete |
| FR-1.4 | Provide fallback system fonts | Complete |
| FR-1.5 | Apply consistent letter-spacing and line-heights | Complete |

### FR-2: Color System

| ID | Requirement | Status |
|----|-------------|--------|
| FR-2.1 | Implement sage green primary color (#9eb89f) | Complete |
| FR-2.2 | Use CSS custom properties for all colors | Complete |
| FR-2.3 | Make colors configurable via Customizer | Complete |
| FR-2.4 | Support dark/light text contrast | Complete |
| FR-2.5 | Warm, natural color palette throughout | Complete |

### FR-3: Header

| ID | Requirement | Status |
|----|-------------|--------|
| FR-3.1 | Configurable header background image | Complete |
| FR-3.2 | Configurable header background color fallback | Complete |
| FR-3.3 | Site logo/title display | Complete |
| FR-3.4 | Primary navigation menu | Complete |
| FR-3.5 | Inline search form (always visible) | Complete |
| FR-3.6 | Social media icons (configurable) | Complete |
| FR-3.7 | Mobile hamburger menu | Complete |
| FR-3.8 | Skip to content link for accessibility | Complete |

### FR-4: Footer

| ID | Requirement | Status |
|----|-------------|--------|
| FR-4.1 | 4 configurable widget areas | Complete |
| FR-4.2 | Default widgets when none assigned (Archives, Categories, Recent Posts, Search) | Complete |
| FR-4.3 | Configurable disclaimer text | Complete |
| FR-4.4 | Custom footer links (up to 4) | Complete |
| FR-4.5 | Copyright with current year | Complete |
| FR-4.6 | Scroll-to-top button | Complete |

### FR-5: Print Features

| ID | Requirement | Status |
|----|-------------|--------|
| FR-5.1 | Comprehensive print stylesheet | Complete |
| FR-5.2 | Hide navigation, sidebars, comments when printing | Complete |
| FR-5.3 | Print button on single posts | Complete |
| FR-5.4 | Show URLs for external links in print | Complete |
| FR-5.5 | Optimize typography for paper output | Complete |
| FR-5.6 | Prevent page breaks inside content blocks | Complete |

### FR-6: Email Sharing

| ID | Requirement | Status |
|----|-------------|--------|
| FR-6.1 | Email button on single posts | Complete |
| FR-6.2 | Pre-formatted email subject with post title | Complete |
| FR-6.3 | Email body with excerpt and link | Complete |
| FR-6.4 | Source URL attribution | Complete |

### FR-7: WordPress Customizer

| ID | Requirement | Status |
|----|-------------|--------|
| FR-7.1 | Color settings section | Complete |
| FR-7.2 | Header settings section | Complete |
| FR-7.3 | Footer settings section | Complete |
| FR-7.4 | Social media URLs section | Complete |
| FR-7.5 | Layout settings section | Complete |
| FR-7.6 | Homepage slider settings | Complete |
| FR-7.7 | Live preview for all settings | Complete |

### FR-8: Post Formats

| ID | Requirement | Status |
|----|-------------|--------|
| FR-8.1 | Standard post format | Complete |
| FR-8.2 | Image post format | Complete |
| FR-8.3 | Video post format | Complete |
| FR-8.4 | Audio post format | Complete |
| FR-8.5 | Gallery post format | Complete |
| FR-8.6 | Quote post format | Complete |

### FR-9: WooCommerce Integration

| ID | Requirement | Status |
|----|-------------|--------|
| FR-9.1 | WooCommerce theme support | Complete |
| FR-9.2 | Custom wrapper templates | Complete |
| FR-9.3 | Styled product pages | Complete |
| FR-9.4 | Cart and checkout compatibility | Complete |

### FR-10: Homepage Features

| ID | Requirement | Status |
|----|-------------|--------|
| FR-10.1 | Featured posts slider | Complete |
| FR-10.2 | Category filter for slider | Complete |
| FR-10.3 | Configurable slide count | Complete |
| FR-10.4 | Auto-advance with pause on hover | Complete |
| FR-10.5 | Navigation dots and arrows | Complete |
| FR-10.6 | Custom homepage template | Complete |

---

## Non-Functional Requirements

### NFR-1: Performance

| ID | Requirement | Status |
|----|-------------|--------|
| NFR-1.1 | Vanilla JavaScript (no jQuery dependency) | Complete |
| NFR-1.2 | Lazy loading for images | Complete |
| NFR-1.3 | Minimal external dependencies | Complete |
| NFR-1.4 | Optimized CSS (no unused styles) | Complete |
| NFR-1.5 | Deferred script loading | Complete |

### NFR-2: Accessibility

| ID | Requirement | Status |
|----|-------------|--------|
| NFR-2.1 | WCAG AA color contrast compliance | Complete |
| NFR-2.2 | Keyboard navigation support | Complete |
| NFR-2.3 | Screen reader text for icons | Complete |
| NFR-2.4 | Skip links | Complete |
| NFR-2.5 | Focus visible indicators | Complete |
| NFR-2.6 | ARIA labels where appropriate | Complete |

### NFR-3: Responsive Design

| ID | Requirement | Status |
|----|-------------|--------|
| NFR-3.1 | Mobile-first CSS approach | Complete |
| NFR-3.2 | Breakpoints: 600px, 900px, 1200px | Complete |
| NFR-3.3 | Touch-friendly navigation | Complete |
| NFR-3.4 | Readable typography at all sizes | Complete |
| NFR-3.5 | Flexible images | Complete |

### NFR-4: WordPress Compatibility

| ID | Requirement | Status |
|----|-------------|--------|
| NFR-4.1 | WordPress 6.0+ support | Complete |
| NFR-4.2 | PHP 7.4+ support | Complete |
| NFR-4.3 | Gutenberg block editor support | Complete |
| NFR-4.4 | Widget areas | Complete |
| NFR-4.5 | Custom menus | Complete |
| NFR-4.6 | Featured images | Complete |

### NFR-5: Deployment

| ID | Requirement | Status |
|----|-------------|--------|
| NFR-5.1 | GitHub Actions FTP deployment | Complete |
| NFR-5.2 | Automatic deploy on push to main | Complete |
| NFR-5.3 | Manual trigger option | Complete |
| NFR-5.4 | Deployment summary in workflow | Complete |
| NFR-5.5 | Failure notifications | Complete |

---

## Widget Areas

| Area | Location | Default Content |
|------|----------|-----------------|
| Sidebar | Right side of content | - |
| Footer 1 | Footer column 1 | Archives |
| Footer 2 | Footer column 2 | Categories |
| Footer 3 | Footer column 3 | Recent Posts |
| Footer 4 | Footer column 4 | Search |

---

## Menu Locations

| Location | Description |
|----------|-------------|
| primary | Main navigation in header |
| footer | Footer navigation links |
| social | Social media icon links |

---

## Image Sizes

| Name | Dimensions | Usage |
|------|------------|-------|
| bennernet-featured | 1200x600 | Featured images, slider |
| bennernet-thumbnail | 400x300 | Archive listings |
| bennernet-square | 400x400 | Grid layouts |

---

## Browser Support

- Chrome (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Edge (latest 2 versions)
- iOS Safari
- Chrome for Android

---

## Dependencies

| Dependency | Version | Purpose |
|------------|---------|---------|
| WordPress | 6.0+ | CMS platform |
| PHP | 7.4+ | Server-side |
| Google Fonts | - | Typography |
| Font Awesome | 6.x | Icons |

---

## Future Considerations

- Dark mode toggle
- Reading time estimates
- Related posts section
- Schema.org markup
- AMP support
- Translation files (.pot)
