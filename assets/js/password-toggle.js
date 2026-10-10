/* =========================================================
   RedArrow — Password Toggle (👁️)
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  // Handle lahat ng password fields sa page
  document.querySelectorAll("[data-password-toggle]").forEach((btn) => {
    const inputId = btn.getAttribute("data-password-toggle");
    const input   = document.getElementById(inputId);
    if (!input) return;

    const eyeOpen   = btn.querySelector(".eye-open");
    const eyeClosed = btn.querySelector(".eye-closed");

    btn.addEventListener("click", () => {
      const isHidden = input.type === "password";
      input.type = isHidden ? "text" : "password";

      if (eyeOpen && eyeClosed) {
        eyeOpen.classList.toggle("hidden", isHidden);
        eyeClosed.classList.toggle("hidden", !isHidden);
      }

      btn.setAttribute("aria-label", isHidden ? "Hide password" : "Show password");
    });
  });
});