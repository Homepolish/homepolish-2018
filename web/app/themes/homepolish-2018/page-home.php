
<!DOCTYPE html>
<html itemscope itemtype='http://schema.org/Organization' lang='en' prefix='og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#'>
<head>
<script type="text/javascript">var _rollbarConfig = {"accessToken":"f2e19ea23c3e40069723d78cd26cf4ce","captureUncaught":true,"payload":{"environment":"production"}};</script>
<script type="text/javascript">!function(r){function e(t){if(o[t])return o[t].exports;var n=o[t]={exports:{},id:t,loaded:!1};return r[t].call(n.exports,n,n.exports,e),n.loaded=!0,n.exports}var o={};return e.m=r,e.c=o,e.p="",e(0)}([function(r,e,o){"use strict";var t=o(1).Rollbar,n=o(2);_rollbarConfig.rollbarJsUrl=_rollbarConfig.rollbarJsUrl||"https://d37gvrvc0wt4s1.cloudfront.net/js/v1.9/rollbar.min.js";var a=t.init(window,_rollbarConfig),i=n(a,_rollbarConfig);a.loadFull(window,document,!_rollbarConfig.async,_rollbarConfig,i)},function(r,e){"use strict";function o(r){return function(){try{return r.apply(this,arguments)}catch(e){try{console.error("[Rollbar]: Internal error",e)}catch(o){}}}}function t(r,e,o){window._rollbarWrappedError&&(o[4]||(o[4]=window._rollbarWrappedError),o[5]||(o[5]=window._rollbarWrappedError._rollbarContext),window._rollbarWrappedError=null),r.uncaughtError.apply(r,o),e&&e.apply(window,o)}function n(r){var e=function(){var e=Array.prototype.slice.call(arguments,0);t(r,r._rollbarOldOnError,e)};return e.belongsToShim=!0,e}function a(r){this.shimId=++c,this.notifier=null,this.parentShim=r,this._rollbarOldOnError=null}function i(r){var e=a;return o(function(){if(this.notifier)return this.notifier[r].apply(this.notifier,arguments);var o=this,t="scope"===r;t&&(o=new e(this));var n=Array.prototype.slice.call(arguments,0),a={shim:o,method:r,args:n,ts:new Date};return window._rollbarShimQueue.push(a),t?o:void 0})}function l(r,e){if(e.hasOwnProperty&&e.hasOwnProperty("addEventListener")){var o=e.addEventListener;e.addEventListener=function(e,t,n){o.call(this,e,r.wrap(t),n)};var t=e.removeEventListener;e.removeEventListener=function(r,e,o){t.call(this,r,e&&e._wrapped?e._wrapped:e,o)}}}var c=0;a.init=function(r,e){var t=e.globalAlias||"Rollbar";if("object"==typeof r[t])return r[t];r._rollbarShimQueue=[],r._rollbarWrappedError=null,e=e||{};var i=new a;return o(function(){if(i.configure(e),e.captureUncaught){i._rollbarOldOnError=r.onerror,r.onerror=n(i);var o,a,c="EventTarget,Window,Node,ApplicationCache,AudioTrackList,ChannelMergerNode,CryptoOperation,EventSource,FileReader,HTMLUnknownElement,IDBDatabase,IDBRequest,IDBTransaction,KeyOperation,MediaController,MessagePort,ModalWindow,Notification,SVGElementInstance,Screen,TextTrack,TextTrackCue,TextTrackList,WebSocket,WebSocketWorker,Worker,XMLHttpRequest,XMLHttpRequestEventTarget,XMLHttpRequestUpload".split(",");for(o=0;o<c.length;++o)a=c[o],r[a]&&r[a].prototype&&l(i,r[a].prototype)}return e.captureUnhandledRejections&&(i._unhandledRejectionHandler=function(r){var e=r.reason,o=r.promise,t=r.detail;!e&&t&&(e=t.reason,o=t.promise),i.unhandledRejection(e,o)},r.addEventListener("unhandledrejection",i._unhandledRejectionHandler)),r[t]=i,i})()},a.prototype.loadFull=function(r,e,t,n,a){var i=function(){var e;if(void 0===r._rollbarPayloadQueue){var o,t,n,i;for(e=new Error("rollbar.js did not load");o=r._rollbarShimQueue.shift();)for(n=o.args,i=0;i<n.length;++i)if(t=n[i],"function"==typeof t){t(e);break}}"function"==typeof a&&a(e)},l=!1,c=e.createElement("script"),d=e.getElementsByTagName("script")[0],p=d.parentNode;c.crossOrigin="",c.src=n.rollbarJsUrl,c.async=!t,c.onload=c.onreadystatechange=o(function(){if(!(l||this.readyState&&"loaded"!==this.readyState&&"complete"!==this.readyState)){c.onload=c.onreadystatechange=null;try{p.removeChild(c)}catch(r){}l=!0,i()}}),p.insertBefore(c,d)},a.prototype.wrap=function(r,e){try{var o;if(o="function"==typeof e?e:function(){return e||{}},"function"!=typeof r)return r;if(r._isWrap)return r;if(!r._wrapped){r._wrapped=function(){try{return r.apply(this,arguments)}catch(e){throw e._rollbarContext=o()||{},e._rollbarContext._wrappedSource=r.toString(),window._rollbarWrappedError=e,e}},r._wrapped._isWrap=!0;for(var t in r)r.hasOwnProperty(t)&&(r._wrapped[t]=r[t])}return r._wrapped}catch(n){return r}};for(var d="log,debug,info,warn,warning,error,critical,global,configure,scope,uncaughtError,unhandledRejection".split(","),p=0;p<d.length;++p)a.prototype[d[p]]=i(d[p]);r.exports={Rollbar:a,_rollbarWindowOnError:t}},function(r,e){"use strict";r.exports=function(r,e){return function(o){if(!o&&!window._rollbarInitialized){var t=window.RollbarNotifier,n=e||{},a=n.globalAlias||"Rollbar",i=window.Rollbar.init(n,r);i._processShimQueue(window._rollbarShimQueue||[]),window[a]=i,window._rollbarInitialized=!0,t.processPayloads()}}}}]);</script>
<title>
Homepolish: Seamless and Personal Interior Design
</title>
<link rel="stylesheet" media="all" href="https://www.homepolish.com/assets/svelte-b4143fc736147a6dfda440547729b95c33b6b07af4e98d60c4251b3403704dba.css" />
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="hzubY//iHEOE06gSTO93PQRAeAbTMy5pKA8TddYcartc+fp9Q7Tn1L+WD9KqNobyTmS3nAYFW2BwYRm5BMVG2w==" />
<link rel="shortcut icon" type="image/x-icon" href="https://www.homepolish.com/assets/favicon-e848a316df83ffd48bc2a038b2e4d38988f99ab8ebe9b82f3cf9aaa6029d6845.ico" />
<meta charset='utf-8'>
<meta content='width=device-width,initial-scale=1' name='viewport'>
  <meta content="Premium interior design services in-home and online nationwide. From decorating rooms to renovating offices, our designers help you get any job done in style." name="description"/>

