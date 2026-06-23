# 7 Peaks — WordPress home-page handoff

This folder hands the redesigned home page back to WordPress in a format you can
paste straight into the block editor. It reuses **your existing blocks** — it
does not require any new plugin.

## Files
- **`style.css`** — ⭐ **consolidated drop-in.** Replace your theme's whole
  `style.css` with this one file and you get the refined fonts, the restyled
  header, and the home-page styles in one go — nothing to paste into *Additional
  CSS*. (You still paste `home-content.html` into the page itself — see below.)
- **`home-content.html`** — Gutenberg block markup for the whole home page.
- **`colour-chart-content.html`** — standalone **Colour Chart** page: 205 RAL
  Classic shades as coloured `<div>` swatches that lift + highlight on hover.
  Styles are in the consolidated `style.css`, or paste `colour-chart-styles.css`.
- **`footer-inner.html`** — the designed multi-column footer (logo + motto,
  Services / Company / Visit columns, bottom bar). Replace the **contents** of
  the `<footer>` element in `themes/sevenpeaks/footer.php` with this. Styling is
  in `style.css`. Uses the new address (23B Orgreave Crescent, S13 9NQ).
- **`service-pages-content.html`** — six short **service pages** (now three
  paragraphs + a "More services" link row, centred in a max-width container).
  Replace each image from your Media Library.
- **`home-styles.css`** — home-page styles only (use ONLY if you prefer
  Additional CSS over replacing `style.css`; already included in `style.css`).
- **`header-styles.css`** — header styles only (same note — already in
  `style.css`).

## Quickest path (recommended)
1. **Back up** your current `themes/sevenpeaks/style.css`.
2. Replace its entire contents with **`style.css`** from this folder. (Keep the
   file at the theme root so `@import "build/normalize.css"` still resolves.)
3. Edit the **Home** page → ⋮ → **Code editor** → paste **`home-content.html`**.
4. Swap the About image URL + set the Instagram feed to 6 columns (see caveats).

> Heads-up: your `style.css` is compiled from SCSS. Replacing it directly is
> fine, but a future SCSS rebuild would overwrite it — fold these changes into
> the SCSS source when you get a chance (the file is commented section-by-section
> to make that easy).

---

## Alternative: Additional CSS (no theme-file edit)
If you'd rather not touch `style.css`, paste `home-styles.css` then
`header-styles.css` into **Appearance → Customise → Additional CSS** instead.
Everything below describes this route.

## Steps
1. **Back up** the current home page first: open it, ⋮ menu → *Code editor*,
   copy everything into a text file. (Your original markup is what you pasted to
   me — keep it safe.)
2. Edit the **Home** page → ⋮ menu → **Code editor** → select all → paste in the
   contents of `home-content.html` → **Exit code editor** → **Update**.
3. Go to **Appearance → Customise → Additional CSS** and paste the contents of
   `home-styles.css`. (Keep the `@import` line at the very top.) Publish.

## Header restyle
Paste **`header-styles.css`** into the same *Additional CSS* box, **below**
`home-styles.css`. It targets your existing header classes (`.site-title`,
`.logo`, `.business-details`, `.menu-button`, `nav.main-menu`) and:
- makes the header a sticky, frosted, single-row bar (logo left · nav centre ·
  phone + email right);
- replaces the orange/green block-and-gradient nav with a clean orange
  underline-grow on hover;
- applies the refined fonts and a hairline bottom border.

**No `style.css` or `header.php` edit is needed** — `header-styles.css`
overrides the theme's header rules at their own selectors and wins on
specificity (with `!important` only where the theme uses pseudo-element
gradients). The mobile hamburger (`.menu-button`) and its existing show/hide JS
are left in charge of the mobile drawer.

If you would rather delete the now-superseded rules from the theme **SCSS
source** (cleaner long-term, since `style.css` is compiled), these are the
blocks `header-styles.css` replaces:

- `header { margin: 1em 53px 0 }` (+ its 33px / 15px responsive variants)
- `.site-title { … }`, `.business-details { … }`, `.phone-number { font-size:32px }`
- `.main-menu .menu-item:not(.menu-item-has-children)::before { … gradient … }`
- `.main-menu .menu-item-has-children { background:#e3902a }` (+ `:hover`)
- `.main-menu .menu-item { margin-right:6px; overflow:hidden }`
- `.main-menu .menu-item a { padding:10px; font-weight:400 }`
- `.main-menu .sub-menu { top:39px; … }`
- the `@media (max-width:781px)` header block

Each of those is annotated with a matching "supersedes" comment in
`header-styles.css`, so you can map them one-to-one.

### Optional: add a "Get a quote" button to the header
The current header has no CTA button. If you want one (as in the mock), add this
inside `.business-details` in `themes/sevenpeaks/header.php`, just after the
`.email` link:

```php
<a class="header-cta" href="/contact">Get a quote</a>
```

…then add to `header-styles.css`:

```css
header .business-details .header-cta {
  margin-top: 8px;
  background: #e3902a;
  color: #191512;
  font-weight: 500;
  padding: 9px 18px;
  border-radius: 6px;
  text-decoration: none;
  transition: background-color .3s, color .3s;
}
header .business-details .header-cta:hover { background: #2a965f; color: #fff; }
```

## What maps to what
| Redesign section | Block used |
|---|---|
| Hero copy + portrait video | `wp:columns` + `wp:heading`/`wp:paragraph`/`wp:buttons` + your `wp:video` (real `.mp4`) |
| Trust stats band | `wp:group` + `wp:columns` (dark band via CSS) |
| Services grid | **your** `image-menu-block/image-menu` (`menuSlug:"home-page-boxes"`) — unchanged |
| About / editorial | `wp:columns` + `wp:image` + text |
| Instagram feed | **your** `sbi/sbi-feed-block` (Smash Balloon) — unchanged |
| Contact | `wp:columns` + `[contact-form-7 id="124"]` shortcode — unchanged |
| Map | your Google Maps `wp:html` iframe |

## Caveats — please read
- **The `sp-*` class names are the styling hooks.** If the editor strips a
  custom class, re-add it in the block's *Advanced → Additional CSS class(es)*
  panel, or the section will lose its styling.
- **Image URLs** in the About block point at example media-library paths
  (`/wp-content/uploads/2020/03/7-peaks-8.jpg`). Swap them for the real
  attachment URLs from your library (the spray-booth shot).
- **Instagram grid layout** (6-across, square) is controlled by the Smash
  Balloon plugin's own settings, not fully by CSS — set columns = 6 and a small
  gutter in the plugin to match the mock. The CSS only nudges radius/padding.
- **Fonts:** Schibsted Grotesk + Hanken Grotesk load via the `@import` in the
  CSS. For best performance, enqueue them in the theme instead of `@import`.
- This is a **content + cosmetic** handoff. The interactive prototype
  (`ui_kits/website/home-redesign.html`) remains the source of truth for the
  exact look; minor spacing will differ inside your theme's own wrappers.
- The sticky frosted header in the mock is part of the prototype shell — your
  WordPress theme keeps its own `header.php`. Ask if you want the header
  restyled too and I'll provide that separately.
