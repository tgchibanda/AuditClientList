<?php
include 'functions.php';
if(isset($_POST['show'])){		
						?>
						
						<div class="col-md-12">
                            <div class="card">
							
							
							
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Available System Users</h4>
                                    <p class="category">The list of system users</p>
                                </div>
								
                                <div class="card-content table-responsive">
								
									<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										User <?php echo $_SESSION['deleted_user']; ?> deleted successfuly!
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									
									<?php
								}
								?>
								
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Access</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry = select_all("users");
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['name']; ?></td>
                                                <td><?php echo $info['surname']; ?></td>
                                                <td><?php echo $info['email']; ?></td>
												<td><?php echo $info['contact']; ?></td>
												<td><?php echo $info['access']; ?></td>
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
						