<meta content='Homepolish' itemprop='name'>
<meta content='Homepolish provides both residential and commercial clients with premium interior design, from accessorizing to gut-renovations.' itemprop='description'>
<meta content='https://www.homepolish.com/assets/homepolish_logo-1345a44d04bde8dd5bd6edfcf421689cdbf630034936a1729f90032078c9920e.png' itemprop='logo'>
<meta content='https://homepolish.com/' itemprop='url'>


<meta content='127512634049491' property='fb:app_id'>
<meta content='website' property='og:type'>
<meta content='Homepolish: Seamless and Personal Interior Design' property='og:title'>
<meta content='Premium interior design services in-home and online nationwide. From decorating rooms to renovating offices, our designers help you get any job done in style.' property='og:description'>
<meta content='https://www.homepolish.com/cdn/homepage/meta-images/og.jpg' property='og:image'>
<meta content='https://homepolish.com/' property='og:url'>
<meta content='Homepolish' property='og:site_name'>
<meta content='en_US' property='og:locale'>


<meta content='summary_large_image' name='twitter:card'>
<meta content='Homepolish: Seamless and Personal Interior Design' name='twitter:title'>
<meta content='Premium interior design services in-home and online nationwide. From decorating rooms to renovating offices, our designers help you get any job done in style.' name='twitter:description'>
<meta content='https://www.homepolish.com/cdn/homepage/meta-images/twitter.jpg' name='twitter:image'>
<meta content='Living Room in Williamsburg Bachelor Pad' name='twitter:image:alt'>
<meta content='@homepolish' name='twitter:site'>
<meta content='@homepolish' name='twitter:creator'>



<link href='https://www.homepolish.com/assets/homepolish_logo-1345a44d04bde8dd5bd6edfcf421689cdbf630034936a1729f90032078c9920e.png' rel='apple-touch-icon'>
<script type='text/javascript'>
!function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","reset","group","track","ready","alias","page","once","off","on"];analytics.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);analytics.push(e);return analytics}};for(var t=0;t<analytics.methods.length;t++){var e=analytics.methods[t];analytics[e]=analytics.factory(e)}analytics.load=function(t){var e=document.createElement("script");e.type="text/javascript";e.async=!0;e.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.com/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};analytics.SNIPPET_VERSION="3.1.0";
analytics.load("u1oneMHbBVZBLwFZuVdJxxAlH2uQaDR3");
analytics.page();
}}();
</script>

  <script src="https://www.homepolish.com/assets/vwo_smart_code-fdabe6a062e597207f10e071d82ac81f82386566f9095f2508561cfb43e6e25c.js"></script>

