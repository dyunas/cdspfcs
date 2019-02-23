window.onload = function() {
	var form = jQuery('#assessmentForm');

	function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
	}

	var payment = 0;
	var computedDiscount = 0;
	var discount = jQuery('#discount');
	var tuition = 0;
	var tuitionCode;

	jQuery('#newAssessment').on('hidden.bs.modal', function() {
		 form[0].reset();
		 jQuery('#total').html('');
		 jQuery('#totalAmount').val('');
		 jQuery('#discHere').html('');
		 jQuery('#totAmount').html('');
		 jQuery('#grandTotal').val('');
		 discount.prop('disabled', true);
	});

	jQuery.getJSON('../get_tuition_fee',function(data){ 
		tuition = data.amount; 
		tuitionCode = data.fee_code;
	});

	jQuery('[class^=fees]').on('change', function() {
		var id = jQuery(this).attr('data-id');
		if (tuitionCode == jQuery(this).attr('data-name')) {
			if(jQuery(this).is(':checked')) {
				discount.prop('disabled', false);
				payment += parseFloat(jQuery('#rowAmount'+id).val());
			} else {
				discount.prop('disabled', true);
				discount.val('');
				jQuery('#discHere').html('');
				payment -= parseFloat(jQuery('#rowAmount'+id).val());
			}
		} else {
			if(jQuery(this).is(':checked')) {
				payment += parseFloat(jQuery('#rowAmount'+id).val());
			} else {
				payment -= parseFloat(jQuery('#rowAmount'+id).val());
			}
		}

		jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
		jQuery('#totalAmount').val(payment);

		jQuery('#totAmount').html(number_format((parseFloat(payment)), 2, '.', ','));
		jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
	});

	discount.on('change', function(){
		jQuery.getJSON('../get_discount_amount',{id:discount.val()},function(data){
			if (data != false) {
				computedDiscount = (parseFloat(data.disc_amnt) / 100) * parseFloat(tuition);
				var html ='<td>'+
								  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+data.disc_amnt+'%</div>'+
								  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
								'</td>'+
								'<td>'+
								 'Php '+number_format(computedDiscount, 2,'.', ',')+
								'</td>';
			} else {
				computedDiscount = 0;
				var html = '';
			}

			jQuery('#discHere').html(html);
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
		});
	})

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
	    title: 'Create new fee?',
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
	        //url: 'fee-mgr/create_new_fee',
	        success:function(data){
	          if (data != false) {
	            Swal(
	              'Created!',
	              'New assessment has been added to the record.',
	              'success',
	            );
	            console.log(data);

	            jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
	          }
	          else {
	            Swal(
	              'Error!',
	              'Failed to add assessment to the record! Please try again.',
	              'error'
	            );
	          }
	        }
	      });
	    }
	  })
	});
}