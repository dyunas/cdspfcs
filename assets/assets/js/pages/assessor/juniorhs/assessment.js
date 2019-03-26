window.onload = function() {
	var form = jQuery('#assessmentForm');
	var payment = 0;
	var computedDiscount = 0;
	var discount = jQuery('#discount');
	var escGrant = jQuery('#escGrant');
	var paymentScheme = jQuery('#paymentScheme');
	var hiddenDiscount = jQuery('#hidDiscount');
	var hiddenSchemeDiscount = jQuery('#hidSchemeDiscount');
	var tuition = 0;
	var tuitionID;

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

	function payables(upon, monthly) {
		var payables ='<tr>'+
											'<td>'+
											  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>Upon Enrollment</strong></div>'+
											'</td>'+
											'<td>'+
											 'Php '+number_format(upon, 2,'.', ',')+
											'</td> <input type="hidden" name="uponEnroll" value="'+upon+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>July</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[july]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>August</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[august]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>September</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[september]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>October</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[october]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>November</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[november]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>December</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[december]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>January</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[january]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>February</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[february]" value="'+monthly+'"/>'+
										'</tr>'+
										'<tr>'+
											'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>March</strong></div></td>'+
											'<td>Php '+number_format(monthly, 2,'.', ',')+'</td><input type="hidden" name="monthly[march]" value="'+monthly+'"/>'+
										'</tr>';

		return payables;
	}

	jQuery('#newAssessment').on('hidden.bs.modal', function() {
		 form[0].reset();
		 jQuery('#total').html('');
		 jQuery('#totalAmount').val();
		 jQuery('#discHere').html('');
		 jQuery('#totAmount').html('');
		 jQuery('#grandTotal').val();
		 jQuery('#payables').html('');
		 discount.prop('disabled', true);
		 paymentScheme.prop('disabled', true);
		 payment = 0;
		 hiddenDiscount.val(0);
		 hiddenSchemeDiscount.val(0);
		 tuition = 0;
		 jQuery('#escGrantDiscount').html('');
		 jQuery('#escGrantAmnt').val(0);
	});

	jQuery.getJSON('get_tuition_fee',{gradeLevel: jQuery('#gradeLevel').val()},function(data){ 
		tuition = data.amount; 
		tuitionID = data.row_id;
	});

	jQuery('[class^=fees]').on('change', function() {
		var id = jQuery(this).attr('data-id');
		if (tuitionID == jQuery(this).attr('data-id')) {
			if(jQuery(this).is(':checked')) {
				discount.prop('disabled', false);
				paymentScheme.prop('disabled', false);
				escGrant.prop('disabled', false);
				payment += parseFloat(jQuery('#rowAmount'+id).val());
			} else {
				discount.prop('disabled', true);
				paymentScheme.prop('disabled', true);
				escGrant.prop('disabled', true);
				discount.val('');
				paymentScheme.val('');
				hiddenDiscount.val(0);
				hiddenSchemeDiscount.val(0);
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
		var scheme = paymentScheme.val();
		jQuery.getJSON('get_discount_amount',{id:discount.val()},function(data){
			if (data != false) {
				if(parseFloat(data.disc_amnt) == 100 || parseFloat(data.disc_amnt) >= 95) {
					var computedDiscount = (parseFloat(data.disc_amnt) / 100) * parseFloat(tuition);
					var totalDiscount = parseFloat(data.disc_amnt);
				}
				else {
					var computedDiscount = ((parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition);
					var totalDiscount = parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val());
				}
				
				if(jQuery('#escGrant').is(':checked')) {
					computedDiscount = computedDiscount + parseFloat(9000);
				}

				var html ='<td>'+
								  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(totalDiscount, 2, '.')+'%</div>'+
								  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
								'</td>'+
								'<td>'+
								 'Php '+number_format(computedDiscount, 2,'.', ',')+
								'</td>';

				jQuery('#totalDiscount').val(totalDiscount);
				jQuery('#totalDiscAmount').val(((parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition));
				hiddenDiscount.val(data.disc_amnt);
				if (scheme == 'CASH') {
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
					var monthly = 0;
				}
				else if (scheme == 'MINIMUM')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
					var monthly =(parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.60 / 9;
				}
				else if(scheme == 'PARTIAL')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.50;
					var monthly = parseFloat(upon) / 9;
				}
				else if (scheme == 'ENPL'){
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
					var monthly  = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
				}
			} else {
				var computedDiscount = (parseFloat(hiddenSchemeDiscount.val()) / 100) * parseFloat(tuition);
				if(jQuery('#escGrant').is(':checked')) {
					computedDiscount = computedDiscount + parseFloat(9000);
				}
				var html ='<td>'+
								  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenSchemeDiscount.val()), 2, '.')+'%</div>'+
								  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
								'</td>'+
								'<td>'+
								 'Php '+number_format((parseFloat(hiddenSchemeDiscount.val()) / 100) * parseFloat(tuition), 2,'.', ',')+
								'</td>';
				jQuery('#totalDiscount').val(parseFloat(hiddenSchemeDiscount.val()));
				jQuery('#totalDiscAmount').val((parseFloat(hiddenSchemeDiscount.val()) / 100) * parseFloat(tuition));
				hiddenDiscount.val(0);
				if (scheme == 'CASH') {
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
					var monthly = 0;
				}
				else if (scheme == 'MINIMUM')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
					var monthly = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.60 / 9;
				}
				else if(scheme == 'PARTIAL')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.50;
					var monthly = parseFloat(upon) / 9;
				}
				else if (scheme == 'ENPL'){
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
					var monthly  = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
				}
			}

			jQuery('#payables').html(payables(upon, monthly));
			jQuery('#discHere').html(html);
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
		});
	});

	paymentScheme.on('change', function(){
		var scheme = paymentScheme.val();

		if (scheme == 'CASH') {
			if(parseInt(hiddenDiscount.val()) == 100 || parseInt(hiddenDiscount.val()) >= 95) {
				var computedDiscount = (parseFloat(hiddenDiscount.val()) / 100) * parseFloat(tuition);
				var totalDiscount = parseFloat(hiddenDiscount.val());
			}
			else {
				var computedDiscount = ((parseFloat(hiddenDiscount.val()) + 10) / 100) * parseFloat(tuition);
				var totalDiscount = parseFloat(hiddenDiscount.val()) + 10;
			}

			if(jQuery('#escGrant').is(':checked')) {
				computedDiscount = computedDiscount + parseFloat(9000);
			}

			var html ='<td>'+
							  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(totalDiscount, 2, '.')+'%</div>'+
							  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
							'</td>'+
							'<td>'+
							 'Php '+number_format(computedDiscount, 2,'.', ',')+
							'</td>';
			jQuery('#totalDiscount').val(totalDiscount);
			jQuery('#totalDiscAmount').val(((parseFloat(hiddenDiscount.val()) + 10) / 100) * parseFloat(tuition));
			jQuery('#discHere').html(html);
			hiddenSchemeDiscount.val(10.00);
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));

			var upon = parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount);
			var monthly = 0.00;
		}
		else {
			var computedDiscount = (parseFloat(hiddenDiscount.val()) / 100) * parseFloat(tuition);
			if(jQuery('#escGrant').is(':checked')) {
				computedDiscount = computedDiscount + parseFloat(9000);
			}
			var html ='<td>'+
							  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(0), 2, '.')+'%</div>'+
							  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
							'</td>'+
							'<td>'+
							 'Php '+number_format((parseFloat(hiddenDiscount.val()) / 100) * parseFloat(tuition), 2,'.', ',')+
							'</td>';

			hiddenSchemeDiscount.val(0);
			jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()));
			jQuery('#totalDiscAmount').val((parseFloat(hiddenDiscount.val()) / 100) * parseFloat(tuition));				
			jQuery('#discHere').html(html);
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));

			if (scheme == 'MINIMUM')
			{
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
				var monthly = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.60 / 9;
			}
			else if(scheme == 'PARTIAL')
			{
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.50;
				var monthly = parseFloat(upon) / 9;
			}
			else if (scheme == 'ENPL'){
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
				var monthly  = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
			}
		}

		jQuery('#payables').html(payables(upon, monthly));
	});

	escGrant.on('change', function(){
		var computedDiscount = (((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition));
		var scheme = paymentScheme.val();
		if(jQuery(this).is(':checked')) {
			if (jQuery('#totalDiscount').val() < 50){
				computedDiscount = computedDiscount + parseFloat(9000);
				var html ='<td>'+
											  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(0), 2, '.')+'%</div>'+
											  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
											'</td>'+
											'<td>'+
											 'Php '+number_format(((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition), 2,'.', ',')+
											'</td>';

				jQuery('#discHere').html(html);
				jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val()));
				jQuery('#totalDiscAmount').val(((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition));
				jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
				jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
				if (scheme == 'CASH') {
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
					var monthly = 0;
				}
				else if (scheme == 'MINIMUM')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
					var monthly = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.60 / 9;
				}
				else if(scheme == 'PARTIAL')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.50;
					var monthly = parseFloat(upon) / 9;
				}
				else if (scheme == 'ENPL'){
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
					var monthly  = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
				}
			} else {
				var html ='<td>'+
											  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(0), 2, '.')+'%</div>'+
											  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
											'</td>'+
											'<td>'+
											 'Php '+number_format(computedDiscount, 2,'.', ',')+
											'</td>';
				jQuery('#discHere').html(html);
				jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val()));
				jQuery('#totalDiscAmount').val(((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition));
				jQuery('#totAmount').html(number_format(((parseFloat(jQuery('#totalAmount').val()) - parseFloat(9000)) - parseFloat(computedDiscount)), 2, '.', ','));
				jQuery('#grandTotal').val(((parseFloat(jQuery('#totalAmount').val()) - parseFloat(9000)) - parseFloat(computedDiscount)));
			}
			jQuery('#escGrantDiscount').html('Php '+ number_format(9000, 2, '.', ','));
			jQuery('#escGrantAmnt').val(9000);
		} else {
			if (scheme == 'CASH') {
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
				var monthly = 0;
			}
			else if (scheme == 'MINIMUM')
			{
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
				var monthly = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.60 / 9;
			}
			else if(scheme == 'PARTIAL')
			{
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.50;
				var monthly = parseFloat(upon) / 9;
			}
			else if (scheme == 'ENPL'){
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
				var monthly  = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) / 10;
			}

			var html ='<td>'+
										  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(0), 2, '.')+'%</div>'+
										  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
										'</td>'+
										'<td>'+
										 'Php '+number_format(((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition), 2,'.', ',')+
										'</td>';

			jQuery('#discHere').html(html);
			jQuery('#escGrantDiscount').html('');
			jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val()));
			jQuery('#totalDiscAmount').val(((parseFloat(hiddenDiscount.val()) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition));
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
			jQuery('#escGrantAmnt').val(0);
		}

		jQuery('#payables').html(payables(upon, monthly));
	});

	form.parsley({
	  errorClass: 'is-invalid text-danger',
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	form.on('submit', function(e) {
	  e.preventDefault();

	  Swal({
	    title: 'Add new assessment?',
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
	        url: 'add_assessment',
	        success:function(data){
	          if (data != false) {
	            Swal(
	              {
	              	title: 'Created!',
	              	text: 'New assessment has been added to the record.',
	              	type: 'success'
	            	}).then(
	            	function(){
	            		jQuery('#newAssessment').modal('hide');
	            	  window.location.reload();
	            	}
	            );
	          }
	          else {
	            Swal(
	              'Error!',
	              'Failed to add assessment to the record! Please try again.',
	              'error'
	            );
	          }
	        },
	        error:function(){
	        	Swal(
	        	  'Error!',
	        	  'Assessment already exist in the record!',
	        	  'error'
	        	);
	        }
	      });
	    }
	  })
	});
}