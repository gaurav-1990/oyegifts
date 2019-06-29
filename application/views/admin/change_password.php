<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
            <?= $this->session->flashdata('msg'); ?>
            <?= form_open('Admin/change_password', array('id' => 'forgot_password', 'method' => 'POST')) ?>   
               
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <label>New Password</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="password" placeholder="Password" required autofocus>
                        </div>
                        <div>  <?php  echo form_error('Password'); ?>   </div>
                    </div>

                    <div class="input-group">
                        <label>Confirm Password</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="confirm_password" placeholder="confirm password" required autofocus>
                        </div>
                        <div>  <?php  echo form_error('confirm_password'); ?>   </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">submit</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?= base_url(); ?>Admin">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    