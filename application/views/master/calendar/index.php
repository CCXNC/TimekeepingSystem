<style type="text/css">
	.container{
		margin-top: 100px;
		margin-left: 100px;
	}
	p{
		font-size: 24px;
		font-family: century gothic;
	}
	.add{
		margin-top: -45px;
		margin-left: 1050px;
	}
</style>
<div class="container">
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
	      	<p>Holiday List</p>
	      	<div class="add">
	      		<a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/master/add_holiday">Add</a>
	      	</div>	
	      </div>	
	        <form method="post">
				    <div class="panel-body">
				      <div class="table-responsive">
				          <table class="table table-bordered table-hover table-striped">
				            <thead>
				                <tr>
			                    <th>Decription</th>
			                    <th>Type</th>
			                    <th>Date</th>
			                    <th><center>Action</center></th>
				                </tr>
				            </thead>
				            <?php if(isset($holidays)) : ?>
				                <?php foreach($holidays as $holiday) : ?>
				                <tr>
			                    <td><?php echo $holiday->description; ?></td>
			                    <td>
			                    	<?php 
			                    		if($holiday->type == 'LH')
			                    		{
			                    			echo 'LEGAL HOLIDAY';
			                    		}
			                    		elseif($holiday->type == 'SH')
			                    		{
			                    			echo 'SPECIAL HOLIDAY';
			                    		}
			                    	?>
			                   	</td>
			                    <td><?php echo $holiday->dates; ?></td>
			                    <td>
			                      <center>
			                      	<a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>index.php/master/edit_calendar/<?php echo $holiday->id; ?>">Edit</a>
			                      	<a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>index.php/master/delete_holidays/<?php echo $holiday->id; ?>">Delete</a>
			                      </center>
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
