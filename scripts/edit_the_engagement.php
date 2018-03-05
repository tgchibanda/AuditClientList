<?php
error_reporting(0);
	if(isset($_POST['submit'])){

   if($_POST['assurance'] == 'No'){
    mysqli_query(conn(),"update engagements set 
    engagements.assurance ='$_POST[assurance]',
    engagements.engaged_by ='$_POST[engaged_by]',
    engagements.city ='$_POST[city]',
    engagements.rotation_year ='',
    engagements.isqc_1 ='',
    engagements.rotation_period ='',
    engagements.group_structure ='',
    engagements.engagement_type ='$_POST[engagement_type]',
    engagements.jse_listed ='',
    engagements.irba_code ='',
    engagements.audit_required ='',
    engagements.first_engagement_date ='',
    engagements.anticipated_rotation_partner ='',
    engagements.start_notes ='$_POST[start_notes]',
    engagements.client_turnover ='',
    engagements.year_of_afs ='',
    engagements.assurance_work ='',
    engagements.accounting_framework ='',
    engagements.companies_act ='',
    engagements.engagement_date ='$_POST[engagement_date]'
    where id='$_REQUEST[id]'") or die(mysqli_error());
   }
   else {
                mysqli_query(conn(),"update engagements set 
                engagements.assurance ='$_POST[assurance]',
                engagements.engaged_by ='$_POST[engaged_by]',
                engagements.rotation_year ='$_POST[rotation_year]',
                engagements.isqc_1 ='$_POST[isqc_1]',
                engagements.city ='$_POST[city]',
                engagements.rotation_period ='$_POST[rotation_period]',
                engagements.group_structure ='$_POST[group_structure]',
                engagements.engagement_type ='$_POST[engagement_type]',
                engagements.jse_listed ='$_POST[jse_listed]',
                engagements.irba_code ='$_POST[irba_code]',
                engagements.audit_required ='$_POST[audit_required]',
                engagements.first_engagement_date ='$_POST[first_engagement_date]',
                engagements.anticipated_rotation_partner ='$_POST[anticipated_rotation_partner]',
                engagements.start_notes ='$_POST[start_notes]',
                engagements.client_turnover ='$_POST[client_turnover]',
                engagements.year_of_afs ='$_POST[year_of_afs]',
                engagements.assurance_work ='$_POST[assurance_work]',
                engagements.accounting_framework ='$_POST[accounting_framework]',
                engagements.companies_act ='$_POST[companies_act]',
                engagements.engagement_date ='$_POST[engagement_date]'
                where id='$_REQUEST[id]'") or die(mysqli_error());
   }


				$info = mysqli_fetch_array($qry);
				audit("Engagement edit", "Edited ".$_REQUEST['id']);

				?>
				<script>
					location = 'index.php?page=edit_the_engagement.php&success=success&id=<?php echo $_REQUEST['id']; ?>';
				</script>
				<?php
	}
?>



















<?php
$qry = mysqli_query(conn(), "SELECT
clients.date,
clients.company_name,
clients.relationship_owner,
clients.ref,
clients.city,
clients.company_reg_number,
engagements.id,
engagements.assurance,
engagements.date_resigned,
engagements.engaged_by,
engagements.rotation_year,
engagements.companies_act,
engagements.isqc_1,
engagements.rotation_period,
engagements.group_structure,
engagements.editable,
engagements.engagement_type,
engagements.jse_listed,
engagements.irba_code,
engagements.audit_required,
engagements.first_engagement_date,
engagements.anticipated_rotation_partner,
engagements.start_notes,
engagements.client_turnover,
engagements.amount_billed,
engagements.year_of_afs,
engagements.assurance_work,
engagements.accounting_framework,
engagements.companies_act,
engagements.engagement_date,
services.`name` AS service_name,
services.type AS service_type
FROM
clients ,
engagements ,
services
WHERE
(clients.ref = engagements.client or clients.id = engagements.client) AND
engagements.engagement_type = services.id AND 
engagements.id = '$_REQUEST[id]'
ORDER BY
engagements.id ASC");

while($info = mysqli_fetch_array($qry)){
?>

<div class="col-md-12">
                            <div class="card">
							<div style="background-color :#193F72; padding:10px;">
                                    <h4 class="title"><font color="white">Engage Client</font></h4>
                                </div>
                                <div class="card-content">
								
								<?php
								
								if(isset($_GET['success'])==true){
									?>
									<div class="alert alert-success" id="delete_user" role="alert">
										Engagement Updated!
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
                                                    <label class="control-label" > Client Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $info['company_name']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                            <label class="control-label">Engagement Date As Per Engagement Letter</label>
                                                <div class="form-group label-floating" style="margin:0 0 0 0;">
													<input class="form-control" type="text" name="engagement_date" value="<?php echo $info['engagement_date']; ?>" required id="engagement_date">
												</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group label-floating">
												<label class="control-label">Engagement Partner</label><br>
                                                <select requireds class="form-control" name="engaged_by" id="engaged_by">
														<option value="">Select Option</option>
															<?php
															$q = select_all_where("users","access","Auditor");
															while($n=mysqli_fetch_array($q)){
																$who = $n['name']." ".$n['surname'];
																$og = $info['engaged_by'];
																?>
																	
																	<option value="<?php echo $who; ?>" <?php if ($who == $og) echo "selected"; ?>><?php echo $who; ?></option>
															<?php
															}
															?>
													</select>
                                                </div>
                                            </div>
											<div class="col-md-4">
                                                    <div id="city_result"><input type='text' name='city' style='margin-top: 48px;' id='city' value='<?php echo $info['city']; ?>' readonly class='form-control'></div>
											</div>
                                            </div>
                                            
										<div class="row">
											<div class="col-md-12">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="assurance" name="assurance" value="Yes" <?php if ($info['assurance'] == "Yes") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="assurance">Assurance Service</label>
												  <input type="radio" id="non_assurance" name="assurance" value="No" <?php if ($info['assurance'] == "No") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">Non Assurance Service</label>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
											
                                           

                                                <div class="form-group label-floating" id="assurance_services" <?php if ($info['assurance'] == "No"){ echo "hidden"; }  ?>>
												<label class="control-label">Assurance Services</label><br>
													<select required class="form-control" name="engagement_type" id="engagement_type">
														<option value="">Select Option</option>
														<?php
															$s = select_all_where("services","type","Assurance");
															while($t=mysqli_fetch_array($s)){
														?>
																<option value="<?php echo $t['id']; ?>"  <?php if ($t['id'] == $info['engagement_type']) echo "selected"; ?>><?php echo $t['name']; ?></option>
														<?php
														}
														?>
													</select>
                                                </div>
                                                   
                                                            

                                                    
												<div class="form-group label-floating" id="non_assurance_services" <?php if ($info['assurance'] == "Yes"){ echo "hidden"; }  ?>>
												<label class="control-label">Non Assurance Services</label><br>
                                                    <select required class="form-control" name="engagement_type" id="engagement_type">
														<option value="">Select Option</option>
												<?php
												$k = select_all_where("services","type","Non Assurance");
												while($j=mysqli_fetch_array($k)){
													?>
														<option value="<?php echo $j['id']; ?>" <?php if ($j['id'] == $info['engagement_type']) echo "selected"; ?>><?php echo $j['name']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
												

                                          

                                            </div>
										</div>
										
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label pull-left"><h4>Brief Description Of Engagement</h4></label>
												<textarea class="form-control" name="start_notes" id="start_notes" rows="5" onkeyup="changeToUpperCase(this)" required><?php echo $info['start_notes']; ?></textarea>
											  </div>
                                            </div>
                                            
                                        </div>
										
										<div id="more_options">
											










<?php


                                                    	if($info['engagement_type'] < 19 or $info['engagement_type'] == 28){
	?>
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">First Engagement Financial Year End For Which Assurance Given</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input class="form-control" type="text" name="first_engagement_date" value="<?php echo $info['first_engagement_date']; ?>" id="first_engagement_date">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Select rotation period (Per Quality Control Manual E10.1)</label><br>
													<select required class="form-control" name="rotation_period" id="rotation_period">
                                                    
																<option value="">Select Option</option>
																<option <?php if ('5' == $info['rotation_period']) echo "selected"; ?>>5</option>
																<option <?php if ('7' == $info['rotation_period']) echo "selected"; ?>>7</option>
													</select>
												</div>
											</div>
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rotation Year (Financial Statement Year End)</label>
													<div class="next_years" id="next_years"><input type="text" value="<?php echo $info['rotation_year']; ?>" class="form-control" readonly></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Anticipated Rotation Partner</label><br>
                                                    <select required class="form-control" name="anticipated_rotation_partner" id="anticipated_rotation_partner">
													<option value="">Select Option</option>
															<?php
															$q = select_all_where("users","access","Auditor");
															while($n=mysqli_fetch_array($q)){
																$who = $n['name']." ".$n['surname'];
																$og = $info['anticipated_rotation_partner'];
																?>
																	
																	<option value="<?php echo $who; ?>" <?php if ($who == $og) echo "selected"; ?>><?php echo $who; ?></option>
															<?php
															}
															?>
													</select>
                                                </div>
                                            </div>
                                            </div>


											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Who is the highest level SA parent entity audited by NKONKI</label>
													<div class="group_structure" id="">
													
													<input type="text" name="group_structure" value="<?php echo $info['group_structure']; ?>" id="group_structure" required class="form-control" onkeyup="changeToUpperCase(this)" />
													
													</div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Public Interest Score (PIS)</label>
													<div class="companies_act" id="companies_act">
													<input type="text" name="companies_act" value="<?php echo $info['companies_act']; ?>" OnKeypress="javascript:return isNumberKey(event);" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
											
                                            <div class="col-md-4">
											<label class="control-label" id="font">Public Interest Entity (PIE)? Refer to section 290.25 and 290.26 of the IRBA Code of proffessional conduct.</label>
                                            </div>
											
											<div class="col-md-8">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="irba_code" name="irba_code" value="Yes" <?php if ($info['irba_code'] == "Yes") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="irba_code">Yes</label>
												  <input type="radio" id="non_assurance" name="irba_code" value="No" <?php if ($info['irba_code'] == "No") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">No</label>
												</div>
											</div>
											
                                            </div>
											
											<div class="row">
											
                                            <div class="col-md-4">
											<label class="control-label" id="font">Is an Engagement Quality Control Review (EQCR) required, with reference to the Nkonki Quality Control Manual?</label>
                                            </div>
											
											<div class="col-md-8">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="isqc_1" name="isqc_1" value="Yes" <?php if ($info['isqc_1'] == "Yes") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="isqc_1">Yes</label>
												  <input type="radio" id="non_assurance" name="isqc_1" value="No" <?php if ($info['isqc_1'] == "No") echo "checked"; ?> class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">No</label>
												</div>
											</div>
											
                                            </div>
											
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Type of Audit/Assurance work</label><br>
                                                    <select required class="form-control" name="assurance_work" id="assurance_work">
													<option value = "">Please select</option>
												<?php
												$a = select_all_where("assurance_work","active_status","1");
												while($b=mysqli_fetch_array($a)){
													?>
                                                        <option value="<?php echo $b['name']; ?>" <?php if ($b['name'] == $info['assurance_work']) echo "selected"; ?>><?php echo $b['name']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
                                            </div>



											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">JSE listed / Subsidiary of listed Company</label><br>
                                                    <select required class="form-control" name="jse_listed" id="jse_listed">
													<option value="">Select Option</option>
													<option <?php if ('L' == $info['jse_listed']) echo "selected"; ?>>L</option>
													<option <?php if ('SL' == $info['jse_listed']) echo "selected"; ?>>SL</option>
												</select>
                                                </div>
                                            </div>
                                            </div>

											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Year / Period end of AFS</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input type="text" name="year_of_afs" value="<?php echo $info['year_of_afs']; ?>" required class="form-control">
													</div>
												</div>
											</div>
											
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Accounting Framework</label><br>
                                                    <select required class="form-control" name="accounting_framework" id="accounting_framework">
													<option value="">Please select</option>
												<?php
												$l = select_all_where("accounting_framework","active_status","1");
												while($m=mysqli_fetch_array($l)){
													?>
                                                    <option <?php if ($m['name'] == $info['accounting_framework']) echo "selected"; ?>><?php echo $m['name']; ?></option>
												<?php
												}
												?>
												</select>
                                                </div>
                                            </div>
                                            </div>
											
											<div class="other_accounting_framework" id="other_accounting_framework">
                                            <?php if($info['accounting_framework'] == 'Other'){?> <input type="text" placeholder="Enter Other Accounting Framework" value="<?php echo $info['accounting_framework']; ?>" name="accounting_framework" class="form-control" required /><?php } ?>
											</div>


											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Estimated Client Turnover for review period</label>
													<div class="client_turnover" >
													<input type="text" name="client_turnover" value="<?php echo $info['client_turnover']; ?>" id="client_turnover" onkeyup="changeToUpperCase(this)" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>


<?php
														}
														?>




										</div>
											
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Update Engagement</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
							
                        </div>
						
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script>
$(document).ready(function () {
	
	
$("#engaged_by").change(function(){
		var e = document.getElementById ("engaged_by");
		var strUser = e.options [e.selectedIndex] .value;
        $.ajax({url: "return.php?owner_id="+strUser, success: function(result){
            $("#city_result").html(result);
        }});
    });
	
	$("#assurance").click(function(){
        $("#non_assurance_services").hide('slow');
        $("#assurance_services").show('slow');
		
		$('#non_assurance_services :input').attr('disabled', true);
		$('#assurance_services :input').removeAttr('disabled');
    });
    $("#non_assurance").click(function(){
        $("#assurance_services").hide('slow');
        $("#non_assurance_services").show('slow');
		
		$('#assurance_services :input').attr('disabled', true);
		$('#non_assurance_services :input').removeAttr('disabled');
		
		$.ajax({url: "return.php?remove=yes", success: function(result){
            $("#more_options").html(result);
        }});
    });
	
$("#engagement_type").change(function(){
		var e = document.getElementById ("engagement_type");
		var option_selected = e.options [e.selectedIndex] .value;
        $.ajax({url: "return.php?more_options="+option_selected, success: function(result){
            $("#more_options").html(result);
        }});
    });	
		
    $("#rotation_period").change(function(){
		var e = document.getElementById ("rotation_period");
		var years_selected = e.options [e.selectedIndex] .value;
		console.log(years_selected);
		$.ajax({url: "return_date.php?days="+years_selected, success: function(result){
            $("#next_years").html("<input type='text' name='rotation_year' id='rotation_year' class='form-control' readonly value='"+result+"'>");
        }});
	});	


$("#accounting_framework").change(function(){
		var e = document.getElementById ("accounting_framework");
		var f_selected = e.options [e.selectedIndex] .value;
		console.log(f_selected);
		$.ajax({url: "return_other.php?f="+f_selected, success: function(result){
            $("#other_accounting_framework").html(result);
        }});
	});	


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
			console.log("text changed");
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   console.log("The value is: "+ eleVal);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,' ');
}



    </script>


    <?php
}
?>