<style>
#submit .invalid{
	opacity: 0.5;
}

.invisible{
	display: none;	
}
</style>
<?php
error_reporting(0);
	if(isset($_POST['submit'])){
		
		if(isset($_POST["company_child"])){
	$combined = array_combine($_POST["company_child"], $_POST["child_reg_number"]);
	foreach($combined as $name => $reg){
		$row[] = $name." ".$reg;
	}
	$data = implode(": ", $row);
	}
	
	
	
	
	
	
		$result = mysqli_insert_array("clients", $_POST, "submit");
		$last_record = getLastRecord('clients','id');
					mysqli_query(conn(), "update clients set company_child='$data' where id ='$last_record'")or die(mysqli_error(conn()));
					mysqli_query(conn(), "update clients set company_parents_state='1' where company_parents_state='0' and id ='$last_record'")or die(mysqli_error(conn()));
				?>
				<script>
					location = 'index.php?page=new_client.php&success';
				</script>
				<?php
				audit("New Client","Created ".$_POST['company_name']);
	}
?>
<div class="col-md-12">
                            <div class="card">
							<div style="background-color :#193F72; padding:10px;">
                                    <h4 class="title"><font color="white">Create Client</font></h4>
                                </div>
                                <div class="card-content">
								
								<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										Client successfuly created!
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
									</div>
									
									<?php
								}
								?>
								
								
                                    <form method="post" action="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Client Name (Insert the full name of the organization, including "(PTY) LTD", etc)</label>
                                                    <input type="text" name="company_name" id="company_name" onkeyup="changeToUpperCase(this)" class="form-control" onkeyup="caps(this)" required>
													<input type="hidden" name="ref" value="<?php echo getLastRecord("clients","id")+1; ?>">
													<input type="hidden" name="date" onkeyup="changeToUpperCase(this)" id="date" class="form-control" value="<?php echo $date; ?>">
													<div id="company_name_validation"></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Client Registration Number</label>
                                                    <input type="text" name="company_reg_number" onkeyup="changeToUpperCase(this)" id="company_reg_number" OnKeypress="javascript:return isAlphaNumeric(event,this.value);" class="form-control" required>
													<div id="company_regnum_validation"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
											<label class="control-label">Relationship Owner</label>
                                                <div class="form-group label-floating">
												
                                                    <select required class="form-control" name="relationship_owner" id="relationship_owner">
													<option value="">Please select</option>
												<?php
												$qry = mysqli_query(conn(), "select * from users where access ='Auditor' and active_status ='1' order by name ASC");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['name']." ".$info['surname']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
											
											<div class="col-md-4">
                                                    <div style="margin-top: 59px;" id="city_result"></div>
											</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
											<label class="control-label">Industry</label>
                                                <div class="form-group label-floating">
												
                                                    <select required class="form-control" name="industry" id="industry">
													<option value="">Please select</option>
												<?php
												
												$qry = mysqli_query(conn(), "select * from industries where active_status ='1' and name!='Other' order by name ASC");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['name']; ?></option>
												<?php
												}
												

												$qry = mysqli_query(conn(), "select * from industries where active_status ='1' and name='Other' order by name ASC");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['name']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
                                            </div>
											
											<div class="row">
											<div class="col-md-12">
											<label class="control-label" style="font-size: 14px;">Is the financial information of this entity consolidated / amalgamated / equity accounted into the financial statements of any company
											 within the group structure?</label>
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="no_child" name="child_option" value="No" checked class="custom-control-input">
												  <label class="custom-control-label" style="margin-right: 50px;" for="no_child">No</label>
												  <input type="radio" id="has_child" name="child_option" value="Yes" class="custom-control-input">
												  <label class="custom-control-label" for="has_child">Yes</label>
												</div>
											</div>
										</div>
										
										<div class="form-group label-floating" id="child_div_hidden" hidden>
                                            
										
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Please state how many?</label>
													<label id="invalid_option" hidden><font color="red">Select a valid option!</font></label>
                                                    <select required class="form-control" name="parent_number" id="parent_number">
														<option value="">Select Option</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
                                                </div>
                                            </div>
                                            
                                        </div>	
										</div>
										
										<div class="form-group label-floating" id="parenting">
											
										</div>
										
										<div class="row">
										<div class="col-md-12">
										<div id="submit_validation" class="pull-right invisible"><font color="red">Please correct the errors above!</font></div>
										<div class="clearfix"></div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Add New Client</button>
										
										
                                        </div>
										</div>
                                    </form>
                                </div>
                            </div>
							
                        </div>
						
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript">

//company name validation

$(document).ready(function () {
	
	
//company_name validation	
 $("#company_name").on('keyup change blur', function () {
 var company_name = $(this).val();
 if (company_name == '') {
 $("#company_name_validation").html("");
 }else{
 $.ajax({
 url: "check_company.php?company_name="+company_name
 }).done(function( data ) {
	 if(data.length){
							disableSubmit();
						}
						else {
								enableSubmit()
						}
 $("#company_name_validation").html(data);
 }); 
 } 
 });
 
 
 
//company_reg_number validation
$('#company_reg_number').on('keyup change blur', function(){
			var company_reg_number = $(this).val();
			$.ajax({
					type: "GET",
					url: "check_company.php",
					data: {
						company_reg_number: company_reg_number,
						delpost: 1,
					},
					success: function(response){
						if(response.length){
							disableSubmit();
						}
						else {
								enableSubmit()
						}
						
						$("#company_regnum_validation").html(response);
					}
				});
		});

    $("#relationship_owner").change(function(){
		var e = document.getElementById ("relationship_owner");
		var strUser = e.options [e.selectedIndex] .value;
        $.ajax({url: "return.php?owner_id="+strUser, success: function(result){
            $("#city_result").html(result);
        }});
    });

$("#has_child").on('click', function(){
        $("#child_div_hidden").show('slow');
		$('#child_div_hidden').removeAttr('disabled');
		$('#child_div_hidden :input').attr('disabled', false);
    }); 
	
	$("#no_child").on('click', function(){
        $("#child_div_hidden").hide('slow');
		$('#child_div_hidden :input').attr('disabled', true);
		$('#parenting').hide('slow');
		$('#parenting :input').attr('disabled', true);
		enableSubmit();
    }); 
	
$("#parent_number").on('change', function(){
		var e = document.getElementById ("parent_number");
		var number = e.options [e.selectedIndex] .value;
        $.ajax({
					type: "GET",
					url: "loop_parents.php",
					data: {
						number: number,
					},
					success: function(response){
						if(response.length <= 1){
							$('#invalid_option').show();
							disableSubmit();
						}
						else{
						$('#invalid_option').hide();
						$("#parenting").html(response);
						enableSubmit();
						}
					}
				});
				
    });
	
function disableSubmit(){
	$('#submit_validation').removeClass('invisible');
	$('#submit').addClass('invalid');
	$('#submit').attr('disabled', true);
}

function enableSubmit(){
	$('#submit_validation').addClass('invisible');
	$('#submit').removeClass('invalid');
	$('#submit').attr('disabled', false);
}
function caps(element){

	    element.value = element.value.toUpperCase();

	}

 
});
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
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,' ');
}

    </script>

