<html lang="en">
<head>
    <title>Bootstrap Datepicker with format Example</title>  
    <link href="bootstrap-datepicker.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>  
    <script src="bootstrap-datepicker.js"></script>  
</head>
<body>


<input class="date form-control" style="width: 300px;" type="text">


<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm'
     });
</script>


</body>
</html>