jQuery(document).ready(function() {
	jQuery.ajax({
		type: 'get',
		dataType: 'json',
		url: 'get_account_roles',
		success:function(roles){
			console.log(roles);
			var html = '<option value="">---</option>';
			if(roles != false) {
				for(let x = 0;x <= roles.length - 1;x++) {
					html += '<option value="'+roles[x].role_id+'">'+roles[x].role_id+' - '+roles[x].role_type+'</option>';
				}

				jQuery('#role').html(html);
			}
			else
			{
				jQuery('#role').html(html);
			}
		}
	});
});