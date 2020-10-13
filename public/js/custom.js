$(document).ready(function(){
    $('#dnh').datetimepicker({
                sideBySide: true,
                minDate: new Date()
            });


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

	$('input[name="name"]').keyup(function(){
        clearTimeout(timeoutId); // doesn't matter if it's 0
        var text = $(this).val();
        timeoutId = setTimeout(loadName(text), 250);
	});

    var loaded = false;

    function loadName(text) {
        if (text == '') {
            $('.name-dropdown ul').slideUp('slow');
        } else {

            if(loaded) return;

            $.ajax(
              {
                url: base_url + '/get_name/'+text,
                type:'GET',
                dataType : "json",
                beforeSend: function (){
                    //show loading
                    $('.lds-facebook').removeClass('hide');
                    $('.name-dropdown ul').slideUp();
                },
                success:function(data)
                {
                    console.log(data);
                    loaded = false;
                    $('.name-dropdown ul').html('');
                    if (data.length > 0) {
                        elem = '';
                        $.each(data, function(index, item) {
                            elem += '<li class="mt-list-item">';
                            elem += '<div class="list-item-content">';                   
                            elem += '<a href="javascript:;">';
                            elem += '<div class="name-dropdown-content" data-id = "'+item.id+'" data-name="'+item.name+'" data-dept_name="'+item.dept_name+'">';
                            elem += item.name;
                            elem += '</div></a></div></li>';
                        });
                        $('.name-dropdown ul').append(elem);
                    }

                    $('.lds-facebook').addClass('hide');
                    $('.name-dropdown ul').slideDown('slow');
                },
                error:function(xhr,status,error)
                {
                    alert("Please try again later.");
                }
              });

            loaded = true;
        }
    }


    // DROPDOWN TYPE CLICK
    $("#type").change(function() {
        // jQuery
        var selectedVal = $(this).find(':selected').val();
        var selectedText = $(this).find(':selected').text();

        console.log(selectedVal);

        if (selectedVal == 1) {
            $('#dnh').data("DateTimePicker").destroy();
            $('#dnh').datetimepicker({
                sideBySide: true,
                format: 'L',
                maxDate: new Date()
            });
        } else if (selectedVal == 3) {
            $('#dnh').data("DateTimePicker").destroy();
            $('#dnh').datetimepicker({
                sideBySide: true,
                format: 'LT'
            });
        } else {
            $('#dnh').data("DateTimePicker").destroy();
            $('#dnh').datetimepicker({
                sideBySide: true,
                minDate: new Date()
            });
        }
    });
});