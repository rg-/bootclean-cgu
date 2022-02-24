<div class="">

	<div class="row">
		
		<div class="col-12">
		
			<p class="h3 gmt-3 gmb-2 text-secondary">Dropdowns</p>

			<div class="row">
				<div class="form-group col-md-3 gmb-1">
					<?php WPBC_get_dropdown(array(
		    		 
		    		'attrs' => '',
		    		'class' => '',
		    		'btn_class' => 'btn-primary',
		    		'btn_label' => 'Dropdown button',
		    		'items' => array( 
		    			
		    			array(
		    				'href' => '#action',
		    				'label' => 'Action'
		    			),
		    			array(
		    				'href' => '#action-another',
		    				'label' => 'Another action'
		    			),
		    			array(
		    				'href' => '#action-else',
		    				'label' => 'Something else here'
		    			),

		    		), 
		    	)); ?> 
				</div>
			</div>

			<div class="row">

			<?php
				$root_colors = BC_get_root_colors();
				foreach ($root_colors as $key => $value) {
					$color = str_replace('--', '', $key); 
					?>
					<div class="col-md-3 gmb-1">
				    <div class="form-group"> 
				      
				      <?php WPBC_get_dropdown(array(
				    		 
				    		'attrs' => '',
				    		'class' => '',
				    		'btn_class' => 'btn-primary btn-block',
				    		'btn_label' => 'Dropdown button',
				    		'items' => array( 
				    			
				    			array(
				    				'href' => '#action',
				    				'label' => 'Action'
				    			),
				    			array(
				    				'href' => '#action-another',
				    				'label' => 'Another action'
				    			),
				    			array(
				    				'href' => '#action-else',
				    				'label' => 'Something else here'
				    			),

				    		), 
				    	));?>

				    </div>
				  </div>
					<?php
				}
				
				?>
			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-12 gmb-2 ">

			<p class="h3 gmt-3 text-secondary">Selectpicker</p>

			<div class="row">
				<div class="form-group col-md-3 gmb-1">

		    	<?php WPBC_get_selectpicker(array(

		    		'attrs' => 'data-style="btn-primary"',
		    		'class' => '',
		    		'options' => array( 
		    			
		    			array(
		    				'value' => 'apples',
		    				'label' => 'Apples'
		    			),
		    			array(
		    				'value' => 'bananas',
		    				'label' => 'Bananas'
		    			),
		    			array(
		    				'value' => 'oranges',
		    				'label' => 'Oranges'
		    			), 

		    		), 
		    	)); ?>
		      
		    </div>
		  </div>

		</div> 

	  <?php
				$root_colors = BC_get_root_colors();
				foreach ($root_colors as $key => $value) {
					$color = str_replace('--', '', $key); 
					?>
					<div class="col-md-3 gmb-1">
				    <div class="form-group"> 
				      <select class="selectpicker form-control" data-style="btn-<?php echo $color; ?>">
				        <option>Mustard</option>
				        <option>Ketchup</option>
				        <option>Barbecue</option>
				      </select>
				    </div>
				  </div>
					<?php
				}
				
				?>

	</div>

</div>