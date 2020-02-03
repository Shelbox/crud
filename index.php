<?php 
include_once ('header/header.php'); 

?>

<div class="container">
	<div class="col-6" style="text-align: center;">
	    <div class="form-area">  
	        <form role="form" method="post" name="form" action="select_bdd.php">
	        <br style="clear:both">
	                    <h3 style="margin-bottom: 25px; text-align: center;">Connect to DB</h3>
	    				<div class="form-group">
	    					 <label class='control-label col-sm-5' for="host">IP :</label>
	    					 <div class='col-sm-3'>
								<input type="text" class="form-control" id="host" name="host" value="localhost"  required>
							</div>
						</div>
						<div class="form-group">
							<label class='control-label col-sm-5' for="login">login :</label>
	    					 <div class='col-sm-3'>
								<input type="text" class="form-control" id="login" name="login" value="root" required>
							</div>
						</div>
						<div class="form-group">
							<label class='control-label col-sm-5' for="password">password :</label>
	    					 <div class='col-sm-3'>
							<input type="text" class="form-control" id="password" name="password" placeholder="password">
						</div>
	                   </br>
	            		
	       				<center>	 <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Connect</button></center>
	        			
	        </form>
	    </div>
	</div>
</div>










