<?php
require_once __DIR__ . '/config/constants.php';
require_once __DIR__ . '/includes/functions.php';
$page_title = 'About Us — ' . SITE_TITLE;
require_once __DIR__ . '/includes/header.php';
?>

<style>
/* ==========================================================================
   ABOUT US PAGE STYLES
   ========================================================================== */
:root {
    --ra-red: #C8102E;
    --ra-red-dark: #9A0C23;
    --ra-red-deep: #6B0818;
    --ra-red-binset-inline-end: #E50920;
    --ra-red-light: #FCE8EB;
    --ra-text-dark: #111827;
    --ra-text-muted: #6B7280;
    --ra-bg-soft: #FDF8F8;
    --ra-white: #ffffff;
    --ra-charcoal: #17191D;
    --font-main: 'Manrope', 'Inter', sans-serif;
}

/* --- Section 1: Hero --- */
.ra-hero {
    display: flex;
    background: linear-gradient(90deg, var(--ra-red-dark) 0%, var(--ra-red) 50%, #E84C61 100%);
    min-block-size: 380px;
    position: relative;
    overflow: hidden;
}
.ra-hero-content {
    flex: 1;
    padding: 50px 5%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    z-index: 2;
    max-inline-size: 50%;
}
.ra-hero-image {
    flex: 1;
    position: relative;
    background: url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1200&q=80') no-repeat center center;
    background-size: cover;
    clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
    margin-inline-start: -10%;
}
.ra-hero-eyebrow {
    color: var(--ra-white);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-block-end: 15px;
}
.ra-hero-title {
    font-size: 2.6rem;
    font-weight: 400;
    color: var(--ra-white);
    line-height: 1.1;
    margin-block-end: 20px;
}
.ra-hero-title span { color: #ff6b7f; font-weight: 400; }
.ra-hero-desc {
    font-size: 1rem;
    color: rgba(255,255,255,0.9);
    line-height: 1.6;
    margin-block-end: 25px;
    max-inline-size: 450px;
    font-weight: 400;
}
.ra-btn-white {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--ra-white);
    color: var(--ra-red);
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 700;
    text-decoration: none;
    font-size: 1rem;
    inline-size: fit-content;
    transition: all 0.3s ease;
}
.ra-btn-white:hover { background: #f0f0f0; transform: translateY(-2px); }

/* --- Section 2: About Company --- */
.ra-about-section {
    padding: 50px 5%;
    background: var(--ra-white);
    display: flex;
    gap: 40px;
    align-items: center;
    max-inline-size: 1280px;
    margin: 0 auto;
}
.ra-about-text { flex: 1; }
.ra-eyebrow {
    color: var(--ra-red);
    font-size: 0.8rem;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-block-end: 15px;
    display: block;
}
.ra-about-heading {
    font-size: 2.2rem;
    font-weight: 400;
    color: var(--ra-text-dark);
    margin-block-end: 20px;
    line-height: 1.2;
}
.ra-about-p { font-size: 1rem; color: var(--ra-text-muted); line-height: 1.7; font-weight: 400; }
.ra-est-card {
    flex: 0 0 280px;
    background: var(--ra-white);
    border: 1px solid #f0f0f0;
    border-radius: 16px;
    padding: 30px 25px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.04);
}
.ra-est-icon {
    inline-size: 60px; block-size: 60px;
    background: var(--ra-red-light);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin-block-end: 20px; color: var(--ra-red);
}
.ra-est-label { font-size: 1rem; color: var(--ra-text-muted); margin-block-end: 5px; }
.ra-est-year { font-size: 2.5rem; font-weight: 800; color: var(--ra-text-dark); margin-block-end: 15px; }
.ra-est-desc { font-size: 0.95rem; color: var(--ra-text-muted); line-height: 1.5; }
.ra-about-image { flex: 1; border-radius: 16px; overflow: hidden; block-size: 280px; }
.ra-about-image img { inline-size: 100%; block-size: 100%; object-fit: cover; }

/* --- Section 3: Core Values --- */
.ra-core-section { background: var(--ra-bg-soft); padding: 50px 5%; }
.ra-core-header { max-inline-size: 1280px; margin: 0 auto 35px; }
.ra-core-header h2 { font-size: 2.2rem; font-weight: 400; color: var(--ra-text-dark); margin: 0 0 10px 0; }
.ra-core-header p { color: var(--ra-text-muted); font-size: 1rem; max-inline-size: 500px; margin: 0; line-height: 1.6; }
.ra-core-grid {
    max-inline-size: 1280px; margin: 0 auto;
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px;
}
.ra-core-card {
    background: var(--ra-white);
    border-radius: 16px; padding: 30px;
    display: flex; gap: 20px; align-items: flex-start;
    border: 1px solid #f0f0f0;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative; overflow: hidden;
}
.ra-core-card::before {
    content: ''; position: absolute;
    inset-block-start: 0; inset-inline-start: 0; inline-size: 4px; block-size: 100%;
    background: var(--ra-red); transform: scaleY(0);
    transition: transform 0.3s ease; transform-origin: bottom;
}
.ra-core-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(200, 16, 46, 0.08); border-color: transparent; }
.ra-core-card:hover::before { transform: scaleY(1); transform-origin: top; }
.ra-core-icon {
    inline-size: 50px; block-size: 50px;
    background: var(--ra-red-light); border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; color: var(--ra-red);
    transition: all 0.4s ease;
}
.ra-core-card:hover .ra-core-icon { background: var(--ra-red); color: var(--ra-white); transform: rotate(10deg) scale(1.1); }
.ra-core-card h3 { font-size: 1.2rem; font-weight: 600; color: var(--ra-text-dark); margin: 0 0 8px 0; transition: color 0.3s ease; }
.ra-core-card:hover h3 { color: var(--ra-red); }
.ra-core-card p { color: var(--ra-text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0; }

/* --- Section 4: Mission & Vision Banner --- */
.mv-banner-section { display: flex; inline-size: 100%; min-block-size: 300px; background: var(--ra-white); }
.mv-half {
    flex: 1 1 50%; position: relative;
    display: flex; align-items: center; padding: 40px 6%;
}
.mv-mission { background-color: var(--ra-red); color: var(--ra-white); }
.mv-vision {
    background-image: url('https://images.unsplash.com/photo-1512453979798-5ea904ac66e?auto=format&fit=crop&w=1600&q=80');
    background-size: cover; background-position: center; color: var(--ra-white);
}
.mv-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(90deg, rgba(200, 16, 46, 0.9) 0%, rgba(200, 16, 46, 0.4) 50%, rgba(200, 16, 46, 0) 100%);
    z-index: 1;
}
.mv-inner { position: relative; z-index: 2; display: flex; align-items: flex-start; gap: 25px; max-inline-size: 500px; }
.mv-icon-wrap { flex-shrink: 0; margin-block-start: 5px; }
.mv-icon-wrap svg { stroke: var(--ra-white); opacity: 0.95; inline-size: 40px; block-size: 40px; }
.mv-text { display: flex; flex-direction: column; }
.mv-label { font-size: 0.75rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin-block-end: 10px; opacity: 0.9; }
.mv-heading { font-size: 1.8rem; font-weight: 400; line-height: 1.15; margin: 0 0 12px 0; letter-spacing: -0.5px; }
.mv-subtext { font-size: 0.95rem; line-height: 1.5; margin: 0; opacity: 0.95; font-weight: 300; }

