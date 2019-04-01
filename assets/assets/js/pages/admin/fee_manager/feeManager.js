jQuery(document).ready(function(){
	var dtble = jQuery('#PaymentTbl').DataTable({
      "searching": true,
      "ajax": {
        type: "GET",
        url: 'fee-mgr/get_fee_table',
        dataType: 'json'
      }
    });

	function get_grade_level($fee_for = false) {
		if ($fee_for === false) {
			jQuery.ajax({
				type: 'GET',
				url: 'fee-mgr/get_grade_levels',
				dataType: 'json',
				success:function(data){
					// console.log(data);
					var html = '<option value="">---</option>';
					if (data != false){
						for(let x = 0;x <= data.length - 1;x++) {
							html += '<option value="'+data[x].grd_lvl+'">'+data[x].grd_lvl+'</option>';
						}

						jQuery('.fFor').html(html);
					}else {
						jQuery('.fFor').html(html);
					}
				}
			});
		}

		jQuery.ajax({
			type: 'GET',
			url: 'fee-mgr/get_grade_levels',
			dataType: 'json',
			success:function(data){
				// console.log(data);
				var html = '<option value="">---</option>';
				if (data != false){
					for(let x = 0;x <= data.length - 1;x++) {
						if ($fee_for == data[x].grd_lvl) {
							html += '<option value="'+data[x].grd_lvl+'" selected>'+data[x].grd_lvl+'</option>';
						} else {
							html += '<option value="'+data[x].grd_lvl+'">'+data[x].grd_lvl+'</option>';
						}
					}

					jQuery('.fFor').html(html);
				}else {
					jQuery('.fFor').html(html);
				}
			}
		});
	}

	get_grade_level();

	jQuery('#newPaymentModal').on('hidden.bs.modal', function() {
		 jQuery(this).find('form')[0].reset();
	});

	var form = jQuery('#PaymentForm');

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
	    title: 'Create new payment?',
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
	        url: 'fee-mgr/create_new_fee',
	        success:function(data){
	          if (data != false) {
	            Swal(
	              'Created!',
	              'New payment has been added to the record.',
	              'success',
	            );
	            // console.log(data);
	            var status = '';
	            if (data.status == 1){
	            	status = '<span class="badge badge-success">Active</span>';
	            }else{
	            	status = '<span class="badge badge-danger">Inactive</span>';
	            }
	            dtble.row.add([
	                data.row_id,
	                data.fee_name,
	                '<span class="text-right" style="display:block">'+data.amount+'</span>',
	                '<span class="text-center" style="display:block">'+data.fee_for+'</span>',
	                '<span class="text-center" style="display:block">'+status+'</span>',
	                '<button type="button" data-id="'+data.row_id+'" data-toggle="modal" data-target="#editPaymentModal" data-backdrop="static" data-keyboard="false" class="editRow btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i></button>',
	              ]).draw();

	            jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
	          }
	          else {
	            Swal(
	              'Error!',
	              'Failed to add payment to the record! Please try again.',
	              'error'
	            );
	          }
	        }
	      });
	    }
	  })
	});

	jQuery('#PaymentTbl tbody').on('click', '[class^=editRow]', function () {
    var data = jQuery(this).attr('data-id');

    jQuery.ajax({
    	type: 'GET',
    	data: {id: data},
    	dataType: 'json',
    	url: 'fee-mgr/get_fee_table',
    	before:function(){
    		//
    	},
    	success:function(data){
    		jQuery('#row_id').val(data.row_id);
    		jQuery('#editFname').val(data.fee_name);
    		jQuery('#editAmnt').val(parseInt(data.amount));
    		get_grade_level(data.fee_for);

  		  var eform = jQuery('#editForm');

  		  eform.parsley({
  		    errorClass: 'is-invalid text-danger',
  		    // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
  		    errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
  		    errorTemplate: '<span></span>',
  		    trigger: 'change'
  		  });

  		  eform.on('submit', function(e) {
  		    e.preventDefault();

  		    Swal({
  		      title: 'Update fee?',
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
  		          data: eform.serialize(),
  		          dataType: 'json',
  		          url: 'fee-mgr/update_fee',
  		          success:function(res){
  		            if (res == true) {
  		              Swal(
  		                {
  		                	title: 'Saved!',
  		                	text: 'Fee has been updated to the record.',
  		                	type: 'success'
  		              	}).then(
  		              	function(){
  		              		jQuery('#editPaymentModal').modal('hide');
  		              	  window.location.reload();
  		              	}
  		              );
  		            }
  		            else {
  		              Swal(
  		                'Error!',
  		                'Failed to update fee! Please try again.',
  		                'error'
  		              );
  		            }
  		          }
  		        });
  		      }
  		    })
  		  });
    	}
    });
  });
});