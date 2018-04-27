<div class="main-container">
	<!-- SHOWS A LIST OF SCHOOLS -->
	<div class="student-list-container">
		<!-- Header -->
		<div class="student-list-header">
			<div class="header-item">ALL SCHOOLS</div>
			<button class="btn-dropdown" id="btn-dropdown-schools"></button>
		</div>

		<!-- List of schools -->
		<div class="school-list">
			<!-- TEMP  VALS LOL -->
			<?php foreach($allschools as $school):?>
				<div class="list-item item-school" id="<?php echo $school['col_school_id']?>"><label class="list-school-name"><?php echo $school['col_school_name']; ?></label></div>
			<?php endforeach; ?>

			<div class="list-item item-school" id="all-schools"><label class="list-school-name"">ALL SCHOOLS</label></div>
		</div>

		<!-- List of Students at specified school -->
		<div class="student-list">
			<?php foreach($allstudents as $student):?>
				<div class="list-item  item-student" id="<?php echo $student['col_student_id']?>"><label class="list-student-name"><?php echo $student['col_student_fname']." ".$student['col_student_mname']." ".$student['col_student_lname']." ".$student['col_student_suffix']; ?></label></div>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- SHOWS THE DETAILS OF A CERTAIN STUDENT -->
	<div class="student-details-container">
		<div class="student-info-container">

			<label class="student-name"><?php echo $current_student_name; ?></label>
			<label class="student-bday"><?php echo $current_student_bday; ?></label>
			<label class="student-age"><?php echo $current_student_age; ?></label>
			<label class="student-sex"><?php echo $current_student_sex; ?></label>
		</div>
		
		<div class="twelve columns students-per-section">

			<div class="assessment-list-container-header"
				 id="assessment-list-header">
				 ASSESSMENTS
			</div>

			<div class="assessment-list">
				NONE AS OF THE MOMENT
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