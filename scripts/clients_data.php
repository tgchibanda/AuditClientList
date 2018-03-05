
<input type="hidden" name="x" id="x" class="form-control">
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
	
	var Template = $('#clients-data').html();
	
	
	$table_rangu = $('#table_rangu');
	$.ajax({
		type: 'GET',
		url : 'slim/api/clients',
		success : function(data){
			$.each(JSON.parse(data), function(i, engagement){
				$table_rangu.append(Mustache.render(Template, engagement));
				});
		}
	});
	

		
									
});
</script>
