<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>KREA-TEST</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style-horizontal.css" rel="stylesheet">
    </head>
    <body>
        <div class="form-signin" role="form">
            <h3 class="form-signin-heading"><img src="<?php echo base_url(); ?>images/logo-menu.png"><b> - TEST</b></h3>
            <?php  echo form_open('userLoginProcess'); ?>
            <?php if($this->session->flashdata('error_messages')){
                echo  '<div class="  center-margin h5 text-center alert-danger">&nbsp;&nbsp;'.$this->session->flashdata('error_messages'). '</div>';
            } ?>
            <input class="form-control" placeholder="Email" name="f_login" required="" autofocus="" type="text" value="<?php if(isset($this->session->userdata['s_username'])){echo $this->session->userdata['s_username'];}?>">
            <input class="form-control" placeholder="<?php echo lang('password'); ?>" name="f_pass" type="password" value="<?php if(isset($this->session->userdata['s_pass'])){echo $this->session->userdata['s_pass'];}?>" required >
            <div class="checkbox">
                <label>
                    <input name="f_remember" type="checkbox" value="1" <?php if(isset($this->session->userdata['s_remember'])){echo $this->session->userdata['s_remember'];}?>> <?php echo lang('remember login'); ?>
                </label>
            </div>
            <button class="btn btn-lg btn-block" style="background: #000000 !important; color: white !important;" type="submit"><?php echo lang('login'); ?></button>
            <input  type="hidden" name="do" value="login">
              <?php echo form_close(); ?>
        </div>
   </body>
</html>