</head>
<body class='svelte landing-pages landing-pages--homepage' data-action='homepage' data-controller='landing_pages'>
<div class='fixed-banner'>


</div>
<div class='main-container'>
  <div class="hp-header-container">
  <header id="header" class="hp-header hp-header--transparent">
    <div class="hp-header__main">
      <button class="mobile-nav-menu-toggle" data-mobile-nav-menu-toggle="true">
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
      </button>

      <a href="/" class="hp-header__logo-link hp-header__logo-link--mobile-tablet">
        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="https://www.homepolish.com/assets/homepolish-wordmark-white-0f8caeca1b03d49cb61da10d0550d68138e1505ba2375ecd033cd2516b5c8efc.png" />
        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="https://www.homepolish.com/assets/homepolish-wordmark-f09400f624be850d548380bfb33f6de9292ca7ef1f1f0524e1c979ecab0f5ff7.png" />
      </a>

      <div class="hp-header__auth">
          <a class="auth__link" href="/log_in">Log In</a>
      </div>
    </div>

    <nav class="hp-header__nav">
      <a class="tertiary nav__link " href="/about-us">About Us</a>

      <a class="tertiary nav__link " href="/portfolio">Portfolio</a>

      <a class="tertiary nav__link " href="/commercial">Commercial</a>

      <a href="/" class="hp-header__logo-link hp-header__logo-link--desktop">
        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="https://www.homepolish.com/assets/homepolish-wordmark-white-0f8caeca1b03d49cb61da10d0550d68138e1505ba2375ecd033cd2516b5c8efc.png" />

        <img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="https://www.homepolish.com/assets/homepolish-wordmark-f09400f624be850d548380bfb33f6de9292ca7ef1f1f0524e1c979ecab0f5ff7.png" />
      </a>

        <a class="tertiary nav__link " href="/concierge">Concierge</a>

      <a class="tertiary nav__link" href="/tags/build">Build</a>
      </h6>

      <a class="tertiary nav__link" href="/mag">The Magazine</a>

    </nav>
  </header>
</div>

  <div class='mobile-nav-menu' id='mobile-nav-menu'>
<div class='menu-content'>
<div class='nav-links'>
<h5 class='nav-link'>
<a class="tertiary" href="/about-us">About Us</a>
</h5>
<h5 class='nav-link'>
<a class="tertiary" href="/portfolio">Portfolio</a>
</h5>
<h5 class='nav-link'>
<a class="tertiary" href="/commercial">Commercial</a>
</h5>
<h5 class='nav-link'>
<a class="tertiary" href="/concierge">Concierge</a>
</h5>
<h5 class='nav-link'>
<a class="tertiary" href="/tags/build">Build Services</a>
</h5>
<h5 class='nav-link'>
<a class="tertiary" href="/mag">The Magazine</a>
</h5>
</div>
<div class='other-links'>
<h5 class='other-link login-link'>
<a class="tertiary" href="/log_in">Log In</a>
</h5>
</div>
</div>
</div>
<div class='mobile-nav-buttons' id='mobile-nav-buttons'>
<div class='scroll-shadow'></div>
</div>









<div class="hero">
  <div class="hero__slideshow" data-slideshow>
      <div class="hero__slide hero__slide--1" data-slideshow-index="1"></div>
      <div class="hero__slide hero__slide--2" data-slideshow-index="2"></div>
      <div class="hero__slide hero__slide--3" data-slideshow-index="3"></div>
      <div class="hero__slide hero__slide--4" data-slideshow-index="4"></div>
      <div class="hero__slide hero__slide--5" data-slideshow-index="5"></div>
      <div class="hero__slide hero__slide--6" data-slideshow-index="6"></div>
  </div>

  <h1 class="hero__tagline formatted-copy--mobile-tablet">
    Interior design,<br />
    redesigned.
  </h1>

  <h1 class="hero__tagline formatted-copy--desktop">
    Interior design, redesigned.
  </h1>

    <div class="hero__signup" data-hero-content>
      <div class='book-now-signup book-now-signup-start-email'>
<p class='signup-subheader'>
Sign up for top interior designers and general contractors, selected just for you.
</p>
<form accept-charset='UTF-8' action='https://homepolish.com/app/registration' class='email-form bn-signup-embed' data-form-id='homepage_signup' id='new_client' method='get' novalidate='novalidate'>
<input name='utf8' type='hidden' value='✓'>
<div class='form-field-container'>
<input class='form-field hp-form-field' data-field-attribute='email' data-track-book-now-embed='true' id='client_email' name='email' placeholder='example@homepolish.com' type='email' value=''>
<input class='form-submit' name='commit' type='submit' value='Next'>
<div class='hp-form-field-error-message'></div>
</div>
</form>
<h6 class='existing-account-link'>
Already Have an Account? <a class="secondary" href="/log_in">Log In</a>
<span class='v1-icon-caret-right'></span>
</h6>
</div>

    </div>
