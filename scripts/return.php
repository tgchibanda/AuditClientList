<link href="bootstrap-datepicker.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>  
    <script src="bootstrap-datepicker.js"></script>
	
	<style>
#font {
	font-size: 12px;
}
</style>
<?php
include 'functions.php';




if(isset($_GET['owner_id'])){
$str = $_GET['owner_id'];
$data = (explode(" ",$str));


$qry = select_all_data_where_and("users","name","$data[0]","surname","$data[1]");

$r =mysqli_fetch_array($qry);

$qry2 = select_all_data_where("sites","id","$r[city]");
$r2 =mysqli_fetch_array($qry2);
echo "<input type='text' name='city' id='city' value='".$r2['site_name']."' readonly class='form-control'><input type='hidden' name='user' id='user' value='".$r['id']."' readonly class='form-control'>";
}

if(isset($_GET['remove'])){

}


if(isset($_GET['more_options'])){
	
	if($_GET['more_options'] < 19 or $_GET['more_options'] == 28){
	?>
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">First Engagement Financial Year End For Which Assurance Given</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input class="date form-control" type="text" name="first_engagement_date" id="first_engagement_date">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Select rotation period (Per Quality Control Manual E10.1)</label>
													<select required class="form-control" name="rotation_period" id="rotation_period">
																<option value="" selected="selected">Select Option</option>
																<option>5</option>
																<option>7</option>
													</select>
												</div>
											</div>
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rotation Year (Financial Statement Year End)</label>
													<div class="next_years" id="next_years"><input type="text" value="Rotation years" class="form-control" readonly></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Anticipated Rotation Partner</label><br>
                                                    <select required class="form-control" name="anticipated_rotation_partner" id="anticipated_rotation_partner">
													<option value="">Please select</option>
												<?php
												$qry = select_all_where("users","access","Auditor");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['name']." ".$info['surname']; ?></option>
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
													
													<input type="text" name="group_structure" id="group_structure" class="form-control" onkeyup="changeToUpperCase(this)" required/>
													
													</div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Public Interest Score (PIS)</label>
													<div class="companies_act" id="companies_act">
													<input type="text" name="companies_act" OnKeypress="javascript:return isNumberKey(event);" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
											
                                            <div class="col-md-4">
											<label class="control-label" id="font">Public Interest Entity (PIE)? Refer to section 290.25 and 290.26 of the IRBA Code of proffessional conduct.</label>
                                            </div>
											
											<div class="col-md-8">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" required id="irba_code" name="irba_code" value="Yes" class="custom-control-input">
												  <label class="custom-control-label" for="irba_code">Yes</label>
												  <input type="radio" id="non_assurance" name="irba_code" value="No" class="custom-control-input">
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
												  <input type="radio" required id="isqc_1" name="isqc_1" value="Yes" class="custom-control-input">
												  <label class="custom-control-label" for="isqc_1">Yes</label>
												  <input type="radio" id="non_assurance" name="isqc_1" value="No" class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">No</label>
												</div>
											</div>
											
                                            </div>
											
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Type of Audit/Assurance work</label>
                                                    <select class="form-control" name="assurance_work" id="assurance_work">
													<option value="0">Please select</option>
												<?php
												$qry = select_all_where("assurance_work","active_status","1");
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
                                                <div class="form-group label-floating">
												<label class="control-label">Is the entity JSE listed / Subsidiary of listed Company? (JSE listed Select 'L' / Subsidiary of listed company Select 'SL')</label><br>
                                                    <select required class="form-control" name="jse_listed" id="jse_listed">
													<option value="">Select Option</option>
													<option>L</option>
													<option>SL</option>
													<option>No</option>
												</select>
                                                </div>
                                            </div>
                                            </div>

											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Year / Period end of AFS</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input type="text" name="year_of_afs" required class="date2 form-control">
													</div>
												</div>
											</div>
											
											
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Accounting Framework</label>
                                                    <select class="form-control" name="accounting_framework" id="accounting_framework">
													<option value="0">Please select</option>
												<?php
												$qry = select_all_where("accounting_framework","active_status","1");
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
											
											<div class="other_accounting_framework" id="other_accounting_framework">
											
											</div>


											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Estimated Client Turnover for review period</label>
													<div class="client_turnover" >
													<input type="text" name="client_turnover" id="client_turnover" onkeyup="changeToUpperCase(this)" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>


											
											
	<?php
	}
	else{
		//no extra options selected
	}
}

?>
<script>
document.getElementById("first_engagement_date").addEventListener("focusout", myFunction);

function myFunction() {
    $('#rotation_period option').prop('selected', function() {
        return this.defaultSelected;
    });
	//$('select[name='rotation_period'] option[value=""]').attr('selected', 'selected');
	//$("select[name='rotation_period'] option[value='5']").attr('selected', 'selected');
}
</script>

<script type="text/javascript">
    $('.date').datepicker({
       format: 'dd-mm-yyyy',
	   autoclose:true,
	   endDate: "today",
     });
</script>

<script type="text/javascript">
    $('.date2').datepicker({
       format: 'dd-mm'
     });
</script>

<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script>
$(document).ready(function () {
	
	$("#rotation_period").change(function(){
		var $initial = document.getElementById("first_engagement_date").value;

		console.log("Initial date is: "+$initial);

		var e = document.getElementById ("rotation_period");
		var years_selected = e.options [e.selectedIndex] .value;
		console.log(years_selected);
		$.ajax({url: "return_date.php?days="+years_selected+"&initial="+$initial, success: function(result){
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