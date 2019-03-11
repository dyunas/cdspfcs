window.onload = function() {
	var form = jQuery('#assessmentForm');
	var payment = 0;
	var computedDiscount = 0;
	var discount = jQuery('#discount');
	var paymentScheme = jQuery('#paymentScheme');
	var hiddenDiscount = jQuery('#hidDiscount');
	var hiddenSchemeDiscount = jQuery('#hidSchemeDiscount');
	var tuition = 0;
	var misc = 0;
	var tuitionId;
	var numUnits = jQuery('#numUnits');
	var numThesis = jQuery('#numThesis');
	var thesisAmnt = 0;
	var thesisId;

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
		 numUnits.prop('disabled', true);
		 numUnits.val(0);
		 payment = 0;
		 hiddenDiscount.val(0);
		 hiddenSchemeDiscount.val(0);
	});

	jQuery.getJSON('get_tuition_fee',function(data){ 
		tuition = data.amount; 
		tuitionId = data.row_id;
	});

	jQuery.getJSON('get_thesis_fee',function(data){ 
		thesisAmnt = data.amount; 
		thesisId = data.row_id;
	});

	jQuery('[class^=fees]').on('change', function() {
		var id = jQuery(this).attr('data-id');
		var totalTuitionFee = jQuery('#totalTuitionFee');
		var totalThesisFee = jQuery('#totalThesisFee');
		if (tuitionId == jQuery(this).attr('data-id')) {
			if(jQuery(this).is(':checked')) {
				discount.prop('disabled', false);
				paymentScheme.prop('disabled', false);
				numUnits.prop('disabled', false);

				numUnits.on('keyup', function(){
					var units = jQuery(this).val();
					var id = jQuery(this).attr('data-id');
					var tuitionFee = jQuery('#tuitionFee');
					var tuitionTotal = parseFloat(units) * parseFloat(tuitionFee.val())
					tuition = tuitionTotal;
					payment = misc + tuitionTotal;
					totalTuitionFee.val(tuitionTotal);
					jQuery('#rowAmount'+id).val(parseFloat(units) * parseFloat(tuitionFee.val()));
					jQuery('#totalTuitionHere').html('Php '+number_format(parseFloat(units) * parseFloat(tuitionFee.val()), 2, '.', ','));

					jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
					jQuery('#totalAmount').val(payment);

					jQuery('#totAmount').html('Php '+number_format((parseFloat(payment)), 2, '.', ','));
					jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
				});
			} else {
				discount.prop('disabled', true);
				paymentScheme.prop('disabled', true);
				numUnits.prop('disabled', true);
				discount.val('');
				paymentScheme.val('');
				hiddenDiscount.val(0);
				hiddenSchemeDiscount.val(0);
				numUnits.val('');
				jQuery('#discHere').html('');
				payment -= parseFloat(totalTuitionFee.val());
				tuition = 0;
				jQuery('#rowAmount'+id).val(0);
				jQuery('#totalTuitionHere').html('Php '+number_format(0, 2, '.', ','));

				jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
				jQuery('#totalAmount').val(payment);

				jQuery('#totAmount').html('Php '+number_format((parseFloat(payment)), 2, '.', ','));
				jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
			}
		} else if (thesisId == jQuery(this).attr('data-id')){
			if(jQuery(this).is(':checked')) {
				numThesis.prop('disabled', false);
				numThesis.on('keyup', function(){
					var units = jQuery(this).val();
					var id = jQuery(this).attr('data-id');
					var thesisFee = jQuery('#thesisFee');
					var thesisTotal = parseFloat(units) * parseFloat(thesisFee.val())
					payment = misc + parseFloat(totalTuitionFee.val()) + thesisTotal;
					totalThesisFee.val(thesisTotal);
					jQuery('#rowAmount'+id).val(parseFloat(units) * parseFloat(thesisFee.val()));
					jQuery('#totalThesisHere').html('Php '+number_format(parseFloat(units) * parseFloat(thesisFee.val()), 2, '.', ','));

					jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
					jQuery('#totalAmount').val(payment);

					jQuery('#totAmount').html('Php '+number_format((parseFloat(payment)), 2, '.', ','));
					jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
				});
			} else {
				numThesis.prop('disabled', true);
				numThesis.val('');
				jQuery('#rowAmount'+id).val(0);
				payment -= parseFloat(totalThesisFee.val());
				totalThesisFee.val(0);
				jQuery('#totalThesisHere').html('Php '+number_format(0, 2, '.', ','));

				jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
				jQuery('#totalAmount').val(payment);

				jQuery('#totAmount').html('Php '+number_format((parseFloat(payment)), 2, '.', ','));
				jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
			}
		} else {
			if(jQuery(this).is(':checked')) {
				misc += parseFloat(jQuery('#rowAmount'+id).val());
				payment = misc + parseFloat(totalTuitionFee.val()) + parseFloat(totalThesisFee.val());
			} else {
				misc -= parseFloat(jQuery('#rowAmount'+id).val());
				payment = misc + parseFloat(totalTuitionFee.val()) + parseFloat(totalThesisFee.val());
			}
		}

		jQuery('#total').html('Php '+ number_format(payment, 2,'.', ','));
		jQuery('#totalAmount').val(payment);

		jQuery('#totAmount').html('Php '+number_format((parseFloat(payment)), 2, '.', ','));
		jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
	});

	discount.on('change', function(){
		var scheme = paymentScheme.val();
		jQuery.getJSON('get_discount_amount',{id:discount.val()},function(data){
			if (data != false) {
				var computedDiscount = ((parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition);
				var html ='<td colspan="2">'+
								  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val()), 2, '.')+'%</div>'+
								  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
								'</td>'+
								'<td>'+
								 'Php '+number_format(computedDiscount, 2,'.', ',')+
								'</td>';
				jQuery('#totalDiscount').val((parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val())));
				jQuery('#totalDiscAmount').val(computedDiscount);
				hiddenDiscount.val(data.disc_amnt);
				if (scheme == 'CASH') {
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
					var monthly = 0;
				}
				else if (scheme == 'MINIMUM')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
					var monthly = parseFloat(upon) / 9;
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
				var computedDiscount = ((parseFloat(0) + parseFloat(hiddenSchemeDiscount.val())) / 100) * parseFloat(tuition);
				var html ='<td colspan="2">'+
								  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(0) + parseFloat(hiddenSchemeDiscount.val()), 2, '.')+'%</div>'+
								  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
								'</td>'+
								'<td>'+
								 'Php '+number_format(computedDiscount, 2,'.', ',')+
								'</td>';
				jQuery('#totalDiscount').val((parseFloat(data.disc_amnt) + parseFloat(hiddenSchemeDiscount.val())));
				jQuery('#totalDiscAmount').val(computedDiscount);
				hiddenDiscount.val(0);
				if (scheme == 'CASH') {
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount));
					var monthly = 0;
				}
				else if (scheme == 'MINIMUM')
				{
					var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
					var monthly = parseFloat(upon) / 9;
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

			var payables ='<tr>'+
												'<td>'+
												  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>Upon Enrollment</strong></div>'+
												'</td>'+
												'<td>'+
												 'Php '+number_format(upon, 2,'.', ',')+
												'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>July</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>August</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>September</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>October</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>November</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>December</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>January</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>February</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>'+
											'<tr>'+
												'<td><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>March</strong></div></td>'+
												'<td>Php '+number_format(monthly, 2,'.', ',')+'</td>'+
											'</tr>';

			jQuery('#payables').html(payables);
			jQuery('#discHere').html(html);
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));
		});
	});

	paymentScheme.on('change', function(){
		var scheme = paymentScheme.val();

		if (scheme == 'CASH') {
			var computedDiscount = ((parseFloat(hiddenDiscount.val()) + 10) / 100) * parseFloat(tuition);
			var html ='<td colspan="2">'+
							  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(10), 2, '.')+'%</div>'+
							  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
							'</td>'+
							'<td>'+
							 'Php '+number_format(computedDiscount, 2,'.', ',')+
							'</td>';
			jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()) + 10);
			jQuery('#totalDiscAmount').val(computedDiscount);
			jQuery('#discHere').html(html);
			hiddenSchemeDiscount.val('10.00');
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));

			var upon = parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount);
			var monthly = 0.00;
		}
		else {
			var computedDiscount = ((parseFloat(hiddenDiscount.val()) + 0) / 100) * parseFloat(tuition);
			var html ='<td colspan="2">'+
							  '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'+number_format(parseFloat(hiddenDiscount.val()) + parseFloat(0), 2, '.')+'%</div>'+
							  '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><strong>in Tuition Fee</strong></div>'+
							'</td>'+
							'<td>'+
							 'Php '+number_format(computedDiscount, 2,'.', ',')+
							'</td>';
			jQuery('#totalDiscount').val(parseFloat(hiddenDiscount.val()) + 10);
			jQuery('#totalDiscAmount').val(computedDiscount);				
			jQuery('#discHere').html(html);
			hiddenSchemeDiscount.val('0');
			jQuery('#totAmount').html(number_format((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)), 2, '.', ','));
			jQuery('#grandTotal').val((parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)));

			if (scheme == 'MINIMUM')
			{
				var upon = (parseFloat(jQuery('#totalAmount').val()) - parseFloat(computedDiscount)) * 0.40;
				var monthly = parseFloat(upon) / 9;
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

		jQuery('#payables').html(payables);
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