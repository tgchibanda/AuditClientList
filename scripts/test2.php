<div class="input-append date" id="datepicker" data-date="02-2012" 
     data-date-format="mm-yyyy">

 <input  type="text" readonly="readonly" name="date" >    
 <span class="add-on"><i class="icon-th"></i></span>      
</div>      
<script>
$(function(){
    $("#datepicker").datepicker({
        viewMode: 'years',
         format: 'mm-yyyy'
    });
});
</script>