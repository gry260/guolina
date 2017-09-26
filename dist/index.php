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
<div class="modal fade" id="confirm-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to do this?</p>
      </div>
      <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <container>
  </container>
</body>
</html>