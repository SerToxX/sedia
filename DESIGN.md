---
name: Sedia Admin
description: Operating dashboard for the Sedia product catalog — brand green, white, black, Poppins.
colors:
  background: "#F6F7F2"
  surface: "#FFFFFF"
  foreground: "#1E1E1E"
  muted-bg: "#ECEEE7"
  muted-foreground: "#6B6B6B"
  border: "#DEE1D6"
  accent: "#718042"
  accent-soft: "#AAB975"
  secondary: "#B65735"
  success: "#367C4C"
  warning: "#BD7D0F"
  danger: "#BE402D"
typography:
  body:
    fontFamily: "Poppins, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif"
    fontSize: "14px"
    fontWeight: 400
    lineHeight: 1.5
  title:
    fontFamily: "{typography.body.fontFamily}"
    fontSize: "20px"
    fontWeight: 600
  label:
    fontFamily: "{typography.body.fontFamily}"
    fontSize: "13px"
    fontWeight: 500
  wordmark:
    fontFamily: "Phenomena, Poppins, sans-serif"
    fontSize: "24px"
    fontWeight: 600
rounded:
  sm: "6px"
  md: "10px"
  pill: "999px"
spacing:
  xs: "6px"
  sm: "10px"
  md: "16px"
  lg: "22px"
components:
  button-primary:
    backgroundColor: "{colors.accent}"
    textColor: "#FFFFFF"
    rounded: "{rounded.sm}"
    padding: "9px 16px"
  button-outline:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.foreground}"
    rounded: "{rounded.sm}"
    padding: "9px 16px"
  badge-active:
    textColor: "{colors.success}"
    rounded: "{rounded.pill}"
---

# Design System: Sedia Admin

**Scope note:** this file documents only the admin panel (`/dashboard`, `resources/css/admin.css`, `resources/views/admin/**`). The public Sedia storefront has its own separate, pre-existing visual system and is intentionally not covered here.

## Overview

**Creative North Star: "The Catalog Ledger"**

Sedia Admin is the internal operating tool for keeping the Sedia furniture catalog accurate — built on the brand's own green (`#AAB975`), white, and near-black, using the same Poppins typeface as the public storefront, so the admin tool visibly belongs to Sedia rather than reading as a generic rented dashboard template.

This is the **third** direction for this surface. The first (storefront sage-green/opal recolor of a generic scaffold) and second (a cool-gray "classic SaaS dashboard" with an indigo accent, then a warm "inventory tag" system in Poppins-less Karla/JetBrains Mono) were both explicitly rejected by the client. The client's core, repeated complaint: the *structure* kept reading as a generic AI-generated admin-dashboard scaffold — a left sidebar, a row of four identical "hero metric" stat cards, and a centered modal dialog for editing — regardless of which colors or fonts sat on top of it. This version changes the structure itself:

- **No left sidebar.** Navigation lives in a single top bar (brand mark, inline nav links, theme toggle, and user actions), collapsing to a dropdown panel on mobile.
- **No stat-card grid.** The dashboard's summary numbers (total, active, out of stock, inventory value) are a single horizontal strip with divider lines between values — one cohesive element, not four repeated bordered boxes.
- **No centered modal for editing.** Creating/editing a product opens a right-docked slide-over drawer instead of a centered dialog overlay.

**Key Characteristics:**
- Brand palette only: sage-olive green (`#AAB975` family), white, near-black, plus a warm terracotta secondary and semantic state colors — no cool neutral grays, no unrelated brand hue.
- Single type family, Poppins, matching the public storefront — titles and body alike.
- Top bar navigation, not a sidebar.
- Dashboard numbers read as one inline summary strip, never a grid of identical stat cards.
- Product create/edit happens in a right-docked slide-over drawer, not a centered modal.

## Colors

### Primary
- **Sedia Green — Deep** (`#718042`): solid buttons, primary actions, focus rings. A darkened version of the brand color for sufficient contrast with white text.
- **Sedia Green — Soft** (`#AAB975`): the literal brand color. Used for the logo dot, badge tints, and icon accents on light backgrounds — decorative/identity uses, not solid button fills.

### Secondary
- **Warm Terracotta** (`#B65735`): the one permitted second accent (the client explicitly allowed more color variety since this is an admin tool, not a single-accent brand page). Reserved for a secondary emphasis where the primary green would be ambiguous — not yet wired to a specific component; available for future sections.

### Neutral
- **Page Wash** (`#F6F7F2` light / near-black `#17190F`-family dark): the app shell background, a faint green-tinted off-white — never cool/blue gray.
- **Surface White** (`#FFFFFF` light / dark warm-charcoal in dark mode): top bar, cards, table, drawer.
- **Ink** (`#1E1E1E` light / near-white dark): primary text.
- **Quiet Gray** (`#6B6B6B`): secondary text, captions, muted metadata.
- **Hairline** (`#DEE1D6`): the only border color.

### Semantic
- **Confirmed Green** (`#367C4C`): "Activo" status dot.
- **Caution Amber** (`#BD7D0F`): low-stock warning text.
- **Alert Red** (`#BE402D`): destructive actions, form errors, out-of-stock state — warm-leaning red, not a cold digital red, to stay in the same family as the terracotta secondary.

### Named Rules
**The Brand-Only Rule.** Every color on this surface is either the Sedia green family, a neutral (white/black/gray), the terracotta secondary, or a semantic state color. No unrelated brand hue (no indigo, no cool blue) is introduced for its own sake.

## Typography

**Font:** Poppins (with the system sans stack as fallback) — the same face used across the public Sedia storefront's body text.

**Character:** One typeface for everything: page titles, nav, labels, buttons, table data. Hierarchy comes from weight and size, not from switching faces.

