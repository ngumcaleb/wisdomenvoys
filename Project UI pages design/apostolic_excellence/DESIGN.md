---
name: Apostolic Excellence
colors:
  surface: '#fff8f7'
  surface-dim: '#f4d2cf'
  surface-bright: '#fff8f7'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#fff0ee'
  surface-container: '#ffe9e6'
  surface-container-high: '#ffe2de'
  surface-container-highest: '#fddbd7'
  on-surface: '#291715'
  on-surface-variant: '#5d3f3c'
  inverse-surface: '#402b29'
  inverse-on-surface: '#ffedea'
  outline: '#926f6b'
  outline-variant: '#e7bdb8'
  surface-tint: '#c00014'
  primary: '#ba0013'
  on-primary: '#ffffff'
  primary-container: '#e31e24'
  on-primary-container: '#fffafa'
  inverse-primary: '#ffb4ab'
  secondary: '#516072'
  on-secondary: '#ffffff'
  secondary-container: '#d1e1f7'
  on-secondary-container: '#556477'
  tertiary: '#bb0010'
  on-tertiary: '#ffffff'
  tertiary-container: '#e7111c'
  on-tertiary-container: '#fffaff'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdad6'
  primary-fixed-dim: '#ffb4ab'
  on-primary-fixed: '#410002'
  on-primary-fixed-variant: '#93000d'
  secondary-fixed: '#d4e4fa'
  secondary-fixed-dim: '#b8c8de'
  on-secondary-fixed: '#0d1d2d'
  on-secondary-fixed-variant: '#39485a'
  tertiary-fixed: '#ffdad6'
  tertiary-fixed-dim: '#ffb4ab'
  on-tertiary-fixed: '#410002'
  on-tertiary-fixed-variant: '#93000a'
  background: '#fff8f7'
  on-background: '#291715'
  surface-variant: '#fddbd7'
  surface-muted: '#F8F9FA'
  text-on-dark: '#FFFFFF'
  accent-pink: '#E91E63'
typography:
  display-xl:
    fontFamily: Montserrat
    fontSize: 56px
    fontWeight: '800'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Montserrat
    fontSize: 40px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-lg-mobile:
    fontFamily: Montserrat
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Montserrat
    fontSize: 28px
    fontWeight: '700'
    lineHeight: '1.3'
  title-sm:
    fontFamily: Montserrat
    fontSize: 20px
    fontWeight: '600'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-caps:
    fontFamily: Montserrat
    fontSize: 14px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: 0.1em
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  section-gap: 8rem
  content-gap: 4rem
  grid-gutter: 2rem
  container-padding: 1.5rem
---

## Brand & Style

The design system is rooted in the "Apostolic Mandate" — a philosophy that balances divine authority with community-focused warmth. The brand personality is institutional yet accessible, characterized by bold proclamations and heartfelt testimonies. 

The visual style follows a **Corporate / Modern** aesthetic with high-impact color blocks. It utilizes a structured grid to manage high information density while maintaining a clean, breathable interface. Key attributes include:
- **Authoritative:** Heavy, bold typography for headers to establish mandate and mission.
- **Trustworthy:** A clean white canvas with structured dark neutrals for deep legibility.
- **Vibrant:** Strategic use of primary red to drive action and represent passion.

## Colors

The palette is dominated by a powerful **Apostolic Red** which serves as the primary brand identifier and action color.

- **Primary Red (#E31E24):** Used for primary CTAs, active states, and brand-critical iconography.
- **Deep Charcoal (#081828):** Employed for primary body text and footer backgrounds to ensure high contrast and a grounded, professional feel.
- **Clean White (#FFFFFF):** The default surface color to maintain a "pure" and modern layout.
- **Accent Pink (#E91E63):** Used sparingly for secondary highlights, small badges, or decorative gradients in hero sections to add warmth.

## Typography

This design system uses a dual-font approach to balance impact with readability.

- **Montserrat** is the primary typeface for headlines and labels. Its geometric stability conveys authority and modernism.
- **Plus Jakarta Sans** is the secondary typeface for body copy. Its soft, open counters ensure that long-form testimonies and descriptions are approachable and highly legible.

**Usage Rules:**
- Use `display-xl` exclusively for hero mandates.
- `label-caps` should be used for eyebrow text (text above headings) and small category tags.
- Body text should never fall below `16px` to maintain accessibility for a diverse demographic.

## Layout & Spacing

The design system utilizes a **Fixed Grid** model for large screens, centering content within a 1280px max-width container, while transitioning to a fluid model on smaller devices.

- **Vertical Rhythm:** A generous `8rem` (128px) gap is maintained between major sections (e.g., between the Hero and Services section) to allow the "Mandate" to feel expansive and uncrowded.
- **Desktop Grid:** 12-column layout with 32px gutters. Cards typically span 3 or 4 columns.
- **Mobile Grid:** 4-column layout with 16px gutters and 24px side margins.
- **Reflow:** Service cards should stack vertically on mobile and transition to a 2-column grid on tablets.

## Elevation & Depth

Hierarchy is established through **Tonal layering** and **Ambient shadows**.

- **Cards & Containers:** Service and Testimony cards use a very soft, diffused shadow (`0px 4px 20px rgba(0,0,0,0.05)`) to lift them slightly from the white background without creating visual noise.
- **Hero Sections:** Large color-blocked backgrounds (Red or Gradient) are used to create the highest level of hierarchy, effectively "pinning" the most important message at the top.
- **Subtle Overlays:** Use a semi-transparent white or dark overlay on background images to ensure typography maintains a 4.5:1 contrast ratio.

## Shapes

The shape language is **Soft** and professional. 

- **Components:** Standard buttons and input fields use a `0.25rem` (4px) radius.
- **Feature Cards:** Service containers and testimony blocks use a `0.5rem` (8px) radius (`rounded-lg`) to feel more modern and welcoming.
- **Interactive Elements:** Small pill-shaped buttons (`rounded-full`) may be used for "Read More" links to differentiate them from primary page actions.

## Components

### Buttons
- **Primary:** Solid Red background with white text. High-contrast, bold weight Montserrat.
- **Secondary:** Transparent with a Red border (Ghost style) or White on Dark for footer actions.
- **Sizing:** Standard buttons should have a minimum height of 48px for touch accessibility.

### Cards
- **Service Cards:** Feature a top-aligned image, a Title in `title-sm`, and short excerpt in `body-md`. 
- **Testimony Cards:** Centered text with a quote icon at the top. Use a subtle shadow and `surface-muted` background to distinguish from the main page.

### Header & Footer
- **Header:** Sticky on scroll with a white background and the full-color logo. Navigation links use `label-caps` in Deep Charcoal.
- **Footer:** Deep Charcoal background (`#081828`) with White text. Organized into multi-column lists for "Programs," "Resources," and "Administration."

### Inputs
- **Form Fields:** Light gray border with 4px roundedness. Active state uses a 2px Red border stroke.