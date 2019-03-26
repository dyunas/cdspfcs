jQuery(function() {
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

	jQuery('[class^=checkHistory]').click(function(){
		var orNum = jQuery(this).attr('data-id');

		jQuery.ajax({
			'type': 'get',
			'data': {orNum: orNum},
			'dataType': 'json',
			'url': '../get_payment_history',
			success:function(result){
				jQuery('#orNum').html(result.orNum);
				jQuery('#invoiceNum').html(result.invoiceNum);
				var prevPayment = 0;
				var prevBalance = 0;
				if (result.prevPayment != null){
					prevPayment = result.prevPayment;
				}
				if (result.prevBalance != null){
					prevBalance = result.prevBalance;
				}
				
				var sukli = 0;

				if (prevBalance > 0)
				{
					if (parseFloat(result.amountPaid) > parseFloat(prevBalance)){
						sukli = parseFloat(result.amountPaid) - parseFloat(prevBalance);
					} else {
						sukli = 0;
					}
				}
				else
				{
					if (parseFloat(result.amountPaid) > parseFloat(result.amountDue)){
						sukli = parseFloat(result.amountPaid) - parseFloat(result.amountDue);
					} else {
						sukli = 0;
					}
				}
				var table = '<tr>'+
											'<td>'+result.payables+'</td>'+
											'<td style="text-align:right">Php '+number_format(result.amountDue, 2, '.', ',')+'</td>'+
											'<td style="text-align:right">Php '+number_format(prevPayment, 2, '.', ',')+'</td>'+
											'<td style="text-align:right">Php '+number_format(prevBalance, 2, '.', ',')+'</td>'+
										'</tr>';
				jQuery('#historySoahere').html(table);
				jQuery('#historyAmountPaid').html('Php '+number_format(result.amountPaid, 2, '.', ','));
				jQuery('#historySukli').html('Php '+number_format(sukli, 2, '.', ','));
				jQuery('#historyBalanceHere').html('Php '+number_format(result.balanceAmt, 2, '.', ','));
				jQuery('#cashierName').html(result.fname+' '+result.lname);
				jQuery('#transDate').html(result.transDate);
			},
			error:function(){
				//
			}
		});
	});
});