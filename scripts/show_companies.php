<?php
include 'functions.php';
if(isset($_POST['show'])){		
						?>
						
						<div class="col-md-12">
                            <div class="card">
							
							
							
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Available Groups</h4>
                                    <p class="category">The list of group companies.</p>
                                </div>
								
                                <div class="card-content table-responsive">
								
									<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										Group deleted successfuly!
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									
									<?php
								}
								?>
								
								

	<div class="row">
		<div class="col-md-6">
			<div class="form-group label-floating">
                <label class="control-label">New Group Name</label>
                <input type="text" name="group_name" id="group_name" class="form-control" required>
			</div>		
		</div>
		<div class="col-md-6">
			<div class="btn-group btn-group-xs"><br>
				<button type="submit" name="add_group" id="add_group" class="btn btn-success center-block">Add Group</button>
														
			</div>		
		</div>
	</div>
<br>
<hr>
<br>
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Date</th>
                                            <th>Name</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry = select_all("group_companies");
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['date']; ?></td>
                                                <td><?php echo $info['group_name']; ?></td>
												<td>
													<div class="btn-group btn-group-xs">
													<button type="submit" name="delete" id="delete" value="<?php echo $info['id']; ?>" class="btn btn-danger">Delete</button>
														
													</div>
														
												</td>
                                            </tr>
											<?php
												}
											
											?>
											
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
<?php
}
?>
						