</div>


  <div class="about-blurb">
  <h2 class="about-blurb__content formatted-copy--mobile">
    Homepolish represents the<br />
    nation’s top interior design talent<br />
    and offers our clients<br />
    a personal and seamless<br />
    interior design experience.
  </h2>

  <h2 class="about-blurb__content formatted-copy--tablet">
    Homepolish represents the nation’s top<br />
    interior design talent and offers our clients<br />
    a personal and seamless interior design experience.   
  </h2>

  <h2 class="about-blurb__content formatted-copy--desktop">
    Homepolish represents the nation’s top interior design talent<br/>
    and offers our clients a personal and seamless interior design experience.
  </h2>
</div>


  <div id="how-it-works" class="how-it-works">
  <div class="step step--1">
    <div class="step__image"></div>

    <div class="step__text">
      <h6 class="step__header">
        To Get Started
      </h6>

      <h3 class="step__title formatted-copy--mobile">
        Sign Up &<br />
        Meet Your Designer
      </h3>

      <h3 class="step__title formatted-copy--tablet-desktop">
        Sign Up & Meet Your Designer<br />
      </h3>

      <p class="step__description">
        Fill out your details, and we’ll either select a designer for you or set you up with a Homepolish designer you already love. Then enjoy a complimentary, one-on-one consultation.
      </p>

      <h5 class="step__link">
        <a class='cta-link' href='/start' target='_self'>
<span class='cta-link-text'>Get Started</span>
<span class='v1-icon-caret-right'></span>
</a>

      </h5>
    </div>
  </div>

  <div class="step step--2">
    <div class="step__image"></div>

    <div class="step__text">
      <h6 class="step__header">
        After Your Consultation
      </h6>

      <h3 class="step__title formatted-copy--mobile">
        Review Your Proposal &<br/>
        Purchase Design Time
      </h3>

      <h3 class="step__title formatted-copy--tablet-desktop">
        Review Your Proposal<br />
        & Purchase Design Time
      </h3>

      <p class="step__description">
        Based on your needs and project scope, your designer will create a custom proposal outlining tasks, products to purchase, and a recommended design fee.
      </p>

      <p class="step__italics">
        (price varies by designer)
      </p>
    </div>
  </div>

  <div class="step step--3">
    <div class="step__image"></div>

    <div class="step__text">
      <h6 class="step__header">
        From Start to Finish
      </h6>

      <h3 class="step__title">
        End-to-End Project Management
      </h3>

      <h5 class="step__subtitle formatted-copy--mobile">
        A Dedicated<br/>
        Account Manager
      </h5>

      <h5 class="step__subtitle formatted-copy--tablet-desktop">
        A Dedicated Account Manager
      </h5>

      <p class="step__description">
        You’ll have our entire support team at your service, including a dedicated, on-call Account Manager who can answer any questions and keep your project running smoothly.
      </p>

      <h5 class="step__subtitle formatted-copy--mobile">
        Purchasing Concierge
      </h5>

      <h5 class="step__link formatted-copy--mobile">
        <a href="/concierge" class="cta-link">
          <span class="cta-link-text">Learn more</span>
          <span class="v1-icon-caret-right"></span>
        </a>
      </h5>

      <h5 class="step__subtitle formatted-copy--tablet-desktop">
        Purchasing Concierge
      </h5>

      <p class="step__description">
        Our easy-to-navigate Shopping List lets you and your designer easily collaborate on items to purchase. Once you’re ready, our Concierge team will place your orders across hundreds of vendors—and manage all the logistics.
        <br>
        <a href="/concierge" class="cta-link">
          <span class="cta-link-text">Learn more</span>
          <span class="v1-icon-caret-right"></span>
        </a>
      </p>

      <h5 class="step__subtitle formatted-copy--mobile">
        A Vetted Network of<br />
        Renovation Specialists
      </h5>

      <h5 class="step__link formatted-copy--mobile">
        <a href="/tags/build" class="cta-link">
          <span class="cta-link-text">Learn more</span>
          <span class="v1-icon-caret-right"></span>
        </a>
      </h5>

      <h5 class="step__subtitle formatted-copy--tablet-desktop">
        A Vetted Network of Renovation Specialists
      </h5>

      <p class="step__description">
        When your project needs it, we’ll select reliable contractors and architects for you, saving you from a stressful bidding process, and partner with your designer to keep things moving—from contracts and billing to everything in between.
        <br>
        <a href="/tags/build" class="cta-link">
          <span class="cta-link-text">Learn more</span>
          <span class="v1-icon-caret-right"></span>
        </a>
      </p>

    </div>
  </div>
