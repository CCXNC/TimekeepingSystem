<style type="text/css">
	.container{
		margin-top: 100px;
		margin-left: 150px;
	}

</style>

<div class="container">
	  <div class="col-sm-5">
		  <div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">Recent Activity</h3>
		    </div>
		    <div class="panel-body">
		    	<?php if(isset($dashboards)) : ?>
		    		<?php foreach($dashboards as $dash) : ?>
							<li><?php echo $dash->message_title; ?></li>		    			
		    		<?php endforeach; ?>	
		    	<?php endif; ?>	
		    </div>
		  </div>
	  </div>

	  <div class="col-sm-5">
		  <div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">Recent Time</h3>
		    </div>
		    <div class="panel-body">
		    	<?php if(isset($dashboards)) : ?>
		    		<?php foreach($dashboards as $dash) : ?>
							<li><?php echo $dash->message_title; ?></li>		    			
		    		<?php endforeach; ?>	
		    	<?php endif; ?>	
		    </div>
		  </div>
	  </div>

	  <div class="col-sm-5">
		  <div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">Company Details</h3>
		    </div>
		    <div class="panel-body">
		        <b>NHFC</b> -NEW HORIZON FINANCE CORP.
		        <br>
		        <b>GTLIC</b> -GOLDEN TREASURE LENDING INVESTOR CORP.  
		        <br><br><br><br>
		    </div>
		  </div>
	  </div>
</div>