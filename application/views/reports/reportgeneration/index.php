<style type="text/css">
	.container {
		margin-top: 60px;
		width: 100%;
	}
	.table {
		width: auto;
	}
	.row {
		margin-left: 2px;
		margin-top: 10px;
	}
	input {
		text-align: center;
	}

</style>
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Total Summary List</h3>
    </div>
    <form id="timeForm" method="post">
	    <div class="row">
	    	<div class="col-xs-2">
	    		<input type="text" class="form-control" name="start_date" value="<?php echo $cut_off->start_date; ?>">
	    	</div>
	    	<div class="col-xs-2">
	    		<input type="text" class="form-control" name="end_date" value="<?php echo $cut_off->end_date; ?>">
	    	</div>
	    	<div class="col-md-2">
	    		<button type="submit" class="btn btn-primary">LOAD</button> 
	    		<a href="#" class="marginbtn btn btn-primary">DOWNLOAD</a> 
	    	</div>
	    </div>
	    <div class="panel-body">
	    	<table class="table table-bordered table-hover table-striped">
	    		<thead>
	    			<th>Employee No.</th>
	    			<th>Name</th>
	    			<th>Total Tardiness</th>
	    			<th>No. Tardiness</th>
	    		</thead>
					<?php if($employees) : ?>
						<?php foreach($employees as $emp) : ?>
							<tr>
	  						<td><?php echo $emp->emp_no; ?></td>
	  						<td><?php echo $emp->name; ?></td>

	  						<!-- TARDINESS -->
	  						<td>
	  							<?php if($tardiness) : ?>
		            		<?php foreach($tardiness as $tard) : ?>
			            		<?php  
			            			//TOTAL TARDINESS
				            		if($tard->total_tardiness == 0)
				            		{
				            			echo ' ';
				            		} 
				            		else
				            		{
				            			if($tard->tard_employee_number == $emp->employee_number)
				            			{
				            				$tard = $tard->total_tardiness;
				            				$hr_diff = intval($tard/60);
														$min_diff = intval($tard%60);
														$tard1 = sprintf("%02d", $min_diff);
				            				echo $hr_diff. "." .$tard1;
				            			}
				            		}	
			            		?>	
		            		<?php endforeach; ?>	
		            	<?php endif; ?>	
	  						</td>

	  						<!-- NUMBER OF TARDINESS -->
	  						<td>
	  							<?php if($number_tardiness) : ?>
		            		<?php foreach($number_tardiness as $num_tard) : ?>
			            		<?php  
			            			//TOTAL TARDINESS
				            		if($num_tard->number_tardiness == 0)
				            		{
				            			echo ' ';
				            		} 
				            		else
				            		{
				            			if($num_tard->tard_employee_number == $emp->employee_number)
				            			{
				            				echo $num_tard->number_tardiness;
				            			}
				            		}	
			            		?>	
		            		<?php endforeach; ?>	
		            	<?php endif; ?>	
	  						</td>

							</tr>
						<?php endforeach; ?>
					<?php endif; ?>		
	    	</table>
	    </div>
	  </form>  
  </div>
</div>
