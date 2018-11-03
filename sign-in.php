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
    <title>Dashkit</title>
    <style>
        .error {
            color: #ff0000;
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
            Sign in
          </h1>

          <!-- Subheading -->
          <p class="text-muted text-center mb-5">
            Free access to our dashboard.
          </p>

            <?php
                if(isset($_GET['error'])) {
                    switch($_GET['error']) {
                        case 'usernameandpasswordnotmatch':
                            echo '<span class="text-danger small">Username and password do not match.</span>';
                            break;
                        case 'nomemberinformation':
                            echo '<span class="text-danger small">No member information.</span>';
                            break;
                    }
                }
            ?>

          <!-- Form -->
          <form name="signIn" action="login-conf.php" method="post" ng-controller="signinCtrl">

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <label>Email Address</label>

              <!-- Input -->
              <input name="email" type="email" class="form-control{{signIn.email.$error.email ? ' is-invalid' : ''}}" placeholder="name@address.com" ng-model="email" required>
              <div ng-show="signIn.email.$error.email" class="invalid-feedback">
                  Please enter valid email address.
              </div>
            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">

                  <!-- Label -->
                  <label>Password</label>

                </div>
                <div class="col-auto">

                  <!-- Help text -->
                  <a href="password-reset-illustration.html" class="form-text small text-muted">
                    Forgot password?
                  </a>

                </div>
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input name="password" type="password" class="form-control form-control-appended" placeholder="Enter your password" ng-model="password" required>

                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>

              </div>
            </div>

            <!-- Submit -->
            <button type="submit" name="signin" class="btn btn-lg btn-block btn-primary mb-3" ng-disabled="signIn.email.$error.required || signIn.email.$error.email || signIn.password.$error.required">
              Sign in
            </button>

            <!-- Link -->
            <div class="text-center">
              <small class="text-muted text-center">
                Don't have an account yet? <a href="sign-up-illustration.php">Sign up</a>.
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
      app.controller("signinCtrl", function($scope) {

      });
    </script>
  </body>
</html>
