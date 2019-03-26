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
		jQuery('#soa').css('display', 'none');
	});

	var form = jQuery('#createStatement');

	form.parsley({
	  errorClass: 'is-invalid text-danger',
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	form.on('submit', function(e) {
	  e.preventDefault();
	  jQuery('#soa').css('display', 'none');
	  jQuery.ajax({
	    type: 'POST',
	    data: form.serialize(),
	    dataType: 'json',
	    url: 'create_statement',
	    beforeSend:function(){
	    	jQuery('.spinners').css('display', 'block');
	    },
	    complete: function(){
      	jQuery('.spinners').css('display', 'none');
      },
	    success:function(data){
	    	var studFullname = data.studInfo.stud_lname+', '+data.studInfo.stud_fname+' '+data.studInfo.stud_mname;
	    	var department = jQuery('#department').val();
	    	var html;
	    	jQuery('#studid').html(data.studInfo.stud_id);
	    	jQuery('#studFullName').html(studFullname);
	    	if (department == 'ELEMENTARY'){
	    		jQuery('#studType').html('GRADE LEVEL:');
	    	}
	    	if (department == 'JUNIORHS'){
	    		jQuery('#studType').html('GRADE LEVEL:');
	    	}
	    	if (department == 'SENIORHS'){
	    		jQuery('#studType').html('GRADE LEVEL:');
	    	}
	    	if (department == 'COLLEGE'){
	    		jQuery('#studType').html('COURSE:');
	    	}
	    	jQuery('#course').html(data.studInfo.course_code);
	    	jQuery('#regDate').html(data.studInfo.stud_rgstrtn_dte);
	    	jQuery('#status').html(data.studInfo.stud_status);
	    	for(let i = 0; i < data.transactions.length;i++){
	    		html += '<tr><td>'+data.transactions[i].payables+'</td>'+
	    						'<td>'+data.transactions[i].orNum+'/'+data.transactions[i].invoiceNum+'</td>'+
	    						'<td>'+data.transactions[i].transDate+'</td>'+
	    						'<td>'+number_format(data.transactions[i].amountDue, 2, '.', ',')+'</td>'+
	    						'<td>'+number_format(data.transactions[i].amountPaid, 2, '.', ',')+'</td>'+
	    						'<td>'+number_format(data.transactions[i].balanceAmt, 2, '.', ',')+'</td></tr>';
	    	}

	    	jQuery('#soaResultHere').html(html);
	      jQuery('#soa').css('display', 'block');
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