### Hierarchy
- **Title** (600, 20px): page titles ("Dashboard", "Productos"), drawer titles.
- **Section label** (600, 13.5px): card header titles.
- **Body** (400, 14px): table cells, form inputs, nav links.
- **Label** (500, 13px): field labels.
- **Micro** (600, 11px, uppercase, 0.04em tracking): table column headers.

### Named Rules
**The One Family Rule.** No second typeface is introduced anywhere on this surface, including the summary strip's large figures — weight and size carry all emphasis.

## Layout

A single sticky top bar (58px) replaces the sidebar shell entirely: brand wordmark on the left (set in Phenomena — the same face as the public storefront's header logo — not Poppins), inline nav links, then theme toggle / role badge / "Volver a Sedia" link / "Cerrar sesión" on the right, collapsing past 760px into a dropdown panel triggered by a hamburger button. Content runs full-width with side padding only — no centered max-width column, no side gutters. The dashboard is intentionally empty for now (title + an empty-state notice, nothing else) until the client defines what belongs there. Productos is a responsive card grid (`auto-fill, minmax(220px,1fr)`), not a table: each card shows the cover image, a gallery-count badge, an active/inactive status dot, up to 4 color-swatch dots, name, category, price (with regular price struck through when a discount is set), and stock — hover reveals edit/delete icon actions.

## Elevation & Depth

Flat by default: hairline 1px borders separate surfaces from the page background, not shadow. Shadow is reserved for genuinely floating surfaces: the login card and the product drawer (which slides in over the page).

### Shadow Vocabulary
- **Floating** (`0 8px 20px rgba(30,33,20,.10), 0 20px 44px rgba(30,33,20,.12)`, deeper/darker in dark mode): login card and the product drawer panel only.

### Named Rules
**The Flat-By-Default Rule.** Nothing sitting in normal page flow (top bar, summary strip, table card) gets a shadow. Only a surface that floats above the page earns one.

## Shapes

Small, consistent radius: 6px on inputs/buttons/icons, 10px on cards. No sharp corners, no heavy rounding, no signature notch/skeuomorphic detail — the previous "perforated ticket corner" motif from the rejected second attempt was dropped along with it.

## Components

### Buttons
- **Primary:** solid deep-green (`#718042`) background, white text, 6px radius. One per view (page-header action, drawer submit, login submit).
- **Outline:** white/surface background, hairline border, foreground text — every secondary action (Cancelar, Limpiar).
- **Danger (text-only):** transparent, red text, hairline border, fills with a soft red tint on hover.

### Top Bar Navigation
- Brand wordmark set in Phenomena (matches the public site's header logo), not Poppins — the only place on this surface that departs from the One Family Rule, because it is literally the shared brand mark, not UI text.
- Inline text links (not icon-tiles), muted by default, green + semibold when active — no filled pill, no colored left border.
- "Volver a Sedia" is a plain text link (no store icon) and "Cerrar sesión" always pairs its icon with the visible label — never an icon-only button for either.
- Collapses under 760px into a dropdown panel (hamburger-triggered) that also carries "Volver a Sedia" and "Cerrar sesión" hidden from the bar itself at that width.
- The role badge (`Admin`) is a solid deep-green pill with white text — not a light tint — for contrast in light mode.

### Product Grid (Productos)
- Responsive card grid, not a table. Each card: cover image with a gallery-count badge and active/inactive status dot overlaid, up to 4 color-swatch dots (name in the `title` tooltip), name, category, price (discount-aware), stock. Edit/delete icons appear on hover, top-right of the image.

### Drawer (product create/edit)
- Slides in from the right edge, docked to the viewport, full height, `max-width: 480px`. Header/body/footer stack with hairline dividers, close (×) icon top-right. Replaces the centered modal dialog used in earlier attempts.

### Tables
- Hairline row dividers, subtle full-row hover tint, uppercase micro-label column headers. Numeric columns (price, stock) right-aligned with tabular figures. Status shown as a small filled dot + text label, not a colorful pill badge.

### Inputs / Fields
- 1px hairline border, 6px radius, white background.
- **Focus:** border switches to deep green + a soft 3px green glow.
- **Error:** red helper text below the field only; the border itself does not turn red.

## Do's and Don'ts

### Do:
- **Do** keep every color on this surface inside the Sedia green / white / black / terracotta / semantic-state set — no incidental brand hues.
- **Do** use Poppins for UI text; reserve Phenomena strictly for the brand wordmark, never for headings or body copy.
- **Do** run content full-width with side padding only — no centered max-width column, no side gutters "framing" the page.
- **Do** open product create/edit in the right-docked drawer, never a centered modal.
- **Do** keep navigation in the top bar; do not reintroduce a persistent left sidebar.
- **Do** show "Cerrar sesión" with its icon AND visible text together; never icon-only.
- **Do** keep "Volver a Sedia" as plain text, no store icon.

### Don't:
- **Don't** reach for a 4-up grid of icon+number+label cards for any future summary/metrics need on this surface — it was explicitly rejected twice as "muy de IA" (generic AI-dashboard scaffolding). The dashboard stays empty until the client specifies what belongs there.
- **Don't** introduce a cool neutral gray, an indigo/blue accent, or any color outside the brand-green/terracotta/semantic set — both previous attempts did this and were rejected.
- **Don't** restyle the shared toast/flash component (`resources/css/toast.css`, `resources/views/partials/message-toast.blade.php`) — out of scope by explicit client instruction.
- **Don't** add a client-side router or partial-page navigation layer between admin sections — the client prioritized this tool "not being able to fall over" over navigation speed.
- **Don't** reintroduce the "perforated ticket corner" motif or a centered max-width content column — both were explicitly removed at the client's request.