</div>


  <div class="portfolio">
  <h2 class="portfolio__header">
    Browse Styles and Get Inspired
  </h2>

  <div class="portfolio__categories portfolio__categories--mobile">
    <div class="owl-carousel" data-owl-carousel>
        <div class="category" data-carousel-index="1">
          <div class="category__image category__image--1"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#moody-romantic" class="category__link">
                Moody Romantic
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
        <div class="category" data-carousel-index="2">
          <div class="category__image category__image--2"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#glam-sophisticate" class="category__link">
                Glam Sophisticate
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
        <div class="category" data-carousel-index="3">
          <div class="category__image category__image--3"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#rustic-industrialist" class="category__link">
                Rustic Industrialist
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
        <div class="category" data-carousel-index="4">
          <div class="category__image category__image--4"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#comfortable-modernist" class="category__link">
                Comfortable Modernist
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
        <div class="category" data-carousel-index="5">
          <div class="category__image category__image--5"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#artful-eclectic" class="category__link">
                Artful Eclectic
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
        <div class="category" data-carousel-index="6">
          <div class="category__image category__image--6"></div>

            <h5 class="category__label">
              <a href="/portfolio?browseBy=style#new-traditionalist" class="category__link">
                New Traditionalist
              </a>
            </h5>

          <div class="category__overlay category__overlay--active"></div>
        </div>
    </div>
  </div>

  <div class="portfolio__categories portfolio__categories--desktop">
      <div class="category">
        <a href="/portfolio?browseBy=style#moody-romantic" class="category__link">
          <div class="category__image category__image--1"></div>

          <h5 class="category__label">
            Moody Romantic
          </h5>
        </a>
      </div>
      <div class="category">
        <a href="/portfolio?browseBy=style#glam-sophisticate" class="category__link">
          <div class="category__image category__image--2"></div>

          <h5 class="category__label">
            Glam Sophisticate
          </h5>
        </a>
      </div>
      <div class="category">
        <a href="/portfolio?browseBy=style#rustic-industrialist" class="category__link">
          <div class="category__image category__image--3"></div>

          <h5 class="category__label">
            Rustic Industrialist
          </h5>
        </a>
      </div>
      <div class="category">
        <a href="/portfolio?browseBy=style#comfortable-modernist" class="category__link">
          <div class="category__image category__image--4"></div>

          <h5 class="category__label">
            Comfortable Modernist
          </h5>
        </a>
      </div>
      <div class="category">
        <a href="/portfolio?browseBy=style#artful-eclectic" class="category__link">
          <div class="category__image category__image--5"></div>

          <h5 class="category__label">
            Artful Eclectic
          </h5>
        </a>
      </div>
      <div class="category">
        <a href="/portfolio?browseBy=style#new-traditionalist" class="category__link">
          <div class="category__image category__image--6"></div>

          <h5 class="category__label">
            New Traditionalist
          </h5>
        </a>
      </div>
  </div>

  <h5 class="portfolio__link">
    <a class='cta-link' href='/portfolio' target='_self'>
<span class='cta-link-text'>Browse our Portfolio</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>


  <div class="influencers">
  <h2 class="influencers__header">
    In Good Company
  </h2>

  <div class="influencers__testimonials influencers__testimonials--mobile">
    <div class="owl-carousel" data-owl-carousel>
        <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_1.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Hannah Bronfman
  </h5>

  <p class="testimonial__text testimonial__text--1">
    “My designer knew how to get the big things out of the way and finish with all the little bells and whistles to create that perfect vibe.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/a-chill-new-york-apartment-for-two-djs' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

        <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_2.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Karlie Kloss
  </h5>

  <p class="testimonial__text testimonial__text--2">
    “What’s great about my office now is that while each room stands on its own, they all balance each other to create a collaborative, functional space.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/tour-karlie-kloss-boss-office' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

        <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_3.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Leandra Medine
  </h5>

  <p class="testimonial__text testimonial__text--3">
    “Homepolish understood the vibe that I was going for almost immediately. It’s such a great experience to be on the same page as someone else.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/man-repellers-latest-office-upgrade' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

    </div>
  </div>

  <div class="influencers__testimonials influencers__testimonials--desktop">
      <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_1.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Hannah Bronfman
  </h5>

  <p class="testimonial__text testimonial__text--1">
    “My designer knew how to get the big things out of the way and finish with all the little bells and whistles to create that perfect vibe.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/a-chill-new-york-apartment-for-two-djs' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

      <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_2.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Karlie Kloss
  </h5>

  <p class="testimonial__text testimonial__text--2">
    “What’s great about my office now is that while each room stands on its own, they all balance each other to create a collaborative, functional space.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/tour-karlie-kloss-boss-office' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

      <div class="testimonial">
  <img src="https://www.homepolish.com/cdn/homepage/influencers/20170926_3.png" class="testimonial__image" />

  <h5 class="testimonial__name">
    Leandra Medine
  </h5>

  <p class="testimonial__text testimonial__text--3">
    “Homepolish understood the vibe that I was going for almost immediately. It’s such a great experience to be on the same page as someone else.”
  </p>

  <h5 class="testimonial__link">
    <a class='cta-link' href='https://www.homepolish.com/mag/man-repellers-latest-office-upgrade' target='_blank'>
