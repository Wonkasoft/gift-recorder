(function( $ ) {
	'use strict';

$( document ).ready( function() {

	var limit = $('#member-number-records');

	database_api( 'queryData', 'allMembers', GIFT_RECORDER_KIT.security, limit.val() );

	limit.keypress(function(event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		   if(keycode == '13'){

				database_api( 'queryData', 'allMembers', GIFT_RECORDER_KIT.security, limit.val() );

		   }
	});

	limit.blur(function(e) {

		database_api( 'queryData', 'allMembers', GIFT_RECORDER_KIT.security, limit.val() );
	
	});

});

function database_api ( action, data, security, limit ) {
	

	var data_to_send = { action:action, data:data, security:security, limit:limit };
	// this is the ajax post.
	$.ajax({
		type: "POST",
		dataType: "json",
		url: ajaxurl,
		data: data_to_send,
		success: function( result ) {
			if ( result.success == true ) {
			
				var data = JSON.parse(result.data);

				build_members_tables(data);
				build_manage_users_tables(data);
			}
		},
		// this section is run when the ajax post comes back with an error.
		error: function( error ) {

		}

	});
}

	function build_members_tables( records ) {
		
		var html = '';
		var tablebody = $('#members-table');
		records.forEach(function(record) {
			html = html + '<tr><th scope="row">'+record.id+'</th><td>'+record.first_name+'</td><td>'+record.last_name+'</td><td>'+record.email+'</td><td>'+record.phone+'</td><td>'+record.address+'</td><td>'+record.city+'</td><td>'+record.state+'</td><td>'+record.zip+'</td><td>'+record.your_gift+'</td><td>'+record.score+'</td></tr>';
		});
		
		tablebody.html(html); 
	}

	function build_manage_users_tables( records ) {
		
		var html = '';
		var tablebody = $('#manage-users-table');
		records.forEach(function(record) {
			html = html + '<tr><th scope="row">'+record.id+'</th><td>'+record.first_name+'</td><td>'+record.last_name+'</td><td>'+record.email+'</td><td>'+record.phone+'</td><td>'+record.address+'</td><td>'+record.city+'</td><td>'+record.state+'</td><td>'+record.zip+'</td><td>'+record.your_gift+'</td><td>'+record.score+'</td><td><a href="#'+record.id+'" class="btn btn-sm btn-secondary">Edit</a><a href="#'+record.id+'" class="btn btn-sm btn-danger">Delete</a></td></tr>';
		});

		tablebody.html(html); 
	}

})( jQuery );
