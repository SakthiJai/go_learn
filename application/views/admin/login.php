<!DOCTYPE html>
<html>
<head>
	<title>Vidhyapeeth Admin Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="<?php echo base_url();?>assets/images/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url();?>assets/images/bg.svg">
		</div>
		<div class="login-content">
            <form method="POST" action="<?php echo base_url('index.php/admin/log_in');?>" >
				<!--<img src="<?php echo base_url();?>assets/images/logo-inverse.png">-->
				<h2 class="title" style="color:#2a427a;">vidhyapeeth</h2> 
				<h2 class="title">Admin</h2>
				<span style="color:red;"><?php echo $this->session->flashdata('signinmsg'); ?></span>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="user_name"  class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	<!--<a href="#">Forgot Password?</a>-->
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
</body>
</html>
