<div class="main-container">
	<!-- SHOWS A LIST OF SCHOOLS -->
	<div class="school-list-container">
		<!-- Header -->
		<div class="school-list-header">SCHOOLS</div>

		<!-- list of schools -->
		<div class="school-list">
			<?php foreach($allschools as $school):?>
				<div class="list-item" id="<?php echo $school['col_school_id']?>"><label class="list-school-name"><?php echo $school['col_school_name']?></label></div>
			<?php endforeach; ?>

<!-- 			<div class="list-item"><label class="list-school-name">St. Scholastica's College Westgrove</label></div> -->
		</div>
	</div>

	<!-- SHOWS THE DETAILS OF A CERTAIN SCHOOL -->
	<div class="school-details-container">
		<div class="school-info-container">
			<label class="school-name"></label>
			<label class="school-address"></label>
		</div>
		
		<div class="twelve columns students-per-section">
			<!-- <div class="section-name">Maginhawa</div> -->
			<!-- DISPLAYS THE LIST OF STUDENTS PER SECTION -->
			<div class="student-list-container-header"
				 id="student-list-header">
				<div class="header-item student-name">NAME</div>
				<div class="header-item student-bday">BIRTHDAY</div>
				<div class="header-item student-age">AGE</div>
				<div class="header-item student-sex">SEX</div>
			</div>

			<div class="student-list">
				<!-- <div class="student-list-container">
					<div class="item-info student-name">Ariela Maria Jerica A. Agojo</div>
					<div class="item-info student-bday">1997-01-01</div>
					<div class="item-info student-age">21</div>
					<div class="item-info student-sex">F</div>
				</div> -->
			</div>
		</div>
	</div>	
</div>