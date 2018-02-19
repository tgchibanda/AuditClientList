
<?php

	if(isset($_POST['submit'])){
		
		$result = mysqli_insert_array("users", $_POST, "submit");

			if( $result['mysqli_error'] ) {
				echo "Query Failed: " . $result['mysqli_error'];
			} else {
				
				?>
				
				<script language="javascript">
					location='index.php?page=new_user.php&success'
				</script>
				<?php
				
				audit("New User", "Created ".$_POST['username']."");
			}	
	}
?>
<div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Register Partner</h4>
                                    <p class="category">Create new profile</p>
                                </div>
                                <div class="card-content">
								
								<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										User successfuly created!
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									
									<?php
								}
								?>
								
								
                                    <form method="post" action="">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fist Name</label>
                                                    <input type="text" name="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" name="surname" class="form-control" required>
                                                <input type="hidden" name="access" value="Auditor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">IRBA Registration Number</label>
                                                    <input type="text" name="irba" class="form-control" required>
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Office</label>
                                                    <select class="form-control" name="client" id="client">
														<?php
														$qry = select_all_where("sites","active_status","1");
														while($info=mysqli_fetch_array($qry)){
															?>
																<option value="<?php echo $info['site_name']; ?>"><?php echo $info['site_name']; ?></option>
														<?php
														}
														?>
														</select>
                                                </div>
                                            </div>
                                        </div>
										<button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Add Member</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
							
                        </div>
						
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript">

//username validation

$(document).ready(function () {
 $("#username").blur(function () {
 var username = $(this).val();
 if (username == '') {
 $("#username_validation").html("");
 }else{
 $.ajax({
 url: "check.php?username="+username
 }).done(function( data ) {
 $("#username_validation").html(data);
 }); 
 } 
 });
 
 
 //email validation
 $("#email").blur(function () {
 var email = $(this).val();
 if (email == '') {
 $("#email_validation").html("");
 }else{
 $.ajax({
 url: "check.php?email="+email
 }).done(function( data ) {
 $("#email_validation").html(data);
 }); 
 } 
 });
 
 
 
});
</script>

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
                        
               