<span class='cta-link-text'>Tour the Space</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>

  </div>
</div>


  <div class="our-designers">
  <h2 class="our-designers__header">
    Our Designers
  </h2>

  <p class="our-designers__content">
    Homepolish represents the country’s top residential and commercial interior design talent, including established veterans and emerging talent. We rigorously vet each designer and select the professional equipped with the taste, experience, and enthusiasm to create your space.
  </p>

  <h5 class="our-designers__link our-designers__link--mobile">
    <a class='cta-link' href='/careers' target='_self'>
<span class='cta-link-text'>Apply to Be a Designer</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>

  <h5 class="our-designers__link our-designers__link--desktop">
    <a class='cta-link' href='/careers' target='_self'>
<span class='cta-link-text'>Apply to Be a Homepolish Designer</span>
<span class='v1-icon-caret-right'></span>
</a>

  </h5>
</div>


  <div class="press">
  <div class="press__slides">
    <div class="owl-carousel" data-owl-carousel>
        <div class="slide slide--1">
          <h2 class="slide__quote slide__quote--1">
            “The process feels informal, as if a friend with good taste and connections is helping us get our place together.”
          </h2>

          <div class="slide__attribution">
            —
            <img src="https://www.homepolish.com/cdn/homepage/press/20170927_ny_times.png" class="slide__logo" />
          </div>
        </div>
        <div class="slide slide--2">
          <h2 class="slide__quote slide__quote--2">
            “The result is an integrated remodel or construction process that removes much of the headache from the status quo.”
          </h2>

          <div class="slide__attribution">
            —
            <img src="https://www.homepolish.com/cdn/homepage/press/20170927_architectural_digest.png" class="slide__logo" />
          </div>
        </div>
        <div class="slide slide--3">
          <h2 class="slide__quote slide__quote--3">
            “Homepolish offers everything from a basic style assessment down to bidding contractors to make your biggest design dreams come true.”
          </h2>

          <div class="slide__attribution">
            —
            <img src="https://www.homepolish.com/cdn/homepage/press/20170927_in_style.png" class="slide__logo" />
          </div>
        </div>
        <div class="slide slide--4">
          <h2 class="slide__quote slide__quote--4">
            “Whether you are a designer looking to expand your business or your abode just needs a little sprucing, Homepolish makes it easy for anyone, anywhere to feel great about the space they’re in.”
          </h2>

          <div class="slide__attribution">
            —
            <img src="https://www.homepolish.com/cdn/homepage/press/20170927_lonny.png" class="slide__logo" />
          </div>
        </div>
        <div class="slide slide--5">
          <h2 class="slide__quote slide__quote--5">
            “I can’t think of anything I want more than a completely and expertly renovated and decorated new apartment. Since I don’t have enough hours a day to do it myself, Homepolish is the next best thing.”
          </h2>

          <div class="slide__attribution">
            —
            <img src="https://www.homepolish.com/cdn/homepage/press/20170927_gq.png" class="slide__logo" />
          </div>
        </div>
    </div>
  </div>
</div>


  <div class='book-now-cta'>
<h5 class='cta-header'>
Get started with a complimentary consultation
</h5>
<h3 class='cta-content'>
Let us select the perfect design team for you.
</h3>
<a class="cta-button" data-track-book-now="true" data-button-id="inline_cta" href="/start">Sign Up</a>
</div>


<footer class='hp-footer cross-site-footer' id='footer' role='contentinfo'>
<div class='hp-footer__container'>
<div class='with-nav-tabs' id='cross-site-footer-mobile'>
<div class='hp-footer__logo'>
<span class='v1-icon-logo' title='Homepolish'></span>
</div>

<div class='info-partial-container'>
<div class='info-line'>
Homepolish, Inc.
</div>
<div class='info-line' itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'>
<span itemprop='streetAddress'>27 W 24th Street Fl. 2</span>
 
<span itemprop='addressLocality'>New York</span>
, 
<span itemprop='addressRegion'>NY</span>
 
<span itemprop='postalCode'>10010</span>
</div>
<div class='info-line'>
<span itemprop='email'>info@homepolish.com</span>
 | 
<span itemprop='telephone'>844-808-4434</span>
</div>
<div class='info-line'>
© 2012-2018
</div>
</div>

