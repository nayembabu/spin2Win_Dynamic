

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>






	<center><input type="text" name="" class="search_number_result" maxlength="11" size="25" style="font-size: 25px">
	<div style="color: red;" id="#errmsg"></div><br><br>

	<table border="1px" class="tableDataAssign"></table>
	<div border="1px" class="erroAssign"></div>
</center>

<script src="asset/jquery-3.min.js"></script>


<script type="text/javascript">
	$('.search_number_result').keyup(function() {
		var SearchMobileNum = $(this).val();
		var TableTop = '<tr><th>Mobile No</th><th>Win Result</th></tr>';
		if (SearchMobileNum.length != 11) {
		    $('.tableDataAssign').html('');	
		}else {
			$.ajax({
	              type: "GET",
	              url: "query_result.php?mob_no="+SearchMobileNum,
	              async: false,
	              success: function(response_text) {
		                var txtData = $.parseJSON(response_text);
                  if (txtData.mob_no == undefined) {
		                $('.erroAssign').html('');
		                $('.tableDataAssign').html('NO DATA FOUND');	
	            	}else {
		                var txtData = $.parseJSON(response_text);
		                console.log(response_text.mob_no);

		                var fullData = '<tr><td>'+txtData.mob_no+'</td><td>'+txtData.win_price+'</td></tr>';
		                $('.tableDataAssign').html(TableTop+' '+fullData);
		                $('.erroAssign').html('');	            		
	            	}

	              }
	        })
		}
	})



 $(".search_number_result").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
</script>



</body>
</html>