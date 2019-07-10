<style type="text/css">
	.margin {
		margin-top: 70px;
		color: black;
	}
	p{
		font-size: 24px;
		font-family: century gothic;
	}
	td {
		color: black;
	}
	.add{
		margin-top: -45px;
		margin-left: 1200px;
	}
</style>
<div class="margin">
<?php if($this->session->flashdata('add_msg')) : ?>
   <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('add_msg'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('update_msg')) : ?>
   <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('update_msg'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('delete_msg')) : ?>
      <p class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata('delete_msg'); ?></p>
<?php endif; ?>  
<!-- TABLE OF BRANCHES -->
<div class="row">
	<div class="col-lg-12">

  	<div class="panel panel-default">
    	<div class="panel-heading">
      	<p>SL/VL List</p>
      </div>	
        <form method="post" id="slvl">
			    <div class="panel-body">
			      <div class="table-responsive">
			          <table class="table table-bordered table-hover table-striped cl">
			          	<div class="row">  	
				          	<div class="col-md-2">
						          <div class="form-group">
						              <label for="form_name">Start Date</label>
						              <input id="form_name" type="text" name="start_date" class="form-control" value=" <?php echo $cut_off->start_date; ?>">
						          </div>
						        </div>
						        <div class="col-md-2">
						          <div class="form-group">
						              <label for="form_name">End Date</label>
						              <input id="form_name" type="text" name="end_date" class="form-control" value="<?php echo $cut_off->end_date; ?>">
						          </div>
						        </div>	
						        <br>
						        <button type="submit" class="btn btn-primary">Load</button>
						        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/reports/add_slvl">Add</a>
						        <input class="btn btn-primary" id="process" type="submit" value="Process">  
								  </div> 
			            <thead>
		                <tr>
		                	<th><center><input type="checkbox" id="checkAll" name=""></center></th>
	                    <th>Employee No</th>
	                    <th>Name</th>
	                    <th>Date</th>
	                    <th>Type</th>
	                    <th>Reason</th>
	                    <th>Status</th>
	                    <th><center>Action</center></th>
		                </tr>
			            </thead>
		            	<tr>
		            		<td class="trfixed">
										</td>
			            <?php if(isset($slvl)) : ?>
			                <?php foreach($slvl as $slvl) : ?>
			                <tr class="data"> 
			                	<td >
			                		<?php if($slvl->status != "PROCESSED") : ?>
			                			<center><input type="checkbox" name="employee[]" value="<?php echo $slvl->id . '|' . $slvl->employee_number . '|' . $slvl->name . '|' . $slvl->date_start . '|' . $slvl->type_slvl . '|' . $slvl->sl_am_pm ; ?>"> </center>
			                		<?php endif; ?>
			                	</td>
		                    <td><?php echo $slvl->employee_number; ?></td>
		                    <td title="<?php echo $slvl->branch_id; ?>"><?php echo $slvl->name; ?></td>
		                    <td><?php echo $slvl->date_start ?></td>
		                    <td>
		                    	<?php 
		                    		if($slvl->sl_am_pm == 'HFAM')
		                    		{ 
		                    			echo $slvl->type_name . '    |    ' . ' (Halfday AM) '; 
		                    		}
		                    		elseif($slvl->sl_am_pm == 'HFPM')
		                    		{
		                    			echo $slvl->type_name . '    |    ' . ' (Halfday PM) '; 
		                    		}
		                    		else
		                    		{
		                    			echo $slvl->type_name;
		                    		}	
		                    	?>
		                    </td>
		                    <td><?php echo $slvl->reason; ?></td>
		                    <td><?php echo $slvl->status; ?></td>
		                    <td>
		                     <center>
		                     	<?php if($slvl->status != "PROCESSED") : ?>
		                     		<a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>index.php/reports/edit_slvl/<?php echo $slvl->id; ?>">Edit</a>
		                     	<?php endif; ?>	
		                     		<a class="btn btn-xs btn-danger" onclick="return confirm('Do you want to Delete?');" href="<?php echo base_url(); ?>index.php/reports/delete_slvl/<?php echo $slvl->id; ?>">Delete</a>
		                     </center>
		                    </td>
			                </tr>
			                <?php endforeach; ?>
			            <?php endif; ?>
			    			</table> 
	      		</div>
	  			</div>  

	  			<?php if($hfpm_sl) : ?>
						<?php foreach($hfpm_sl as $hfpm) : ?>
							<input type="hidden" name="hfpm_employee_number[]" value="<?php echo $hfpm->hfpm_employee_number; ?>">
							<input type="hidden" name="hfpm_dates[]" value="<?php echo $hfpm->hfpm_dates; ?>">
							<?php 
								$explode = explode(" ", $hfpm->hfpm_time_out);
								$hfpm_time = $explode[1];
							?>
							<input type="hidden" name="hfpm_time_out[]" value="<?php echo $hfpm_time; ?>">
							<br>
						<?php endforeach; ?>	
					<?php endif; ?>	
					<?php if($hfam_sl) : ?>
						<?php foreach($hfam_sl as $hfam) : ?>
							<input type="hidden" name="hfam_employee_number[]" value="<?php echo $hfam->hfam_employee_number; ?>">
							<input type="hidden" name="hfam_dates[]" value="<?php echo $hfam->hfam_dates; ?>">
							<?php 
							$explode = explode(" ", $hfam->hfam_time_in);
							$hfam_time = $explode[1];
							?>
							<input type="hidden" name="hfam_time_in[]" value="<?php echo $hfam_time; ?>">
							<br>
						<?php endforeach; ?>	
					<?php endif; ?>	   

        </form>   
     </div>            
  </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#process').click(function() {
			var a = confirm("Are you sure you want to Processed Data?");
			if (a == true) {
				$('#slvl').attr('action', 'process_slvl');
				$('#slvl').submit();
			} else {
				return false;
			} 
		});

		$("#checkAll").click(function(){
   	 $('input:checkbox').not(this).prop('checked', this.checked);
		});

	});	
</script>