<ul class='accordion' id='cross-site-footer-links-columns'>
<div class='hp-footer-column hive-links-column'>
<li class='cross-site-footer-links-column'>
<a class='cross-site-footer-links-column-header' data-accordion-trigger href='/'>
Design Services
<span class='v1-icon-add'></span>
</a>
<ul class='submenu'>
<li class='links-column-link-li'>
<a class='links-column-link' href='/cities'>
<p class='links-column-link-text'>
Locations
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/start'>
<p class='links-column-link-text'>
Book a Designer
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/about-us'>
<p class='links-column-link-text'>
About
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/portfolio'>
<p class='links-column-link-text'>
Portfolio
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/commercial'>
<p class='links-column-link-text'>
Commercial Design
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/tags/build'>
<p class='links-column-link-text'>
Build Services
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/careers'>
<p class='links-column-link-text'>
Design Careers
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/concierge'>
<p class='links-column-link-text'>
Concierge
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/guarantee'>
<p class='links-column-link-text'>
Guarantee
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/press'>
<p class='links-column-link-text'>
Press
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/client-testimonials'>
<p class='links-column-link-text'>
Reviews
</p>
</a>
</li>
</ul>
</li>

</div>
<div class='hp-footer-column mag-links-column'>
<li class='cross-site-footer-links-column'>
<a class='cross-site-footer-links-column-header' data-accordion-trigger href='/mag'>
The Magazine
<span class='v1-icon-add'></span>
</a>
<ul class='submenu'>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/tours'>
<p class='links-column-link-text'>
Tours
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/influencers'>
<p class='links-column-link-text'>
Influencers
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/commercial-tours'>
<p class='links-column-link-text'>
Commercial Tours
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/design-guides'>
<p class='links-column-link-text'>
Design Guides
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/interviews'>
<p class='links-column-link-text'>
Interviews
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/handbooks'>
<p class='links-column-link-text'>
Handbooks
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/ask-homepolish'>
<p class='links-column-link-text'>
Ask Homepolish
</p>
</a>
</li>
</ul>
</li>

</div>

</ul>
<div class='cross-site-footer-mobile-bottom-section'>
<div class='newsletter-partial-container'>
<h6 class='newsletter-signup-header'>
Get our best in your inbox
</h6>
<form data-form-id="footer-newsletter-subscribe-mobile" class="newsletter-signup-form" action="/newsletter_subscriptions" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
<input type="hidden" name="form_id" id="form_id" value="footer-newsletter-subscribe-mobile" />
<input type="hidden" name="list_key" id="list_key" value="main" />
<input class='newsletter-signup-input' name='email_address' placeholder='Your email address'>
<input class='btn condensed' type='submit' value='Sign Up'>
</form>

</div>

<div class='hp-footer__social-icons'>
<a class='secondary' href='https://facebook.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-facebook'></span>
</a>
<a class='secondary' href='https://pinterest.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-pinterest'></span>
</a>
<a class='secondary' href='https://instagram.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-instagram'></span>
</a>
<a class='secondary' href='https://twitter.com/homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-twitter'></span>
</a>
<a class='secondary' href='https://homepolish.com/tumblr' itemprop='sameAs' target='_blank'>
<span class='v1-icon-tumblr'></span>
</a>
</div>

<div class='bottom-links-partial-container'>
<a class='bottom-link' href='/jobs'>
<h6 class='bottom-link-text'>Jobs</h6>
</a>
<a class='bottom-link' href='/faq'>
<h6 class='bottom-link-text'>FAQs</h6>
</a>
<a class='bottom-link' href='mailto:info@homepolish.com'>
<h6 class='bottom-link-text'>Contact</h6>
</a>
<a class='bottom-link' href='/terms'>
<h6 class='bottom-link-text'>Terms</h6>
</a>
<a class='bottom-link' href='/privacy'>
<h6 class='bottom-link-text'>Privacy</h6>
</a>
</div>

</div>
</div>
<div id='cross-site-footer-desktop'>
<div class='hp-footer-column logo-column'>
<div class='hp-footer__logo'>
<span class='v1-icon-logo' title='Homepolish'></span>
</div>

</div>
<div class='hp-footer-column info-column'>
<div class='info-partial-container'>
<div class='info-line'>
Homepolish, Inc.
</div>
<div class='info-line' itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'>
<span itemprop='streetAddress'>27 W 24th Street Fl. 2</span>
 
<span itemprop='addressLocality'>New York</span>
, 
<span itemprop='addressRegion'>NY</span>
 
<span itemprop='postalCode'>10010</span>
</div>
<div class='info-line'>
<span itemprop='email'>info@homepolish.com</span>
 | 
<span itemprop='telephone'>844-808-4434</span>
</div>
<div class='info-line'>
© 2012-2018
</div>
</div>