/* --- Section 5: Why Choose Us --- */
.ra-why-section {
    padding: 50px 5%; background: var(--ra-white);
    max-inline-size: 1280px; margin: 0 auto;
}
.ra-why-title { font-size: 2.2rem; font-weight: 400; color: var(--ra-text-dark); margin-block-end: 30px; }
.ra-why-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
.ra-why-item {
    padding: 30px 25px; border-radius: 16px;
    background: #F9FAFB; border: 1px solid #f0f0f0;
    transition: all 0.4s ease;
    position: relative; overflow: hidden;
}
.ra-why-item::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, var(--ra-red) 0%, var(--ra-red-dark) 100%);
    opacity: 0; transition: opacity 0.4s ease; z-index: 1;
}
.ra-why-item:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(200, 16, 46, 0.15); border-color: transparent; }
.ra-why-item:hover::before { opacity: 1; }
.ra-why-icon {
    inline-size: 50px; block-size: 50px;
    background: var(--ra-red-light); border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin-block-end: 20px; color: var(--ra-red);
    position: relative; z-index: 2; transition: all 0.4s ease;
}
.ra-why-item:hover .ra-why-icon { background: var(--ra-white); color: var(--ra-red); }
.ra-why-item h3 {
    font-size: 1.1rem; font-weight: 600; color: var(--ra-text-dark);
    margin: 0 0 10px 0; line-height: 1.4;
    position: relative; z-index: 2; transition: color 0.4s ease;
}
.ra-why-item p {
    color: var(--ra-text-muted); font-size: 0.9rem; line-height: 1.6;
    margin: 0; position: relative; z-index: 2; transition: color 0.4s ease;
}
.ra-why-item:hover h3, .ra-why-item:hover p { color: var(--ra-white); }

/* --- Section 6: Safety Warning --- */
.ra-safety-section { padding: 0 5% 50px; max-inline-size: 1280px; margin: 0 auto; }
.ra-safety-box {
    background-color: #FFF5F5;
    border-inline-start: 5px solid var(--ra-red);
    border-radius: 8px; padding: 30px;
    display: flex; gap: 20px; align-items: flex-start;
}
.ra-safety-icon { color: var(--ra-red); flex-shrink: 0; }
.ra-safety-content h3 { font-size: 1.2rem; font-weight: 700; color: var(--ra-text-dark); margin: 0 0 10px 0; }
.ra-safety-content p { color: var(--ra-text-muted); font-size: 0.95rem; line-height: 1.6; margin: 0; }
.ra-safety-content strong { color: var(--ra-text-dark); }

/* ==========================================================================
   SECTION 7: CERTIFICATES & LICENSES — FULL-WIDTH BANNER
   ========================================================================== */
