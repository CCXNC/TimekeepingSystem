<style type="text/css">
	.margin{
		margin-top: 70px;
		color: black;
	}
	p{
		font-size: 24px;
		font-family: century gothic;
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
      	<p>OB List</p>
      </div>	
		    <div class="panel-body">
			    <form id="obForm" method="post">
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
						        <button type="submit" class="btn btn-primary">load</button>
						        <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/reports/add_ob">Add</a>  
						        <input class="btn btn-primary" id="processOb" type="submit" value="Process">
								  </div> 
			            <thead>
			                <tr>
			                	<th><center><input type="checkbox" id="checkAll" name=""></center></th>
		                    <th>Employee No</th>
		                    <th>Name</th>
		                    <th>Date</th>
		                    <th>From</th>
		                    <th>To</th>
		                    <th>Type</th>
		                    <th>Remarks</th>
		                    <th>Action</th>
			                </tr>
			            </thead> 
		            	<td class="trfixed">
										</td>
			            <?php if(isset($obs)) : ?>
			                <?php foreach($obs as $ob) : ?>
			                	<?php $week_date = date('w', strtotime($ob->date_ob)); ?>
			                <tr class="data">
			                	<input type="hidden" name="process_date" value="<?php echo date('Y-m-d'); ?>">
			                	<td>
			                		<?php if($ob->remarks != 'PROCESSED') : ?>
			                			<center><input type="checkbox" name="employee[]" value="<?php echo $ob->id . '|' . $ob->employee_number . '|' . $ob->date_ob . '|' . $week_date . '|' .  $ob->type_ob . '|' . $ob->time_of_departure . '|' . $ob->time_of_return; ?>"> </center>
			                		<?php endif; ?>
			                	</td>
		                    <td>
		                    	<?php echo $ob->employee_number; ?>
		                    	<input type="hidden" name="employee_number[]" value="<?php echo $ob->employee_number; ?>">
		                    </td>
		                    <td title="<?php echo $ob->branch_id; ?>"><?php echo $ob->name; ?></td>
		                    <td>
		                    	<?php 
		                    		echo $ob->date_ob;
		                    	?>
		                    	<input type="hidden" name="date_ob[]" value="<?php echo $ob->date_ob; ?>">
		                    	<input type="hidden" name="date_num[]" value="<?php echo $week_date; ?>">
		                    </td>
		                    <td><?php echo $ob->site_from; ?></td>
		                    <td><?php echo $ob->site_to; ?></td>
		                    <td>
		                    	<?php 
		                    		if($ob->type_ob == 'UD_out')
		                    		{
		                    			echo 'UNDERTIME OUT'; 
		                    		}
		                    		elseif($ob->type_ob == 'UD_in')
		                    		{
		                    			echo 'HALFDAY IN'; 
		                    		}
		                    		elseif($ob->type_ob == 'WD')
		                    		{
		                    			echo 'WHOLEDAY'; 
		                    		}
		                    		
		                    	?>
		                    	<input type="hidden" name="status[]" value="<?php echo $ob->type_ob; ?>">
		                    </td>
		                    <td><?php echo $ob->remarks; ?></td>
		                    <td>
		                    	<?php if($ob->remarks != 'PROCESSED') : ?>
		                      	<a class="btn btn-xs btn-primary" href="<?php echo base_url() ?>index.php/reports/edit_ob/<?php echo $ob->id; ?>">Edit</a>
		                    	<?php endif; ?>
		                      <a class="btn btn-danger btn-xs delete-btn" onclick="return confirm('Do you want to delete?');" href="<?php echo base_url() ?>index.php/reports/delete_ob/<?php echo $ob->id; ?>">Delete</a>
		                    </td>
			                </tr>
			                <?php endforeach; ?>
			            <?php endif; ?>
			    			</table>
	      		</div>
	  			</div>      
        </form>   
     </div>            
  </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#processOb').click(function() {
			var a = confirm("Process OB?");
			if (a == true) {
				$('#obForm').attr('action', 'process_ob');
				$('#obForm').submit();
			} else {
				return false;
			} 
		});

		$("#checkAll").click(function(){
   	 $('input:checkbox').not(this).prop('checked', this.checked);
		});

	});	
</script>
