<?php

class Platform {
  public const DESKTOP = 'desktop';
  public const TABLET = 'tablet';
  public const MOBILE = 'mobile';

  public const ANDROID = 'android';
  public const IOS = 'ios';
  public const LINUX = 'linux';
  public const OSX = 'osx';
  public const WINDOWS = 'windows';

  public const CHROME = 'chrome';
  public const FIREFOX = 'firefox';
  public const OPERA = 'opera';
  public const EDGE = 'edge';
  public const SAFARI = 'safari';
  public const EXPLORER = 'explorer';

  public static $device = Platform::MOBILE;
  public static $os = Platform::ANDROID;
  public static $browser = Platform::CHROME;

  public static function initialize(): void {
    Platform::setDevice();
    Platform::setOs();
    Platform::setBrowser();
  }

  public static function compareDevice(string $device): bool {
    return Platform::$device === $device;
  }

  public static function compareOs(string $os): bool {
    return Platform::$os === $os;
  }

  public static function compareBrowser(string $browser): bool {
    return Platform::$browser === $browser;
  }

  public static function isDesktop(): bool {
    return Platform::compareDevice(Platform::DESKTOP);
  }

  public static function isTablet(): bool {
    return Platform::compareDevice(Platform::TABLET);
  }

  public static function isMobile(): bool {
    return Platform::compareDevice(Platform::MOBILE);
  }

  public static function detectDesktop(): bool {
    return !Platform::detectMobile() && !Platform::detectTablet();
  }

  public static function detectTablet(): bool {
    return (bool) preg_match('/tablet|ipad/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectMobile(): bool {
    return (bool) preg_match('/mobile|iphone|ipod|android|windows *phone/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectAndroid(): bool {
    return (bool) preg_match('/android/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectIos(): bool {
    return (bool) preg_match('/ipad|iphone|ipod/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectLinux(): bool {
    return (bool) preg_match('/linux/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectOsx(): bool {
    return (bool) preg_match('/macintosh|os *x/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectWindows(): bool {
    return (bool) preg_match('/windows|win64|win32/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectChrome(): bool {
    return (bool) preg_match('/chrome/i', $_SERVER['HTTP_USER_AGENT'])
      && !Platform::detectOpera() && !Platform::detectEdge();
  }

  public static function detectFirefox(): bool {
    return (bool) preg_match('/firefox/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectOpera(): bool {
    return (bool) preg_match('/opr/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectEdge(): bool {
    return (bool) preg_match('/edge/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function detectSafari(): bool {
    return (bool) preg_match('/safari/i', $_SERVER['HTTP_USER_AGENT'])
      && !Platform::detectChrome() && !Platform::detectOpera() && !Platform::detectEdge();
  }

  public static function detectExplorer(): bool {
    return (bool) preg_match('/msie|trident/i', $_SERVER['HTTP_USER_AGENT']);
  }

  public static function setDevice(): void {
    switch(true) {
      case Platform::detectTablet():
        Platform::$device = Platform::TABLET;
        break;
      case Platform::detectMobile():
        Platform::$device = Platform::MOBILE;
        break;
      case Platform::detectDesktop():
        Platform::$device = Platform::DESKTOP;
        break;
      default:
        Platform::$device = '';
    }
  }

  public static function setOs(): void {
    switch(true) {
      case Platform::detectAndroid():
        Platform::$os = Platform::ANDROID;
        break;
      case Platform::detectIos():
        Platform::$os = Platform::IOS;
        break;
      case Platform::detectLinux():
        Platform::$os = Platform::LINUX;
        break;
      case Platform::detectOsx():
        Platform::$os = Platform::OSX;
        break;
      case Platform::detectWindows():
        Platform::$os = Platform::WINDOWS;
        break;
      default:
        Platform::$os = '';
    }
  }

  public static function setBrowser(): void {
    switch(true) {
      case Platform::detectChrome():
        Platform::$browser = Platform::CHROME;
        break;
      case Platform::detectFirefox():
        Platform::$browser = Platform::FIREFOX;
        break;
      case Platform::detectOpera():
        Platform::$browser = Platform::OPERA;
        break;
      case Platform::detectEdge():
        Platform::$browser = Platform::EDGE;
        break;
      case Platform::detectSafari():
        Platform::$browser = Platform::SAFARI;
        break;
      case Platform::detectExplorer():
        Platform::$browser = Platform::EXPLORER;
        break;
      default:
        Platform::$browser = '';
    }
  }
}
