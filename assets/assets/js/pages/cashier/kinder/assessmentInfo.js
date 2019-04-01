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
		var balance = 0;
		var amountPaid = 0;
		for(let x = 0;x <= result.length-1;x++){
			balance = result[x].balance;
			
			if (balance == null) {
				balance = parseFloat(result[x].amountDue);
				amountPaid = result[x].amountPaid;
			} else if (parseFloat(balance) < 0) {
				balance = 0;
				amountPaid = result[x].amountPaid;
			} else {
				if (parseFloat(result[x].amountPaid) > parseFloat(result[x].amountDue)){
					balance = 0;
					amountPaid = result[x].amountDue;
				} else {
					balance = parseFloat(result[x].balance);
					amountPaid = result[x].amountPaid;
				}
			}

			payables +='<tr>'+
										'<td>'+
											'<strong>'+result[x].payables.capitalize()+'</strong>'+
										'</td>'+
										'<td>'+
										 'Php '+number_format(result[x].amountDue, 2,'.', ',')+
										'</td>'+
										'<td>'+
										 'Php '+number_format(amountPaid, 2,'.', ',')+
										'</td>'+
										'<td>'+
										 'Php '+number_format(balance, 2,'.', ',')+
										'</td>'+
										'<td>';
								if (balance > 0) {
									payables += '<button type="button" id="managePayment'+result[x].rowID+'" data-id="'+result[x].rowID+'" data-assessment-id="'+assessmentID+'" data-toggle="modal" data-target="#managePaymentModal" data-backdrop="static" data-keyboard="false" class="managePayment btn btn-sm btn-outline-primary pull-right"><i class="ti ti-pencil"></i></button>';
								}			
			payables	+=  '</td>'+
									'</tr>';
		}

		jQuery('#assessmentPayables'+id).html(payables);

		jQuery('[class^=managePayment]').click(function(){
			var id = jQuery(this).attr('data-id');
			var assessmentID = jQuery(this).attr('data-assessment-id');

			managePayment(id, assessmentID);
		});
	});
}

getAssessmentInfo(id, assessmentID);

jQuery('[class^=nav-items]').on('click', function() {
	id = jQuery(this).attr('id');
	dataId = jQuery(this).attr('data-id');
	assessmentID = jQuery(this).attr('data-assessment-id');

	getAssessmentInfo(id, assessmentID);

	checkFeeRow();
});

function managePayment(id, assessmentID) {
	jQuery.getJSON('get_payables_info',{id: id, assessmentID: assessmentID}, function(result){
		var payables;
		// console.log(result);

			var balance = result.balance;
			if (balance == null) {
				balance = 0;
			}
			if (parseFloat(balance) < 0) {
				balance = 0;
			}

			payables = '<tr>'+
									  '<td>'+
										  '<strong>'+result.payables.capitalize()+'</strong>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(result.amountDue, 2, '.', ',')+'</div>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(result.prevPymnt, 2, '.', ',')+'</div>'+
									  '</td>'+
									  '<td>'+
									    '<div style="text-align: right;">'+number_format(balance, 2, '.', ',')+'</div>'+
									  '</td>'+
									'</tr>';

		jQuery('#totalPayables').val(result.amountDue);
		jQuery('#assessmentRowId').val(result.rowID);
		jQuery('#remainingBalance').val(parseFloat(balance));

		jQuery('#soahere').html(payables);
		jQuery('#paymentAssessmentID').val(assessmentID);
	});
}

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

jQuery('#amountPaid').on('change', function(){
	var amount = jQuery(this).val();
	var payables = jQuery('#totalPayables').val();
	var remainingBalance = jQuery('#remainingBalance').val();
	var balance = 0;
	var sukli = 0;

	if (remainingBalance > 0)
	{
		balance = parseFloat(remainingBalance) - parseFloat(amount);
		if (parseFloat(amount) > parseFloat(remainingBalance)){
			sukli = parseFloat(amount) - parseFloat(remainingBalance);
		} else {
			sukli = 0;
		}
	}
	else
	{
		balance = parseFloat(payables) - parseFloat(amount);
		if (parseFloat(amount) > parseFloat(payables)){
			sukli = parseFloat(amount) - parseFloat(payables);
		} else {
			sukli = 0;
		}
	}

	if (balance > 0) {
		balance = balance;
	} else {
		balance = 0
	}

	jQuery('#balanceHere').html(number_format(balance, 2, '.', ','));
	jQuery('#sukliHere').html(number_format(sukli, 2, '.', ','));
	jQuery('#balanceAmt').val(parseFloat(balance));
});

checkFeeRow();

var form = jQuery('#paymentForm');

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