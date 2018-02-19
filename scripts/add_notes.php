<?php
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';

if(isset($_POST['delpost'])){

$engagement_id = $_POST['engagement_id'];
						?>


<div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Adding Notes</h4>
                                    <p class="category">Add notes to this project</p>
                                </div>
                                <div class="card-content">
                                    <div class="row">
												<div id="yea" class="col-md-6 col-md-offset-3" align="center">
													<form id="updateForm" method="post">
														<h3>Updating Project Notes</h3>
															<input type="hidden" name="nengagement_id" id="nengagement_id" class="form-control" value="<?php echo $engagement_id; ?>">
															<label class="control-label pull-left"><h4>Notess Category</h4></label>
															<select class="form-control" name="notes_category" id="notes_category">
																	<option selected>General</option>
																	<option>Critical</option>
															</select>
															
															<label class="control-label pull-left"><h4>Project Notes</h4></label>
														<textarea class="form-control" name="project_notes_details" id="project_notes_details" rows="5" placeholder="Please enter notes here!" required></textarea>
														
														<button type="submit" name="insert_project_notes" id="insert_project_notes" class="btn btn-primary pull-right">Add Notes</button>
													</form>	  
												</div> 
											</div>
                                        </div>
                                </div>
                            </div>

	 
 <?php
}
?>                 
     