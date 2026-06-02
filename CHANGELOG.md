# Simply Logo Slider — Changelog

## [1.1.0] — 2026-06-02

### Added
- Admin settings page (Logo Slider → Settings) for height, speed, and gap defaults
- Shortcode reads saved defaults — no attributes needed for standard use
- Shortcode attributes still override settings per-instance

---

## [1.0.0] — 2026-06-02

### Added
- Initial release
- `simply_logo` CPT — title, featured image (logo), link URL, menu order for sorting
- [simply_logos] shortcode — height, speed, gap, limit attributes
- Auto-scrolling marquee — only activates when logos exceed container width
- Grayscale default, full color on hover, smooth transition
- Entire slider pauses on mouseenter, resumes on mouseleave
- Seamless infinite loop via JS clone (no duplicate markup in source)
- Admin columns: logo thumbnail + link URL
