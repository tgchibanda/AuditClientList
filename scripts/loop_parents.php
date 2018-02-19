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
                 <div class="col-md-12">
                     <div class="form-group label-floating">
                         <label class="control-label">Parent Company (<?php echo $i+1; ?>) Name</label>
                         <input type="text" onkeyup="changeToUpperCase(this)" name="company_child[<?php echo $i; ?>]" required class="form-control">
                     </div>
                 </div>
                 
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">Registration Number</label>
							<input type="text" onkeyup="changeToUpperCase(this)" OnKeypress="javascript:return isAlphaNumeric(event,this.value);" name="child_reg_number[<?php echo $i+1; ?>]" required id="child_reg_number" 					                                                       class="form-control" required>
						</div>
					</div>
				</div>
					
	<?php
	}
	
	
	}
}
?>


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