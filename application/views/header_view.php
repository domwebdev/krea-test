<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if  (isset($this->session->userdata['s_login']) AND $this->session->userdata['s_login'] != null ){
}else{
    $page = base_url();
    header("location: $page");
}?>
<!DOCTYPE HTML >
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KREA-Test</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
    <!--<link href="style.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>css/style-horizontal.css" rel="stylesheet">
    <!-- Toggles -->
    <link href="<?php echo base_url(); ?>css/toggles.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/toggles-full.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/dropdown_design.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- jQuery UI  -->
    <link href="<?php echo base_url(); ?>css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.min.js"></script>

</head>
<body>
<div class="mainHolder" id="mainHolder">
    <div class="navbar navbar navbar-top" role="navigation">
        <div class="container-fluid">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 hidden-xs left">
                    <br>
                    <br>
                   <a href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>images/logo-menu.png"></a>
                </div>
                  <br>
                <div align="center" class=" col-xs-12 hidden-lg hidden-md hidden-sm center-block ">
                  <a  href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url(); ?>images/logo-menu.png"></a>
                </div>
                &nbsp;
                <div class="col-xs-12 navbar-header navbar-default hidden-lg hidden-md hidden-sm " style="border-radius:5px;">
                    <br>
                    &nbsp;&nbsp;&nbsp;<span style='font-size:14px;color:#ffffff !important;'><?php echo $fullname; ?></span>
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span  class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                </div>
                <div class="col-lg-6 right navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left hidden-lg hidden-md hidden-sm ">
                        <li>
                            <a href="<?php echo base_url().'dashboard' ; ?>">Home<span class="glyphicon glyphicon-home pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>/logout"><?php echo lang('logout'); ?><span class="glyphicon glyphicon-log-out pull-right"></span></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right topbar hidden-xs ">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $fullname; ?>  <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url().'dashboard' ; ?>">Home<span class="glyphicon glyphicon-home pull-right"></span></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>/logout">Log out<span class="glyphicon glyphicon-log-out pull-right"></span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </ul>
                </div>
              </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid ">
     <div class="row">
