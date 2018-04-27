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
		echo link_tag('assets/css/header.css');
		echo $css; 
	?>
	<!-- js -->
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-3.0.0.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/header.js'></script>
	<script type='text/javascript' src='<?php echo base_url().$js; ?>'></script>

</head>
<body>
	<div class="row header-container">
		<a href='home'>
			<button class="four columns header-btn"
					id="btn-home">
						<div class="btn-text" 
							 id="logo">
							 SYSTEM NAME
						</div>
						
						<div class="btn-text"
							 id="page-indicator">
							 <?php echo $title?>
						</div>
			</button>
		</a>
		
		<div class="six columns search-bar-container">
			<!-- <?php //echo form_open('search/check'); ?> -->
			<div class="search-form">
				<!-- INPUT SEARCH ITEM -->
				<input 	type="text" 
						name="item" 
						class="form-input" 
						id="input-item" 
						placeholder="Search"
						value=<?php echo set_value('item'); ?> >
				</input>

				<!-- LOGIN BUTTON (SUBMIT) -->
				<input 	type="button"
						name="button" 
						class="form-btn" 
						id="btn-search-bar" 
						value=""/>
			</div>
			<!-- <?php //echo form_close(); ?> -->
		</div>

		<div class="two columns right-btns-container">
			<div class="header-btn-container"
				 id="btn-profile-container">
				<a href='profile'>
					<button class="header-btn"
							id="btn-profile">
					</button>	
				</a>	
				<label class="lbl-header" 
					   id="lbl-profile">PROFILE</label>
			</div>

			<div class="header-btn-container"
				 id="btn-logout-container">
				<a href='login'>
					<button class="header-btn"
							id="btn-logout">
					</button>
				</a>
				<label class="lbl-header"
					   id="lbl-logout">LOGOUT</label>
			</div>
		</div>
	</div>

