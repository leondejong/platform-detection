export default class Platform {
  public static readonly desktop: string = "desktop";
  public static readonly tablet: string = "tablet";
  public static readonly mobile: string = "mobile";

  public static readonly android: string = "android";
  public static readonly ios: string = "ios";
  public static readonly linux: string = "linux";
  public static readonly osx: string = "osx";
  public static readonly windows: string = "windows";

  public static readonly chrome: string = "chrome";
  public static readonly firefox: string = "firefox";
  public static readonly opera: string = "opera";
  public static readonly edge: string = "edge";
  public static readonly safari: string = "safari";
  public static readonly explorer: string = "explorer";

  public static device: string = Platform.mobile;
  public static os: string = Platform.android;
  public static browser: string = Platform.chrome;

  public static initialize(): void {
    Platform.setDevice();
    Platform.setOs();
    Platform.setBrowser();

    if (Platform.device) document.body.classList.add(Platform.device);
    if (Platform.os) document.body.classList.add(Platform.os);
    if (Platform.browser) document.body.classList.add(Platform.browser);
  }

  public static compareDevice(device: string): boolean {
    return Platform.device === device;
  }

  public static compareOs(os: string): boolean {
    return Platform.os === os;
  }

  public static compareBrowser(browser: string): boolean {
    return Platform.browser === browser;
  }

  public static isDesktop(): boolean {
    return Platform.compareDevice(Platform.desktop);
  }

  public static isTablet(): boolean {
    return Platform.compareDevice(Platform.tablet);
  }

  public static isMobile(): boolean {
    return Platform.compareDevice(Platform.mobile);
  }

  public static detectDesktop(): boolean {
    return !Platform.detectMobile() && !Platform.detectTablet();
  }

  public static detectTablet(): boolean {
    return /tablet|ipad/i.test(navigator.userAgent);
  }

  public static detectMobile(): boolean {
    return /mobile|iphone|ipod|android|windows *phone/i.test(navigator.userAgent);
  }

  public static detectAndroid(): boolean {
    return /android/i.test(navigator.userAgent);
  }

  public static detectIos(): boolean {
    return /ipad|iphone|ipod/i.test(navigator.userAgent);
  }

  public static detectLinux(): boolean {
    return /linux/i.test(navigator.userAgent);
  }

  public static detectOsx(): boolean {
    return /macintosh|os *x/i.test(navigator.userAgent);
  }

  public static detectWindows(): boolean {
    return /windows|win64|win32/i.test(navigator.userAgent);
  }

  public static detectChrome(): boolean {
    return /chrome/i.test(navigator.userAgent)
      && !Platform.detectOpera() && !Platform.detectEdge();
  }

  public static detectFirefox(): boolean {
    return /firefox/i.test(navigator.userAgent);
  }

  public static detectOpera(): boolean {
    return /opr/i.test(navigator.userAgent);
  }

  public static detectEdge(): boolean {
    return /edge/i.test(navigator.userAgent);
  }

  public static detectSafari(): boolean {
    return /safari/i.test(navigator.userAgent)
      && !Platform.detectChrome() && !Platform.detectOpera() && !Platform.detectEdge();
  }

  public static detectExplorer(): boolean {
    return /msie|trident/i.test(navigator.userAgent);
  }

  public static setDevice(): void {
    switch(true) {
      case Platform.detectTablet():
        Platform.device = Platform.tablet;
        break;
      case Platform.detectMobile():
        Platform.device = Platform.mobile;
        break;
      case Platform.detectDesktop():
        Platform.device = Platform.desktop;
        break;
      default:
        Platform.device = "";
    }
  }

  public static setOs(): void {
    switch(true) {
      case Platform.detectAndroid():
        Platform.os = Platform.android;
        break;
      case Platform.detectIos():
        Platform.os = Platform.ios;
        break;
      case Platform.detectLinux():
        Platform.os = Platform.linux;
        break;
      case Platform.detectOsx():
        Platform.os = Platform.osx;
        break;
      case Platform.detectWindows():
        Platform.os = Platform.windows;
        break;
      default:
        Platform.os = "";
    }
  }

  public static setBrowser(): void {
    switch(true) {
      case Platform.detectChrome():
        Platform.browser = Platform.chrome;
        break;
      case Platform.detectFirefox():
        Platform.browser = Platform.firefox;
        break;
      case Platform.detectOpera():
        Platform.browser = Platform.opera;
        break;
      case Platform.detectEdge():
        Platform.browser = Platform.edge;
        break;
      case Platform.detectSafari():
        Platform.browser = Platform.safari;
        break;
      case Platform.detectExplorer():
        Platform.browser = Platform.explorer;
        break;
      default:
        Platform.browser = "";
    }
  }
}
