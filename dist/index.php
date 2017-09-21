<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/vendor.css">
  <script>
    var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
    {};
    var themeName = themeSettings.themeName || '';
    if (themeName) {
      document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
    }
    else {
      document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
    }
  </script>
  <script>document.write('<base href="' + document.location + '" />');</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 1. ライブラリの読み込み -->
  <!-- ECMAScript 5への対応 -->
  <script src="https://unpkg.com/core-js/client/shim.min.js"></script>
  <script src="https://unpkg.com/zone.js@0.8.4?main=browser"></script>
  <script src="https://unpkg.com/systemjs@0.19.39/dist/system.src.js"></script>
  <!-- 2. SystemJSの設定 -->
  <script src="systemjs.config.js"></script>
  <script>
    System.import('main.js').catch(function (err) {
      console.error(err);
    });
  </script>
</head>
<body>

<div class="main-wrapper">
  <div class="app" id="app">
    <!--
    <nav class="nav nav-tabs">
      <a class="nav-item nav-link">adf</a>
      <a class="nav-item nav-link">adf</a>
      <a class="nav-item nav-link">adf</a>
    </nav>
    -->
    <header class="header">
      <login></login>
      <register></register>
    </header>
    <aside class="sidebar">
      <div class="sidebar-container">
        <div class="sidebar-header">
          <div class="brand">
            <div class="logo"><span class="l l1"></span> <span class="l l2"></span> <span
                class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span></div>
            Modular Admin
          </div>
        </div>
        <nav class="menu">
          <ul class="nav metismenu" id="sidebar-menu">
            <li class="active"><a href="index.html">
                <i class="fa fa-home"></i> Dashboard
              </a></li>
            <li><a href="">
                <i class="fa fa-th-large"></i> Items Manager
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="items-list.html">
                    Items List
                  </a></li>
                <li><a href="item-editor.html">
                    Item Editor
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-bar-chart"></i> Charts
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="charts-flot.html">
                    Flot Charts
                  </a></li>
                <li><a href="charts-morris.html">
                    Morris Charts
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-table"></i> Tables
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="static-tables.html">
                    Static Tables
                  </a></li>
                <li><a href="responsive-tables.html">
                    Responsive Tables
                  </a></li>
              </ul>
            </li>
            <li><a href="forms.html">
                <i class="fa fa-pencil-square-o"></i> Forms
              </a></li>
            <li><a href="">
                <i class="fa fa-desktop"></i> UI Elements
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="buttons.html">
                    Buttons
                  </a></li>
                <li><a href="cards.html">
                    Cards
                  </a></li>
                <li><a href="typography.html">
                    Typography
                  </a></li>
                <li><a href="icons.html">
                    Icons
                  </a></li>
                <li><a href="grid.html">
                    Grid
                  </a></li>
              </ul>
            </li>
            <li><a href="">
                <i class="fa fa-file-text-o"></i> Pages
                <i class="fa arrow"></i>
              </a>
              <ul>
                <li><a href="login.html">
                    Login
                  </a></li>
                <li><a href="signup.html">
                    Sign Up
                  </a></li>
                <li><a href="reset.html">
                    Reset
                  </a></li>
                <li><a href="error-404.html">
                    Error 404 App
                  </a></li>
                <li><a href="error-404-alt.html">
                    Error 404 Global
                  </a></li>
                <li><a href="error-500.html">
                    Error 500 App
                  </a></li>
                <li><a href="error-500-alt.html">
                    Error 500 Global
                  </a></li>
              </ul>
            </li>
            <li><a href="https://github.com/modularcode/modular-admin-html">
                <i class="fa fa-github-alt"></i> Theme Docs
              </a></li>
          </ul>
        </nav>
      </div>
      <footer class="sidebar-footer">
        <ul class="nav metismenu" id="customize-menu">
          <li>
            <ul>
              <li class="customize">
                <div class="customize-item">
                  <div class="row customize-header">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4"><label class="title">fixed</label></div>
                    <div class="col-xs-4"><label class="title">static</label></div>
                  </div>
                  <div class="row hidden-md-down">
                    <div class="col-xs-4"><label class="title">Sidebar:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="sidebarPosition"
                               value="sidebar-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="sidebarPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4"><label class="title">Header:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="headerPosition"
                               value="header-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="headerPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-4"><label class="title">Footer:</label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="footerPosition"
                               value="footer-fixed">
                        <span></span>
                      </label></div>
                    <div class="col-xs-4"><label>
                        <input class="radio" type="radio" name="footerPosition" value="">
                        <span></span>
                      </label></div>
                  </div>
                </div>
                <div class="customize-item">
                  <ul class="customize-colors">
                    <li><span class="color-item color-red" data-theme="red"></span></li>
                    <li><span class="color-item color-orange" data-theme="orange"></span></li>
                    <li><span class="color-item color-green active" data-theme=""></span></li>
                    <li><span class="color-item color-seagreen" data-theme="seagreen"></span></li>
                    <li><span class="color-item color-blue" data-theme="blue"></span></li>
                    <li><span class="color-item color-purple" data-theme="purple"></span></li>
                  </ul>
                </div>
              </li>
            </ul>
            <a href="">
              <i class="fa fa-cog"></i> Customize
            </a></li>
        </ul>
      </footer>
    </aside>
    <article class="content dashboard-page">
      <div class="col-2" style="position: absolute;">
        <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg" style="height: auto;">
          <div class="card-header">
            <div class="header-block">
              <h3> Sign Up </h3>
            </div>
          </div>
          <div class="card-block">
            <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">User Name: </label>
              <input type="text" class="form-control boxed form-control-sm"/>
            </div>
            <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">Password: </label>
              <input type="password" class="form-control boxed form-control-sm"/>
            </div>
            <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">Password: </label>
              <input type="password" class="form-control boxed form-control-sm"/>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success btn-sm" />
            </div>
          </div>
        </div>
      </div>
    </article>
    <!-- /.modal -->
  </div>
</div>

</body>
<script src="js/vendor.js"></script>
<script src="js/app.js"></script>
</html>