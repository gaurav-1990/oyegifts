<html>
<head>
<title>My Form</title>
</head>
<body>

	<?php echo validation_errors(); ?>
	
	<?php  echo form_open('oye_user/user_register') ?>
	  	<div class="conṭainer">

	  		<legend>User Registeration</legend><br>
		  		
		  		<div class="form-group col-md-1">
		  			<?php
		  				$options = array(
					        'Mr.'  => 'Mr.',
					        'Ms.'  => 'Ms.',
						);
		  			?>
		  			<?php echo form_dropdown('title',$options,'Mr.','form-control'); ?>	
		  		</div>

		  		<div class="form-group col-md-3">
			      <?php echo form_input(['class'=>'form-control','name'=>'user_name','placeholder'=>'USERNAME','value'=>set_value('user_name')]);?>
			    </div>
			    
			    <div class="form-group col-md-3">
			      <?php echo form_input(['name'=>'user_email','class'=>'form-control','placeholder'=>'EMAIL','value'=>set_value('user_email')]);?>
			    </div>

			    <div class="form-group col-md-3">
			      <?php echo form_input(['name'=>'user_contact','class'=>'form-control','placeholder'=>'MOBILE','value'=>set_value('user_contact')]);?>
			    </div>

			    <div class="form-group col-md-3">
			      <?php echo form_input(['name'=>'user_password','class'=>'form-control','placeholder'=>'PASSWORD','value'=>set_value('user_password')]);?>
			    </div>

			    <div class="form-group col-md-3">
			      <?php echo form_input(['name'=>'cpwd','class'=>'form-control','placeholder'=>'CONFIRM PASSWORD','value'=>set_value('cpwd')]);?>
			    </div>	    
		    
		   		<div class="form-group col-md-3">
		   			<?php echo form_submit(['class'=>'btn btn-primary','value'=>'SUBMIT','name'=>'login']); ?>
		   		</div>
		</div>
	<?php echo form_close(); ?>
	

</body>
</html>