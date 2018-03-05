<style>
tr td .edit {
	display:none;
}
tr td.edit .edit{
	display:initial;
}
tr  td.edit .noedit {
	display:none;
}

</style>
<div class="card">
								<div style="background-color :#193F72; padding:10px;">
                                    <h4 class="title"><font color="white">Edit Clients</font></h4>
                                </div>
    <div class="card-content">
	
	
	<div class="row">
        <div class="col-md-12">
            <div class="form-group label-floating">
                <label class="control-label"><font color="green" size="+1"><i class="fa fa-search"></i></font> Search By Client Name</label>
                <input type="text" name="client_name" id="client_name" onkeyup="searchName(this)" class="form-control">
            </div>
        </div>
    </div>
										
										
		<div id="result"></div>
</div>
	





<script src = "jquery-3.1.1.js"></script>
<script src = "mustache.js"></script>
<script>
$(document).ready(function(){
	showEngagements();		

function showEngagements(){
		$.ajax({
			url: 'clients_data.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#result').html(response);
			}
		});
	}


	
	});
	
	function searchName(t) {
			console.log("text changed");
			 //onkeyup="changeToUpperCase(this)"
   var eleVal = document.getElementById(t.id);
   console.log("The value is: "+ eleVal.value);
   $.ajax({
			url: 'search_client.php',
			type: 'POST',
			async: false,
			data:{
				name: eleVal.value
			},
			success: function(response){
				$('#result').html(response);
			}
		});
}
</script>
