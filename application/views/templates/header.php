<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title -->
    <title><?= $title ?></title>

    <!-- Icon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/image/logo-politala.png" type="image/x-icon">

    <!-- Native CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/politala-style.css">
    <style>
        .logo-img {
            background-image: url('http://localhost/vote/assets/img/logo-politala.png');
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/vendor/sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="<?= base_url() ?>assets/image/logo-politala.png" alt="LOGO" style="height:35px;width:35px;margin-right:10px">
        <a class="navbar-brand" href="<?= base_url() ?>home"><b>Voting Politala</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-left:350px">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= base_url() ?>home/kpum">KPUM <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="<?= base_url() ?>home/registration">Registration</a>
                <a class="nav-item nav-link active" href="<?= base_url() ?>home/history">History</a>
                <?php if ($this->session->userdata("status") == 1) { ?>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>pencoblos/vote">Vote</a>
                <?php } else { ?>
                    <a class="nav-item nav-link">Vote</a>
                <?php } ?>
                <a class="nav-item nav-link active" href="<?= base_url() ?>home/list">List Peserta</a>
            </div>
            <?php if ($this->session->userdata("status") == 1) { ?>
                <div class="navbar-nav" style="margin-left:330px">
                    <a class="nav-item nav-link active" href="<?= base_url() ?>auth/logout"><b>Logout</b></a>
                </div>
            <?php } else if ($this->session->userdata("admin_login") == 1) { ?>
                <div class="navbar-nav" style="margin-left:330px">
                    <a class="nav-item nav-link active" href="<?= base_url() ?>admin/dashboard"><b>Dashboard Admin</b></a>
                </div>
            <?php } else { ?>
                <div class="navbar-nav" style="margin-left:330px">
                    <a class="nav-item nav-link active" href="<?= base_url() ?>auth"><b>Sign In</b></a>
                    <a class="nav-item nav-link active" href="#">or</a>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>auth/check"><b>Sign Up</b></a>
                </div>
            <?php } ?>
        </div>

    </nav>