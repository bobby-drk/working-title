$(function() {
	$('[data-toggle="tooltip"]').tooltip();

	$('.form-control.attach_loader input').focus(
		function(){
			$(this).parent().addClass("frm_ctrl_focus");
		}).blur(
		function(){
			$(this).parent().removeClass('frm_ctrl_focus');
		});

	    // Initialize ajax autocomplete:
    $('.get_friends').autocomplete({
        serviceUrl: '/api/f',
        dataType: "json",
        type: "post",
        minChars: 3,
        params: {"_token" : $('meta[name="csrf-token"]').attr('content') },
        paramName : "email",
        deferRequestBy : 500,
        onSelect: function(suggestion) {
             // alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
             $(this).val(suggestion.data);
        },
        onSearchStart: function (query) {
        	$(this).nextAll('.friend_email_loader:first').show();
        },
        onSearchComplete: function (query, suggestions) {
        	$(this).nextAll('.friend_email_loader:first').hide();
        },
		formatResult: function (suggestion, currentValue) {
			return suggestion.data + " (" + suggestion.value +")";
		},
    });

    $("#connect_friend").click(function () {

         message_hide();

        $('#friend_connect_loader').show();
		var data_array = {
			"_token" : $('meta[name="csrf-token"]').attr('content') ,
			"email" : $('#friends_emails').val()
		};

        $.post("/api/f/c", data_array, function (_response) {
            if(_response.status == 1) {
                //clean remove friend list
                $("#friend_list").html('');
                $('#friends_emails').val('');

                for(i in _response.friends) {

                    var noob = "";
                    var noob_name = "";

                    if(_response.most_recent == _response.friends[i]['id']) {
                        noob = "success flash";
                        noob_name = _response.friends[i]['first_name'] + " " + _response.friends[i]['last_name'];
                    }

                    var li = $('<li>', {
                        class: "list-group-item " + noob,
                        text: _response.friends[i]['first_name'] + " " + _response.friends[i]['last_name']
                    }).appendTo('#friend_list');

                    var span = $('<span>', {
                        class : 'element_delete text-danger pull-right',
                        'data-id' : _response.friends[i]['id'],
                        html : "<i class='glyphicon glyphicon-remove-sign'></i>"

                    }).appendTo(li);

                }

                message ("You are now connected to " + noob_name, 'alert-success')

            } else {

                message ("Error: Friend didn't add pleace contact admin", 'alert-danger')
            }

        }).always(function (){
            $('#friend_connect_loader').hide();
        });

    });

    $(document).on("click",'.element_delete', function (){
        message_hide();
        $('#friend_connect_loader').show();
        var id = $(this).data("id");
        var element = $(this);
        var ex_friend = element.parent().text();

        if(id > 0) {
            var data_array = {
                "_token" : $('meta[name="csrf-token"]').attr('content') ,
                "id" : id
            };

            $.ajax({
                url: "/api/f/d",
                method: 'DELETE',
                data: data_array,
                success: function(_response) {

                    if(_response.status == 1) {
                        element.parent().remove();

                        message ('You are no longer connected to ' + ex_friend , 'alert-warning')

                    } else {

                        message ("Error: Friend didn't delete pleace contact admin", 'alert-danger')
                    }
                }
            }).always(function (){
                $('#friend_connect_loader').hide();
            });
        }
    });

});

function message_hide () {

    $('#message_controler_friends').removeClass();
    $('#message_controler_friends').hide('fast');

}

function message (msg, level) {

    $('#message_controler_friends').removeClass();
    $('#message_controler_friends').addClass("alert " + level);
    $('#message_controler_friends').html(msg);
    $('#message_controler_friends').show();

    setTimeout(function() {
        $("#message_controler_friends").slideUp('slow');
    }, 5000);

}
