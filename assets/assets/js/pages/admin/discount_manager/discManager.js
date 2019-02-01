jQuery(document).ready(function(){
	var dtble = jQuery('#feeTbl').DataTable({
      // "processing": true,
      // "serverSide": true,
      "searching": true,
      "ajax": {
        type: "GET",
        url: 'discounts/get_discount_table',
        dataType: 'json'
      }
    });

	jQuery.ajax({
		type: 'GET',
		url: 'fee-mgr/get_departments',
		dataType: 'json',
		success:function(data){
			// console.log(data);
			var html = '<option value="">---</option>';
			if (data != false){
				for(let x = 0;x <= data.length - 1;x++) {
					html += '<option value="'+data[x].dept_id+'">'+data[x].dept_id+' - '+data[x].dept_code+'</option>';
				}

				jQuery('.fFor').html(html);
			}else {
				jQuery('.fFor').html(html);
			}
		}
	});
});