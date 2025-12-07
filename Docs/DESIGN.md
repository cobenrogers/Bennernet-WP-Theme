# Bennernet Theme - Design Document

## Architecture Overview

Bennernet follows WordPress theme development best practices with a modular, template-part-based architecture. The theme prioritizes simplicity, performance, and maintainability.

```
┌─────────────────────────────────────────────────────────┐
│                    WordPress Core                        │
├─────────────────────────────────────────────────────────┤
│                   Bennernet Theme                        │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────┐  │
│  │  Templates  │  │  Includes   │  │  Template Parts │  │
│  │  - index    │  │ - customizer│  │  - header/      │  │
│  │  - single   │  │ - functions │  │  - footer/      │  │
│  │  - page     │  │ - tags      │  │  - post/        │  │
│  │  - archive  │  │             │  │                 │  │
│  └─────────────┘  └─────────────┘  └─────────────────┘  │
│  ┌─────────────────────────────────────────────────────┐│
│  │                     Assets                          ││
│  │  CSS: style.css, print.css, editor-style.css       ││
│  │  JS: bennernet.js, customizer.js                   ││
│  └─────────────────────────────────────────────────────┘│
└─────────────────────────────────────────────────────────┘
```

---

## Design Decisions

### DD-1: CSS Custom Properties for Theming

**Decision:** Use CSS custom properties (variables) for all theme colors and key values.

**Rationale:**
- Enables real-time Customizer preview without page reload
- Reduces CSS specificity issues
- Makes theme colors easily overridable
- Better performance than PHP-generated inline styles

**Implementation:**
```css
:root {
  --primary: #9eb89f;
  --primary-dark: #7a9a7b;
  --text: #3d3d3d;
  /* ... */
}
```

The Customizer outputs a `<style>` block in the `<head>` that overrides these values.

---

### DD-2: Vanilla JavaScript (No jQuery)

**Decision:** Write all theme JavaScript in vanilla ES6+ without jQuery dependency.

**Rationale:**
- Reduced page weight (jQuery is ~90KB)
- Faster execution
- No dependency conflicts
- Modern browser support is sufficient
- WordPress may phase out jQuery bundling

**Implementation:**
All functionality in `bennernet.js` uses:
- `document.querySelector/querySelectorAll`
- `addEventListener`
- `classList` API
- `IntersectionObserver` for lazy loading

---

### DD-3: Template Parts Architecture

**Decision:** Use granular template parts for reusable components.

**Rationale:**
- DRY principle
- Easier maintenance
- Child theme overridability
- Clear separation of concerns

**Structure:**
```
template-parts/
├── header/
│   └── site-branding.php      # Logo + site title
├── footer/
│   ├── footer-widgets.php     # Widget columns
│   └── footer-disclaimer.php  # Disclaimer + links
└── post/
    ├── content.php            # Archive listing
    ├── content-{format}.php   # Post format variants
    └── content-none.php       # No results
```

---

### DD-4: Single Customizer File

**Decision:** Consolidate all Customizer settings in one file (`inc/customizer.php`).

**Rationale:**
- Easier to find and modify settings
- Reduces file count
- Settings are logically grouped by section
- Simpler than Ovation's multi-file approach

**Trade-off:** File is larger (~800 lines) but well-organized with clear section comments.

---

### DD-5: Print-First Design Consideration

**Decision:** Design with printing in mind from the start, not as an afterthought.

**Rationale:**
- Recipe blogs need printable content
- Better user experience
- Consistent output across browsers

**Implementation:**
- `.no-print` class on non-printable elements
- Separate `print.css` stylesheet
- Print button component in single.php
- URL display for external links

---

### DD-6: Default Footer Widgets

**Decision:** Show default content in footer widget areas when no widgets are assigned.

**Rationale:**
- Theme looks complete out-of-box
- Users see example of what's possible
- Matches Ovation Blog behavior
- Falls back gracefully

**Implementation:**
```php
if ( is_active_sidebar( 'footer-1' ) ) {
    dynamic_sidebar( 'footer-1' );
} else {
    // Show Archives by default
    the_widget( 'WP_Widget_Archives' );
}
```

---

### DD-7: Mobile-First Responsive Design

**Decision:** Write base CSS for mobile, then add breakpoints for larger screens.

**Rationale:**
- Mobile traffic often exceeds desktop
- Smaller CSS payload for mobile users
- Progressive enhancement approach
- Forces focus on essential content

**Breakpoints:**
```css
/* Base: Mobile (< 600px) */

@media (min-width: 600px) {
  /* Tablet */
}

@media (min-width: 900px) {
  /* Desktop */
}

@media (min-width: 1200px) {
  /* Large desktop */
}
```

---

### DD-8: Inline Header Search

**Decision:** Display search form inline in the navigation, always visible.

**Rationale:**
- More discoverable than hidden/dropdown search
- Consistent with user expectations
- Reduces interaction friction
- Works better on mobile

**Previous approach:** Dropdown toggle (like Ovation). Changed based on user feedback.

---

### DD-9: FTP Deployment via GitHub Actions

**Decision:** Use SamKirkland/FTP-Deploy-Action for automated deployment.

**Rationale:**
- Simple setup with secrets
- Reliable incremental sync
- Works with shared hosting
- No SSH access required
- Clear deployment logs

**Security:**
- FTP user restricted to themes directory
- Credentials stored as GitHub secrets
- No deployment of .git, node_modules, etc.

---

## Component Design

### Header Component