.ra-cred-banner {
    position: relative; inline-size: 100%;
    min-block-size: 520px; overflow: hidden;
    background: radial-gradient(120% 140% at 85% 50%, #E84C61 0%, var(--ra-red) 35%, var(--ra-red-dark) 70%, var(--ra-red-deep) 100%);
    color: #fff; display: flex; align-items: center;
    isolation: isolate;
}
.ra-cred-deco { position: absolute; inset: 0; pointer-events: none; z-index: 1; }
.ra-cred-star { position: absolute; color: rgba(255,255,255,0.10); filter: drop-shadow(0 0 20px rgba(255,255,255,0.05)); }
.ra-cred-star svg { display: block; }
.ra-cred-star.s1 { inset-block-start: 8%;  inset-inline-start: 3%;  inline-size: 120px; block-size: 120px; transform: rotate(-12deg); opacity: 0.9; }
.ra-cred-star.s2 { inset-block-start: 22%; inset-inline-start: 10%; inline-size: 60px;  block-size: 60px;  transform: rotate(18deg);  opacity: 0.55; }
.ra-cred-star.s3 { inset-block-end: 10%;   inset-inline-start: 6%;  inline-size: 90px;  block-size: 90px;  transform: rotate(25deg);  opacity: 0.6; }
.ra-cred-star.s4 { inset-block-start: 6%;  inset-inline-end: 4%;    inline-size: 140px; block-size: 140px; transform: rotate(12deg);  opacity: 0.75; }
.ra-cred-star.s5 { inset-block-end: 12%;   inset-inline-end: 12%;   inline-size: 70px;  block-size: 70px;  transform: rotate(-15deg); opacity: 0.5; }
.ra-cred-star.s6 { inset-block-end: 4%;    inset-inline-end: 30%;   inline-size: 50px;  block-size: 50px;  transform: rotate(30deg);  opacity: 0.4; }

.ra-cred-inner {
    position: relative; z-index: 2; inline-size: 100%;
    max-inline-size: 1280px; margin: 0 auto;
    padding: 60px 90px;
    display: grid; grid-template-columns: 1fr 1.15fr;
    gap: 40px; align-items: center;
}
.ra-cred-text { display: flex; flex-direction: column; }
.ra-cred-eyebrow {
    font-size: 0.78rem; font-weight: 800; letter-spacing: 3px;
    text-transform: uppercase; color: rgba(255,255,255,0.85);
    margin-block-end: 14px;
}
.ra-cred-title {
    font-size: 3rem; font-weight: 700; line-height: 1.05;
    margin: 0 0 18px 0; letter-spacing: -0.5px; color: #fff;
}
.ra-cred-desc {
    font-size: 1rem; line-height: 1.65;
    color: rgba(255,255,255,0.85); margin: 0 0 26px 0;
    max-inline-size: 460px;
}
.ra-cred-cta {
    display: inline-flex; align-items: center; gap: 10px;
    background: #fff; color: var(--ra-red-dark);
    padding: 12px 26px; border-radius: 999px;
    font-weight: 700; font-size: 0.95rem;
    text-decoration: none; inline-size: fit-content;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 10px 24px rgba(0,0,0,0.18);
}
.ra-cred-cta:hover { transform: translateY(-2px); box-shadow: 0 14px 30px rgba(0,0,0,0.24); }
.ra-cred-cta svg { inline-size: 16px; block-size: 16px; }

.ra-cred-stage { position: relative; block-size: 400px; min-inline-size: 0; }
.ra-cred-doc {
    position: absolute; inset-block-start: 50%;
    inline-size: 62%; aspect-ratio: 3 / 4;
    background: #fff; border-radius: 8px;
    box-shadow: 0 30px 60px rgba(0,0,0,0.35), 0 8px 20px rgba(0,0,0,0.2);
    overflow: hidden;
    transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.6s ease, z-index 0s;
    cursor: pointer; will-change: transform;
}
.ra-cred-doc img {
    inline-size: 100%; block-size: 100%;
    object-fit: contain; object-position: center;
    background: #fff; display: block;
    padding: 10px; box-sizing: border-box;
}
.ra-cred-doc::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 70%, rgba(0,0,0,0.06) 100%);
    pointer-events: none;
}
.ra-cred-doc.doc-1 { inset-inline-start: 0; transform: translateY(-50%) rotate(-9deg) scale(0.9); z-index: 1; opacity: 0.95; }
.ra-cred-doc.doc-3 { inset-inline-end: 0; transform: translateY(-50%) rotate(9deg) scale(0.9); z-index: 1; opacity: 0.95; }
.ra-cred-doc.doc-2 { inset-inline-start: 50%; transform: translate(-50%, -50%) rotate(-1deg) scale(1); z-index: 2; }
.ra-cred-stage:hover .doc-1 { transform: translateY(-50%) rotate(-12deg) scale(0.92) translateX(-6px); }
.ra-cred-stage:hover .doc-3 { transform: translateY(-50%) rotate(12deg) scale(0.92) translateX(6px); }
.ra-cred-stage:hover .doc-2 { transform: translate(-50%, -50%) rotate(0deg) scale(1.03); box-shadow: 0 40px 70px rgba(0,0,0,0.4), 0 10px 24px rgba(0,0,0,0.25); }

.ra-cred-nav {
    position: absolute; inset-block-start: 50%; transform: translateY(-50%);
    inline-size: 42px; block-size: 42px; border-radius: 50%;
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.30);
    color: #fff; display: flex; align-items: center; justify-content: center;
    cursor: pointer; z-index: 4;
    transition: background 0.3s ease, transform 0.3s ease, border-color 0.3s ease;
    backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
}
.ra-cred-nav:hover { background: rgba(255,255,255,0.22); border-color: rgba(255,255,255,0.55); transform: translateY(-50%) scale(1.06); }
.ra-cred-nav.prev { inset-inline-start: 22px; }
.ra-cred-nav.next { inset-inline-end: 22px; }
.ra-cred-nav svg { inline-size: 18px; block-size: 18px; }

.ra-cred-progress {
    position: absolute; inset-block-end: 22px;
    inset-inline-start: 90px; inset-inline-end: 90px;
    block-size: 2px; background: rgba(255,255,255,0.20);
    border-radius: 2px; overflow: hidden; z-index: 4;
}
.ra-cred-progress-fill {
    position: absolute; inset-block-start: 0; inset-inline-start: 0;
    block-size: 100%; inline-size: 0%;
    background: #fff; border-radius: 2px;
    transition: width 0.1s linear;
}
.ra-cred-pause {
    position: absolute; inset-block-end: 14px; inset-inline-end: 22px;
    inline-size: 28px; block-size: 28px; border-radius: 6px;
    background: rgba(255,255,255,0.10);
    border: 1px solid rgba(255,255,255,0.28);
    color: #fff; display: flex; align-items: center; justify-content: center;
    cursor: pointer; z-index: 4; transition: background 0.3s ease;
}
.ra-cred-pause:hover { background: rgba(255,255,255,0.22); }
.ra-cred-pause svg { inline-size: 12px; block-size: 12px; }

/* ==========================================================================
   SECTION SEPARATOR
   ========================================================================== */
.ra-section-separator {
    position: relative;
    inline-size: 100%;
    block-size: 90px;
    background: linear-gradient(180deg, var(--ra-red-deep) 0%, #3B0710 55%, var(--ra-charcoal) 100%);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ra-section-separator::before {
    content: '';
    position: absolute;
    inset-block-start: 0; inset-inline-start: 0;
    inline-size: 100%; block-size: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
}
.ra-sep-inner {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 0 5%;
    inline-size: 100%;
    max-inline-size: 1280px;
    margin: 0 auto;
}
.ra-sep-line {
    flex: 1;
    block-size: 1px;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
    position: relative;
}
.ra-sep-line::before {
    content: '';
    position: absolute;
    inset-block-start: -2px; inset-inline-start: 0;
    inline-size: 100%; block-size: 5px;
    background: linear-gradient(90deg, transparent, rgba(229, 9, 32, 0.55), transparent);
    filter: blur(3px);
}
.ra-sep-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 10px 22px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 999px;
    color: #fff;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    white-space: nowrap;
}
.ra-sep-badge svg {
    inline-size: 14px; block-size: 14px;
    color: var(--ra-red-bright);
    flex-shrink: 0;
}

