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
                                            <th>Client Name</th>
                                            <th>Registration Number</th>
                                            <th>Type Of Engagement</th>
                                            <th>Type Of Service</th>
                                            <th>Date Engaged</th>
											<th>Date Resigned</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry=mysqli_query(conn(), "SELECT
																			clients.date,
																			clients.company_name,
																			clients.id,
																			clients.company_reg_number,
																			engagements.assurance,
																			engagements.date_resigned,
																			engagements.editable,
																			engagements.engagement_date,
																			services.`name` AS service_name,
																			services.type AS service_type
																			FROM
																			clients ,
																			engagements ,
																			services
																			WHERE
																			(clients.engagement_status = '1' OR
																			clients.engagement_status = '2') AND
																			clients.active_status = '1' AND
																			clients.id = engagements.client AND
																			engagements.engagement_type = services.id")or die(mysqli_error(conn()));
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['company_name']; ?></td>
                                                <td><?php echo $info['company_reg_number']; ?></td>
												<td><?php echo $info['service_type']; ?></td>
												<td><?php echo $info['service_name']; ?></td>
                                                <td><?php echo $info['engagement_date']; ?></td>
												<td>
												<div id="the_date_resigned" class="delete">
													x
												</div>
												</td>
                                                <td>
												
												
                                                            
															
															
													<div class="btn-group btn-group-xs">
													<div class="col-md-4">
													<button type="submit" name="profile" id="profile" value="<?php echo $info['id']; ?>" rel="tooltip" title="View Engagement Profile" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">library_books</i>
                                                    </button>
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
										<script>
										$(function(){
											var item = document.getElementById('the_date_resigned');
											item.addEventListener('click', editDate);
											function editDate(e){
												console.log("clicked");
											}
										});
										</script>