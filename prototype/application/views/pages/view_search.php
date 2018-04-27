<div class="row main-container">
	<div class="one column"></div>

	<!-- FILTER BUTTONS (LEFT SIDE CONTAINER) -->
	<div class="two columns filter-container">
		
		<!-- FILTER SEARCH RESULTS FOR ALL-->
		<button class="btn-filter"
				id="btn-filter-all">
				ALL
		</button>

		<!-- FILTER SEARCH RESULTS FOR SCHOOLS ONLY -->
		<button class="btn-filter"
				id="btn-school">
		</button>
		
		<!-- FILTER SEARCH RESULTS FOR STUDENTS ONLY -->
		<button class="btn-filter"
				id="btn-student">
		</button>

	</div>

	<!-- RIGHT SIDE CONTAINER -->
	<div class="right-container">
		<!-- DISPLAYS THE SEARCH RESULTS -->
		<div class="seven columns search-items-container">
			
			<div class="right-container-header"
				 id="search-items-header">
				
				<label class="header-item">Sort by: </label>

				<div class="header-item">
					<input type="radio" 
					   name="ascending"
					   checked="checked"
					   id="radio-asc">
					</input>
					<label class="lbl-radio">Ascending</label>
				</div>

				<div class="header-item">
					<input type="radio"
						   name="descending"
						   id="radio-desc">
					</input>
					<label class="lbl-radio">Descending</label>
				</div>

			</div>

			<div class="search-items">
				<!-- <div class="search-item-container">
					<div class="search-item-container-name">
						 Gabrielle Amze L. Raymundo
					</div>
					<div class="search-item-identification"></div>
				</div> -->
			</div>

		</div>

		<!-- DISPLAYS THE DETAILS OF A SELECTED SEARCH ITEM -->
		<!-- <div class="four columns search-item-details-container">
			
			<div class="right-container-header"
				 id="search-item-details-header">
				 <label class="header-item">DETAILS</label>
			</div>

			<div class="search-item-details"></div>

		</div> -->
	</div>	
</div>