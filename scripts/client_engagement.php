
<?php
//error_reporting(0);
	if(isset($_POST['submit'])){
		
	$qry = select_all_data_where("clients","id",$_POST['client']);
	$data =mysqli_fetch_array($qry);
	$company_name = $data['company_name'];
	$fields = $values = array();
		
		$result = mysqli_insert_array("engagements", $_POST, "submit");

			
				mysqli_query(conn(),"update clients set engagement_status='1' where id='$_POST[client]'") or die(mysqli_error());
				$info = mysqli_fetch_array($qry);
				audit("Client Engagement", "Engaged ".$company_name);

				?>
				<script>
					location = 'index.php?page=client_engagement.php&success';
				</script>
				<?php
	}
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
										Client engaged!
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
                                                    <label class="control-label" > Client Name (Select name from drop down list. If name does not exist, proceed to create 'New Client')</label>
														<select required class="form-control" name="client" id="client">
														<?php
														
														$qry = mysqli_query(conn(),"select * from clients where active_status='1' order by company_name ASC");
														while($info=mysqli_fetch_array($qry)){
															?>
																<option value="<?php echo $info['id']; ?>"><?php echo $info['company_name']."  ".$info['company_reg_number']; ?></option>
														<?php
														}
														?>
														</select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                            <label class="control-label">Engagement date as per Engagement Letter</label>
                                                <div class="form-group label-floating" style="margin:0 0 0 0;">
													<input class="date form-control" type="text" name="engagement_date" maxlength="7" required id="engagement_date">
												</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
											<label class="control-label">Engagement Partner</label>
                                                <div class="form-group label-floating">
												
                                                    <select required class="form-control" name="engaged_by" id="engaged_by">
													<option value="">Select Option</option>
												<?php
												$qry = select_all_where("users","access","Auditor");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option value="<?php echo $info['name']." ".$info['surname']; ?>"><?php echo $info['name']." ".$info['surname']; ?></option>
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
                                            <div class="row hidden">
											<div class="col-md-12">
											
										<input type="hidden" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
										<input type="hidden" name="engagement_id" id="engagement_id" class="form-control" value="<?php echo unique_key(); ?>">
											</div>
											
                                        </div>	
										<div class="row">
											<div class="col-md-12">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" id="assurance" name="assurance" value="Yes" required class="custom-control-input">
												  <label class="custom-control-label" for="assurance">Assurance Service</label>
												  <input type="radio" id="non_assurance" name="assurance" value="No" class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">Non Assurance Service</label>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-12">
											
											
                                                <div class="form-group label-floating" id="assurance_services" hidden disabled>
												<label class="control-label">Assurance Services</label><br>
													<select required class="form-control" name="engagement_type" id="engagement_type">
														<option value="">Select Option</option>
														<?php
															$qry = select_all_where("services","type","Assurance");
															while($info=mysqli_fetch_array($qry)){
														?>
																<option value="<?php echo $info['id']; ?>"><?php echo $info['name']; ?></option>
														<?php
														}
														?>
													</select>
                                                </div>
												
												<div class="form-group label-floating" id="non_assurance_services" hidden disabled>
												<label class="control-label">Non Assurance Services</label><br>
                                                    <select required class="form-control" name="engagement_type" id="engagement_type">
														<option value="">Select Option</option>
												<?php
												$qry = select_all_where("services","type","Non Assurance");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option value="<?php echo $info['id']; ?>"><?php echo $info['name']; ?></option>
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
												<textarea class="form-control" name="start_notes" id="start_notes" rows="5" onkeyup="changeToUpperCase(this)" required></textarea>
											  </div>
                                            </div>
                                            
                                        </div>
										
										<div id="more_options">
											
										</div>
											
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary pull-right">Engage Client</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
							
                        </div>

<script type="text/javascript">
    $('.date').datepicker({
       format: 'dd-mm-yyyy',
	   autoclose:true,
	   endDate: "today",
     });
</script>
	
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

		  function isAlphaNumericDate(t){
			console.log("text changed");
			 //onkeyup="isAlphaNumericDate(this)"
   var eleVal = document.getElementById(t.id);
   console.log("The value is: "+ eleVal);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,'/');
}

		 function changeToUpperCase(t) {
			console.log("text changed");
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   console.log("The value is: "+ eleVal);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,' ');
}



    </script>
