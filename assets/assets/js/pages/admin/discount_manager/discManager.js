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
		url: 'discounts/get_departments',
		dataType: 'json',
		success:function(data){
			var html = '<option value="">---</option>';
			if (data != false){
				for(let x = 0;x <= data.length - 1;x++) {
					html += '<option value="'+data[x].dept_id+'">'+data[x].dept_id+' - '+data[x].dept_code+'</option>';
				}

				jQuery('.dFor').html(html);
			}else {
				jQuery('.dFor').html(html);
			}
		}
	});

	jQuery('#newDiscModal').on('hidden.bs.modal', function() {
		 jQuery(this).find('form')[0].reset();
	});

	var form = jQuery('#discForm');

	form.parsley({
	  errorClass: 'is-invalid text-danger',
	  // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	form.on('submit', function(e) {
	  e.preventDefault();

	  Swal({
	    title: 'Create new discount?',
	    text: "",
	    type: 'question',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    confirmButtonText: 'Yes, continue.'
	  }).then((result) => {
	    if (result.value) {
	      jQuery.ajax({
	        type: 'POST',
	        data: form.serialize(),
	        dataType: 'json',
	        url: 'discounts/create_new_discount',
	        success:function(data){
            Swal(
              'Created!',
              'New discount has been added to the record.',
              'success',
            );
            console.log(data);
            var status = '';
            if (data.status == 1){
            	status = '<span class="badge badge-success">Active</span>';
            }else{
            	status = '<span class="badge badge-danger">Inactive</span>';
            }
            dtble.row.add([
                data.row_id,
                data.discount,
                '<span class="text-right" style="display:block">'+data.disc_amnt+'</span>',
                '<span class="text-center" style="display:block">'+data.dept_code+'</span>',
                '<span class="text-center" style="display:block">'+status+'</span>',
                '<button type="button" data-id="'+data.row_id+'" data-toggle="modal" data-target="#editDiscModal" data-backdrop="static" data-keyboard="false" class="editRow btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i></button>',
              ]).draw();

            jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
	        },
	        error:function(data){
	        	Swal(
	        	  'Error!',
	        	  'Failed to add discount to the record! Please try again.',
	        	  'error'
	        	);
	        }
	      });
	    }
	  })
	});
});