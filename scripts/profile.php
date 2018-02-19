<?php

	$qry = select_all_where('users','username',$_SESSION['username']);
	$row = mysqli_fetch_array($qry);
	
	if(isset($_POST['submit'])){
		
		$result = mysqli_update_array("users", $_POST, "submit", "username", $_SESSION['username']);

			if( $result['mysqli_error'] ) {
				echo "Query Failed: " . $result['mysqli_error'];
			} else {
				
				?>
				<script language="javascript">
					location='index.php?page=profile.php&success'
				</script>
				<?php
				audit("Profile Update", "Updated profile");
			}	
	}
?>
<div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Your Profile</h4>
                                    <p class="category">Update your profile</p>
                                </div>
                                <div class="card-content">
								
								<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										<?php echo $_SESSION['username']; ?> updated successfuly!
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									
									<?php
								}
								?>
								
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Company </label>
                                                    <input type="text" value="Nkonki" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fist Name</label>
                                                    <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" name="surname" value="<?php echo $row['surname']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adress</label>
                                                    <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" name="country" value="<?php echo $row['country']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contact</label>
                                                    <input type="text" name="contact" value="<?php echo $row['contact']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"> What are your duties?.</label>
                                                        <textarea class="form-control" name="role" rows="5"><?php echo $row['role']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
               