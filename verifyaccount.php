<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="assets/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Verify Account</title>
    <style>
        .error {
            color: #ff0000;
        }
        a {
            text-decoration: none;
        }
    </style>
  </head>
  <body ng-app="myApp" class="d-flex align-items-center bg-white border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

          <!-- Image -->
          <div class="text-center">
            <img src="assets/img/illustrations/happiness.svg" alt="..." class="img-fluid">
          </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
              Verify Account
          </h1>

          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
            Free access to our dashboard.
          </p>

            <?php
                if(isset($_GET['error'])) {
                    switch($_GET['error']) {
                        case 'incorrectcode':
                            echo '<span class="text-danger small">Invalid Code</span>';
                            break;
                    }
                }
            ?>

          <!-- Form -->
          <form name="verifyAccount" method="post" action="verifyaccount-conf.php" ng-controller="verifyAccountCtrl">

            <!-- Code -->
            <div class="form-group">

              <!-- Label -->
              <label>Enter Code</label>

              <!-- Input -->
              <input name="code" type="text" data-mask="000000" class="form-control" placeholder="000000" ng-model="code" required>
            </div>

            <!-- Submit -->
            <button type="submit" name="verifyAccount" class="btn btn-lg btn-block btn-primary mb-3" ng-disabled="verifyAccount.code.$error.required">
                Verify
            </button>

            <!-- Link -->
            <div class="text-center">
              <small class="text-muted text-center">
                Didn't receive code? <a href="#" name="resend">Resend</a>.
              </small>
            </div>

          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="assets/libs/chart.js/Chart.extension.min.js"></script>
    <script src="assets/libs/highlight/highlight.pack.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script>
      var app = angular.module("myApp", []);
      app.controller("verifyAccountCtrl", function($scope) {

      });
    </script>
  </body>
</html>
