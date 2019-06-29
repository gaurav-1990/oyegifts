<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
        </div>
                <div class="card">          
                <div class="body">            
                        <?= $this->session->flashdata('msg'); ?>
                        <?= form_open('Admin', array('id' => 'form_validation', 'method' => 'POST')) ?>                                                                          
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>                               
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="login[email]" placeholder="Email" autocomplete="off" autofocus>                                      
                                    </div>
                                        <div>  <?php  echo form_error('login[email]'); ?>   </div>                                                                                                       
                                </div> 
                                
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>                               
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="login[password]" autocomplete="off" placeholder="password" autofocus>                                      
                                    </div>
                                        <div>  <?php  echo form_error('login[password]'); ?>   </div>                                                                                                       
                                </div>  
                                                                
                                
                                <div class="row">
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?= base_url(); ?>Admin/forget_password">Forgot Password?</a>
                        </div>
                    </div>                                                                                         
                          <?= form_close(); ?>
                        </div>
        </div>
    </div>
