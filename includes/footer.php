</main>

<!-- ==================================================
     FOOTER — dark, gaya ng design
     ================================================== -->
<footer class="bg-[#0e0e0e] text-white">
  <div class="container py-14">

    <!-- Top row -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-10">

      <!-- Brand col -->
      <div class="md:col-span-5">
        <a href="index.php" class="flex items-center gap-3 mb-5">
          <img src="<?= LOGO_PATH ?>" alt="Red Arrow" class="h-12 w-auto brightness-0 invert">
          <div class="leading-none">
            <b class="block text-lg font-extrabold tracking-tight text-white">RED ARROW</b>
            <small class="block text-[8px] font-bold tracking-[2px] text-white/60 mt-1">RECRUITMENT AGENCY</small>
          </div>
        </a>
        <p class="text-sm text-white/70 max-w-sm">
          <?= SITE_TAGLINE ?>
        </p>
      </div>

      <!-- Quick links -->
      <div class="md:col-span-2">
        <h4 class="text-xs font-bold tracking-[2px] text-brand mb-4">QUICK LINKS</h4>
        <ul class="space-y-2 text-sm text-white/80">
          <li><a href="index.php"     class="hover:text-brand transition">Home</a></li>
          <li><a href="jobs.php"      class="hover:text-brand transition">Jobs</a></li>
          <li><a href="about.php"     class="hover:text-brand transition">About Us</a></li>
          <li><a href="contact.php"   class="hover:text-brand transition">Contact</a></li>
        </ul>
      </div>

      <!-- For candidates -->
      <div class="md:col-span-2">
        <h4 class="text-xs font-bold tracking-[2px] text-brand mb-4">FOR CANDIDATES</h4>
        <ul class="space-y-2 text-sm text-white/80">
          <li><a href="auth/register.php" class="hover:text-brand transition">Register</a></li>
          <li><a href="auth/login.php"    class="hover:text-brand transition">Sign In</a></li>
          <li><a href="conditions.php"    class="hover:text-brand transition">Requirements</a></li>
        </ul>
      </div>

      <!-- Social -->
      <div class="md:col-span-3">
        <h4 class="text-xs font-bold tracking-[2px] text-brand mb-4">FOLLOW US</h4>
        <div class="flex gap-3 mb-4">
          <a href="<?= FB_URL ?>" target="_blank" rel="noopener"
             class="w-10 h-10 rounded-full bg-white/10 hover:bg-brand flex items-center justify-center transition"
             aria-label="Facebook">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12a10 10 0 1 0-11.6 9.9v-7H8v-3h2.4V9.5c0-2.4 1.4-3.7 3.6-3.7 1 0 2.1.2 2.1.2v2.3h-1.2c-1.2 0-1.5.7-1.5 1.5V12H16l-.4 3h-2.2v7A10 10 0 0 0 22 12z"/>
            </svg>
          </a>
        </div>
        <p class="text-xs text-white/50">
          <?= OFFICE_ADDRESS ?>
        </p>
      </div>
    </div>

    <!-- Bottom row -->
    <div class="border-t border-white/10 mt-10 pt-6 flex flex-col md:flex-row justify-between gap-3 text-xs text-white/50">
      <span>© <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</span>
      <span class="flex gap-4">
        <a href="#" class="hover:text-white transition">Privacy Policy</a>
        <a href="conditions.php" class="hover:text-white transition">Terms of Service</a>
      </span>
    </div>
  </div>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>