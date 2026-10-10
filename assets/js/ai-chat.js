/* =========================================================
   RedArrow — AI Assistant ("AI Red Arrow")
   Simple rule-based chatbot. Pwedeng palitan ng totoong AI API mamaya.
   ========================================================= */

document.addEventListener("DOMContentLoaded", () => {

  const launch   = document.getElementById("aiLaunch");
  const closeBtn = document.getElementById("aiClose");
  const window_  = document.getElementById("aiWindow");
  const form     = document.getElementById("aiForm");
  const input    = document.getElementById("aiInput");
  const messages = document.getElementById("aiMessages");
  const quickBtns = document.querySelectorAll("[data-ai-q]");

  if (!launch || !window_) return;

  /* ---------- Toggle window ---------- */
  launch.addEventListener("click", () => {
    window_.classList.toggle("open");
    if (window_.classList.contains("open")) {
      setTimeout(() => input?.focus(), 200);
    }
  });

  closeBtn?.addEventListener("click", () => {
    window_.classList.remove("open");
  });

  /* ---------- Add message ---------- */
  function addMessage(text, from = "bot") {
    const p = document.createElement("p");
    p.className = "ai-msg " + (from === "bot" ? "ai-bot" : "ai-user");
    p.innerHTML = text;
    messages.appendChild(p);
    messages.scrollTop = messages.scrollHeight;
  }

  /* ---------- Rule-based reply ---------- */
  function getReply(q) {
    q = q.toLowerCase();

    if (q.includes("job") || q.includes("opening") || q.includes("vacan") || q.includes("hiring")) {
      return "May <b>7+ jobs</b> kaming available ngayon. Pumunta sa <b>Jobs</b> page para sa buong listahan. Pwede mo ring i-filter ayon sa country (Qatar, UAE, Japan, Korea) o field (Healthcare, Education, etc).";
    }
    if (q.includes("requirement") || q.includes("document") || q.includes("papel") || q.includes("passport")) {
      return "Kailangan mo ng: <b>Valid Passport</b>, <b>Updated CV</b>, <b>Employment Certificates</b>, <b>Training Certificates</b>, <b>NBI Clearance</b>, at <b>2x2 Photos</b>. Tingnan ang <b>Requirements</b> page para sa detalye.";
    }
    if (q.includes("apply") || q.includes("application") || q.includes("mag-apply")) {
      return "Para mag-apply: (1) Mag-register o mag-sign in, (2) Pumunta sa Jobs page, (3) Piliin ang job, (4) Click <b>Apply Now</b>, (5) I-upload ang CV mo (PDF, max 5 MB). Makikita mo ang status sa <b>My Portal</b>.";
    }
    if (q.includes("contact") || q.includes("email") || q.includes("phone") || q.includes("number")) {
      return "Makipag-ugnayan sa amin:<br>📧 <b>info@redarrow.com</b><br>📞 <b>+63 2 8123 4567</b><br>📍 Quezon City, Philippines<br><br>Pwede ka ring mag-message sa aming Facebook page.";
    }
    if (q.includes("salary") || q.includes("sweldo") || q.includes("bayad")) {
      return "Ang salary range ay iba-iba bawat job. Halimbawa:<br>• Nurses sa Qatar: <b>QAR 4,000 – 7,000</b><br>• Domestic Helper sa UAE: <b>AED 1,500 – 2,500</b><br>• Waiter sa Japan: <b>JPY 200,000 – 300,000</b><br><br>Tingnan ang bawat job para sa eksaktong salary.";
    }
    if (q.includes("sign in") || q.includes("login") || q.includes("account") || q.includes("register")) {
      return "Click ang <b>Sign In</b> button sa taas. Kung wala pang account, click ang <b>Register now</b>. Libre lang ito.";
    }
    if (q.includes("country") || q.includes("bansa") || q.includes("destination")) {
      return "Nag-aalok kami ng jobs sa: <b>Qatar, UAE, Japan, Korea</b>, at iba pa. I-filter ang Jobs page ayon sa country.";
    }

    return "Pasensya na, hindi ko masyadong naintindihan. Maaari mo akong tanungin tungkol sa: <b>jobs, requirements, application process, salary, countries, o contact details</b>.";
  }

  /* ---------- Send message ---------- */
  function send(text) {
    text = text.trim();
    if (!text) return;

    addMessage(text, "user");
    input.value = "";

    // Simulate "typing" delay
    setTimeout(() => {
      addMessage(getReply(text), "bot");
    }, 400);
  }

  form?.addEventListener("submit", (e) => {
    e.preventDefault();
    send(input.value);
  });

  quickBtns.forEach((btn) => {
    btn.addEventListener("click", () => send(btn.getAttribute("data-ai-q")));
  });

  console.log("%c AI Red Arrow ready", "color:#ed001c;font-weight:bold;");
});