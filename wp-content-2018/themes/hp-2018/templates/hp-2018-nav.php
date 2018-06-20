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
        <a class="auth__link" href="/app/login">Log In</a>
        </div>

        <div class="hp-header__auth">
            <a class="auth__link" data-bypass="true" href="/app">My Dashboard</a>

            <form class="button_to" method="post" action="/sign_out"><input type="hidden" name="_method" value="delete"><input class="auth__link auth__link--button-to" type="submit" value="Log Out"><input type="hidden" name="authenticity_token" value="X7UMZRoM6l4Zl6rq+Qdc/eKUOyih+I6uu57P97ItvRP8mWLnkM/i4LfcdPHdYWuolKfAgqKcXeVe05NSVMjIeA=="></form>
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
    <div class="other-links">

    <!-- out -->
    
    <h5 class="other-link login-link">
    <a class="tertiary" href="/log_in">Log In</a>
    </h5>
    </div>

    <!-- in -->
    
    <div class="other-links">
    <h5 class="other-link logout-link">
    <form class="button_to" method="post" action="/sign_out"><input type="hidden" name="_method" value="delete"><input type="submit" value="Log Out"><input type="hidden" name="authenticity_token" value="X7UMZRoM6l4Zl6rq+Qdc/eKUOyih+I6uu57P97ItvRP8mWLnkM/i4LfcdPHdYWuolKfAgqKcXeVe05NSVMjIeA=="></form>
    </h5>
    </div>
    

    </div>
</div>
<div class="mobile-nav-buttons" id="mobile-nav-buttons">
<div class="scroll-shadow"></div>
</div>
