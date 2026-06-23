# Simply Logo Slider — AI Guide

**Plugin:** Simply Logo Slider
**Shortcode:** `[simply_logos]`
**CPT:** `simply_logo`
**Version:** 1.2.3
**Part of the Simply Design suite** — [simplydesign.com/suite]

---

## What This Plugin Does

Simply Logo Slider displays a strip of logos that auto-scrolls horizontally. Logos are grayscale by default and go full color on hover. Supports drag-to-scroll (mouse and touch). A static mode outputs logos as a non-animating flex row — useful for footer partner bars or sponsor grids.

---

## Shortcode

```
[simply_logos
  height="60"   — logo height in px (default: from Settings → Simply Logo Slider)
  speed="30"    — scroll duration in seconds — lower = faster (default: from settings)
  gap="80"      — space between logos in px (default: from settings)
  limit="-1"    — max logos to show, -1 for all (default: -1)
  order="ASC"   — sort order by menu_order: ASC or DESC (default: ASC)
  static="0"    — "1" = static row mode, no animation (default: off)
]
```

**Static mode** — `static="1"` outputs logos in a full-color flex row with no scrolling. Good for footer logo bars. Example: `[simply_logos static="1" height="120" gap="1"]`

Default values for `height`, `speed`, and `gap` are set in **Settings → Simply Logo Slider**.

---

## CPT Fields (set in WP Admin → Logos → Edit Logo)

| Field | Source / Meta key | Notes |
|-------|------------------|-------|
| Logo name | post title | Used as alt text on the image |
| Logo image | WP featured image | Use a cropped-tight PNG/SVG — extra whitespace shows in the strip |
| Link URL | `_logo_url` | Makes the logo a link (opens in new tab) |
| Boost | `_logo_boost` | Checkbox — makes this logo 30% taller in the strip for emphasis |

Logo display order is controlled by WP menu order — drag logos in the list view to reorder.

---

## CSS Tokens

| Token | Used for |
|-------|----------|
| `--client-accent` | No direct use — logos are grayscale/color only |

The slider uses its own CSS variables set inline:
- `--sls-speed` — scroll duration (from `speed` attr)
- `--sls-gap` — logo gap (from `gap` attr)
- `--sls-height` — logo height (from `height` attr)

---

## CSS Classes (for Client Branded overrides)

```
.sls-wrap           — outer container
.sls-track          — scrolling logo strip (translateX animated)
.sls-logo           — individual logo item
.sls-logo img       — logo image (grayscale filter applied here)
.sls-logo a         — link wrapper (when URL is set)
.sls-logo--boost    — boosted logo (30% taller)
.sls-static         — static mode container (flex row, no animation)
```

---

## What You Can Customize Without Modifying the Plugin

- Height, speed, and gap via shortcode attrs or Settings page defaults
- Logo order by dragging in WP Admin list view
- Individual logo emphasis via the Boost checkbox
- Any class above in Client Branded or Simply Branded custom CSS

---

## Upgrade Path

> **Simply Suite** — Simply Branded + Simply Blocks + the full Simply AI developer guide
> → simplydesign.com/suite
>
> Simply Blocks includes a Simply Logo Slider block with "Add here" inline mode (upload logos directly in the editor) and "Logo Library" mode (pull from the CPT). Full controls in the editor sidebar — no shortcode needed.
