
<div id = "result"></div>



<script src = "jquery-3.1.1.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		
		showPost();
		
		$(document).on('click', '#delete', function(){
		var r=confirm("About to delete company!");
			if (r==true)
				{

			var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "delete_group_company.php",
					data: {
						id: id,
						delpost: 1,
					},
					success: function(){
						showPost();
					}
				});
				
		}
		else {
			showPost();
		}
		});
	/***** Add group company	*****/
	
	
	$(document).on('click', '#add_group', function(){
		

			var group_name = document.getElementById('group_name').value;
				$.ajax({
					type: "POST",
					url: "add_group_company.php",
					data: {
						group_name: group_name,
						add_group: 1,
					},
					success: function(){
						showPost();
					}
				});
		
		});
		
		
	});
	
	function showPost(){
		$.ajax({
			url: 'show_companies.php',
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