/* ==========================================================================
   SECTION 8: GET IN TOUCH
   ========================================================================== */
.ra-contact-section {
    background: #faf8f8;
    padding: 70px 5% 80px;
    position: relative;
    overflow: hidden;
}
.ra-contact-section::before {
    content: '';
    position: absolute;
    inset-block-start: -100px; inset-inline-end: -100px;
    inline-size: 380px; block-size: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(229, 9, 32, 0.06) 0%, transparent 70%);
    pointer-events: none;
}
.ra-contact-section::after {
    content: '';
    position: absolute;
    inset-block-end: -80px; inset-inline-start: -80px;
    inline-size: 320px; block-size: 320px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(229, 9, 32, 0.05) 0%, transparent 70%);
    pointer-events: none;
}
.ra-contact-container {
    max-inline-size: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.ra-contact-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 30px;
    margin-block-end: 45px;
    position: relative;
}
.ra-contact-header-text { max-inline-size: 640px; }
.ra-contact-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--ra-red-bright);
    font-size: 0.78rem;
    font-weight: 800;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-block-end: 16px;
}
.ra-contact-eyebrow::before {
    content: '';
    inline-size: 32px; block-size: 2px;
    background: var(--ra-red-bright);
    border-radius: 2px;
}
.ra-contact-title {
    font-size: 2.4rem;
    font-weight: 700;
    color: var(--ra-charcoal);
    line-height: 1.15;
    margin: 0 0 14px 0;
    letter-spacing: -0.5px;
}
.ra-contact-subtitle {
    font-size: 1rem;
    line-height: 1.65;
    color: var(--ra-text-muted);
    margin: 0;
    max-inline-size: 560px;
}
.ra-contact-arrow-deco {
    flex-shrink: 0;
    color: var(--ra-red-bright);
    opacity: 0.85;
    transform: translateY(-10px);
}

.ra-contact-grid {
    display: grid;
    grid-template-columns: 60fr 40fr;
    gap: 36px;
    align-items: start;
}

/* --- Left column: stacked cards --- */
.ra-contact-cards {
    display: flex;
    flex-direction: column;
    gap: 16px;
}
.ra-contact-card {
    background: #fff;
    border: 1px solid #ECECEF;
    border-radius: 16px;
    padding: 22px 24px;
    display: flex;
    gap: 18px;
    align-items: flex-start;
    transition: transform 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.35s ease, border-color 0.35s ease;
    box-shadow: 0 4px 14px rgba(17, 25, 29, 0.03);
}
.ra-contact-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 38px rgba(229, 9, 32, 0.09);
    border-color: rgba(229, 9, 32, 0.18);
}

/* ============================================================
   FIX #1: ICON COLOR — ALWAYS RED
   ============================================================ */
.ra-contact-card-icon {
    inline-size: 28px;
    block-size: 28px;
    background: transparent;
    color: #E50920 !important;              /* ← RED */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-block-start: 4px;
    transition: transform 0.35s ease;
}
.ra-contact-card-icon svg {
    inline-size: 26px;
    block-size: 26px;
    stroke: #E50920 !important;             /* ← RED stroke */
    fill: none;
    display: block;
}
.ra-contact-card:hover .ra-contact-card-icon {
    color: #E50920 !important;
    transform: scale(1.1) rotate(-4deg);
}

.ra-contact-card-body {
    flex: 1;
    min-inline-size: 0;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.ra-contact-card-label {
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: var(--ra-red-bright);
    margin: 0;
}
.ra-contact-card-value {
    font-size: 1rem;
    font-weight: 600;
    color: var(--ra-charcoal);
    line-height: 1.45;
    margin: 0;
}
.ra-contact-card-note {
    font-size: 0.85rem;
    color: var(--ra-text-muted);
    line-height: 1.5;
    margin: 0;
}

/* ============================================================
   FIX #3: EMAIL / FB LINKS — TURN RED ON CLICK
   ============================================================ */
.ra-contact-card-links {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-block-start: 2px;
}
.ra-contact-card-links a {
    color: var(--ra-charcoal);
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s ease, transform 0.2s ease;
    inline-size: fit-content;
}
.ra-contact-card-links a:hover,
.ra-contact-card-links a:focus,
.ra-contact-card-links a:active {
    color: #E50920 !important;              /* ← RED on hover/click */
    transform: translateX(2px);
}

.ra-contact-phones {
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap: 24px;
    row-gap: 6px;
    margin-block-start: 4px;
}
.ra-contact-phones a {
    color: var(--ra-charcoal);
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s ease;
    white-space: nowrap;
}
.ra-contact-phones a:hover,
.ra-contact-phones a:active { color: #E50920 !important; }

/* ============================================================
   FIX #2: GET DIRECTIONS BUTTON — RED VISIBLE + WHITE FLASH ON CLICK
   ============================================================ */
.ra-contact-directions {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-block-start: 12px;
    padding: 10px 20px;
    background: #E50920 !important;         /* ← SOLID RED (visible) */
    color: #ffffff !important;              /* ← WHITE TEXT */
    font-size: 0.85rem;
    font-weight: 700;
    text-decoration: none;
    border-radius: 999px;
    inline-size: fit-content;
    border: 2px solid #E50920;
    transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.15s ease;
    box-shadow: 0 8px 18px rgba(229, 9, 32, 0.28);
    position: relative;
    overflow: hidden;
}
.ra-contact-directions svg {
    inline-size: 14px;
    block-size: 14px;
    stroke: #ffffff !important;             /* ← WHITE icon */
    fill: none;
    transition: stroke 0.15s ease;
}
.ra-contact-directions:hover {
    transform: translateY(-2px);
    background: #9A0C23 !important;         /* darker red on hover */
    border-color: #9A0C23;
    box-shadow: 0 12px 24px rgba(229, 9, 32, 0.36);
}
/* WHITE FLASH ON CLICK */
.ra-contact-directions:active {
    background: #ffffff !important;         /* ← WHITE FLASH */
    color: #E50920 !important;              /* ← RED text */
    border-color: #E50920 !important;
    transform: translateY(0) scale(0.97);
    box-shadow: 0 0 0 6px rgba(229, 9, 32, 0.18), 0 4px 12px rgba(229, 9, 32, 0.25);
    transition: none;
}
.ra-contact-directions:active svg {
    stroke: #E50920 !important;             /* ← RED icon on click */
}

.ra-license-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-block-start: 6px;
}
.ra-license-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(229, 9, 32, 0.07);
    color: var(--ra-red-bright);
    border: 1px solid rgba(229, 9, 32, 0.18);
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 0.4px;
}
.ra-license-pill svg { inline-size: 13px; block-size: 13px; }

