<?php
include 'functions.php';
if(isset($_POST['show'])){		
						?>
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-nav-tabs">
                                <div class="card-header" style="background-color :#193F72;">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <span class="nav-tabs-title">Clients:</span>
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#all_clients" data-toggle="tab">
                                                        <i class="material-icons">account_balance</i> Clients Engagements
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#engaged" data-toggle="tab">
                                                        <i class="material-icons">done</i> Engaged Clients
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#settings" data-toggle="tab">
                                                        <i class="material-icons">done_all</i> Clients Records
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="all_clients">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
											<th>Last Audit</th>
											<th>Total Audits</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry = select_all_where("clients","engagement_status", "0");
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['company_name']; ?></td>
                                                <td><?php echo $info['company_email']; ?></td>
												<td><?php echo $info['company_contact']; ?></td>
												<td><?php echo $info['company_address']; ?></td>
                                                <td><?php echo $info['company_city']; ?></td>
												<td><?php echo $info['company_country']; ?></td>
												<td><?php if(getLastAudit($info['id'])){ echo getLastAudit($info['id']); } else echo "No record"; ?></td>
												<td><?php if(auditCount($info['id'])){ echo auditCount($info['id']); } else echo "0"; ?></td>
                                                <td>
												
												<?php
													
														$now = time(); // or your date as well
														$your_date = strtotime(getLastAudit($info['id']));
														$datediff = $now - $your_date;
														$passed_days =  floor($datediff / (60 * 60 * 24));

												?>
												
													<div class="btn-group btn-group-xs">
													<div class="col-md-6">
													<button <?php if($passed_days < 365) { ?> disabled <?php } ?> type="submit" name="engage" id="engage" value="<?php echo $info['id']; ?>" rel="tooltip" title="Engage Client" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">exit_to_app</i>
                                                    </button>
													</div>
													<div class="col-md-6">
													<button type="submit" name="delete" id="delete" value="<?php echo $info['id']; ?>" rel="tooltip" title="Delete Client" class="btn btn-danger btn-simple btn-xs">
                                                                <i class="material-icons">close</i>
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
                                        <div class="tab-pane" id="engaged">
                                            <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
											<th>Last Audit</th>
											<th>Total Audits</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry=mysqli_query(conn(), "select * from clients where (engagement_status = '1' or engagement_status = '2') and active_status='1'")or die(mysqli_error(conn()));
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['company_name']; ?></td>
                                                <td><?php echo $info['company_email']; ?></td>
												<td><?php echo $info['company_contact']; ?></td>
												<td><?php echo $info['company_address']; ?></td>
                                                <td><?php echo $info['company_city']; ?></td>
												<td><?php echo $info['company_country']; ?></td>
												<td><?php if(getLastAudit($info['id'])){ echo getLastAudit($info['id']); } else echo "No record"; ?></td>
												<td><?php if(auditCount($info['id'])){ echo auditCount($info['id']); } else echo "0"; ?></td>
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
													<button type="submit" name="remove" id="remove" 
													value="<?php echo $data['engagement_id']; ?>" rel="tooltip" title="Remove Recent Engagement" class="btn btn-danger btn-simple btn-xs">
                                                                <i class="material-icons">close</i>
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
                                        <div class="tab-pane" id="settings">
                                            <table class="table">
                                        <thead class="text-primary">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Country</th>
											<th>Last Audit</th>
											<th>Total Audits</th>
											<th></th>
                                        </thead>
                                        <tbody>
										
										<?php
										
											$qry = select_all("clients","engagement_status");
											while($info=mysqli_fetch_array($qry)){
										?>
                                            <tr>
                                                <td><?php echo $info['company_name']; ?></td>
                                                <td><?php echo $info['company_email']; ?></td>
												<td><?php echo $info['company_contact']; ?></td>
												<td><?php echo $info['company_address']; ?></td>
                                                <td><?php echo $info['company_city']; ?></td>
												<td><?php echo $info['company_country']; ?></td>
												<td><?php if(getLastAudit($info['id'])){ echo getLastAudit($info['id']); } else echo "No record"; ?></td>
												<td><?php if(auditCount($info['id'])){ echo auditCount($info['id']); } else echo "0"; ?></td>
                                                <td>
												
												
                                                            
															
															
													<div class="btn-group btn-group-xs">
													<div class="col-md-6">
													<button type="submit" name="profile" id="profile" value="<?php echo $info['id']; ?>" rel="tooltip" title="View Engagement Profile" class="btn btn-primary btn-simple btn-xs">
                                                                <i class="material-icons">library_books</i>
                                                    </button>
													</div>
													<div class="col-md-6">
													<button type="submit" name="delete" id="delete" value="<?php echo $info['id']; ?>" rel="tooltip" title="Delete Client" class="btn btn-danger btn-simple btn-xs">
                                                                <i class="material-icons">close</i>
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
                            </div>
                        </div>
						
                        
 <?php
}
?>                 
               