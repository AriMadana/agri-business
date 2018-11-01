<?php
  include 'includes/init.php';
  if($_SESSION['user_id'] == null) {
    header('Location: sign-in.php');
  } else {
    $user_infos = $mm_admin_class -> user_info_from_userid($_SESSION['user_id']);
    $image_prof = $user_infos['admin_pf'];
?>
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
    <script src="assets/js/rabbit.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
    <title>Dashkit</title>
  </head>
  <body ng-app="myApp" ng-controller="myAppCtrl">
    <div class="modal fade" id="newStuForm" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div id="addStuAlert" style="top:-90px;z-index:1200;position:absolute;width:100%;" class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p style="margin-bottom:0px;">Aww yeah, you successfully</p>
          </div>
          <div class="modal-card card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Close -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><span class="fe fe-x"></span></span>
                  </button>

                </div>
                <div class="col">

                  <!-- Title -->
                  <h4 class="card-header-title" id="exampleModalCenterTitle" style="text-align:center;">
                    Student Registeration
                  </h4>

                </div>
                <div class="col-auto">

                  <!-- Close -->
                  <button type="button" class="close" ng-click="addStudent()">
                    <span aria-hidden="true"><span class="fe fe-user-plus"></span></span>
                  </button>

                </div>
              </div> <!-- / .row -->
            </div>
            <div class="card-body">
              <div style="text-align: center;display:none"><span id="selectedAcdmYearsText">{{selectedAcdmYears.acdm_years}}</span> <span id="selectedAcdmGradeText">{{selectedAcdmGrade.acdm_grade}}</span></div>
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>
                      Academic Years
                    </label>
                    <select id="selectedAcdmYearsAdd" class="form-control" data-toggle="select">

                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>
                      Grades
                    </label>
                    <select id="selectedAcdmGradeAdd" class="form-control" data-toggle="select">
                      <option>Grade-10</option>
                      <option>Grade-09</option>
                      <option>Grade-08</option>
                      <option>Grade-07</option>
                      <option>Grade-06</option>
                      <option>Grade-05</option>
                      <option>Grade-04</option>
                      <option>Grade-03</option>
                      <option>Grade-02</option>
                      <option>Grade-01</option>
                    </select>
                  </div>
                </div>
              </div>
              <form name="newStu_Form" class="mb-4">

              <!-- Project name -->
              <div class="form-group">
                <label>
                  Student Name
                </label>
                <input name="newstu_name" ng-model="newstu_name" type="text" class="form-control{{newStuNameChk && newStu_Form.newstu_name.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="newStuNameChk" class="invalid-feedback">
                    require this field
                </div>
              </div>




              <!-- Project tags -->
              <div class="form-group">
                <label>
                  Father Name
                </label>
                <input name="newstu_father" ng-model="newstu_father" type="text" class="form-control{{newStuFatherChk && newStu_Form.newstu_father.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="newStuFatherChk" class="invalid-feedback">
                    require this field
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Start date -->
                  <div class="form-group">
                    <label>
                      Birth Date
                    </label>
                    <input placeholder="YYYY-MM-DD" name="newstu_birth" ng-model="newstu_birth" type="text" class="form-control{{newStuBirthChk && newStu_Form.newstu_birth.$invalid ? ' is-invalid' : ''}}" data-mask="0000-00-00" required>
                    <div ng-show="newStuBirthChk" class="invalid-feedback">
                        require this field
                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Start date -->
                  <div class="form-group">
                    <label>
                      Phone
                    </label>
                    <input name="newstu_phone" ng-model="newstu_phone" type="text" class="form-control{{newStuPhoneChk && newStu_Form.newstu_phone.$invalid ? ' is-invalid' : ''}}" data-mask="00-0000000000000000" required>
                    <div ng-show="newStuPhoneChk" class="invalid-feedback">
                        require this field
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label>
                  Address
                </label>
                <input name="newstu_address" ng-model="newstu_address" type="text" class="form-control{{newStuAddressChk && newStu_Form.newstu_address.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="newStuAddressChk" class="invalid-feedback">
                    require this field
                </div>
              </div>
            </form>
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">

              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editStuForm" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div id="editStuAlert" style="top:-90px;z-index:1200;position:absolute;width:100%;" class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success!</h4>
            <p style="margin-bottom:0px;">one student updated successfully</p>
          </div>
          <div id="editStuAlertNC" style="top:-90px;z-index:1200;position:absolute;width:100%;" class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Warning!</h4>
            <p style="margin-bottom:0px;">There is nothing to change!</p>
          </div>
          <div class="modal-card card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-auto">

                  <!-- Close -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><span class="fe fe-x"></span></span>
                  </button>

                </div>
                <div class="col">

                  <!-- Title -->
                  <h4 class="card-header-title" id="exampleModalCenterTitle" style="text-align:center;">
                    Student Registeration
                  </h4>

                </div>
                <div class="col-auto">

                  <!-- Close -->
                  <button type="button" class="close" ng-click="editStudentFinal()">
                    <span aria-hidden="true"><span class="fe fe-user-check"></span></span>
                  </button>

                </div>
              </div> <!-- / .row -->
            </div>
            <div class="card-body">
              <div style="text-align: center;display:none"><span id="selectedAcdmYearsText">{{selectedAcdmYears.acdm_years}}</span> <span id="selectedAcdmGradeText">{{selectedAcdmGrade.acdm_grade}}</span></div>
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>
                      Academic Years
                    </label>
                    <select id="selectedAcdmYearsEdit" class="form-control" data-toggle="select">

                    </select>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>
                      Grade
                    </label>
                    <select id="selectedAcdmGradeEdit" class="form-control" data-toggle="select">
                      <option>Grade-10</option>
                      <option>Grade-09</option>
                      <option>Grade-08</option>
                      <option>Grade-07</option>
                      <option>Grade-06</option>
                      <option>Grade-05</option>
                      <option>Grade-04</option>
                      <option>Grade-03</option>
                      <option>Grade-02</option>
                      <option>Grade-01</option>
                    </select>
                  </div>
                </div>
              </div>
              <form name="editStu_Form" class="mb-4">

              <!-- Project name -->
              <div class="form-group">
                <label>
                  Student Name
                </label>
                <input name="editstu_name" ng-model="editstu_name" type="text" class="form-control{{editStuNameChk && editStu_Form.editstu_name.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="editStuNameChk" class="invalid-feedback">
                    require this field
                </div>
              </div>




              <!-- Project tags -->
              <div class="form-group">
                <label>
                  Father Name
                </label>
                <input name="editstu_father" ng-model="editstu_father" type="text" class="form-control{{editStuFatherChk && editStu_Form.editstu_father.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="editStuFatherChk" class="invalid-feedback">
                    require this field
                </div>
              </div>

              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Start date -->
                  <div class="form-group">
                    <label>
                      Birth Date
                    </label>
                    <input placeholder="YYYY-MM-DD" name="editstu_birth" ng-model="editstu_birth" type="text" class="form-control{{editStuBirthChk && editStu_Form.editstu_birth.$invalid ? ' is-invalid' : ''}}" data-mask="0000-00-00" required>
                    <div ng-show="editStuBirthChk" class="invalid-feedback">
                        require this field
                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Start date -->
                  <div class="form-group">
                    <label>
                      Phone
                    </label>
                    <input name="editstu_phone" ng-model="editstu_phone" type="text" class="form-control{{editStuPhoneChk && editStu_Form.editstu_phone.$invalid ? ' is-invalid' : ''}}" data-mask="00-0000000000000000" required>
                    <div ng-show="editStuPhoneChk" class="invalid-feedback">
                        require this field
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label>
                  Address
                </label>
                <input name="editstu_address" ng-model="editstu_address" type="text" class="form-control{{editStuAddressChk && editStu_Form.editstu_address.$invalid ? ' is-invalid' : ''}}" required>
                <div ng-show="editStuAddressChk" class="invalid-feedback">
                    require this field
                </div>
              </div>
            </form>
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">

              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- TOPNAV
    ================================================== -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="index.html">
          <img src="assets/img/logo.svg" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->
        <form class="form-inline mr-4 d-none d-lg-flex">
          <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

            <!-- Input -->
            <input type="search" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fe fe-search"></i>
              </div>
            </div>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-card">
              <div class="card-body">

                <!-- List group -->
                <div class="list-group list-group-flush list my--3">
                  <a href="team-overview.html" class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Airbnb
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a href="team-overview.html" class="list-group-item px-0">
                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Medium Corporation
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->
                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Homepage Redesign
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Travels & Time
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="project-overview.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-4by3">
                          <img src="assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Safari Exploration
                        </h4>

                        <!-- Time -->
                        <p class="small text-muted mb-0">
                          <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="profile-posts.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Dianna Smiley
                        </h4>

                        <!-- Status -->
                        <p class="text-body small mb-0">
                          <span class="text-success">●</span> Online
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a href="profile-posts.html" class="list-group-item px-0">

                    <div class="row align-items-center">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar">
                          <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Title -->
                        <h4 class="text-body mb-1 name">
                          Ab Hadley
                        </h4>

                        <!-- Status -->
                        <p class="text-body small mb-0">
                          <span class="text-danger">●</span> Offline
                        </p>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                </div>

              </div>
            </div> <!-- / .dropdown-menu -->

          </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

          <!-- Dropdown -->
          <div class="dropdown mr-4 d-none d-lg-flex">

            <!-- Toggle -->
            <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon active">
                <i class="fe fe-bell"></i>
              </span>
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Title -->
                    <h5 class="card-header-title">
                      Notifications
                    </h5>

                  </div>
                  <div class="col-auto">

                    <!-- Link -->
                    <a href="#!" class="small">
                      View all
                    </a>

                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .card-header -->
              <div class="card-body">

                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Adolfo Hess</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Glen Rouse</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                  <a class="list-group-item px-0" href="#!">

                    <div class="row">
                      <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm">
                          <img src="assets/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>

                      </div>
                      <div class="col ml--2">

                        <!-- Content -->
                        <div class="small text-muted">
                          <strong class="text-body">Grace Gross</strong> subscribed to you.
                        </div>

                      </div>
                      <div class="col-auto">

                        <small class="text-muted">
                          2m
                        </small>

                      </div>
                    </div> <!-- / .row -->

                  </a>
                </div>

              </div>
            </div> <!-- / .dropdown-menu -->

          </div>

          <!-- Dropdown -->
          <div class="dropdown">

            <!-- Toggle -->
            <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="ftp_folder/profile/<?php echo $image_prof; ?>" alt="..." class="avatar-img rounded-circle">
            </a>

            <!-- Menu -->
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile-posts.html" class="dropdown-item">Profile</a>
              <a href="settings.html" class="dropdown-item">Settings</a>
              <hr class="dropdown-divider">
              <a href="sign-in.html" class="dropdown-item">Logout</a>
            </div>

          </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

          <!-- Form -->
          <form class="mt-4 mb-3 d-md-none">
            <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
          </form>

          <!-- Navigation -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                အေမာငနတဆ
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#!" id="topnavPages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavPages">
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavProfile">
                    <a class="dropdown-item" href="profile-posts.html">
                      Posts
                    </a>
                    <a class="dropdown-item" href="profile-groups.html">
                      Groups
                    </a>
                    <a class="dropdown-item" href="profile-projects.html">
                      Projects
                    </a>
                    <a class="dropdown-item" href="profile-files.html">
                      Files
                    </a>
                    <a class="dropdown-item" href="profile-subscribers.html">
                      Subscribers
                    </a>
                  </div>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavProject" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Project
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavProject">
                    <a class="dropdown-item" href="project-overview.html">
                      Overview
                    </a>
                    <a class="dropdown-item" href="project-files.html">
                      Files
                    </a>
                    <a class="dropdown-item" href="project-reports.html">
                      Reports
                    </a>
                    <a class="dropdown-item" href="project-new.html">
                      New project
                    </a>
                  </div>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavTeam" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Team
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavTeam">
                    <a class="dropdown-item" href="team-overview.html">
                      Overview
                    </a>
                    <a class="dropdown-item" href="team-project.html">
                      Project
                    </a>
                    <a class="dropdown-item" href="team-members.html">
                      Members
                    </a>
                    <a class="dropdown-item" href="team-new.html">
                      New team
                    </a>
                  </div>
                </li>
                <li>
                  <a class="dropdown-item" href="orders.html">
                    Orders
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="feed.html">
                    Feed
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="settings.html">
                    Settings
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="invoice.html">
                    Invoice
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="pricing.html">
                    Pricing
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#!" id="topnavAuth" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Auth
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavAuth">
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavSignIn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign in
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavSignIn">
                    <a class="dropdown-item" href="sign-in-cover.html">
                      Cover
                    </a>
                    <a class="dropdown-item" href="sign-in-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="sign-in-basics.html">
                      Basic
                    </a>
                  </div>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavSignUp" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign up
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavSignUp">
                    <a class="dropdown-item" href="sign-up-cover.html">
                      Cover
                    </a>
                    <a class="dropdown-item" href="sign-up-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="sign-up.html">
                      Basic
                    </a>
                  </div>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavPassword" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Password reset
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavPassword">
                    <a class="dropdown-item" href="password-reset-cover.html">
                      Cover
                    </a>
                    <a class="dropdown-item" href="password-reset-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="password-reset.html">
                      Basic
                    </a>
                  </div>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavError" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Error
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavError">
                    <a class="dropdown-item" href="error-illustration.html">
                      Illustration
                    </a>
                    <a class="dropdown-item" href="error.html">
                      Basic
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#!" id="topnavLayouts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Layouts
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavLayouts">
                <li>
                  <a class="dropdown-item" href="index.html">
                    Sidenav
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="dashboard-side-topnav.html">
                    Side + top nav
                  </a>
                </li>
                <li>
                  <a class="dropdown-item  active " href="dashboard-topnav.html">
                    Topnav
                  </a>
                </li>
                <li class="dropright">
                  <a class="dropdown-item dropdown-toggle" href="#!" id="topnavDashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Without hero chart
                  </a>
                  <div class="dropdown-menu" aria-labelledby="topnavDashboard">
                    <a class="dropdown-item" href="dashboard-no-hero.html">
                      Sidenav
                    </a>
                    <a class="dropdown-item" href="dashboard-side-topnav-no-hero.html">
                      Side + topnav
                    </a>
                    <a class="dropdown-item " href="dashboard-topnav-no-hero.html">
                      Topnav
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#!" id="topnavDocumentation" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Docs
              </a>
              <ul class="dropdown-menu" aria-labelledby="topnavDocumentation">
                <li>
                  <a class="dropdown-item" href="getting-started.html">
                    Getting started
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="components.html">
                    Components
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="changelog.html">
                    Changelog
                  </a>
                </li>
              </ul>
            </li>
          </ul>

        </div>

      </div> <!-- / .container -->
    </nav>

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">
      <!-- CARDS -->
      <div class="container-fluid" style="padding-bottom: 10px;">
        <div class="header">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      Current Page
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Student Registeration
                    </h1>

                  </div>
                  <div class="col-auto">

                  </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                      <li class="nav-item">
                        <a href="#!" class="nav-link active">
                          Students <span class="badge badge-pill badge-soft-secondary">823</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Classes <span class="badge badge-pill badge-soft-secondary">24</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Subjects <span class="badge badge-pill badge-soft-secondary">3</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Other <span class="badge badge-pill badge-soft-secondary">71</span>
                        </a>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>

            <div id="noStuInform" style="display:none;" class="col-12">

              <!-- Card -->
              <div class="card card-inactive">
                <div class="card-body text-center">

                  <!-- Image -->
                  <img src="assets/img/illustrations/scale.svg" alt="..." class="img-fluid" style="max-width: 182px;">

                  <!-- Title -->
                  <h1>
                    No students yet.
                  </h1>

                  <!-- Subtitle -->
                  <p class="text-muted">
                    Create a report to find our more about this project.
                  </p>

                  <!-- Button -->
                  <a ng-click="addNewStu()" href="#!" class="btn btn-primary">
                    New Student
                  </a>

                </div>
              </div>

            </div>



        <div id="stuRegTableCard" class="card" style="margin-bottom: 10px;display: none;" data-toggle="lists" data-lists-values="[&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]">
          <div class="card-header">

            <div class="row align-items-center" ng-controller="acdmListCtrl">
              <div class="col">
                <a ng-click="addNewStu()" href="#!" class="btn btn-primary">
                  New Student
                </a>
                <!-- Title -->
                <!-- <h4 class="card-header-title">
                  Student Infos
                </h4> -->

              </div>
              <div class="col-auto">
                <select id="selectedAcdmYears" class="form-control" data-toggle="select">

                </select>
              </div>
              <div class="col-auto">
                <select id="selectedAcdmGrade" class="form-control" data-toggle="select">

                </select>

              </div>
            </div> <!-- / .row -->
          </div>
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Search -->
                    <form class="row">
                      <div class="col-auto pr-0">
                        <span class="fe fe-search text-muted"></span>
                      </div>
                      <div class="col">
                          <input id="stuSearch" type="search" class="form-control form-control-flush" placeholder="Search" onkeyup="stuSearchFnc()">
                      </div>
                    </form>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->

                    <div class="dropdown">
                      <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Multiaction
                      </button>
                      <div class="dropdown-menu" aria-labelledby="bulkActionDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 29px, 0px);">
                        <!-- <a href="#!" class="dropdown-item" ng-click="editStudents()">
                          <span class="fe fe-edit-2"></span>&nbsp;&nbsp;Edit
                        </a> -->
                        <a href="#!" class="dropdown-item" ng-click="delStudents()">
                          <span class="fe fe-trash-2"></span>&nbsp;&nbsp;Delete
                        </a>
                      </div>
                    </div>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table id="stuTable" class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="checkAll">
                          <label class="custom-control-label" for="checkAll">
                            &nbsp;
                          </label>
                        </div>
                      </th>
                      <th>
                        <a href="#" class="text-muted">
                          Stu ID
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted">
                          Name
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted">
                          Birth
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted">
                          Father
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted">
                          Address
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="#" class="text-muted asc">
                          Phone
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr ng-repeat="x in students | orderBy : 'stu_name'">
                      <td>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="checkSingle custom-control-input check-box" value="{{x.acdm_id}}" name="ordersSelect" id="{{x.acdm_id}}" ng-model="selectedList[x.acdm_id]">
                          <label class="custom-control-label" for="{{x.acdm_id}}">
                            &nbsp;
                          </label>
                        </div>
                      </td>
                      <td class="orders-order">
                        #{{ $index + 1 }}
                      </td>
                      <td class="orders-product">
                        {{x.stu_name}}
                      </td>
                      <td class="orders-date">
                        <time datetime="2018-07-30">{{x.stu_birth}}</time>
                      </td>
                      <td class="orders-total">
                        {{x.stu_father}}
                      </td>
                      <td class="orders-status">
                        {{x.stu_address}}
                      </td>
                      <td class="orders-method">
                        {{x.stu_phone}}
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item" ng-click="editStudent(x.acdm_id)">
                              <span class="fe fe-edit-2"></span>&nbsp;&nbsp;Edit
                            </a>
                            <a href="#!" class="dropdown-item" ng-click="delStudent(x.acdm_id)">
                              <span class="fe fe-trash-2"></span>&nbsp;&nbsp;Delete
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
      </div> <!-- / .container -->

    </div> <!-- / .main-content -->

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
      var selectedGrade, selectedYears;
      var adding = false;
      $('#addStuAlert').fadeOut();
      $('#editStuAlert').fadeOut();
      $('#editStuAlertNC').fadeOut();
      $('#noStuInform').slideUp();
      $('#stuRegTableCard').slideUp();

      $('#stuRegTableCard').addClass('is-loading');

      var app = angular.module('myApp', ['ngAnimate']);
      app.controller('myAppCtrl', function($scope, $http) {
        $scope.addNewStu = function() {
          $('#newStuForm').modal('show');
        };
        var acdm_school, stuEditReqInfo, noStuChk;
        for (i = new Date().getFullYear(); i > 1900; i--)
        {
          j = i-1;
          $('#selectedAcdmYearsAdd').append($('<option />').val(j+'/'+i).html(j+'/'+i));
          $('#selectedAcdmYearsEdit').append($('<option />').val(j+'/'+i).html(j+'/'+i));
        }
        // i + '/' + i-1

        $scope.noStuHideCard = function(check) {
          if(check == 'shi') {
            noStuChk = 'shi';
            $('#noStuInform').slideUp();
            $('#stuRegTableCard').slideDown();
          } else if(check == 'mshi') {
            noStuChk = 'mshi';
            $('#stuRegTableCard').slideUp();
            $('#noStuInform').slideDown();
          }


        }

        $scope.initRef = function() {
          var selectAcdmValueY, selectAcdmValueG;

          console.log('initRef');
          $http.get("includes/http_req/options/acdm_years.php")
          .then(function (response) {
            $scope.acdms = response.data;
            console.log('acdms length: ' + $scope.acdms.length);
            console.log($scope.acdms);
            if($scope.acdms.length == 0) {
              $scope.noStuHideCard('mshi');
              return;
            } else {
              $scope.noStuHideCard('shi');

              var newOptions = '';
              for(var i = 0; i < $scope.acdms.length; i++) {
                var newOption = '<option value="' + $scope.acdms[i].acdm_years + '">' + $scope.acdms[i].acdm_years + '</option>';
                newOptions += newOption;
              }
              $('#selectedAcdmYears').html(newOptions);

              acdm_years_init = $scope.acdms[0].acdm_years;
              $('#selectedAcdmYearsText').text(acdm_years_init);
              var years = ({
                'acdm_years' : acdm_years_init
              });

              $http({
                method  : 'POST',
                url     : 'includes/http_req/options/acdm_grade.php',
                data    : years, //forms user object
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
              })
              .then(function(response) {
                $scope.acdmsGrade = response.data;
                $scope.selectedAcdmGrade = $scope.acdmsGrade[0];
                acdm_school = $scope.acdms[0].acdm_school;
                var newOptions = '';
                for(var i = 0; i < $scope.acdmsGrade.length; i++) {
                  var newOption = '<option value="' + $scope.acdmsGrade[i].acdm_grade + '">' + $scope.acdmsGrade[i].acdm_grade + '</option>';
                  newOptions += newOption;
                }
                $('#selectedAcdmGrade').html(newOptions);
                var stuReqInfo = ({
                  'acdm_years' : $scope.acdms[0].acdm_years,
                  'acdm_grade' : $scope.acdmsGrade[0].acdm_grade,
                  'acdm_school' : acdm_school
                });
                $http({
                  method  : 'POST',
                  url     : 'includes/http_req/tables/reg_stu.php',
                  data    : stuReqInfo, //forms user object
                  headers : {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                .then(function(response) {
                  $scope.students = response.data;
                  $('#stuRegTableCard').removeClass('is-loading');
                  // $scope.selectedAcdmYears = $scope.acdms[0];
                });
              });

              // $http.get("includes/http_req/tables/reg_stu.php")
              // .then(function (response) {
              //   $scope.students = response.data;
              //   console.log(response.status);
              // });
            }



          });
        }
        $scope.initRef();
        $scope.acdmYearsChange = function() {
           // changeCount++;
           //  this.message = "Change detected: " + changeCount;
        }

        $('#selectedAcdmYears').on('change', function() {
          $('#stuRegTableCard').addClass('is-loading');
          var optionSelected = $(this).find("option:selected");
          var textSelected   = optionSelected.text();
          selectedYears = textSelected;
          $('#selectedAcdmYearsText').text(textSelected);

          var years = ({
            'acdm_years' : textSelected
          });

          $http({
            method  : 'POST',
            url     : 'includes/http_req/options/acdm_grade.php',
            data    : years, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function(response) {
            console.log(response.data);
            $scope.acdmsGrade = response.data;
            $scope.selectedAcdmGrade = $scope.acdmsGrade[0];
            console.log($scope.acdmsGrade[0]);
            var newOptions = '';
            for(var i = 0; i < $scope.acdmsGrade.length; i++) {
              newOption = '<option>' + $scope.acdmsGrade[i].acdm_grade + '</option>';
              //var newOption = new Option($scope.acdmsGrade[i].acdm_grade, $scope.acdms[i].acdm_id, false, false);
              newOptions += newOption;
            }
            $('#selectedAcdmGrade').html(newOptions);
            if(adding) {
              $('#selectedAcdmGrade').val(selectAcdmValueG).trigger('change');
              adding = false;
              return;
            }
            var stuReqInfo = ({
              'acdm_years' : textSelected,
              'acdm_grade' : $scope.acdmsGrade[0].acdm_grade,
              'acdm_school' : acdm_school
            });
            $http({
              method  : 'POST',
              url     : 'includes/http_req/tables/reg_stu.php',
              data    : stuReqInfo, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function(response) {
              $scope.students = response.data;
              $('#stuRegTableCard').removeClass('is-loading');
            });
          });
          // var valueSelected  = optionSelected.val();
          // var textSelected   = optionSelected.text();
          // console.log(valueSelected + textSelected);
        });

        $('#selectedAcdmGrade').on('change', function() {
          $('#stuRegTableCard').addClass('is-loading');
          var optionSelected = $(this).find("option:selected");
          var textSelected   = optionSelected.text();
          selectedGrade = textSelected;
          $('#selectedAcdmGradeText').text(textSelected);
          // var valueSelected  = optionSelected.val();
          // var textSelected   = optionSelected.text();
          // console.log(valueSelected + textSelected);
          console.log('Grade Trigger');
          var stuReqInfo = ({
            'acdm_years' : $('#selectedAcdmYearsText').text(),
            'acdm_grade' : textSelected,
            'acdm_school' : acdm_school
          });
          $http({
            method  : 'POST',
            url     : 'includes/http_req/tables/reg_stu.php',
            data    : stuReqInfo, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function(response) {
            $scope.students = response.data;
            $('#stuRegTableCard').removeClass('is-loading');
          });
        });
        var acdmsEqual = false;

        $scope.addStudent = function () {
          var selectedAcdmGrade = $('#selectedAcdmGradeAdd').val();
          var selectedAcdmYears = $('#selectedAcdmYearsAdd').val();
          for(i = 0; i < $scope.acdms.length; i++) {
            if($scope.acdms[i].acdm_years == selectedAcdmYears) {
              acdmsEqual = true;
            };
          }
          if(!acdmsEqual) {
            var acdm = ({
              'acdm_years' : selectedAcdmYears
            });

          }

          // $('#mylist').select2({
          //     sortResults: function(data) {
          //         /* Sort data using lowercase comparison */
          //         return data.sort(function (a, b) {
          //             a = a.text.toLowerCase();
          //             b = b.text.toLowerCase();
          //             if (a > b) {
          //                 return 1;
          //             } else if (a < b) {
          //                 return -1;
          //             }
          //             return 0;
          //         });
          //     }
          // });

          if (!$scope.newstu_name) {
            $scope.newStuNameChk = true;
          }
          if (!$scope.newstu_father) {
            $scope.newStuFatherChk = true;
          }
          if (!$scope.newstu_birth) {
            $scope.newStuBirthChk = true;
          }
          if (!$scope.newstu_address) {
            $scope.newStuAddressChk = true;
          }
          if (!$scope.newstu_phone) {
            $scope.newStuPhoneChk = true;
          }
          if (!$scope.newstu_name || !$scope.newstu_father || !$scope.newstu_birth || !$scope.newstu_address || !$scope.newstu_phone) {
            return;
          }
          var student = ({
            'stu_name' : $scope.newstu_name,
            'stu_father' : $scope.newstu_father,
            'stu_birth' : $scope.newstu_birth,
            'stu_address' : $scope.newstu_address,
            'stu_phone' : $scope.newstu_phone,
            'acdm_years' : selectedAcdmYears,
            'acdm_grade' : selectedAcdmGrade,
            'acdm_school' : acdm_school
          });
          // console.log(student["stu_name"]);
          // console.log($scope.newstu_name);
          $http({
            method  : 'POST',
            url     : 'includes/http_req/forms/add_stu.php',
            data    : student, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function(response) {
            $('#stuRegTableCard').removeClass('is-loading');
            if(response.status >= 200 && response.status <= 250) {
              selectAcdmValueY = response.data.acdm_years;
              selectAcdmValueG = response.data.acdm_grade;
              if(noStuChk == 'mshi') {
                $scope.initRef();
              }
              $('#addStuAlert').fadeIn();
              setInterval(function() {
                $('#addStuAlert').fadeOut();
              }, 3000);
              console.log("Above IF");
              if($('#selectedAcdmYearsText').text() == $('#selectedAcdmYearsAdd').val() &&
                 $('#selectedAcdmGradeText').text() == $('#selectedAcdmGradeAdd').val()) {
                   $scope.students.push({stu_id:response.data.stu_id, acdm_id:response.data.acdm_id, stu_name:$scope.newstu_name, stu_father:$scope.newstu_father, stu_birth:$scope.newstu_birth, stu_phone:$scope.newstu_phone, stu_address:$scope.newstu_address});
              };

              if($('#selectedAcdmYearsText').text() != $('#selectedAcdmYearsAdd').val() || $('#selectedAcdmGradeText').text() != $('#selectedAcdmGradeAdd').val()) {
                adding = true;
                $http.get("includes/http_req/options/acdm_years.php")
                .then(function (response) {
                  $scope.acdms = response.data;
                  var newOptions = '';
                  for(var i = 0; i < $scope.acdms.length; i++) {
                    var newOption = '<option value="' + $scope.acdms[i].acdm_years + '">' + $scope.acdms[i].acdm_years + '</option>';
                    newOptions += newOption;
                  }
                  $('#selectedAcdmYears').html(newOptions);
                  $('#selectedAcdmYears').val(selectAcdmValueY).trigger('change');
                });
              };
              // if($('#selectedAcdmGradeText').text() != $('#selectedAcdmGradeAdd').val()) {
              //
              //   $('#selectedAcdmGrade').val(selectAcdmValueG).trigger('change');
              //   // $http.get("includes/http_req/options/acdm_grade.php")
              //   // .then(function (response) {
              //   //   $scope.acdmsGrade = response.data;
              //   //   var newOptions = '';
              //   //   for(var i = 0; i < $scope.acdmsGrade.length; i++) {
              //   //     var newOption = '<option value="' + $scope.acdmsGrade[i].acdm_grade + '">' + $scope.acdmsGrade[i].acdm_grade + '</option>';
              //   //     newOptions += newOption;
              //   //   }
              //   //   $('#selectedAcdmGrade').html(newOptions);
              //   //   $('#selectedAcdmGrade').val(selectAcdmValueG).trigger('change');
              //   // });
              // };
              $scope.newstu_name = '';
              $scope.newstu_father = '';
              $scope.newstu_birth = '';
              $scope.newstu_phone = '';
              $scope.newstu_address = '';

              $scope.newStuNameChk = false;
              $scope.newStuFatherChk = false;
              $scope.newStuBirthChk = false;
              $scope.newStuPhoneChk = false;
              $scope.newStuAddressChk = false;

            }
            // console.log(response.data + response.status + response.statusText);
          });
        };

        $scope.noStudentChk = function() {
          if($scope.students.length == 0) {
            $scope.initRef();
          }
        }

        $scope.editStudentFinal = function () {
          var selectedAcdmGrade = $('#selectedAcdmGradeEdit').val();
          var selectedAcdmYears = $('#selectedAcdmYearsEdit').val();
          var acdmsEqualYears = false;
          var acdmsEqualGrade = false;
          for(i = 0; i < $scope.acdms.length; i++) {
            if($scope.acdms[i].acdm_years == selectedAcdmYears) {
              acdmsEqualYears = true;
            };
          }
          if(!acdmsEqualYears) {
            var newOption = '<option>' + selectedAcdmYears + '</option>';
            $('#selectedAcdmYears').append(newOption);
          }
          for(i = 0; i < $scope.acdmsGrade.length; i++) {
            if($scope.acdmsGrade[i].acdm_grade == selectedAcdmGrade) {
              acdmsEqualGrade = true;
            };
          }
          if(!acdmsEqualGrade) {
            var newOption = '<option>' + selectedAcdmGrade + '</option>';
            $('#selectedAcdmYears').append(newOption);
          }

          if (!$scope.editstu_name) {
            $scope.editStuNameChk = true;
          }
          if (!$scope.editstu_father) {
            $scope.editStuFatherChk = true;
          }
          if (!$scope.editstu_birth) {
            $scope.editStuBirthChk = true;
          }
          if (!$scope.editstu_address) {
            $scope.editStuAddressChk = true;
          }
          if (!$scope.editstu_phone) {
            $scope.editStuPhoneChk = true;
          }
          if (!$scope.editstu_name || !$scope.editstu_father || !$scope.editstu_birth || !$scope.editstu_address || !$scope.editstu_phone) {
            return;
          }

          if($scope.editstu_name == editstu_name && $scope.editstu_father == editstu_father &&
            $scope.editstu_birth == editstu_birth && $scope.editstu_address == editstu_address &&
            $scope.editstu_phone == editstu_phone && $('#selectedAcdmYearsEdit').val() == editstu_years &&
            $('#selectedAcdmGradeEdit').val() == editstu_grade) {
            $('#editStuAlertNC').fadeIn();
            setInterval(function() {
              $('#editStuAlertNC').fadeOut();
            }, 3000);
          } else {
            var studentEdit = ({
              'stu_name' : $scope.editstu_name,
              'stu_father' : $scope.editstu_father,
              'stu_birth' : $scope.editstu_birth,
              'stu_address' : $scope.editstu_address,
              'stu_phone' : $scope.editstu_phone,
              'acdm_years' : $('#selectedAcdmYearsEdit').val(),
              'acdm_grade' : $('#selectedAcdmGradeEdit').val(),
              'acdm_school' : acdm_school,
              'acdm_id' : stuEditReqInfo
            });
            $http({
              method  : 'POST',
              url     : 'includes/http_req/forms/upd_stu.php',
              data    : studentEdit, //forms user object
              headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            })
            .then(function(response) {
              if(response.data == 'gotcha') {
                if($('#selectedAcdmYearsEdit').val() != editstu_years || $('#selectedAcdmGradeEdit').val() != editstu_grade) {
                  for(var i = 0; i < $scope.students.length; i++) {
                      if($scope.students[i].acdm_id == stuEditReqInfo) {
                        $scope.students.splice(i, 1);
                        break;
                      }
                  }
                  $scope.noStudentChk();
                }


                editstu_name = $scope.editstu_name;
                editstu_father = $scope.editstu_father;
                editstu_birth = $scope.editstu_birth;
                editstu_address = $scope.editstu_address;
                editstu_phone = $scope.editstu_phone;
                editstu_years = $('#selectedAcdmYearsEdit').val();
                editstu_grade = $('#selectedAcdmGradeEdit').val();

                for(i = 0; i < $scope.students.length; i++) {
                  if($scope.students[i].acdm_id == stuEditReqInfo) {
                    $scope.students[i].stu_name = editstu_name;
                    $scope.students[i].stu_father = editstu_father;
                    $scope.students[i].stu_birth = editstu_birth;
                    $scope.students[i].stu_address = editstu_address;
                    $scope.students[i].stu_phone = editstu_phone;
                  };
                }

                $('#editStuAlert').fadeIn();
                setInterval(function() {
                  $('#editStuAlert').fadeOut();
                }, 3000);
              }
              // console.log(response.data + response.status + response.statusText);
            });
          }
        }

        $scope.delStudent = function (acdm_id) {
          for(var i = 0; i < $scope.students.length; i++) {
              if($scope.students[i].acdm_id == acdm_id) {
                $scope.students.splice(i, 1);
                break;
              }
          }
          var stuReqInfo = ({
            'acdm_id' : acdm_id
          });
          $http({
            method  : 'POST',
            url     : 'includes/http_req/tables/del_stu.php',
            data    : stuReqInfo, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function(response) {
            if(response.data == 'gotcha') {

              if($scope.students.length == 0) {
                $scope.initRef();
                console.log('working');
                $('#selectedAcdmYearsText').text($scope.acdms[0].acdm_years);
                $('#selectedAcdmGradeText').text($scope.acdmsGrade[0].acdm_grade);
                // var optionSelected = $('#selectedAcdmYears').find("option:selected");
                // var textSelected   = optionSelected.text();
                // selectedYears = textSelected;
                // $('#selectedAcdmYearsText').text(textSelected);
                //
                // var optionSelected = $('#selectedAcdmGrade').find("option:selected");
                // var textSelected   = optionSelected.text();
                // selectedGrade = textSelected;
                // $('#selectedAcdmGradeText').text(textSelected);


                // for(var i = 0; i < $scope.acdms.length; i++) {
                //     if($scope.acdms[i].acdm_years == $('#selectedAcdmYearsText').text()) {
                //       $scope.acdms.splice(i, 1);
                //       $('#selectedAcdmYears').trigger('change');
                //       break;
                //     }
                // }
              }
            }

          });

        }


        var editstu_name,
            editstu_father,
            editstu_birth,
            editstu_phone,
            editstu_address,
            editstu_years,
            editstu_grade;
        $scope.editStudent = function (acdm_id) {

          stuEditReqInfo = acdm_id;
          $('#editStuForm').modal('show');

          for(var i = 0; i < $scope.students.length; i++) {
              if($scope.students[i].acdm_id == acdm_id) {
                $scope.editstu_id = $scope.students[i].stu_id;
                $scope.editstu_name = $scope.students[i].stu_name;
                $scope.editstu_father = $scope.students[i].stu_father;
                $scope.editstu_birth = $scope.students[i].stu_birth;
                $scope.editstu_phone = $scope.students[i].stu_phone;
                $scope.editstu_address = $scope.students[i].stu_address;

                $('#selectedAcdmYearsEdit').val($('#selectedAcdmYearsText').text());
                $('#selectedAcdmYearsEdit').trigger('change');
                $('#selectedAcdmGradeEdit').val($('#selectedAcdmGradeText').text());
                $('#selectedAcdmGradeEdit').trigger('change');
                break;
              }
          }

          editstu_name = $scope.editstu_name;
          editstu_father = $scope.editstu_father;
          editstu_birth = $scope.editstu_birth;
          editstu_phone = $scope.editstu_phone;
          editstu_address = $scope.editstu_address;
          editstu_years = $('#selectedAcdmYearsText').text();
          editstu_grade = $('#selectedAcdmGradeText').text();
        }
        // $scope.selectedStu = {};
        //
        // $scope.delStudents = function () {
        //   console.log('del All');
        //   // $scope.multiStudents = [];
        //   angular.forEach($scope.selectedStu, function (selected, acdm_id) {
        //       if (selected) {
        //         console.log(acdm_id);
        //          console.log(acdm_id);
        //       }
        //   });
        //   // $('#selectedAcdmGrade').find(".check-box:checked").attr("id");
        //
        // }

        // $scope.toggleAll = function() {
        //   console.log($scope.selectedStu.acdm_id);
        //
        //   var toggleStatus = !$scope.isAllSelected;
        //   angular.forEach($scope.selectedStu, function(itm){
        //     console.log(itm.acdm_id);
        //     itm.selected = toggleStatus;
        //   });
        //
        // }

        $("#checkAll").change(function() {
          angular.forEach($scope.selectedList, function (selected, acdm_id) {
              if (selected) {
                 console.log(acdm_id);
              }
          });
            if (this.checked) {
                $(".checkSingle").each(function() {
                  $(this).prop('checked', true).attr('checked', 'checked');
                });
            } else {
                $(".checkSingle").each(function() {
                  $(this).prop('checked', false).removeAttr('checked');
                });
            }
        });


        $(document).on('change', '.checkSingle', function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;

                $(".checkSingle").each(function() {
                    if (!this.checked)
                        isAllChecked = 1;
                });

                if (isAllChecked == 0) {
                    $("#checkAll").prop("checked", true);
                }
            }
            else {
                $("#checkAll").prop("checked", false);
            }
        });

        $scope.selectedList = {};

        /**
         * Action
         */
        $scope.delStudents = function () {
          var stuReqInfos = [];
          $('.checkSingle:checked').each(function(i){
            stuReqInfos[i] = $(this).val();
          });

          console.log($scope.students);
          console.log(stuReqInfos);

          $http({
            method  : 'POST',
            url     : 'includes/http_req/tables/del_stus.php',
            data    : stuReqInfos, //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(function(response) {
            console.log(response.data);
            if(response.data == 'gotcha') {
              console.log($scope.students);
              for(var i = $scope.students.length-1; i >= 0 ; i--) {
                for(var j = 0; j < stuReqInfos.length; j++) {
                  if($scope.students[i].acdm_id == stuReqInfos[j]) {
                    $scope.students.splice(i, 1);
                    break;
                  }
                }
              }

              if($scope.students.length == 0) {
                $scope.initRef();
                console.log('working');
                $('#selectedAcdmYearsText').text($scope.acdms[0].acdm_years);
                $('#selectedAcdmGradeText').text($scope.acdmsGrade[0].acdm_grade);

              }
              $('#checkAll').prop("checked", false);
            }
          });

        }

      });

      app.controller('acdmListCtrl', function($scope, $http) {

      });


      function stuSearchFnc() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("stuSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("stuTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          tdName = tr[i].getElementsByTagName("td")[2];
          if (tdName) {
            if (tdName.innerHTML.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";

              tdFather = tr[i].getElementsByTagName("td")[4];
              if (tdFather) {
                if (tdFather.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";

                  tdBirth = tr[i].getElementsByTagName("td")[3];
                  if (tdBirth) {
                    if (tdBirth.innerHTML.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";

                      tdAddress = tr[i].getElementsByTagName("td")[5];
                      if (tdAddress) {
                        if (tdAddress.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";

                          tdPhone = tr[i].getElementsByTagName("td")[6];
                          if (tdPhone) {
                            if (tdPhone.innerHTML.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
          // tdBirth = tr[i].getElementsByTagName("td")[3];
          // if (tdBirth) {
          //   if (tdBirth.innerHTML.toUpperCase().indexOf(filter) > -1) {
          //     tr[i].style.display = "";
          //   } else {
          //     tr[i].style.display = "none";
          //   }
          // }
          // tdFather = tr[i].getElementsByTagName("td")[4];
          // if (tdFather) {
          //   if (tdFather.innerHTML.toUpperCase().indexOf(filter) > -1) {
          //     tr[i].style.display = "";
          //   } else {
          //     tr[i].style.display = "none";
          //   }
          // }
          // tdAddress = tr[i].getElementsByTagName("td")[5];
          // if (tdAddress) {
          //   if (tdAddress.innerHTML.toUpperCase().indexOf(filter) > -1) {
          //     tr[i].style.display = "";
          //   } else {
          //     tr[i].style.display = "none";
          //   }
          // }
          // tdPhone = tr[i].getElementsByTagName("td")[6];
          // if (tdPhone) {
          //   if (tdPhone.innerHTML.toUpperCase().indexOf(filter) > -1) {
          //     tr[i].style.display = "";
          //   } else {
          //     tr[i].style.display = "none";
          //   }
          // }
        }
      }



      var textFieldInFocus;
      function handleOnFocus(form_element)
      {
         textFieldInFocus = form_element;
      }
      function handleOnBlur()
      {
         textFieldInFocus = null;
      }

      var unicode = document.getElementById("unicode");
      var zawgyi = document.getElementById("zawgyi");

      onchangeHandler(unicode,zawgyi,"uni2zg");
      onchangeHandler(zawgyi,unicode,"zg2uni");

      function converter(textField,tochangeField,toconv) {
          if(tochangeField != textFieldInFocus) {
              if(toconv == "uni2zg") {
                    tochangeField.value = Rabbit.uni2zg(textField.value);
              }
              else {
                   tochangeField.value = Rabbit.zg2uni(textField.value);
              }
          }
      }

      function onchangeHandler(textField,tochangeField,toconv) {

          if (textField.addEventListener) {
            textField.addEventListener('input', function() {
                converter(textField,tochangeField,toconv);
            }, false);
          } else if (textField.attachEvent) {
            textField.attachEvent('onpropertychange', function() {
              // IE
                converter(textField,tochangeField,toconv);
            });
          }

      }

    </script>
  </body>
</html>
<?php
}
?>
