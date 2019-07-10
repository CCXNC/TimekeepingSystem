<style type="text/css">
	.container {
		margin-top: 60px;
		margin-left: 250px;
	}
	h3,h5 {
		color: green;
	}
	.row {
		margin-left: 50px;
	}
</style>
<div class="container">

	<div class="col-sm-8">
	  <div class="panel panel-primary">
	    <div class="panel-heading">
	        <h3 class="panel-title">OT FORM</h3>
        	
	    </div>
	    <div class="panel-body">
	    	<?php if($this->session->flashdata('add_msg')) : ?>
			     <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('add_msg'); ?></p>
				<?php endif; ?>
	    	<center><h3>NEW HORIZON FINANCE CORP</h3></center>
	    	<center><h5>REQUEST FOR OVERTIME</h5></center>
	    	<br><br>
	    	<form method="POST" action="<?php echo base_url(); ?>index.php/reports/edit_ot/<?php echo $ot->id; ?>">
	    		<div style="color:red"><?php echo validation_errors(); ?> </div>
	    		<div class="row">
			    	<div class="col-md-5">
	            <div class="form-group">
	                <label for="form_name">EMPLOYEE NUMBER </label>
	                <input id="form_name" type="text" name="employee_number" class="form-control" value="<?php echo $ot->employee_number; ?>">
	            </div>
			   		</div>
			   		<div class="col-md-5">
	            <div class="form-group">
	                <label for="form_name">DATE</label>
	                <input id="form_name" type="text" name="date" class="form-control" value="<?php echo $ot->date_ot; ?>">
	            </div>
	          </div>
			   	</div>	
			   	<div class="row">
			   		<div class="col-md-10">
	            <div class="form-group">
	                <label for="form_name">EMPLOYEE NAME </label>
	                <input id="form_name" type="text" name="name" class="form-control" value="<?php echo $ot->name; ?>"> 
	            </div>
			   		</div>
			   	</div>	
			  	<div class="row">
			  	  <div class="col-md-5">
	            <div class="form-group">
	                <label for="form_name">Time In</label>
	                <input id="form_name" type="text" name="time_in" class="form-control" value="<?php echo $ot->time_in; ?>">
	            </div>
	          </div>
	          <div class="col-md-5">
	            <div class="form-group">
	                <label for="form_name">Time Out</label>
	                <input id="form_name" type="text" name="time_out" class="form-control" value="<?php echo $ot->time_out; ?>">
	            </div>
	          </div>
			   	</div>	
			    
	        <div class="row">
	          <div class="col-md-10">
	            <div class="form-group">
	                <label for="form_name">NATURE OF WORK </label>
	                <input id="form_name" type="text" name="nature_of_work" class="form-control" value="<?php echo $ot->nature_of_work; ?>">
	            </div>
	          </div>
	        </div>
         	<div class="row">
	          <div class="col-md-10">
	              <center><input type="submit" class="btn btn-primary btn-send" value="Update"></center>
	          </div>
		      </div>
	    	</form>
	    </div>  
	  </div>
	</div>
</div>
