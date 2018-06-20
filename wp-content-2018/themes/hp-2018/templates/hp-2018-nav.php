<div class="hp-header-container">
    <header id="header" class="hp-header <?php echo hp_page_meta()['transparency']; ?>">
        <div class="hp-header__main">
        <button class="mobile-nav-menu-toggle" data-mobile-nav-menu-toggle="true">
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        </button>

        <a href="/" class="hp-header__logo-link hp-header__logo-link--mobile-tablet">
        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark-white.png" />
        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark.png" />
        </a>


        <div class="hp-header__auth">

            <style>
            .logged-out, .logged-in {

                visibility: hidden;
            }
            </style>

            <!-- out -->
            
            <span class="login-link logged-out" data-logged-out="true">
                <a class="auth__link tertiary auth-link" data-logout-link="true" href="/log_in">Log In</a>
            </span>

            <!-- in -->
            
            <span class="other-link logout-link logged-in" data-logged-in="true"><a class="auth__link tertiary dashboard-link auth-link" href="https://www.homepolish.com/dashboard" data-dashboard-link="true">My Dashboard</a> 
            <span class="other-link logout-link logged-in" data-logged-in="true"><a class="auth__link tertiary auth-link" href="/app/logout" data-logout-link="true">Log Out</a></span>
        </div>
        

        </div>

          <nav class="hp-header__nav">

          <a class="tertiary nav__link <?php hp_nav_is_active( 'about-us' ); ?>" href="/about-us">About Us</a>

          <a class="tertiary nav__link <?php hp_nav_is_active( 'portfolio' ); ?>" href="/portfolio">Portfolio</a>

          <a class="tertiary nav__link <?php hp_nav_is_active( 'commercial' ); ?>" href="/commercial">Commercial</a>

          <a href="/" class="hp-header__logo-link hp-header__logo-link--desktop">
          <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark-white.png" />
          <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="<?php echo get_template_directory_uri(); ?>/assets-2018/img/homepolish-wordmark.png" />
          </a>

          <a class="tertiary nav__link <?php hp_nav_is_active( 'concierge' ); ?>" href="/concierge">Concierge</a>

          <a class="tertiary nav__link <?php hp_nav_is_active( 'build' ); ?>" href="/build">Build</a>
          </h6>

          <a class="tertiary nav__link <?php hp_nav_is_active( 'mag' ); ?>" href="/mag">The Magazine</a>
          </nav>
    </header>
</div>

<div class="mobile-nav-menu" id="mobile-nav-menu">
    <div class="menu-content">
    <div class="nav-links">
    <h5 class="nav-link">
    <a class="tertiary" href="/about-us">About Us</a>
    </h5>
    <h5 class="nav-link">
    <a class="tertiary" href="/portfolio">Portfolio</a>
    </h5>
    <h5 class="nav-link">
    <a class="tertiary" href="/commercial">Commercial</a>
    </h5>
    <h5 class="nav-link">
    <a class="tertiary" href="/concierge">Concierge</a>
    </h5>
    <h5 class="nav-link">
    <a class="tertiary" href="/build">Build Services</a>
    </h5>
    <h5 class="nav-link">
    <a class="tertiary" href="/mag">The Magazine</a>
    </h5>
    </div>
    <div class="other-links hp-header__auth">

        <!-- out -->
        
        <h5 class="other-link login-link logged-in" data-logged-out="true">
        <a class="tertiary auth-link" href="/log_in">Log In</a>
        </h5>

        <!-- in -->
        
        
        <h5 class="other-link logout-link" data-logged-in="true">
        <a href="/app/logout" class="tertiary auth-link" data-logout-link="true">Log Out</a>
        </h5>
    </div>
    

    </div>
</div>
<div class="mobile-nav-buttons" id="mobile-nav-buttons">
<div class="scroll-shadow"></div>
</div>
