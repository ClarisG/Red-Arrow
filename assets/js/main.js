/* =========================================================
   RedArrow — Main JS
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  /* ---------- Mobile menu toggle ---------- */
  const menuBtn    = document.getElementById("menuToggle");
  const mobileMenu = document.getElementById("mobileMenu");
  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener("click", () => mobileMenu.classList.toggle("hidden"));
  }

  /* ---------- Smooth scroll for anchor links ---------- */
  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
      const href = a.getAttribute("href");
      if (href.length <= 1) return;
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  /* ---------- Auto-dismiss flash messages ---------- */
  document.querySelectorAll("[data-flash]").forEach((el) => {
    setTimeout(() => {
      el.style.transition = "opacity .5s";
      el.style.opacity = "0";
      setTimeout(() => el.remove(), 500);
    }, 4000);
  });

  console.log("%cRed Arrow", "color:#ed001c;font-weight:bold;font-size:14px;");
});