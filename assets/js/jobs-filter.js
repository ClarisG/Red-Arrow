/* =========================================================
   RedArrow — Jobs Live Filter
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  const searchInput = document.getElementById("jobsSearch");
  const countrySelect = document.getElementById("jobsCountry");
  const fieldSelect = document.getElementById("jobsField");
  const jobCards = document.querySelectorAll("[data-job-card]");
  const emptyState = document.getElementById("jobsEmpty");
  const countEl = document.getElementById("jobsCount");

  if (!searchInput || jobCards.length === 0) return;

  function filter() {
    const q = searchInput.value.toLowerCase().trim();
    const country = countrySelect ? countrySelect.value.toLowerCase() : "";
    const field = fieldSelect ? fieldSelect.value.toLowerCase() : "";

    let visible = 0;

    jobCards.forEach((card) => {
      const title = (card.getAttribute("data-title") || "").toLowerCase();
      const ctry  = (card.getAttribute("data-country") || "").toLowerCase();
      const fld   = (card.getAttribute("data-field") || "").toLowerCase();

      const matchQ = !q || title.includes(q);
      const matchCountry = !country || ctry === country;
      const matchField = !field || fld === field;

      const show = matchQ && matchCountry && matchField;
      card.style.display = show ? "" : "none";
      if (show) visible++;
    });

    if (emptyState) emptyState.classList.toggle("hidden", visible > 0);
    if (countEl) countEl.textContent = visible + " " + (visible === 1 ? "job" : "jobs");
  }

  searchInput.addEventListener("input", filter);
  if (countrySelect) countrySelect.addEventListener("change", filter);
  if (fieldSelect) fieldSelect.addEventListener("change", filter);

  filter(); // Initial
});