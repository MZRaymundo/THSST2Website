<!-- OVERLAY -->
<div class="overlay">

	<!-- FOR ADDING ASSESSMENT -->
	<div class="overlay-main-container" id="overlay-add-assessment">
		
	<?php echo form_open('', 'class=add-assessment-form'); ?>
		<button id="btn-cancel"></button>
		<table class="assessment-form">
			<tr>
				<td>Name of School</td>
				<td><select class="assessment-details"
							id="select-name-of-school" name="school">
							<?php foreach($allschools as $school):?>
								<option class="list-item" 
										id="<?php echo $school['col_school_id']?>"
										value = "<?php echo $school['col_school_name']?>">

										<label class="list-school-name"><?php echo $school['col_school_name']?></label></option>
							<?php endforeach; ?>
					</select>
				</td>
			</tr>

			<tr>
				<td>Date of Assessment</td>
				<td>
					<select class="assessment-date"
						    id="select-month"
						    name = "month">
					</select>

					<select class="assessment-date"
						    id="select-day"
						    name = "day">
					</select>

					<select class="assessment-date"
						    id="select-year"
						    name = "year">
					</select>
				</td>
			</tr>

			<tr>
				<td>Time of Assessment</td>
				<td>
					<select class="assessment-time"
						    id="select-hour"
						    name = "hour">
					</select>
					:
					<select class="assessment-time"
						    id="select-min"
						    name = "min">
					</select>

					<select class="assessment-time"
						    id="select-am-pm"
						    name = "am_pm">
						    <option value='a.m.'>a.m.</option>
						    <option value='p.m.'>p.m.</option>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" id="submit-btn-add-assessment" value="Add Assessment">
		<input type="submit" id="submit-btn-edit-assessment" value="Edit Assessment">
	<?php echo form_close(); ?>
	</div>

	<!-- FOR DELETING ASSESSMENT -->
	<div class="overlay-main-container" id="overlay-delete-assessment">
		<label class="delete-msg"> Are you sure you want to delete Assessment?</label>
		<button class="btn-choice" id="btn-yes">YES</button>
		<button class="btn-choice" id="btn-no">NO</button>
	</div>
</div>

<!-- MAIN CONTAINER -->
<div class="row main-container">
	<?php foreach($alldates as $date):?>
		<div class="nine columns sched-per-day">
			<div class="ten columns assessment-sched-container-complete-date">
				<div class="assessment-sched-container-day"><?php echo date('l', strtotime($date['DATE']));?>, </div>
				<div class="assessment-sched-container-date"><?php echo $date['DATE'];?></div>
			</div>
			<div class="ten columns sched-container-header"
				 id="assessment-sched-header">
				<div class="header-item" id="header-time">TIME</div>
				<div class="header-item" id="header-school-name">NAME OF SCHOOL</div>
				<div class="header-item" id="header-school-password">PASSWORD</div>
			</div>

			<?php foreach($allassessments as $assessment):?>
				<?php if($assessment['DATE'] == $date['DATE']) : ?>
					<div class="ten columns assessment-sched" id="assessment-num-<?php echo $assessment['col_session_id']?>">
						<div class="assessment-sched-container">
							<div class="assessment-sched-details" id="<?php echo $assessment['col_session_id']?>">		
									<div class="assessment-sched-container-time"><?php echo date("g:i a", strtotime($assessment['TIME'])); ?></div>
									<div class="assessment-sched-container-school-name"><?php echo $assessment['col_school_name']; ?></div>
									<div class="assessment-sched-container-password"><?php echo $assessment['col_session_password']; ?></div>
									<button class="btn-alter"  id="<?php echo $assessment['col_session_id']?>"></button>
							</div>
							<div class="assessment-sched-alter-buttons"  id="alter-container-<?php echo $assessment['col_session_id']?>">
								<?php if($assessment['DATE'] > date("Y-m-d")) : ?> 	 
									<button class="btn-edit"  id="<?php echo $date['DATE'] . "_" . $assessment['col_session_id']?>"></button>
								<?php endif; ?>
								<button class="btn-delete"  id="<?php echo $assessment['col_session_id']?>"></button>
							</div>
						</div>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</div>		
	<?php endforeach; ?>
	
	<div class="btn-add-assessment-container">
		<button class="btn-add-assessment" id="btn-add"></button>
		<label>ADD AN ASSESSMENT DATE</label>
	</div>
</div>

