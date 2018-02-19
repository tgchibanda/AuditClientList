
<div id = "result"></div>



<script src = "jquery-3.1.1.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		
		showPost();
		
		$(document).on('click', '#delete', function(){
		var r=confirm("About to delete client!");
			if (r==true)
				{

			var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "delete_company.php",
					data: {
						id: id,
						delpost: 1,
					},
					success: function(){
						demo.showNotification('top','right', '2', 'Client has been deleted');
						showPost();
					}
				});
				
		}
		else {
			showPost();
		}
		});
		
		$(document).on('click', '#remove', function(){
		var r=confirm("About to remove engagement!");
			if (r==true)
				{

			var engagement_id = $(this).val();
				$.ajax({
					type: "POST",
					url: "delete_engagement.php",
					data: {
						engagement_id: engagement_id,
						delpost: 1,
					},
					success: function(){
						demo.showNotification('top','right', '2', 'Recent client engagement been deleted');
						showPost();
					}
				});
				
		}
		else {
			showPost();
		}
		});
		
		
		
	/***** Click Management	*****/
	
	$(document).on('click', '#engage', function(){
		var r=confirm("About to engage client!");
			if (r==true)
				{

			var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "new_engagement.php",
					data: {
						id: id,
						delpost: 1,
					},
					success: function(response){
						$('#result').html(response);
					}
				});
				
		}
		else {
			showPost();
		}
		});
		
		
		
		
		$(document).on('click', '#profile', function(){
			var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "engagement_profile.php",
					data: {
						id: id,
						delpost: 1,
					},
					success: function(response){
						$('#result').html(response);
					}
				});
		});
		
		
		
		
		$(document).on('click', '#update_status', function(){
			var update_status_engagement_id = $(this).val();
				$.ajax({
					type: "POST",
					url: "update_status.php",
					data: {
						useid: update_status_engagement_id,
						delpost: 1,
					},
					success: function(response){
						$('#result').html(response);
					}
				});
		});
		
		
		
		
		
		$(document).on('click', '#add_notes', function(){
			var engagement_id = $(this).val();
				$.ajax({
					type: "POST",
					url: "add_notes.php",
					data: {
						engagement_id: engagement_id,
						delpost: 1,
					},
					success: function(response){
						$('#result').html(response);
					}
				});
		});
		
		
		
		
		
		
		
		$(document).on('click', '#submit_engagement_update', function(){
			var eid = post_engagement_id.value;
			var es = engagement_status.value;
			var en = engagement_notes.value;
			
			$.ajax({
					type: "POST",
					url: "update_engagement.php",
					data: {
						engagement_id: eid,
						engagement_status: es,
						engagement_notes: en,
						delpost: 1,
					},
					success: function(response){
						demo.showNotification('top','right', '2', 'Project status has been updated');
						showPost();
					}
				});
		});
		
		
		
		
		
		
		$(document).on('click', '#insert_project_notes', function(){
			var eid = nengagement_id.value;
			var nc = notes_category.value;
			var nd = project_notes_details.value;
			
			$.ajax({
					type: "POST",
					url: "insert_project_notes.php",
					data: {
						nengagement_id: eid,
						notes_category: nc,
						project_notes_details: nd,
						delpost: 1,
					},
					success: function(response){
						demo.showNotification('top','right', '2', 'Project notes have been added');
						showPost();
					}
				});
		});
		
		
		$(document).on('click', '#view_audit_report', function(){
			var repid = $(this).val();
			var w = window.open();
			$.ajax({
					type: "POST",
					url: "full_detail.php",
					data: {
						reportid: repid,
						delpost: 1,
					},
					success: function(response){
						$(w.document.body).html(response);
					}
				});
		});
		
		
		
		
		/***** End *****/
	});
	
	
	function showPost(){
		$.ajax({
			url: 'reports.php',
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
	
</script>
</html>