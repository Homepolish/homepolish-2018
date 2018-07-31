(function ($, _) {
  'use strict';

  // NB - this file contains a _lot_ of fragile hacks b/c we're doing auth over JS
  // TODO - figure out PHP-side auth

  /*\
  |*|
  |*|  :: cookies.js ::
  |*|
  |*|  A complete cookies reader/writer framework with full unicode support.
  |*|
  |*|  Revision #1 - September 4, 2014
  |*|
  |*|  https://developer.mozilla.org/en-US/docs/Web/API/document.cookie
  |*|  https://developer.mozilla.org/User:fusionchess
  |*|
  |*|  This framework is released under the GNU Public License, version 3 or later.
  |*|  http://www.gnu.org/licenses/gpl-3.0-standalone.html
  |*|
  |*|  Syntaxes:
  |*|
  |*|  * docCookies.setItem(name, value[, end[, path[, domain[, secure]]]])
  |*|  * docCookies.getItem(name)
  |*|  * docCookies.removeItem(name[, path[, domain]])
  |*|  * docCookies.hasItem(name)
  |*|  * docCookies.keys()
  |*|
  \*/
  var docCookies = {
    getItem: function (sKey) {
      if (!sKey) { return null; }
      return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
    },
    setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
      if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
      var sExpires = "";
      if (vEnd) {
        switch (vEnd.constructor) {
          case Number:
            sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
            break;
          case String:
            sExpires = "; expires=" + vEnd;
            break;
          case Date:
            sExpires = "; expires=" + vEnd.toUTCString();
            break;
        }
      }
      document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
      return true;
    },
    removeItem: function (sKey, sPath, sDomain) {
      if (!this.hasItem(sKey)) { return false; }
      document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
      return true;
    },
    hasItem: function (sKey) {
      if (!sKey) { return false; }
      return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
    },
    keys: function () {
      var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
      for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
      return aKeys;
    }
  };

  // Reference to the user info returned from backend
  var USER;

  var rootUrl = 'https://www.homepolish.com';
  var wildcardDomain = '.homepolish.com';

  function authEmail() {
    return docCookies.getItem('authEmail');
  }

  function authToken() {
    return docCookies.getItem('authToken');
  }

  function currentSession() {
    $.ajax({
      type: 'GET',
      url: rootUrl + '/v1/wp/me',
      xhrFields: {
        withCredentials: true
      },
      dataType: 'json',
      data: {
        authEmail: authEmail(),
        authToken: authToken()
      },
      success: function(response) {
        if (response.session_data && response.session_data.current_user) {
          USER = response.session_data.current_user;
          toggleLoggedIn(true);
        } else {
          toggleLoggedIn(false);
        }
      },
      error: function(response) {
        toggleLoggedIn(false);
      }
    });
  }

  function destroySession() {
    $.ajax({
      type: 'DELETE',
      url: rootUrl + '/v1/logout',
      xhrFields: {
         withCredentials: true
      },
      dataType: 'json',
      data: {
        authEmail: authEmail(),
        authToken: authToken()
      },
      success: function(response) {
        docCookies.removeItem('authEmail', '/', wildcardDomain);
        docCookies.removeItem('authToken', '/', wildcardDomain);
        toggleLoggedIn(false);
      }
    });
  }

  var loggedInDisplay = $('[data-logged-in]'),
      loggedOutDisplay = $('[data-logged-out]'),
      dashboardLinks = $('[data-dashboard-link]'),
      logoutLinks = $('[data-logout-link]');

  var headerAuthSections = $('header .auth-link, header .dashboard-link, #full-menu-auth');
  var signupWidget = $('.widget_signup_widget');
  var mobileFooterSocialIcons = $('#mobile-social-icons');
  var menuLinks = $('#full-menu-links');

  function toggleLoggedIn(isLoggedIn) {
    if (isLoggedIn) {
      loggedInDisplay.show();
      loggedOutDisplay.hide();
      signupWidget.hide();
      initializeDashboardLinks();
      clearNavTabsPadding();
    } else {
      loggedInDisplay.hide();
      loggedOutDisplay.show();
      signupWidget.show();
      USER = undefined;
    }
    menuLinks.show();

    headerAuthSections.css('visibility', 'visible');
    signupWidget.css('visibility', 'visible');

    // Display this at the same the mobile footer, to avoid a brief flicker
    mobileFooterSocialIcons.css('visibility', 'visible');
  }

  // Set the "Dashboard" links for service + designers
  function initializeDashboardLinks() {
    if (USER && USER.dashboard_path) {
      dashboardLinks.attr('href', USER.dashboard_path);
    }
  }

  function clearNavTabsPadding() {
    $('.with-nav-tabs').removeClass('with-nav-tabs');
  }

  // Initialization
  $(document).ready(function() {
    logoutLinks.click(function(e) {
      destroySession();
    });

    currentSession();
  });
})(jQuery, _);
