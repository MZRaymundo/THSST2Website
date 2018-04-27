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
			<div class="register-form-container">

				<div id="logo">
					REGISTER
				</div>
				
				<div class="register-form">
				<?php echo form_open('register/check'); ?>
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

					<!-- REGISTER BUTTON -->
					<input 	type="submit"
							name="register" 
							class="button-primary form-btn btn-font" 
							id="input-submit" 
							value="Register"/>

					<!-- REGISTER BUTTON -->
					<a href="login"><input 	type="button"
							name="cancel" 
							class="button form-btn btn-font" 
							id="input-btn" 
							value="Cancel"/></a>
				<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</html>