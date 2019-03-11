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

var navLink = jQuery('.nav-tabs a:first-child');
var navTabs = jQuery('.nav-tabs a:first-child');
var navContents = jQuery('.tab-content div:first-child');

navTabs.addClass('active');
navContents.addClass('show active');

var id = navLink.attr('id');
var dataId = navContents.attr('data-id');
var assessmentID = navContents.attr('data-assessment-id');

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function getAssessmentInfo(id, assessmentID){
	jQuery.getJSON('get_assessment_info',{id: dataId, assessmentID: assessmentID}, function(result){
		var payables;

		for(let x = 0;x <= result.length-1;x++){
			var balance = parseFloat(result[x].amountPaid) - parseFloat(result[x].amountDue);
			if (balance < 0) {
				balance = 0;
			}

			payables +='<tr>'+
										'<td>'+
											'<strong>'+result[x].payables.capitalize()+'</strong>'+
										'</td>'+
										'<td>'+
										 'Php '+number_format(result[x].amountDue, 2,'.', ',')+
										'</td>'+
										'<td>'+
										 'Php '+number_format(result[x].amountPaid, 2,'.', ',')+
										'</td>'+
										'<td>'+
										 'Php '+number_format(balance, 2,'.', ',')+
										'</td>'+
									'</tr>';
		}

			jQuery('#assessmentPayables'+id).html(payables);
	});
}

getAssessmentInfo(id, assessmentID);

jQuery('[class^=nav-item]').on('click', function() {
	id = jQuery(this).attr('id');
	dataId = jQuery(this).attr('data-id');
	assessmentID = jQuery(this).attr('data-assessment-id');

	getAssessmentInfo(id, assessmentID);

	checkFeeRow();
});

function checkFeeRow() {
	jQuery.each(jQuery('.checkFee'), function(){
		var dataID = jQuery(this).attr('data-id');
		var assessmentID = jQuery(this).attr('data-assessment-id');
		var $this = jQuery(this);
		jQuery.getJSON('check_fee_row', {id: dataID, assessmentID: assessmentID}, function(result){
			if (result == true) {
				$this.prop('checked', true);
			}
		});
	});
}

checkFeeRow();

var form = jQuery('#paymentForm');

jQuery('[class^=managePayment]').click(function(){
	var id = jQuery(this).attr('data-id');
	var assessmentID = jQuery(this).attr('data-assessment-id');

	jQuery.getJSON('get_assessment_info',{id: dataId, assessmentID: assessmentID}, function(result){
		var payables;

		for(let x = 0;x <= result.length-1;x++){
			var balance = parseFloat(result[x].amountPaid) - parseFloat(result[x].amountDue);
			if (balance < 0) {
				balance = 0;
			}
			var balance = parseFloat(result[x].amountDue) - parseFloat(result[x].amountPaid);
			payables += '<tr>'+
									  '<td>'+
							        '<input type="checkbox" name="fee[]" data-id="" data-assessment-id="">'+
									  '</td>'+
									  '<td>'+
										  '<strong>'+result[x].payables.capitalize()+'</strong>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(result[x].amountDue, 2, '.', ',')+'</div>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(result[x].amountPaid, 2, '.', ',')+'</div>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(balance, 2, '.', ',')+'</div>'+
									  '</td>'+
									  '<td>'+
									    '<input type="text" style="text-align:right;" size="5" name="amount[]" class="input-sm form-control-sm form-control" maxlength="8" data-parsley-length="[5, 5]" data-parsley-length-message="" value=""/>'+
									  '</td>'+
									'</tr>';
		}

		jQuery('#soahere').html(payables);
		jQuery('#paymentAssessmentID').val(assessmentID);
	});
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
    title: 'Process payment?',
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
        url: 'process_payment',
        success:function(data){
          if (data != false) {
            Swal(
              {
              	title: 'Processed!',
              	text: 'Payment has been successfully processed.',
              	type: 'success'
            	}).then(
            	function(){
            		jQuery('#managePaymentModal').modal('hide');
            	  window.location.reload();
            	}
            );
          }
          else {
            Swal(
              'Error!',
              'Failed to process payment! Please try again.',
              'error'
            );
          }
        },
        error:function(){
        	Swal(
        	  'Error!',
        	  'error'
        	);
        }
      });
    }
  })
});