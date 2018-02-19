<?php
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';

if(isset($_POST['id'])){
	
	$qry = select_all_data_where("clients","id",$_POST['id']);
	$data =mysqli_fetch_array($qry);
	$company_name = $data['company_name'];
	$company_email = $data['company_email'];
	$company_contact = $data['company_contact'];
	$company_city = $data['company_city'];
	$company_country = $data['company_country'];
	$company_id = $data['id'];
	
	
	
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

.form-group {
    padding-bottom: 0px;
    /* margin: 27px 0 0 0; */
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  font-family: Raleway;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #193F72;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #193F72;
}
</style>
<body>
						<div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Client Engagement Form</h4>
                                    <p class="category">Please fill in all details</p>
                                </div>
                                <div class="card-content">
									<div class="row">
										<div class="col-lg-12 offset-5" align="center">
											<form id="regForm" action="insert_engagement.php" method="post">
											  <!-- Hidden values to be submitted -->
													<input type="hidden" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
													<input type="hidden" name="client" id="client" class="form-control" value="<?php echo $company_id; ?>">
													<input type="hidden" name="engagement_id" id="engagement_id" class="form-control" value="<?php echo unique_key(); ?>">
													
													
													
											  <!-- One "tab" for each step in the form: -->
											  <div class="tab"><h3>Client Details</h3>
												<p><input placeholder="Client Name" value="<?php echo $company_name; ?>" disabled oninput="this.className = ''"></p>
												<p><input placeholder="Client Email" value="<?php echo $company_email; ?>" disabled oninput="this.className = ''"></p>
												<p><input placeholder="Client Contact" value="<?php echo $company_contact; ?>" disabled oninput="this.className = ''"></p>
												<p><input placeholder="Client City" value="<?php echo $company_city; ?>" disabled oninput="this.className = ''"></p>
												<p><input placeholder="Client Country" value="<?php echo $company_country; ?>" disabled oninput="this.className = ''"></p>
											  </div>
											  <div class="tab"><h3>Engaged By Details</h3>
												<label class="control-label pull-left"><h4>Who engaged the client?</h4></label>
												<select class="form-control" name="engaged_by" id="engaged_by">
												<?php
												$qry = select_all_where("users","access","Auditor");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['name']." ".$info['surname']; ?></option>
												<?php
												}
												?>
												</select>
												<label class="control-label pull-left"><h4>Engagement Status</h4></label>
												<select class="form-control" name="engagement_status" id="engagement_status">
														<option selected value="1">Awaiting Confirmation</option>
														<option value="2">Confirmed</option>
												</select>
											  </div>
											  <div class="tab"><h3>Contact Person Details</h3>
												<p><input placeholder="Name and Surname" oninput="this.className = ''" name="contact_person" id="contact_person" type="text"></p>
												<p><input placeholder="Email" oninput="this.className = ''" name="contact_email" id="contact_email" type="email"></p>
												<p><input placeholder="Contact Number" oninput="this.className = ''" name="contact_number" id="contact_number" type="text"></p>
											  </div>
											  <div class="tab"><h3>Engagement Details</h3>
											  
												<label class="control-label pull-left"><h4>Engagement Type</h4></label>
												<select class="form-control" name="engagement_type" id="engagement_type">
												<?php
												$qry = select_all("engagement_types");
												while($info=mysqli_fetch_array($qry)){
													?>
														<option><?php echo $info['type_name']; ?></option>
												<?php
												}
												?>
												</select>
												<label class="control-label pull-left"><h4>Engagement Date</h4></label>
												<p><input placeholder="Engagement Date" oninput="this.className = ''" type="date" name="engagement_date" id="engagement_date"></p>
												<p><input placeholder="Duration (days)" oninput="this.className = ''" name="expected_end_date" id="expected_end_date" type="text"></p>
												<label class="control-label pull-left"><h4>Engagement Notes</h4></label>
												<textarea class="form-control" name="start_notes" id="start_notes" rows="5" placeholder="Please enter notes here if you have any!"></textarea>
											  </div>
											  <div style="overflow:auto;">
												<div style="float:right;">
												  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
												  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
												</div>
											  </div>
											  <!-- Circles which indicates the steps of the form: -->
											  <div style="text-align:center;margin-bottom:40px;">
												<span class="step"></span>
												<span class="step"></span>
												<span class="step"></span>
												<span class="step"></span>
											  </div>
											</form>
										</div>
									</div>
								</div>
						</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>
<?php
}
?>