<div id="mobile-nav-menu" class="mobile-nav-menu with-nav-tabs <?php echo is_single() ? 'with-single-story' : '' ?>">
  <div class="menu-content">
    <div class="nav-links">
      <h5 class="nav-link">
        <a class="tertiary" href="/about-us">About Us</a>
      </h5>

      <h5 class="nav-link">
        <a class="tertiary" href="/portfolio">Portfolio</a>
      </h5>

      <h5 class="nav-link">
        <a class="tertiary" href="/commercial">Commercial Design</a>
      </h5>

      <div data-logged-out="true">
        <h5 class="nav-link">
          <a class="tertiary" href="/concierge">Concierge</a>
        </h5>
      </div>

      <h5 class="nav-link">
        <a class="tertiary" href="/press">Press</a>
      </h5>

      <h5 class="nav-link">
        <a class="tertiary" href="/mag">The Magazine</a>
      </h5>

      <div data-logged-in="true">
        <h5 class="nav-link">
          <a class="tertiary" href="https://www.homepolish.com/shoppinglist">My Shopping List</a>
        </h5>
      </div>
    </div>

    <div class="other-links">
      <div data-logged-in="true">
        <h5 class="other-link logout-link" data-logout-link="true">
          Log Out
        </h5>
      </div>

      <div data-logged-out="true">
        <h5 class="other-link login-link">
          <a href="<?php echo HMPL_SERVICE_URI ?>/log_in" class="tertiary">Log In</a>
        </h5>
      </div>
    </div>
  </div>
</div>

<div id="mobile-nav-buttons" class="mobile-nav-buttons with-nav-tabs <?php echo is_single() ? 'with-single-story' : '' ?>">
  <div class="scroll-shadow"></div>

  <a href="/dashboard" class="mobile-nav-button" data-dashboard-link="true" data-logged-in="true">
    Dashboard
  </a>
</div>
