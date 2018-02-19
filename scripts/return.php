<style>
#font {
	font-size: 12px;
}
</style>
<?php
include 'functions.php';




if(isset($_GET['owner_id'])){
$qry = select_all_data_where("users","id","$_GET[owner_id]");
$r =mysqli_fetch_array($qry);
echo "<input type='text' name='city' id='city' value='".$r['city']."' readonly class='form-control'>";
}




if(isset($_GET['more_options'])){
	
	if($_GET['more_options']==1){
	?>
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">First Engagement Financial Year End For Which Assurance Given</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input class="form-control" type="date" name="first_engagement_date" id="first_engagement_date">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Select rotation period (Per Quality Control Manual E10.1)</label>
													<select class="form-control" name="rotation_period" id="rotation_period">
																<option>Select Option</option>
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
												<label class="control-label">Anticipated Rotation Partner</label>
                                                    <select class="form-control" name="anticipated_rotation_partner" id="anticipated_rotation_partner">
													<option value="0">Please select</option>
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
													<div class="group_structure" id="group_structure">
													<input type="text" onkeyup="changeToUpperCase(this)" name="group_structure" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Public Interest Score (PIS)</label>
													<div class="companies_act" id="companies_act">
													<input type="number" name="companies_act" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
											
                                            <div class="col-md-4">
											<label class="control-label" id="font">Public Interest Entity (PIE)? Refer to section 290.25 and 290.26 of the IRBA Code of proffessional conduct.</label>
                                            </div>
											
											<div class="col-md-8">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" id="irba_code" name="irba_code" value="Yes" class="custom-control-input">
												  <label class="custom-control-label" for="irba_code">Yes</label>
												  <input type="radio" id="non_assurance" name="irba_code" value="No" class="custom-control-input">
												  <label class="custom-control-label" for="non_assurance">No</label>
												</div>
											</div>
											
                                            </div>
											
											<div class="row">
											
                                            <div class="col-md-4">
											<label class="control-label" id="font">Was an Engagement Quality Control Review (EQCR) performed?</label>
                                            </div>
											
											<div class="col-md-8">
												<div class="custom-control custom-radio custom-control-inline">
												  <input type="radio" id="isqc_1" name="isqc_1" value="Yes" class="custom-control-input">
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
                                                    <label class="control-label">Fee per engagement letter</label>
													<div class="amount_billed" id="amount_billed">
													<input type="number" name="amount_billed" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">JSE listed / Subsidiary of listed Company</label>
                                                    <select class="form-control" name="jse_listed" id="jse_listed">
													<option>L</option>
													<option>SL</option>
												</select>
                                                </div>
                                            </div>
                                            </div>

											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Year / Period end of AFS</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input type="date" name="year_of_afs" required class="form-control">
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
                                                    <label class="control-label">Client Turnover for review period</label>
													<div class="client_turnover" id="client_turnover">
													<input type="text" name="client_turnover" onkeyup="changeToUpperCase(this)" required class="form-control"></div>
                                                </div>
                                            </div>
                                            </div>
											
	<?php
	}
	
	elseif($_GET['more_options']==12 or $_GET['more_options']==13 or $_GET['more_options']==7){
	?>
											<div class="col-md-12">
												<label class="control-label">First Engagement Financial Year End For Which Assurance Given</label>
													<div class="form-group label-floating" style="margin:0 0 0 0;">
														<input class="form-control" type="date" name="first_engagement_date" id="first_engagement_date">
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-md-12">
												<label class="control-label">Select rotation period (Quality Control Manual E10.1)</label>
													<select class="form-control" name="rotation_period" id="rotation_period">
																<option>Select Option</option>
																<option>5</option>
																<option>7</option>
													</select>
												</div>
											</div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Rotation Year</label>
													<div class="next_years" id="next_years"><input type="text" value="Rotation years" class="form-control" readonly></div>
                                                </div>
                                            </div>
                                            </div>
											<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
												<label class="control-label">Anticipated Rotation Partner</label>
                                                    <select class="form-control" name="anticipated_rotation_partner" id="anticipated_rotation_partner">
													<option value="0">Please select</option>
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
	<?php
	}
	else{
		//no extra options selected
	}
}

?>
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script>
$(document).ready(function () {
	
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
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   eleVal.value= eleVal.value.toUpperCase().replace(/ /g,'');
}

    </script>