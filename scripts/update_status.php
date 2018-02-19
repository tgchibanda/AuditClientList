<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<style>
#yea {
	width: 50%;
	align: center;
	
}
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
  width: 100%;
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


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<style>
#yea {
	width: 50%;
	align: center;
	
}
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
  width: 100%;
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
<?php
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';

if(isset($_POST['delpost'])){
$engagement_id = $_POST['useid'];
?>

<div class="card">
                                <div class="card-header" style="background-color :#193F72;">
                                    <h4 class="title">Close Engagement</h4>
                                    <p class="category">Update engagement profile</p>
                                </div>
                                <div class="card-content">
	<div class="tab-pane" id="finalize_engagement">
													<div class="row">
														<div id="yea" class="col-md-6 col-md-offset-3" align="center">
															<form id="regForm" action="close_engagement.php" method="post">
															<!-- Hidden fields -->
														  <input type="hidden" name="captured_by" id="captured_by" class="form-control" value="<?php echo $_SESSION['username']; ?>">
														  <input type="hidden" name="engagement_id" id="engagement_id" class="form-control" value="<?php echo $engagement_id; ?>">
														  <input type="hidden" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
														  
														  
														  <!-- One "tab" for each step in the form: -->
														  <div class="tab"><h3>Auditor's Remarks</h3>
															<label class="control-label pull-left"><h4>Audit Rating</h4></label>
															<select class="form-control" name="auditor_rating" id="auditor_rating">
																	<option selected>Good</option>
																	<option>Bad</option>
															</select>
															<label class="control-label pull-left"><h4>Auditor's Remarks</h4></label>
															<textarea class="form-control" name="auditor_remarks" id="auditor_remarks" rows="5" placeholder="Please enter your closing remarks" required></textarea>
														  </div>
														  <div class="tab"><h3>Contact Person's Remarks</h3>
															<label class="control-label pull-left"><h4>Audit Rating</h4></label>
															<select class="form-control" name="contact_rating" id="contact_rating">
																	<option selected>Good</option>
																	<option>Bad</option>
															</select>
															<label class="control-label pull-left"><h4>Contact Person's Remarks</h4></label>
															<textarea class="form-control" name="contact_remarks" id="contact_remarks" rows="5" placeholder="Please enter your closing remarks" required></textarea>
														  </div>
														  <div class="tab"><h3>Audit Closing Details</h3>
														  
															<label class="control-label pull-left"><h4>End Date</h4></label>
															<p><input placeholder="End Date" oninput="this.className = ''" type="date" name="end_date" id="end_date"></p>
															<label class="control-label pull-left"><h4>Engagement Notes</h4></label>
															<textarea class="form-control" name="closing_notes" id="closing_notes" rows="5" placeholder="Please enter notes here if you have any!"></textarea>
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
											</div>
<?php
}
?>
											
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
    document.getElementById("nextBtn").innerHTML = "Finalize Project";
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