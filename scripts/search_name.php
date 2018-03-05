<input type="hidden" name="client_name" id="client_name" value="<?php echo $_POST['name']; ?>" class="form-control">
<div class="tab-pane" id="engaged">
                <table class="table">
					<thead class="text-primary" id="table_rangu">
						<th bgcolor="#cccccc">Client Name</th>
						<th bgcolor="#cccccc">Relationship Owner</th>
						<th bgcolor="#cccccc">PI Score</th>
						<th bgcolor="#cccccc"></th>
					</thead>
						
					<template id="engagement-data">
					<tr data-id="{{id}}">
						<td>{{company_name}}</td>
						<td>{{relationship_owner}}</td>
						<td>{{companies_act}}</td>
						<td><a href="index.php?page=edit_the_engagement.php&id={{id}}"><i class="fa fa-edit"></i></a></td>
					</tr>
					</template>
	
				</table>
	</div>
	
	<script>
$(function(){
	var eleVal = document.getElementById("client_name");
	console.log("We are searching for: "+ eleVal.value);
	
	var engagementsTemplate = $('#engagement-data').html();
	
	
	$table_rangu = $('#table_rangu');
	$.ajax({
		type: 'GET',
		url : 'slim/api/search_engagements_name',
		data : {
			name: eleVal.value,
		},
		success : function(data){
			$.each(JSON.parse(data), function(i, engagement){
				$table_rangu.append(Mustache.render(engagementsTemplate, engagement));
				});
		}
	});
	
	
	

		
									
});
</script>
