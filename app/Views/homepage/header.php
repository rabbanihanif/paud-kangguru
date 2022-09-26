<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title><?= $title; ?></title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Inter:300,300i,400,400i,500,500i,600,600i,700,700i|Inter:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendors/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/vendors/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/vendors/remixicon/remixicon.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/fontawesome/css/font-awesome.min.css'); ?>" />

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="<?= base_url(); ?>" class="logo me-auto"><img src="<?= base_url('assets/img/logo/logo.svg'); ?>" alt="" class="img-fluid" /></a>

      <!-- navbar -->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="<?= base_url(); ?>" <?php if (uri_string(base_url()) == "") { ?> class="active" <?php } ?>>Beranda</a></li>

          <!-- <li><a href="<?= base_url('kegiatan'); ?>" <?php if (uri_string(base_url()) == "kegiatan") { ?> class="active" <?php } ?>>Kegiatan</a></li> -->

          <li><a href="<?= base_url('tentang-sekolah'); ?>" <?php if (uri_string(base_url()) == "tentang-sekolah") { ?> class="active" <?php } ?>>Tentang Sekolah</a></li>

          <li><a href="<?= base_url('program-sekolah'); ?>" <?php if (uri_string(base_url()) == "program-sekolah") { ?> class="active" <?php } ?>>Program Sekolah</a></li>

          <li><a href="<?= base_url('info-pendaftaran'); ?>" <?php if (uri_string(base_url()) == "info-pendaftaran") { ?> class="active" <?php } ?>>Info Pendaftaran</a></li>

          <li><a href="<?= base_url('login'); ?>" class="font-weight-bold text-primary<?php if (uri_string(base_url()) == "login") { ?> active<?php } ?>">Login</a></li>

        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- end navbar -->
    </div>
  </header>
  <!-- End Header -->