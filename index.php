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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="assets/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <style>
    .agri-color-bg {
      background-color: #009900;
    }
    </style>
    <title>Dashkit</title>
  </head>
  <body>

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
          <img src="assets/img/agri-business.png" alt="..." class="navbar-brand-img">
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
              <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
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
                Dashboard
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

      <!-- HEADER -->
      <div class="header" style="margin-top: 60px;">

        <!-- Image -->
        <!-- <img src="assets/img/covers/profile-cover-5.jpg" class="header-img-top" alt="..."> -->

        <div class="container-fluid">

          <!-- Body -->
          <div class="header-body mt--5 mt-md--6">
            <div class="row align-items-end">
              <div class="col-auto">

                <!-- Avatar -->
                <div class="avatar avatar-xxl header-avatar-top">
                  <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle border border-body">
                </div>

              </div>
              <div class="col mb-3 ml--3 ml-md--2">

                <!-- Pretitle -->
                <h6 class="header-pretitle">
                  Members
                </h6>

                <!-- Title -->
                <h1 class="header-title">
                  Dianna Smiley
                </h1>

              </div>
              <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

                <!-- Button -->
                <!-- <a href="#!" class="agri-color-bg btn btn-primary d-block d-md-inline-block">
                  Edit Photo
                </a> -->

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="profile-groups.html" class="nav-link active">
                      Farms
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="profile-projects.html" class="nav-link">
                      Setting
                    </a>
                  </li>
                </ul>

              </div>
            </div>
          </div> <!-- / .header-body -->

        </div>
      </div>

      <!-- CONTENT -->
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col">

            <!-- Form -->
            <form>
              <div class="input-group input-group-rounded input-group-merge">
                <input type="text" class="form-control form-control-prepended search" placeholder="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fe fe-search"></span>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <div class="col-auto">
            <a href="#!" class="agri-color-bg btn btn-primary d-block d-md-inline-block">
              Create Farm
            </a>
          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12 col-lg-4 col-md-6">

            <!-- Card -->
            <div class="card">
              <div class="card-body">

                <!-- Dropdown -->
                <div class="dropdown card-dropdown">
                  <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-more-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#!" class="dropdown-item">
                      Action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Another action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Something else here
                    </a>
                  </div>
                </div>

                <!-- Avatar -->


                <!-- Title -->
                <h2 class="card-title text-center mb-3">
                  <a href="team-overview.html">Launchday</a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                  Launchday is a SaaS website builder with a focus on quality, easy to build product sites.
                </p>

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col">

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <i class="fe fe-clock"></i> Updated 2hr ago
                    </p>

                  </div>
                </div> <!-- / .row -->

              </div> <!-- / .card-body -->
            </div>

          </div>
          <div class="col-12 col-lg-4 col-md-6">

            <!-- Card -->
            <div class="card">
              <div class="card-body">

                <!-- Dropdown -->
                <div class="dropdown card-dropdown">
                  <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-more-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#!" class="dropdown-item">
                      Action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Another action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Something else here
                    </a>
                  </div>
                </div>

                <!-- Avatar -->


                <!-- Title -->
                <h2 class="card-title text-center mb-3">
                  <a href="team-overview.html">Medium Corporation</a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                  Medium is an online publishing platform developed by Evan Williams, and launched in August 2012.
                </p>

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col">

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <i class="fe fe-clock"></i> Updated 4hr ago
                    </p>

                  </div>
                </div> <!-- / .row -->

              </div> <!-- / .card-body -->
            </div>

          </div>
          <div class="col-12 col-lg-4 col-md-6">

            <!-- Card -->
            <div class="card">
              <div class="card-body">

                <!-- Dropdown -->
                <div class="dropdown card-dropdown">
                  <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-more-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#!" class="dropdown-item">
                      Action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Another action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Something else here
                    </a>
                  </div>
                </div>

                <!-- Avatar -->


                <!-- Title -->
                <h2 class="card-title text-center mb-3">
                  <a href="team-overview.html">Github</a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                  GitHub is a web-based hosting service for version control of code using Git.
                </p>

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col">

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <i class="fe fe-clock"></i> Updated 3d ago
                    </p>

                  </div>
                </div> <!-- / .row -->

              </div> <!-- / .card-body -->
            </div>

          </div>
          <div class="col-12 col-lg-4 col-md-6">

            <!-- Card -->
            <div class="card">
              <div class="card-body">

                <!-- Dropdown -->
                <div class="dropdown card-dropdown">
                  <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-more-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#!" class="dropdown-item">
                      Action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Another action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Something else here
                    </a>
                  </div>
                </div>

                <!-- Avatar -->


                <!-- Title -->
                <h2 class="card-title text-center">
                  <a href="team-overview.html">Slack</a>
                </h2>

                <!-- Text -->
                <p class="card-text text-center text-muted mb-4">
                  Slack is a cloud-based set of team collaboration tools and services, founded by Stewart Butterfield.
                </p>

                <!-- Divider -->
                <hr>

                <div class="row align-items-center">
                  <div class="col">

                    <!-- Time -->
                    <p class="card-text small text-muted">
                      <i class="fe fe-clock"></i> Updated 1w ago
                    </p>

                  </div>
                </div> <!-- / .row -->

              </div> <!-- / .card-body -->
            </div>

          </div>
          <div class="col-12">

            <!-- Card -->
            <div class="card card-inactive">
              <div class="card-body text-center">

                <!-- Image -->
                <img src="assets/img/illustrations/scale.svg" alt="..." class="img-fluid" style="max-width: 182px;">

                <!-- Title -->
                <h1>
                  No farms yet.
                </h1>

                <!-- Subtitle -->
                <p class="text-muted">
                  Create a farm to find our more about your farm.
                </p>

                <!-- Button-->
                <a href="#!" class="agri-color-bg btn btn-primary">
                  Create Farm
                </a>

              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container-fluid -->
    </div>
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

  </body>
</html>
<?php
  }
?>
