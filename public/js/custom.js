$(document).ready(function(){
	$('#dnh').datetimepicker();

	// LOAD TYPE
	$.ajax(
              {
                url: base_url + '/get_type',
                type:'GET',
                dataType : "json",
                success:function(data)
                {
                	$('#type').text('');
                	var html = "<option value='' disabled selected>TYPE</option>";
                	$.each(data, function(index, item) {
                		html += "<option value='"+item.id+"'>"+item.type+"</option>";
                	});
                	$('#type').append(html);
                },
                error:function(xhr,status,error)
                {
                    alert("Please try again later.");
                }
              });

    var timeoutId = 0;

	$('input[name="name"]').keydown(function(){
        clearTimeout(timeoutId); // doesn't matter if it's 0
        timeoutId = setTimeout(tempFunc, 500);
	});

    function tempFunc() {
        $.ajax(
              {
                url: base_url + '/get_type',
                type:'GET',
                dataType : "json",
                beforeSend: function (){
                    //show loading
                    $('.lds-facebook').removeClass('hide');
                    $('.name-dropdown ul').slideUp('slow');
                },
                success:function(data)
                {
                    console.log(data);
                    $('.lds-facebook').addClass('hide');
                    $('.name-dropdown ul').slideDown('slow');
                },
                error:function(xhr,status,error)
                {
                    alert("Please try again later.");
                }
              });
    }
});