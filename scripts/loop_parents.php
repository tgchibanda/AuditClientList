<?php
include 'functions.php';
if(isset($_GET['number'])){
	
	if($_GET['number']==0){
		echo "1";
		exit;
	}
	else{
		for($i=0; $i<$_GET['number']; $i++){
	?>
		<div class="row">
                 <div class="col-md-6">
                     <div class="form-group label-floating">
                         <label class="control-label">Name of company (<?php echo $i+1; ?>) where financial information is included</label>
                         <input type="text" onkeyup="changeToUpperCase(this)" name="company_child[<?php echo $i; ?>]" id="company_child[<?php echo $i; ?>]" required class="form-control">
                     </div>
                 </div>
                 
				
					<div class="col-md-6">
						<div class="form-group label-floating">
							<label class="control-label">Registration number of company where financial information is included</label>
							<input type="text" onkeyup="changeToUpperCase(this)" OnKeypress="javascript:return isAlphaNumeric(event,this.value);" name="child_reg_number[<?php echo $i+1; ?>]" required id="child_reg_number[<?php echo $i+1; ?>]" 					                                                       class="form-control" required>
						</div>
					</div>
				</div>
					
	<?php
	}
	
	
	}
}
?>


