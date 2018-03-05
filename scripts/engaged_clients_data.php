<input type="hidden" name="x" id="x" class="form-control">
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
	
	var engagementsTemplate = $('#engagement-data').html();
	
	
	$table_rangu = $('#table_rangu');
	$.ajax({
		type: 'GET',
		url : 'slim/api/engagements',
		success : function(data){
			$.each(JSON.parse(data), function(i, engagement){
				$table_rangu.append(Mustache.render(engagementsTemplate, engagement));
				});
		}
	});
	
	$(document).on('click',".editDate",function () {        
        var $td = $(this).closest('td');
			$td.find('input.date_resigned').val($td.find('span.date').html());
			$td.addClass('edit');
    });
	
	$(document).on('click',".cancelEdit",function (e) {
	var $td = $(this).closest('td');
	$td.removeClass('edit');
	e.stopPropagation();	
    });
	
	$(document).on('click',".saveEdit",function (e) {
	var $tr = $(this).closest('tr');
	var $td = $(this).closest('td');
	var $val = $td.find('input.date').val();
	
	var newDate = {
		date_resigned: $td.find('input.date').val()
	};
	
	
	
	
	str = JSON.stringify(newDate);
	str = JSON.stringify(newDate, null, 4); // (Optional) beautiful indented output.
	console.log(str); 



	 $.ajax({
		type: 'put',
		url : 'slim/api/engagements/update/'+ $tr.attr('data-id'),
		data: newDate,
		success : function(data){
			console.log("Testing: "+JSON.stringify(data));
			$td.find('span.date').html(newDate.date_resigned);
			},
			error: function(){
				alert('error updating');
			}
		});
	
	$td.removeClass('edit');
	e.stopPropagation();
		
		
    });	
		
									
});
</script>
