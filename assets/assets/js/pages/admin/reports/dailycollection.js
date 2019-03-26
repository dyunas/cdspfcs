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

	jQuery('#reset').on('click', function() {
		jQuery('#dailies').css('display', 'none');
	});

	var dailyForm = jQuery('#dailyForm');

		dailyForm.parsley({
		  errorClass: 'is-invalid text-danger',
		  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
		  errorTemplate: '<span></span>',
		  trigger: 'change'
		});

		dailyForm.on('submit', function(e) {
		  e.preventDefault();
		  jQuery('#dailies').css('display', 'none');
		  jQuery.ajax({
		    type: 'POST',
		    data: dailyForm.serialize(),
		    dataType: 'json',
		    url: 'get_daily_collection',
		    beforeSend:function(){
		    	jQuery('.spinners').css('display', 'block');
		    },
		    complete: function(){
	      	jQuery('.spinners').css('display', 'none');
	      },
		    success:function(data){
		    	var department = jQuery('#department').val();
		    	var html;
	    		var totalColledted = 0;
		    	if (data != false){
		    		for(let i = 0; i < data.length;i++){
		    		var studFullname = data[i].stud_lname+', '+data[i].stud_fname+' '+data[i].stud_mname;
		    			html += '<tr><td>'+studFullname+'</td>'+
		    							'<td>'+data[i].payables+'</td>'+
		    							'<td>'+data[i].orNum+'/'+data[i].invoiceNum+'</td>'+
		    							'<td>'+data[i].transDate+'</td>'+
		    							'<td>Php '+number_format(data[i].amountDue, 2, '.', ',')+'</td>'+
		    							'<td>Php '+number_format(data[i].amountPaid, 2, '.', ',')+'</td>'+
		    							'<td>Php '+number_format(data[i].balanceAmt, 2, '.', ',')+'</td></tr>';
		    			totalColledted += parseFloat(data[i].amountPaid);
		    		}	
		    	} else {
		    		html = "<tr><td colspan='7'>No result</td></tr>";
		    	}
	    		jQuery('#dailiesResultHere').html(html);
	    		jQuery('#totalCollected').html('Php '+number_format(totalColledted, 2, '.', ','));
	    	  jQuery('#dailies').css('display', 'block');
		    },
		    error:function(){
		    	//
		    }
		  });
		});

		jQuery('#print').on('click', function(){
			// jQuery('#soa').print();
			window.print();
		});
});