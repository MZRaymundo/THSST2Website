<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<?php 
		//Skeleton Framework
		echo link_tag('assets/css/skeleton/skeleton.css');
		echo link_tag('assets/css/skeleton/normalize.css');

		//Other CSS files used
		echo link_tag('assets/css/main.css');
		echo $css; 
	?>

	<!-- js -->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-3.0.0.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/login.js'></script>

</head>
	<body>
		<!-- THE PART OF THE SCREEN THAT SHOWS THE MAIN CONTENT OF THE WEBSITE -->
		<div class="main-container">
			<div class="login-form-container">

				<div id="logo">
					SYSTEM NAME
				</div>
				
				<div class="login-form">
				<?php echo form_open('login/check'); ?>
					<label class="form-error"><?php echo $invalidInput; ?></label>
					<!-- INPUT USERNAME -->
					<input 	type="text" 
							name="email" 
							class="form-input" 
							id="input-email" 
							placeholder="Enter Email"
							value=<?php echo set_value('email'); ?> >
					</input>
					
					<!-- INPUT PASSWORD-->
					<input 	type="password" 
							name="password"
							class="form-input" 
							id="input-password" 
							placeholder="Password"
							value=<?php echo set_value('password'); ?> >
					</input>

					<!-- LOGIN BUTTON (SUBMIT) -->
					<input 	type="submit"
							name="submit" 
							class="button-primary form-btn btn-font" 
							id="input-submit" 
							value="Login"/>

					<!-- REGISTER BUTTON -->
					<a href="register"><input 	type="button"
							name="register" 
							class="button form-btn btn-font" 
							id="input-btn" 
							value="Register"/></a>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</html>