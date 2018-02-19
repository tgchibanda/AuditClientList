<?php
include 'functions.php';
?>
<div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Engaged Clients</h4>
                                    <p class="category">Update engagement profile</p>
                                </div>
                                <div class="card-content">
								
								<div class="tab-pane" id="engaged">
                                            <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Registration Number</th>
                                            <th>Industry</th>
                                            <th>Parent(s)</th>
                                            <th>Relationship Owner</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry=mysqli_query(conn(), "SELECT
clients.id,
clients.date,
clients.company_name,
clients.company_reg_number,
clients.industry,
clients.company_child,
clients.relationship_owner,
clients.active_status,
clients.engagement_stage,
clients.engagement_status,
clients.child_reg_number,
clients.city,
clients.child_option,
users.`name`,
users.surname
FROM
clients ,
users
WHERE
clients.relationship_owner = users.id AND
clients.active_status = 1
")or die(mysqli_error(conn()));
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['company_name']; ?></td>
                                                <td><?php echo $info['company_reg_number']; ?></td>
												<td><?php echo $info['industry']; ?></td>
												<td><?php echo $info['company_child']; ?></td>
                                                <td><?php echo $info['name']." ".$info['surname']; ?></td>
												<td>
												
												
                                                            
															
															
													<div class="btn-group btn-group-xs">
													<div class="col-md-6">
													<button type="submit" name="profile" id="profile" value="<?php echo $info['id']; ?>" rel="tooltip" title="View Engagement Profile" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">library_books</i>
                                                    </button>
													</div>
													<div class="col-md-6">
													<?php
													$unique=mysqli_query(conn(), "select * from engagements where client='".$info['id']."' and (engagement_status = '1' or engagement_status = '2') and active_status='1'")or die(mysqli_error(conn()));
													$data = mysqli_fetch_array($unique);
													?>
													
													</div>
													
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