/* --- Right column: map (no footer) --- */
.ra-contact-map-wrap {
    position: sticky;
    inset-block-start: 30px;
}
.ra-contact-map {
    position: relative;
    inline-size: 100%;
    block-size: 560px;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid #ECECEF;
    background: #fff;
    box-shadow: 0 20px 40px rgba(17, 25, 29, 0.08);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.ra-contact-map:hover {
    transform: translateY(-4px);
    box-shadow: 0 26px 50px rgba(229, 9, 32, 0.12);
}
.ra-contact-map iframe {
    inline-size: 100%;
    block-size: 100%;
    border: 0;
    display: block;
    filter: saturate(0.95);
}
.ra-contact-map-pin {
    position: absolute;
    inset-block-start: 50%;
    inset-inline-start: 50%;
    transform: translate(-50%, -100%);
    z-index: 2;
    pointer-events: none;
}
.ra-contact-map-pin-marker {
    inline-size: 36px;
    block-size: 36px;
    background: var(--ra-red-bright);
    border-radius: 50% 50% 50% 0;
    transform: rotate(-45deg);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 20px rgba(229, 9, 32, 0.4);
    border: 3px solid #fff;
    animation: raPinBob 2.4s ease-in-out infinite;
}
.ra-contact-map-pin-marker::after {
    content: '';
    inline-size: 10px; block-size: 10px;
    background: #fff; border-radius: 50%;
    transform: rotate(45deg);
}
@keyframes raPinBob {
    0%, 100% { transform: rotate(-45deg) translateY(0); }
    50%      { transform: rotate(-45deg) translateY(-6px); }
}
.ra-contact-map-pin-shadow {
    inline-size: 20px; block-size: 5px;
    background: rgba(0,0,0,0.18);
    border-radius: 50%;
    margin: 4px auto 0;
    filter: blur(1px);
}

/* Lightbox for enlarged certificate */
.ra-cred-lightbox {
    position: fixed; inset: 0;
    background: rgba(17, 24, 39, 0.92);
    display: flex; align-items: center; justify-content: center;
    padding: 40px; z-index: 9999;
    opacity: 0; visibility: hidden;
    transition: opacity 0.35s ease, visibility 0.35s ease;
    cursor: zoom-out;
}
.ra-cred-lightbox.active { opacity: 1; visibility: visible; }
.ra-cred-lightbox img {
    max-inline-size: 90%; max-block-size: 90%;
    border-radius: 12px;
    box-shadow: 0 30px 80px rgba(0,0,0,0.5);
    transform: scale(0.85);
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    background: #fff; padding: 12px;
}
.ra-cred-lightbox.active img { transform: scale(1); }

/* --- Responsive Design --- */
@media (max-width: 1200px) {
    .ra-why-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .ra-cred-inner { padding: 50px 70px; }
    .ra-cred-title { font-size: 2.6rem; }
    .ra-contact-title { font-size: 2.1rem; }
}
@media (max-width: 992px) {
    .ra-hero { flex-direction: column; min-block-size: auto; }
    .ra-hero-content { max-inline-size: 100%; padding: 50px 5%; }
    .ra-hero-image { block-size: 300px; clip-path: none; margin-inline-start: 0; }
    .ra-about-section { flex-direction: column; padding: 50px 5%; }
    .ra-est-card { inline-size: 100%; flex: auto; }
    .ra-about-image { inline-size: 100%; block-size: 250px; }
    .ra-core-grid { grid-template-columns: 1fr; }
    .mv-banner-section { flex-direction: column; }
    .mv-half { padding: 40px 6%; }
    .mv-overlay { background: linear-gradient(180deg, rgba(200, 16, 46, 0.85) 0%, rgba(200, 16, 46, 0.6) 100%); }
    .ra-safety-box { flex-direction: column; }

    .ra-cred-banner { min-block-size: auto; }
    .ra-cred-inner {
        grid-template-columns: 1fr;
        padding: 50px 60px 80px;
        gap: 30px;
    }
    .ra-cred-stage { block-size: 340px; }
    .ra-cred-title { font-size: 2.4rem; }
    .ra-cred-progress { inset-inline-start: 60px; inset-inline-end: 60px; }
    .ra-cred-nav.prev { inset-inline-start: 12px; }
    .ra-cred-nav.next { inset-inline-end: 12px; }

    .ra-contact-grid { grid-template-columns: 1fr; gap: 30px; }
    .ra-contact-map-wrap { position: static; }
    .ra-contact-map { block-size: 420px; }
    .ra-contact-header { flex-direction: column; align-items: flex-start; }
    .ra-contact-arrow-deco { display: none; }
}
@media (max-width: 768px) {
    .ra-hero-title { font-size: 2.2rem; }
    .ra-about-heading, .ra-core-header h2, .ra-why-title { font-size: 1.8rem; }

    .ra-cred-inner { padding: 40px 24px 80px; }
    .ra-cred-title { font-size: 1.9rem; }
    .ra-cred-desc { font-size: 0.92rem; }
    .ra-cred-stage { block-size: 260px; }
    .ra-cred-doc { inline-size: 60%; border-radius: 6px; }
    .ra-cred-doc img { padding: 6px; }
    .ra-cred-progress { inset-inline-start: 24px; inset-inline-end: 24px; inset-block-end: 18px; }
    .ra-cred-pause { inset-inline-end: 16px; inset-block-end: 12px; }
    .ra-cred-nav { inline-size: 36px; block-size: 36px; }
    .ra-cred-nav.prev { inset-inline-start: 8px; }
    .ra-cred-nav.next { inset-inline-end: 8px; }
    .ra-cred-star.s1 { inline-size: 70px; block-size: 70px; }
    .ra-cred-star.s4 { inline-size: 80px; block-size: 80px; }
    .ra-cred-star.s3 { inline-size: 55px; block-size: 55px; }
    .ra-cred-star.s5 { inline-size: 45px; block-size: 45px; }

    .ra-section-separator { block-size: 70px; }
    .ra-sep-badge { font-size: 0.68rem; letter-spacing: 2px; padding: 8px 16px; }

    .ra-contact-section { padding: 50px 5% 60px; }
    .ra-contact-title { font-size: 1.7rem; }
    .ra-contact-subtitle { font-size: 0.92rem; }
    .ra-contact-card { padding: 18px 18px; gap: 14px; }
    .ra-contact-card-icon { inline-size: 24px; block-size: 24px; }
    .ra-contact-card-icon svg { inline-size: 22px; block-size: 22px; }
    .ra-contact-phones { column-gap: 14px; }
    .ra-contact-phones a { font-size: 0.86rem; }
    .ra-contact-map { block-size: 340px; }
}
</style>

<!-- ==========================================
     SECTION 1: HERO
     ========================================== -->
<section class="ra-hero">
    <div class="ra-hero-content">
        <span class="ra-hero-eyebrow">ABOUT RED ARROW</span>
        <h1 class="ra-hero-title">Connecting Filipino Talent<br><span>to Global Opportunities</span></h1>
        <p class="ra-hero-desc">Red Arrow International Employment Inc. delivers world-class talent across healthcare and other industries, helping skilled Filipinos pursue opportunities around the world.</p>
        <a href="jobs.php" class="ra-btn-white">Explore Our Jobs &rarr;</a>
    </div>
    <div class="ra-hero-image"></div>
</section>

<!-- ==========================================
     SECTION 2: ABOUT COMPANY
     ========================================== -->
<section class="ra-about-section">
    <div class="ra-about-text">
        <span class="ra-eyebrow">ABOUT RED ARROW</span>
        <h2 class="ra-about-heading">Built on Trust. Driven by People.</h2>
        <p class="ra-about-p">Red Arrow International Employment, Inc. is a DMW-licensed (Department of Migrant Workers) and SEC-registered overseas and local recruitment agency established in October 2017. We are committed to creating meaningful connections between Filipino talent and international employers.</p>
    </div>

    <div class="ra-est-card">
        <div class="ra-est-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </div>
        <div class="ra-est-label">Established</div>
        <div class="ra-est-year">2017</div>
        <p class="ra-est-desc">Formed with experienced and well-trained staff.</p>
    </div>

    <div class="ra-about-image">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80" alt="Red Arrow Office Interior">
    </div>
</section>

<!-- ==========================================
     SECTION 3: CORE VALUES
     ========================================== -->
<section class="ra-core-section">
    <div class="ra-core-header">
        <span class="ra-eyebrow">OUR CORE VALUES</span>
        <h2>What Sets Us Apart</h2>
        <p>We are more than just a recruitment agency. We are your partner in building a global future.</p>
    </div>

    <div class="ra-core-grid">
        <div class="ra-core-card">
            <div class="ra-core-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div>
                <h3>Professional</h3>
                <p>Qualified professionals, reliable service, and dedicated support at every step.</p>
            </div>
        </div>
        <div class="ra-core-card">
            <div class="ra-core-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
            </div>
            <div>
                <h3>Skilled</h3>
                <p>Qualified professionals, reliable service, and dedicated support at every step.</p>
            </div>
        </div>
        <div class="ra-core-card">
            <div class="ra-core-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <polyline points="9 12 11 14 15 10"></polyline>
                </svg>
            </div>
            <div>
                <h3>Trusted</h3>
                <p>Qualified professionals, reliable service, and dedicated support at every step.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 4: MISSION & VISION BANNER
     ========================================== -->
<section class="mv-banner-section">
    <div class="mv-half mv-mission">
        <div class="mv-inner">
            <div class="mv-icon-wrap">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
            </div>
            <div class="mv-text">
                <span class="mv-label">OUR MISSION</span>
                <h2 class="mv-heading">Build Collaborative<br>Relationships</h2>
                <p class="mv-subtext">Red Arrow Int’l Employment Inc. major mission is to build collaborative relationships with our foreign principals and employers, applicants, and the Philippine Government.</p>
            </div>
        </div>
    </div>
    <div class="mv-half mv-vision">
        <div class="mv-overlay"></div>
        <div class="mv-inner">
            <div class="mv-icon-wrap">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
            </div>
            <div class="mv-text">
                <span class="mv-label">OUR VISION</span>
                <h2 class="mv-heading">Be a Leading Overseas<br>Manpower Supplier</h2>
                <p class="mv-subtext">Red Arrow Int’l Employment Inc. aims to be one of the most leading Overseas manpower supplier agencies in the Philippines.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 5: WHY CHOOSE US
     ========================================== -->
<section class="ra-why-section">
    <span class="ra-eyebrow">WHY CHOOSE RED ARROW?</span>
    <h2 class="ra-why-title">Your Trusted Recruitment Partner</h2>

    <div class="ra-why-grid">
        <div class="ra-why-item">
            <div class="ra-why-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <circle cx="12" cy="12" r="6"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
            </div>
            <h3>Land-Based &amp; Local Recruitment</h3>
            <p>Connecting Filipino professionals and skilled workers with foreign employers in UAE, Kuwait, Qatar, Oman, Japan, and Brunei.</p>
        </div>
        <div class="ra-why-item">
            <div class="ra-why-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <polyline points="9 12 11 14 15 10"></polyline>
                </svg>
            </div>
            <h3>No Placement Fees</h3>
            <p>We operate on a manpower pooling basis with <strong>no placement or processing fees</strong> collected upon application.</p>
        </div>
        <div class="ra-why-item">
            <div class="ra-why-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <h3>Key Sectors</h3>
            <p>Healthcare (Nurses with PRC license), Engineers, Accountants, Teachers, Hospitality, Construction, Agriculture (SSW), and more.</p>
        </div>
        <div class="ra-why-item">
            <div class="ra-why-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
            </div>
            <h3>Physical Office Screening</h3>
            <p>Official screening and documentation take place strictly inside our physical office in Cubao, Quezon City.</p>
        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 6: SAFETY WARNING
     ========================================== -->
<section class="ra-safety-section">
    <div class="ra-safety-box">
        <div class="ra-safety-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
        </div>
        <div class="ra-safety-content">
            <h3>Important Safety Warning</h3>
            <p>Red Arrow regularly reminds applicants to watch out for illegal recruiters and fake online accounts using their name. <strong>We do not process applications or conduct interviews through personal social media accounts or charge upfront fees</strong> ("no fees to be collected upon application"). Official screening and documentation take place strictly inside our physical office in Cubao.</p>
        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 7: CERTIFICATES & LICENSES (FULL-WIDTH BANNER)
     ========================================== -->
<section class="ra-cred-banner" id="raCredBanner">
    <div class="ra-cred-deco" aria-hidden="true">
        <div class="ra-cred-star s1"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
        <div class="ra-cred-star s2"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
        <div class="ra-cred-star s3"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
        <div class="ra-cred-star s4"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
        <div class="ra-cred-star s5"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
        <div class="ra-cred-star s6"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg></div>
    </div>

    <div class="ra-cred-inner">
        <div class="ra-cred-text">
            <span class="ra-cred-eyebrow">OUR CREDENTIALS</span>
            <h2 class="ra-cred-title">Certificates &amp; Licenses</h2>
            <p class="ra-cred-desc">We are fully licensed and accredited by the Philippine government to ensure safe and legitimate recruitment practices.</p>
        </div>

        <div class="ra-cred-stage" id="raCredStage">
            <div class="ra-cred-doc doc-1" data-img="img/OTIT.png" data-alt="OTIT Certification">
                <img src="img/OTIT.png" alt="OTIT Certification">
            </div>
            <div class="ra-cred-doc doc-3" data-img="img/SEC-1-scaled.jpg" data-alt="SEC Registration">
                <img src="img/SEC-1-scaled.jpg" alt="SEC Registration">
            </div>
            <div class="ra-cred-doc doc-2" data-img="img/license-1.png" data-alt="DMW License">
                <img src="img/license-1.png" alt="DMW License">
            </div>
        </div>
    </div>

    <button class="ra-cred-nav prev" id="raCredPrev" aria-label="Previous slide">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
    </button>
    <button class="ra-cred-nav next" id="raCredNext" aria-label="Next slide">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
    </button>

    <div class="ra-cred-progress" aria-hidden="true">
        <div class="ra-cred-progress-fill" id="raCredProgress"></div>
    </div>

    <button class="ra-cred-pause" id="raCredPause" aria-label="Pause slideshow">
        <svg id="raCredPauseIcon" viewBox="0 0 24 24" fill="currentColor">
            <rect x="6" y="5" width="4" height="14" rx="1"></rect>
            <rect x="14" y="5" width="4" height="14" rx="1"></rect>
        </svg>
    </button>
</section>

<!-- ==========================================
     SECTION SEPARATOR (visual break)
     ========================================== -->
<div class="ra-section-separator" aria-hidden="true">
    <div class="ra-sep-inner">
        <div class="ra-sep-line"></div>
        <div class="ra-sep-badge">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l2.4 6.9L21 11l-6.6 2.1L12 20l-2.4-6.9L3 11l6.6-2.1z"/></svg>
            Let’s Connect
        </div>
        <div class="ra-sep-line"></div>
    </div>
</div>

<!-- Lightbox for enlarged certificate -->
<div class="ra-cred-lightbox" id="raCredLightbox">
    <img src="" alt="Enlarged certificate" id="raCredLightboxImg">
</div>

<!-- ==========================================
     SECTION 8: GET IN TOUCH
     ========================================== -->
<section class="ra-contact-section" id="contact">
    <div class="ra-contact-container">

        <!-- Header -->
        <div class="ra-contact-header">
            <div class="ra-contact-header-text">
                <h2 class="ra-contact-title">We’d Love to Hear From You</h2>
                <p class="ra-contact-subtitle">Reach out to us through any of the channels below. We’re here to assist you with your inquiries, applications, and recruitment needs.</p>
            </div>
        </div>

        <!-- Two-column grid -->
        <div class="ra-contact-grid">

            <!-- inset-inline-start: Contact cards -->
            <div class="ra-contact-cards">

                <!-- Card 1: Contact Numbers -->
                <div class="ra-contact-card">
                    <div class="ra-contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <div class="ra-contact-card-body">
                        <p class="ra-contact-card-label">Contact Numbers</p>
                        <div class="ra-contact-phones">
                            <a href="tel:+63277184509">(02) 7718-4509</a>
                            <a href="tel:+63286511909">+632 8651 1909</a>
                            <a href="tel:+639293063786">+63 929 306 3786</a>
                            <a href="tel:+639273477798">+63 927 347 7798</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Location Address -->
                <div class="ra-contact-card">
                    <div class="ra-contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="ra-contact-card-body">
                        <p class="ra-contact-card-label">Location Address</p>
                        <p class="ra-contact-card-value">105 18th Ave, Cubao, Quezon City, Metro Manila</p>
                        <p class="ra-contact-card-note">Also listed around P. Tuazon Blvd. and 10th Ave., Cubao.</p>
                        <a class="ra-contact-directions" href="https://www.google.com/maps/dir/?api=1&destination=105+18th+Ave,+Cubao,+Quezon+City,+Metro+Manila" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"></polygon>
                            </svg>
                            Get Directions
                        </a>
                    </div>
                </div>

                <!-- Card 3: Email Addresses -->
                <div class="ra-contact-card">
                    <div class="ra-contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="ra-contact-card-body">
                        <p class="ra-contact-card-label">Email Addresses</p>
                        <div class="ra-contact-card-links">
                            <a href="mailto:admin@redarrowmanpower.com">admin@redarrowmanpower.com</a>
                            <a href="mailto:hr@redarrowmanpower.com">hr@redarrowmanpower.com</a>
                            <a href="mailto:recruitment@redarrowmanpower.com">recruitment@redarrowmanpower.com</a>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Official Facebook Page -->
                <div class="ra-contact-card">
                    <div class="ra-contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </div>
                    <div class="ra-contact-card-body">
                        <p class="ra-contact-card-label">Official Facebook Page</p>
                        <div class="ra-contact-card-links">
                            <a href="https://www.facebook.com/RedArrowInternational/" target="_blank" rel="noopener">Red Arrow International Employment Inc.</a>
                        </div>
                    </div>
                </div>

                <!-- Card 5: License Numbers -->
                <div class="ra-contact-card">
                    <div class="ra-contact-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div class="ra-contact-card-body">
                        <p class="ra-contact-card-label">License Numbers</p>
                        <div class="ra-license-list">
                            <span class="ra-license-pill">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                DMW-831-LB-09042026-R
                            </span>
                            <span class="ra-license-pill">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                147-LB-101422-R
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- inset-inline-end: Map -->
            <div class="ra-contact-map-wrap">
                <div class="ra-contact-map">
                    <iframe
                        src="https://www.google.com/maps?q=105%2018th%20Ave%2C%20Cubao%2C%20Quezon%20City%2C%20Metro%20Manila&output=embed"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Red Arrow Recruitment Agency Location"></iframe>

                    <div class="ra-contact-map-pin" aria-hidden="true">
                        <div class="ra-contact-map-pin-marker"></div>
                        <div class="ra-contact-map-pin-shadow"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    /* =========================================================
       CERTIFICATES BANNER — Carousel
       ========================================================= */
    const stage   = document.getElementById('raCredStage');
    const prevBtn = document.getElementById('raCredPrev');
    const nextBtn = document.getElementById('raCredNext');
    const pauseBtn= document.getElementById('raCredPause');
    const pauseIcon = document.getElementById('raCredPauseIcon');
    const progress  = document.getElementById('raCredProgress');
    const lightbox  = document.getElementById('raCredLightbox');
    const lightboxImg = document.getElementById('raCredLightboxImg');

    if (stage) {
        const CERT_DATA = [
            { src: 'img/OTIT.png',        alt: 'OTIT Certification' },
            { src: 'img/license-1.png',   alt: 'DMW License' },
            { src: 'img/SEC-1-scaled.jpg',alt: 'SEC Registration' }
        ];
        const positions = ['doc-1', 'doc-2', 'doc-3'];
        let offset = 0;
        let autoTimer = null;
        let progressTimer = null;
        let progressValue = 0;
        let isPaused = false;
        const SLIDE_DURATION = 4500;
        const TICK = 50;

        function render() {
            positions.forEach(function (posClass, i) {
                const item = stage.querySelector('.' + posClass);
                if (!item) return;
                const data = CERT_DATA[(i + offset) % CERT_DATA.length];
                const img = item.querySelector('img');
                img.src = data.src;
                img.alt = data.alt;
                item.dataset.img = data.src;
                item.dataset.alt = data.alt;
            });
        }
        function next() { offset = (offset + 1) % CERT_DATA.length; render(); restartProgress(); }
        function prev() { offset = (offset - 1 + CERT_DATA.length) % CERT_DATA.length; render(); restartProgress(); }

        function restartProgress() {
            progressValue = 0;
            progress.style.width = '0%';
            if (progressTimer) clearInterval(progressTimer);
            progressTimer = setInterval(function () {
                if (isPaused) return;
                progressValue += (TICK / SLIDE_DURATION) * 100;
                if (progressValue >= 100) progressValue = 0;
                progress.style.width = progressValue + '%';
            }, TICK);
        }
        function startAuto() {
            if (autoTimer) clearInterval(autoTimer);
            autoTimer = setInterval(function () { if (!isPaused) next(); }, SLIDE_DURATION);
        }

        if (nextBtn) nextBtn.addEventListener('click', function () { next(); });
        if (prevBtn) prevBtn.addEventListener('click', function () { prev(); });

        if (pauseBtn) {
            pauseBtn.addEventListener('click', function () {
                isPaused = !isPaused;
                pauseBtn.setAttribute('aria-label', isPaused ? 'Play slideshow' : 'Pause slideshow');
                pauseIcon.innerHTML = isPaused
                    ? '<polygon points="6 4 20 12 6 20"></polygon>'
                    : '<rect x="6" y="5" width="4" height="14" rx="1"></rect><rect x="14" y="5" width="4" height="14" rx="1"></rect>';
            });
        }

        stage.querySelectorAll('.ra-cred-doc').forEach(function (doc) {
            doc.addEventListener('click', function () {
                const src = doc.dataset.img || (doc.querySelector('img') && doc.querySelector('img').src);
                const alt = doc.dataset.alt || 'Certificate';
                if (!src) return;
                lightboxImg.src = src;
                lightboxImg.alt = alt;
                lightbox.classList.add('active');
                isPaused = true;
                if (pauseBtn) {
                    pauseIcon.innerHTML = '<polygon points="6 4 20 12 6 20"></polygon>';
                    pauseBtn.setAttribute('aria-label', 'Play slideshow');
                }
            });
        });

        lightbox.addEventListener('click', function () {
            lightbox.classList.remove('active');
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                lightbox.classList.remove('active');
            }
        });

        render();
        restartProgress();
        startAuto();
    }
})();
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>