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
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="login[email]" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">submit</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?= base_url(); ?>Admin">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    