<div class='newsletter-partial-container'>
<h6 class='newsletter-signup-header'>
Get our best in your inbox
</h6>
<form data-form-id="footer-newsletter-subscribe-desktop" class="newsletter-signup-form" action="/newsletter_subscriptions" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
<input type="hidden" name="form_id" id="form_id" value="footer-newsletter-subscribe-desktop" />
<input type="hidden" name="list_key" id="list_key" value="main" />
<input class='newsletter-signup-input' name='email_address' placeholder='Your email address'>
<input class='btn condensed' type='submit' value='Sign Up'>
</form>

</div>

<div class='hp-footer__social-icons'>
<a class='secondary' href='https://facebook.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-facebook'></span>
</a>
<a class='secondary' href='https://pinterest.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-pinterest'></span>
</a>
<a class='secondary' href='https://instagram.com/Homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-instagram'></span>
</a>
<a class='secondary' href='https://twitter.com/homepolish' itemprop='sameAs' target='_blank'>
<span class='v1-icon-twitter'></span>
</a>
<a class='secondary' href='https://homepolish.com/tumblr' itemprop='sameAs' target='_blank'>
<span class='v1-icon-tumblr'></span>
</a>
</div>

<div class='bottom-links-partial-container'>
<a class='bottom-link' href='/jobs'>
<h6 class='bottom-link-text'>Jobs</h6>
</a>
<a class='bottom-link' href='/faq'>
<h6 class='bottom-link-text'>FAQs</h6>
</a>
<a class='bottom-link' href='mailto:info@homepolish.com'>
<h6 class='bottom-link-text'>Contact</h6>
</a>
<a class='bottom-link' href='/terms'>
<h6 class='bottom-link-text'>Terms</h6>
</a>
<a class='bottom-link' href='/privacy'>
<h6 class='bottom-link-text'>Privacy</h6>
</a>
</div>

</div>
<ul id='cross-site-footer-links-columns'>
<div class='hp-footer-column hive-links-column'>
<li class='cross-site-footer-links-column'>
<a class='cross-site-footer-links-column-header' href='/'>
Design Services
<span class='v1-icon-add'></span>
</a>
<ul class='submenu'>
<li class='links-column-link-li'>
<a class='links-column-link' href='/cities'>
<p class='links-column-link-text'>
Locations
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/start'>
<p class='links-column-link-text'>
Book a Designer
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/about-us'>
<p class='links-column-link-text'>
About
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/portfolio'>
<p class='links-column-link-text'>
Portfolio
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/commercial'>
<p class='links-column-link-text'>
Commercial Design
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/tags/build'>
<p class='links-column-link-text'>
Build Services
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/careers'>
<p class='links-column-link-text'>
Design Careers
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/concierge'>
<p class='links-column-link-text'>
Concierge
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/guarantee'>
<p class='links-column-link-text'>
Guarantee
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/press'>
<p class='links-column-link-text'>
Press
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/client-testimonials'>
<p class='links-column-link-text'>
Reviews
</p>
</a>
</li>
</ul>
</li>

</div>
<div class='hp-footer-column mag-links-column'>
<li class='cross-site-footer-links-column'>
<a class='cross-site-footer-links-column-header' href='/mag'>
The Magazine
<span class='v1-icon-add'></span>
</a>
<ul class='submenu'>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/tours'>
<p class='links-column-link-text'>
Tours
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/influencers'>
<p class='links-column-link-text'>
Influencers
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/commercial-tours'>
<p class='links-column-link-text'>
Commercial Tours
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/design-guides'>
<p class='links-column-link-text'>
Design Guides
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/interviews'>
<p class='links-column-link-text'>
Interviews
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/handbooks'>
<p class='links-column-link-text'>
Handbooks
</p>
</a>
</li>
<li class='links-column-link-li'>
<a class='links-column-link' href='/mag/ask-homepolish'>
<p class='links-column-link-text'>
Ask Homepolish
</p>
</a>
</li>
</ul>
</li>

</div>

</ul>
</div>
</div>
</footer>

<div class='hp-mobile-tab-bars' id='mobile-tab-bars'>
<a class="btn" data-track-book-now="true" data-button-id="mobile_nav" href="/start">Book Now</a>
</div>

</div>
<!-- Google Tag Manager (javascript disabled) -->
<noscript>
<iframe height='0' src='//www.googletagmanager.com/ns.html?id=GTM-MKH9LX' style='display:none;visibility:hidden' width='0'></iframe>
</noscript>
<script src="https://www.homepolish.com/assets/vendor-c9902898e5f5f7a849b421fd94c502b2aa5f1abcac77a92a0f7c5130ebb0a97c.js"></script>
<script src="https://www.homepolish.com/assets/svelte-4fce48c81391751e15017d9cdfabea9d8b434b9c555557559f01421b0d4502af.js"></script>
  <script src="https://www.homepolish.com/assets/landing_pages/homepage-6c2f84b4a74528bd1ed7b026df70fa798925f24ca5a581c5cdf33a562c35a777.js"></script>


</body>
</html>
