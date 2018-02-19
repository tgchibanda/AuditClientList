
<div id = "result"></div>



<script src = "jquery-3.1.1.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		
		showPost();
		
		$(document).on('click', '#delete', function(){
		var r=confirm("About to delete user!");
			if (r==true)
				{

			var id = $(this).val();
				$.ajax({
					type: "POST",
					url: "remove.php",
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
	/*****	*****/
	});
	
	function showPost(){
		$.ajax({
			url: 'show_users.php',
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