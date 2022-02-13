$(document).ready(function() {
	$("#short-url").click(function(){
		var url = $("#long-url").val();
		var title = $("#url-title").val();
		if(url && title){
			$.ajaxSetup({
          		headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		}
        	});
        	$.ajax({
               type:'POST',
               url:'/short-url',
               data:{
                url:url,
                title:title,
               },
				success: function(result){
					$("#table-sec").html(result);
					$("#long-url").val('');
					$("#url-title").val('');
				}	
			});
		}
		else{
			alert("URL and Title field are required");
		}
	});

	$(document).on('click', '.copy-btn', function() {
		var copy_val = $("#hidden-"+this.id).val();
		navigator.clipboard.writeText(copy_val);
	});

});