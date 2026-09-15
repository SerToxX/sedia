---
version: 1
slug: "resources-views-admin-layout-blade-php"
primary_target: "resources/views/admin/layout.blade.php"
related_targets: ["resources/views/admin/login.blade.php","resources/views/admin/dashboard.blade.php","resources/views/admin/products/index.blade.php","resources/views/admin/products/_form.blade.php","resources/css/admin.css","resources/js/admin.js"]
---

## Scope & mode

Operate. Full redesign (v2 — v1 rejected by client) of the Sedia admin panel: login page + admin shell (sidebar/topbar), dashboard (KPIs + recent products table), products list, and the product form modal. Primary target `resources/views/admin/layout.blade.php`; related: `resources/views/admin/login.blade.php`, `resources/views/admin/dashboard.blade.php`, `resources/views/admin/products/index.blade.php`, `resources/views/admin/products/_form.blade.php`, `resources/css/admin.css`, `resources/js/admin.js`, `resources/views/components/admin-icon.blade.php`.

## Why v1 was rejected

The client chose the "classic SaaS dashboard" (cool neutral grays + indigo accent, Linear as craft bar) from a 4-option round, then rejected it after seeing it built: "no se ve para nada cálido ni profesional, no tiene nada bonito" (not warm, not professional-feeling, not beautiful) — covering colors, structure, and the login page. Verbatim complaint also included "muy plano/soso, muy corporativo/frío" sentiment. Standing direction is now revised in PRODUCT.md to **"Bin Card"** (an inventory/shelf-label system), one of the 3 more distinctive directions originally offered and declined at the time.

## Audience, job, action, proof, constraints

Unchanged from v1: shop owner + future sales staff managing the Sedia furniture catalog; fast CRUD, daily-glance dashboard; must preserve the toast component unstyled, the light/dark toggle mechanism, full responsiveness, and traditional full-page Blade navigation (reliability over navigation snappiness, client's own stated priority).

## Direction contract (v2 — Bin Card)

THESIS: The panel reads as the label/tag system stamped on every bin, shelf, and product tag in a well-run stockroom — warm, tactile, and specific to running a furniture catalog — refusing both the previous attempt's cold corporate-SaaS grays AND the generic "warm cream + elegant serif + terracotta" AI-cliché combo (no display serif here; identity comes from a monospace label-maker character instead).

OWN-WORLD: Warm kraft-paper ground (`36 18% 96%` light / warm near-black workshop-floor `30 12% 9%` dark — never cool gray). ONE accent, a deep ochre "stamp ink" (`26 72% 42%` light, brightened to `30 82% 58%` — a single warm work-light — in dark mode), used only on the primary action and active nav state. Two-tier type system, no serif: **Karla** (humanist, warm, rounder than a grotesque) carries all UI text — labels, nav, buttons, body; **JetBrains Mono** is reserved for the brand wordmark/page titles (stencil/label-maker character, used sparingly, bold weight) AND every numeric data value (SKU, price, stock, KPI figures) — tying "identity" and "data" to the same tag/label material instead of a decorative display face. Cards and KPI tiles carry a small perforated-notch corner detail (a literal die-cut ticket corner, subtle, not skeuomorphic overkill). Status shown as small filled dots (like inventory stickers: green/amber/red) next to plain text, not colorful pill badges. Warm hairline borders (kraft-tan, not cool gray). Soft warm-toned shadow on floating surfaces only (login card, modal) — never cool/blue-tinted shadow.

STORY: An admin opens a page that immediately feels like the label they'd print for a shelf in their own stockroom — not a rented SaaS template — logs in through a single warm ticket-card, and reads the dashboard's KPI tags and the product ledger with the same at-a-glance confidence they'd read physical stock tags.

FIRST VIEWPORT: Login — centered warm ticket-card (~370px) with a visible perforated top-corner notch, JetBrains Mono wordmark, Karla field labels, solid-ochre full-width button. Dashboard — sidebar on kraft-white with the mono wordmark and a quiet ochre active-nav pill; main column: page header (mono title + ochre primary button) then a 4-up KPI row where each tile has the perforated-corner detail and a bold mono figure; then the product ledger table with warm hairline row dividers, mono numeric columns right-aligned, and small status dots instead of pill badges.

FORM: Second attempt at "Create or replace the visual world" — client declined the canon/classic direction after building it; this is the "Bin Card" challenger-turned-primary from the original 4-option round (seed key f228b210, was index 6/assigned in the original grounded-direction roll). No new concept-seed roll needed: the client is re-selecting a previously-generated, already-vetted option rather than requesting fresh candidates.

FINISH: unreviewed and undocumented is unfinished; this build ends with the finish review, the verdict, DESIGN.md, and every shipping raster carrying its provenance.

## Unresolved decisions

None. Code-led (no image generation available). DESIGN.md and PRODUCT.md's standing-direction note must both be updated to replace, not append to, the v1 "classic dashboard" record once v2 ships.
