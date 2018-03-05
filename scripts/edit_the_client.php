<?php
$qry = mysqli_query(conn(), "SELECT
*
FROM
clients 
WHERE
id = '$_REQUEST[id]'");

while($info = mysqli_fetch_array($qry)){
?>

<style>
#submit .invalid{
	opacity: 0.5;
}

.invisible{
	display: none;	
}
</style>
<?php
//error_reporting(0);
	if(isset($_POST['submit'])){

        if(isset($_POST["company_child"])){
            $combined = array_combine($_POST["company_child"], $_POST["child_reg_number"]);
            foreach($combined as $name => $reg){
                $row[] = $name." ".$reg;
            }
            $data = implode(": ", $row);
            }
	
					mysqli_query(conn(), "update clients set company_child = '$data' where id='$_REQUEST[id]'")or die(mysqli_error(conn()));
                    mysqli_query(conn(), "update clients set 
                                                    clients.company_name='$_POST[company_name]',
                                                    clients.company_reg_number='$_POST[company_reg_number]',
                                                    clients.industry='$_POST[industry]',
                                                    clients.relationship_owner='$_POST[relationship_owner]',
                                                    clients.child_option='$_POST[child_option]',
                                                    clients.parent_number='$_POST[parent_number]',
                                                    clients.ref='$_POST[company_reg_number]',
                                                    clients.city='$_POST[city]' where id='$_REQUEST[id]'
                    ")or die(mysqli_error(conn()));
				?>
				<script>
					location = 'index.php?page=edit_the_client.php&success=success&id=<?php echo $_REQUEST['id']; ?>';
				</script>
				<?php
				audit("New Client","Created ".$_POST['company_name']);
	}
?>
<div class="col-md-12">
                            <div class="card">
							<div style="background-color :#193F72; padding:10px;">
                                    <h4 class="title"><font color="white">Edit Client</font></h4>
                                </div>
                                <div class="card-content">
								
								<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										Client successfuly edited!
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
                                                    <label class="control-label">Client Name</label>
                                                    <input type="text" name="company_name" id="company_name" value="<?php echo $info['company_name']; ?>" onkeyup="changeToUpperCase(this)" class="form-control" onkeyup="caps(this)">
										
													<div id="company_name_validation"></div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Client Registration Number</label>
                                                    <input type="text" name="company_reg_number" value="<?php echo $info['company_reg_number']; ?>" onkeyup="changeToUpperCase(this)" id="company_reg_number" OnKeypress="javascript:return isAlphaNumeric(event,this.value);" class="form-control" required>
													<div id="company_regnum_validation"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
												<label class="control-label">Relationship Owner</label>
                                                    <select required class="form-control" name="relationship_owner" id="relationship_owner">
													<option value="">Please select</option>
												<?php
												$b = select_all_data_where("users","access","Auditor");
												while($a=mysqli_fetch_array($b)){
													?>
														<option <?php if($a['name']." ".$a['surname'] == $info['relationship_owner']) echo "selected"; ?>><?php echo $a['name']." ".$a['surname']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
											
											<div class="col-md-4" style="margin-top:0px;">
                                                    <div id="city_result"><input type='text' name='city' id='city' value='<?php echo $info['city']; ?>' readonly class='form-control'></div>
											</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Industry</label>
                                                    <select required class="form-control" name="industry" id="industry">
                                                    <option value="">Please select</option>
												<?php
												$d = select_all_where("industries","active_status","1");
												while($e=mysqli_fetch_array($d)){
													?>
														<option <?php if($e['name'] == $info['industry']) echo "selected"; ?>><?php echo $e['name']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
                                            </div>
											
											<div class="row">
											<div class="col-md-12">
											<label class="control-label" style="font-size: 14px;">Is the financial information of this entity consolidated / amalgamated into the financial statements of any company
											 within the group structure?</label>
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="no_child" name="child_option" value="No" <?php if ($info['child_option'] == "No") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" style="margin-right: 50px;" for="no_child">No</label>
												  <input type="radio" id="has_child" name="child_option" value="Yes" <?php if ($info['child_option'] == "Yes") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="has_child">Yes</label>
												</div>
											</div>
										</div>
										
                                        
										<div class="form-group label-floating" id="child_div_hidden" <?php if ($info['child_option'] == "No" || $info['child_option'] == "") echo "hidden"; ?>>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group label-floating">
                                                    <label class="control-label">Please state how many?</label>
                                                        <label id="invalid_option" hidden><font color="red">Select a valid option!</font></label>
                                                        <select required class="form-control" name="parent_number" id="parent_number">
                                                            <option value="">Select Option</option>
                                                            <option <?php if($info['parent_number'] == 1) echo "selected"; ?>>1</option>
                                                            <option <?php if($info['parent_number'] == 2) echo "selected"; ?>>2</option>
                                                            <option <?php if($info['parent_number'] == 3) echo "selected"; ?>>3</option>
                                                            <option <?php if($info['parent_number'] == 4) echo "selected"; ?>>4</option>
                                                            <option <?php if($info['parent_number'] == 5) echo "selected"; ?>>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>	
										</div>
										
										<div class="form-group label-floating" id="parenting">
                                       <?php
                                         if($info['parent_number']==0){
                                                //echo "1";
                                                //exit;
                                            }
                                            else{
                                                for($i=0; $i<$info['parent_number']; $i++){

                                                    $db = $info['company_child'];
                                                    $data = (explode(":",$db));

                                                    //echo $data[$i];

                                                    $fields = (explode(" ",$data[$i]));

                                                   // echo $fields[$i]." ".$fields[$i+1];
                                            ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Parent Company (<?php echo $i+1; ?>) Name</label>
                                                    <input type="text" onkeyup="changeToUpperCase(this)" value="<?php echo $fields[$i]; ?>" name="company_child[<?php echo $i; ?>]" id="company_child[<?php echo $i; ?>]" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Registration Number</label>
                                                    <input type="text" onkeyup="changeToUpperCase(this)" value="<?php echo $fields[$i+1]; ?>" OnKeypress="javascript:return isAlphaNumeric(event,this.value);" name="child_reg_number[<?php echo $i+1; ?>]" required id="child_reg_number[<?php echo $i+1; ?>]" 					                                                       class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                            
	<?php
	}
	
	
    }
    ?>
										</div>
										
										<div class="row">
										<div class="col-md-12">
										<div id="submit_validation" class="pull-right invisible"><font color="red">Please correct the errors above!</font></div>
										<div class="clearfix"></div>
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Update Client Details</button>
										
										
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
							//disableSubmit();
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

<?php
}
?>	