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
var assessmentID = navContents.attr('data-assessmentID');

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

jQuery.getJSON('get_assessment_info',{id: dataId, assessmentID: assessmentID}, function(result){
	var payables;
	var balance = 0;
	for(let x = 0;x <= result.length-1;x++){
		balance = result[x].balance;
			
			if (balance == null) {
				balance = parseFloat(result[x].amountDue);
			} else if (parseFloat(balance) < 0) {
				balance = 0;
			} else {
				balance = parseFloat(result[x].balance);
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

jQuery('[class^=nav-item]').on('click', function() {
	id = jQuery(this).attr('id');
	dataId = jQuery(this).attr('data-id');
	assessmentID = jQuery(this).attr('data-assessmentID');

	jQuery.getJSON('get_assessment_info',{id: dataId, assessmentID: assessmentID}, function(result){
		var payables;
		for(let x = 0;x <= result.length-1;x++){
			var balance = parseFloat(result[x].balance);
			if (balance > 0) {
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

	checkFeeRow();
});

function checkFeeRow() {
	jQuery.each(jQuery('.checkFee'), function(){
		var dataID = jQuery(this).attr('data-id');
		var assessmentID = jQuery(this).attr('data-assessmentID');
		var $this = jQuery(this);
		jQuery.getJSON('check_fee_row', {id: dataID, assessmentID: assessmentID}, function(result){
			if (result == true) {
				$this.prop('checked', true);
			}
		});
	});
}

checkFeeRow();