```
┌────────────────────────────────────────────────────────┐
│ [Social Icons]                                         │
├────────────────────────────────────────────────────────┤
│                                                        │
│               [Header Image Area]                      │
│                  [Site Title]                          │
│                  [Tagline]                             │
│                                                        │
├────────────────────────────────────────────────────────┤
│ [☰ Menu] [Nav Item] [Nav Item] [Nav Item]   [🔍 Search]│
└────────────────────────────────────────────────────────┘
```

### Footer Component

```
┌────────────────────────────────────────────────────────┐
│  Widget 1    │  Widget 2    │  Widget 3    │ Widget 4  │
│  Archives    │  Categories  │  Recent      │  Search   │
│  - Month 1   │  - Cat 1     │  Posts       │  [      ] │
│  - Month 2   │  - Cat 2     │  - Post 1    │  [Search] │
│              │              │  - Post 2    │           │
├────────────────────────────────────────────────────────┤
│                    Disclaimer Text                      │
├────────────────────────────────────────────────────────┤
│ [Link 1] [Link 2] [Link 3] [Link 4]                    │
│                                                        │
│              © 2025 Site Name                          │
└────────────────────────────────────────────────────────┘
```

### Single Post Component

```
┌────────────────────────────────────────────────────────┐
│                   [Featured Image]                      │
├────────────────────────────────────────────────────────┤
│ Category                                               │
│ Post Title                                             │
│ By Author | Date | Comments                            │
├────────────────────────────────────────────────────────┤
│                                                        │
│                   Post Content                         │
│                                                        │
├────────────────────────────────────────────────────────┤
│ [🖨️ Print]  [📧 Email]                                 │
├────────────────────────────────────────────────────────┤
│ Tags: tag1, tag2, tag3                                 │
├────────────────────────────────────────────────────────┤
│ ← Previous Post          Next Post →                   │
└────────────────────────────────────────────────────────┘
```

---

## CSS Architecture

### File Organization

| File | Purpose | Load Context |
|------|---------|--------------|
| `style.css` | Theme metadata + all styles | Frontend |
| `print.css` | Print-specific rules | Print media |
| `editor-style.css` | Gutenberg editor | Admin |

### CSS Naming Convention

BEM-inspired with WordPress compatibility:

```css
/* Block */
.site-header { }

/* Element */
.site-header__title { }

/* Modifier */
.site-header--sticky { }

/* State (WordPress convention) */
.is-open { }
.is-active { }
.is-visible { }
```

### Z-Index Scale

```css
--z-dropdown: 100;
--z-sticky: 200;
--z-modal: 300;
--z-tooltip: 400;
```

---

## JavaScript Architecture

### Module Pattern

Each feature is an IIFE (Immediately Invoked Function Expression):

```javascript
(function() {
    'use strict';

    function initFeature() {
        // Feature code
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
```

### Features

| Function | Purpose |
|----------|---------|
| `initMobileMenu()` | Hamburger menu toggle |
| `initHeaderSearch()` | Search form toggle (legacy) |
| `initSmoothScroll()` | Anchor link smooth scrolling |
| `initSlider()` | Homepage featured slider |
| `initPrintButton()` | Print functionality |
| `initLazyLoad()` | Image lazy loading |
| `initScrollToTop()` | Scroll-to-top button |
| `initFocusManagement()` | Keyboard nav indicators |
| `initGallery()` | Lightbox for galleries |

---

## Customizer Architecture

### Sections

```php
$sections = [
    'bennernet_colors'    => 'Theme Colors',
    'bennernet_header'    => 'Header Settings',
    'bennernet_social'    => 'Social Media',
    'bennernet_layout'    => 'Layout Settings',
    'bennernet_footer'    => 'Footer Settings',
    'bennernet_homepage'  => 'Homepage Slider',
];
```

### Setting Pattern

```php
// 1. Register setting
$wp_customize->add_setting('bennernet_primary_color', [
    'default'           => '#9eb89f',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport'         => 'postMessage', // Live preview
]);

// 2. Add control
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,
    'bennernet_primary_color',
    [
        'label'   => 'Primary Color',
        'section' => 'bennernet_colors',
    ]
));
```

### Live Preview

CSS custom properties enable instant preview:

```javascript
wp.customize('bennernet_primary_color', function(value) {
    value.bind(function(newval) {
        document.documentElement.style.setProperty('--primary', newval);
    });
});
```

---

## Performance Considerations

### Optimizations Implemented

1. **No jQuery** - Saves ~90KB
2. **System font fallbacks** - Content visible before web fonts load
3. **Lazy loading** - Images load on scroll into viewport
4. **Deferred JS** - Scripts don't block rendering
5. **Minimal HTTP requests** - Single CSS, single JS file
6. **Print CSS separate** - Not loaded until print

### Future Optimizations

- Critical CSS inlining
- Font subsetting
- Image format optimization (WebP)
- Asset concatenation/minification

---

## Accessibility Considerations

### Implemented Features

- Skip-to-content link
- Semantic HTML5 structure
- ARIA labels on icon-only buttons
- Focus visible indicators
- Keyboard navigation for menus
- Color contrast ratios (WCAG AA)
- Screen reader text for icons

### Testing Checklist

- [ ] Navigate with keyboard only
- [ ] Test with screen reader
- [ ] Verify focus indicators visible
- [ ] Check color contrast ratios
- [ ] Ensure all images have alt text
- [ ] Verify form labels present

---

## Security Considerations

### Implemented

- All user input escaped with `esc_html()`, `esc_attr()`, `esc_url()`
- Customizer values sanitized
- No direct file includes from user input
- FTP credentials in GitHub secrets

### Best Practices Followed

- No inline JavaScript
- No eval() or similar
- Prepared statements for any DB queries
- Nonce verification for admin actions
