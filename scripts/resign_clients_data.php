<script src="sweetalert.min.js"></script>
<input type="hidden" name="x" id="x" class="form-control">
<div class="tab-pane" id="engaged">
                <table class="table">
					<thead class="text-primary" id="table_rangu">
						<th bgcolor="#cccccc">Client Name</th>
						<th bgcolor="#cccccc">Relationship Owner</th>
						<th bgcolor="#cccccc">PI Score</th>
						<th bgcolor="#cccccc">Resignation Date</th>
						<th bgcolor="#cccccc">Termination</th>
					</thead>
						
					<template id="engagement-data">
					<tr data-id="{{id}}">
						<td>{{company_name}}</td>
						<td>{{relationship_owner}}</td>
						<td>{{companies_act}}</td>
                        <td class="editDate">
						<span class="noedit date">{{date_resigned}}</span>
						<input class="edit date" type="date" /><br>
						<button class="btn btn-success btn-xs edit saveEdit">Save</button>
						<button class="btn btn-warning btn-xs edit cancelEdit">Cancel</button>
						</td>
						<td><button class="btn btn-success btn-xs terminate">Terminate</button></td>
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



	$(document).on('click',".terminate",function (e) {
		var $tr = $(this).closest('tr');

		swal({
  title: "Are you sure?",
  text: "Terminating Engagement",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Engagement has been terminated!", {
      icon: "success",
    });

	$.ajax({
		type: 'put',
		url : 'slim/api/engagements/terminate/'+ $tr.attr('data-id'),
		success : function(data){
			console.log("Testing: "+JSON.stringify(data));
			//location='index.php?page=resign.php';
			},
			error: function(){
				alert('error updating');
			}
		});

  } else {
    swal("Engagement not terminated!");
  }
});
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
