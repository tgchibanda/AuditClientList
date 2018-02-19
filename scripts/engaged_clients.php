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
    <div class="card-header" style="background-color :#193F72;">
        <h4 class="title">Engaged Clients</h4>
        <p class="category">Update engagement profile</p>
    </div>
    <div class="card-content">
	
		<div class="tab-pane" id="engaged">
                <table class="table">
					<thead class="text-primary" id="table_rangu">
						<th>Client Name</th>
						<th>Registration Number</th>
						<th>Type Of Engagement</th>
						<th>Type Of Service</th>
						<th>Date Engaged</th>
						<th>Date Resigned</th>
					</thead>
						
					<template id="engagement-data">
					<tr data-id="{{id}}">
						<td>{{company_name}}</td>
						<td>{{company_reg_number}}</td>
						<td>{{service_type}}</td>
						<td>{{service_name}}</td>
						<td>{{engagement_date}}</td>
						<td class="editDate">
						<span class="noedit date">{{date_resigned}}</span>
						<input class="edit date" type="date" /><br>
						<button class="btn btn-success btn-xs edit saveEdit">Save</button>
						<button class="btn btn-warning btn-xs edit cancelEdit">Cancel</button>
						</td>
					</tr>
					</template>
	
				</table>
	</div>
</div>
	





<script src = "jquery-3.1.1.js"></script>
<script src = "mustache.js"></script>
<script>
$(function(){
	
	var engagementsTemplate = $('#engagement-data').html();
	
	
	$table_rangu = $('#table_rangu');
	$.ajax({
		type: 'GET',
		url : 'http://localhost/takunda/nkonki/scripts/slim/api/engagements',
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
		url : 'http://localhost/takunda/nkonki/scripts/slim/api/engagements/update/'+ $tr.attr('data-id'),
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
