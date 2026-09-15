# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Today the panel is operated solely by the developer/owner of Sedia. It must be designed for multiple staff members over time: a role system is planned (`Administrador`, `Vendedor`), with `Administrador` as the only role in active use right now. Design and information architecture should not assume a single permanent user.

## Product Purpose

Sedia is a home-furniture e-commerce brand (chairs, "estilo y confort diario que inspiran hogar" — see the public storefront's About copy). This admin panel (`/dashboard`) is the internal back-office tool that manages the product catalog feeding that public storefront: creating/editing/deactivating products, tracking stock and pricing. Success is fast, error-free catalog upkeep by non-technical staff.

## Positioning

Not customer-facing; not evaluated against competitors. Its "position" is purely operational: it is the backbone that keeps the public storefront's catalog accurate.

## Operating Context

- Runs alongside the public Sedia storefront, which has its own separate Tailwind-based design system. The admin panel's CSS/JS/views (`resources/css/admin.css`, `resources/js/admin.js`, `resources/views/admin/**`) are already fully isolated from it and must stay that way.
- Stack: Laravel Blade views, Alpine.js (loaded via CDN, used for a product-form modal), Vite for asset bundling. Auth uses a dedicated `admin` guard/provider, separate from any customer-facing auth.
- A shared toast/flash-notification component already exists (`resources/views/partials/message-toast.blade.php`, `resources/css/toast.css`, `resources/js/utils/toast.js`) and is used across the panel for success/error feedback.
- Current sections: Dashboard (KPIs + recent products) and Productos (CRUD, with an Alpine-driven modal form). Roadmap includes Pedidos, Clientes, Reportes, and likely Configuración — confirmed as coming, not hypothetical.

## Capabilities and Constraints

- Auth guard `admin` (session driver, `admins` provider → `App\Models\Admin`). Role system is planned (`Administrador`, `Vendedor`) but not yet implemented — only `Administrador` exists today. Do not build a full permissions UI; design should simply not preclude adding role-aware navigation/actions later.
- The business explicitly prioritizes this tool **not breaking** ("no debe poder caerse") over navigation snappiness. This settles the SPA-vs-MPA question: keep traditional server-rendered Blade navigation (full page loads) between sections rather than introducing a client-side router/partial-reload layer — fewer moving parts, well-understood failure modes, and it scales naturally as more CRUD sections (Pedidos, Clientes, Reportes) are added the same way Productos was.
- Sidebar/IA must be built to scale to the roadmap sections above without a future redesign (e.g. structured for grouping, not just two flat links).
- Must stay fully responsive: mobile sidebar collapse, KPI grid reflow, table horizontal scroll on narrow screens (existing functional requirements, must be preserved).
- Theme: light is the default/primary state; dark is a secondary, explicitly opt-in state via an existing toggle (`data-theme` attribute persisted to `localStorage`, wired in `admin.js`) — keep that mechanism, restyle on top of it.
- The toast/flash component (see Operating Context) must be reused as-is, not restyled or replaced.

## Brand Commitments

Name: "Sedia". The public storefront's voice is warm, elegant, home-lifestyle oriented. The admin panel is an internal operational tool and is explicitly **not required** to reuse the storefront's current visual palette — it can adopt its own visual direction as long as it reads as a professional business/admin tool (not a marketing page).

**Standing visual direction (admin panel only) — v3, current:** two earlier attempts were rejected. V1 was a cool-gray/indigo "classic SaaS dashboard" — rejected as not warm, not professional-feeling, not beautiful. V2 was a warm "Bin Card" inventory-tag system (kraft paper, amber accent, monospace, perforated-corner detail) — rejected too, with the client clarifying the real problem was **structural**, not color: "las tarjetas, la barra de la izquierda, etc son muy de IA" (the stat cards, the left sidebar, etc. read as generic AI-dashboard scaffolding), naming the 4-card KPI grid and the product-add modal specifically as disliked, and asking for the brand's own green (`#AAB975`) + white + black (with room for more accent colors, since it's an admin tool) and Poppins typography (matching the public site) throughout.

V3 (current, built) changes the structure itself, not just theming: **no left sidebar** (a single top nav bar instead, collapsing to a dropdown on mobile); **no 4-card KPI grid** (one horizontal summary strip with dividers instead); **no centered modal for product create/edit** (a right-docked slide-over drawer instead). Palette: Sedia green (`#AAB975` family) + white + near-black + a terracotta secondary + semantic state colors, no cool grays or unrelated hues. Typography: Poppins everywhere. See `DESIGN.md` for full tokens. Do not reintroduce a left sidebar, a stat-card grid, a centered modal, or any color outside the brand-green/terracotta/semantic set — all were tried and explicitly rejected.

## Evidence on Hand

- Example live data: product "Silla Orion", category "Silla premium", price S/ 200.00, stock 2, active.
- Eloquent models: `App\Models\Admin`, `App\Models\Product`; migrations for `admins` and `products` tables already exist.
- No customer testimonials, benchmarks, or press for this internal tool — none should be fabricated.

## Product Principles

1. Reliability over cleverness — this is an operational tool the business depends on; favor boring, predictable, well-understood patterns over experimental ones.
2. Built to grow — the IA and layout must accommodate Pedidos/Clientes/Reportes/Configuración being added later without a future redesign.
3. Clarity for fast task completion — this is an Operate-mode surface: scanability and low cognitive load outrank visual flourish.
4. Light-first, dark-optional — the default experience is tuned for light; dark mode is a fully supported secondary state, not an afterthought, but never the design's baseline.
5. Isolated by design — the admin visual system stays fully decoupled from the public storefront's design system, now and as both evolve.

## Accessibility & Inclusion

No formal standard was specified; follow standard contrast and keyboard-focus best practice given the panel will be used by non-technical staff.
