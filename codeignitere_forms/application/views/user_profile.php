<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  $user_email=$this->session->userdata('user_email');

if(!$user_email){

  redirect('user/loadLogin');
}
  	

 




   ?>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href= "<?php echo base_url();?>/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/main.css">
<!--===============================================================================================-->
<style>


</style> 
</head>
<body>
       
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" style"width:550px;">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					 
                     
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username" disabled value=
						"<?php echo $this->session->userdata('user_name'); ?>">
						<span class="focus-input100" data-placeholder="Full name"></span>
					</div>

                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter email">
						<input class="input100" type="email" name="email" disabled value="<?php echo $this->session->userdata('user_email'); ?>">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter age" >
						<input class="input100" type="number" name="age" disabled value="<?php echo $this->session->userdata('user_age'); ?>">
                        <span class="focus-input100" data-placeholder="Age"></span>
					</div>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter phone">
						<input class="input100" type="Text" name="city" disabled
						 value="<?php echo $this->session->userdata('user_city'); ?>">
						<span class="focus-input100" data-placeholder="City"></span>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/js/main.js"></script>

</body>
</html>