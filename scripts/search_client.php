
<input type="hidden" name="client_name" id="client_name" value="<?php echo $_POST['name']; ?>" class="form-control">
<div class="tab-pane" id="engaged">
<table class="table">
					<thead class="text-primary" id="table_rangu">
						<th bgcolor="#cccccc">Reg Number</th>
						<th bgcolor="#cccccc">Client Name</th>
						<th bgcolor="#cccccc">Industry</th>
						<th bgcolor="#cccccc">Relationship Owner</th>
						<th bgcolor="#cccccc"></th>
					</thead>
						
					<template id="clients-data">
					<tr data-id="{{id}}">
						<td>{{company_reg_number}}</td>
						<td>{{company_name}}</td>
						<td>{{industry}}</td>
						<td>{{relationship_owner}}</td>
						<td><a href="index.php?page=edit_the_client.php&id={{id}}"><i class="fa fa-edit"></i></a></td>
					</tr>
					</template>
	
				</table>
	</div>
	
	<script>
$(function(){
	var eleVal = document.getElementById("client_name");
	console.log("We are searching for: "+ eleVal.value);
	
	var Template = $('#clients-data').html();
	
	
	$table_rangu = $('#table_rangu');
	$.ajax({
		type: 'GET',
		url : 'slim/api/clientSearch',
		data : {
			name: eleVal.value,
		},
		success : function(data){
			$.each(JSON.parse(data), function(i, engagement){
				$table_rangu.append(Mustache.render(Template, engagement));
				});
		}
	});
	
	
	

		
									
});
</script>
