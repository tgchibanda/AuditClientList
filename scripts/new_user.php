
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
                                <div style="background-color :#193F72; padding:10px;">
                                    <h4 class="title"><font color="white">Register Partner</font></h4>
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
                                                    <input type="text" name="name" id="name" onkeyup="changeToUpperCase(this)" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" name="surname" id="surname" onkeyup="changeToUpperCase(this)" class="form-control" required>
                                                <input type="hidden" name="access" value="Auditor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">IRBA Registration Number</label>
                                                    <input type="text" name="irba" id="irba" OnKeypress="javascript:return isNumberKey(event);" class="form-control">
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Office</label>
                                                    <select class="form-control" name="client" id="client">
														<?php
                                                        $qry = mysqli_query(conn(), "select * from sites where active_status ='1' order by site_name ASC");
                                            
														while($info=mysqli_fetch_array($qry)){
															?>
																<option value="<?php echo $info['id']; ?>"><?php echo $info['site_name']; ?></option>
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
                        

<script language="javascript" type="text/javascript">
function isNumberKey(evt){ // Numbers only
//OnKeypress="javascript:return isNumberKey(event);"
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
     function isAlphaNumeric(e){ // Alphanumeric only
	 //OnKeypress="javascript:return isAlphaNumeric(event,this.value);"
            var k;
            document.all ? k=e.keycode : k=e.which;
            return((k>47 && k<58)||(k>64 && k<91)||(k>96 && k<123)||k==0);
         }

		 function changeToUpperCase(t) {
			console.log("text changed");
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   console.log("The value is: "+ eleVal);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,' ');
}



    </script>