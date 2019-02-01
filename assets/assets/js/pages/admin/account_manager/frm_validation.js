jQuery(document).ready(function() {
	var form = jQuery('#regForm');

	form.parsley({
	  errorClass: 'is-invalid text-danger',
	  // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	form.on('submit', function(e) {
	  e.preventDefault();
	  // var f = jQuery(this);
	  // f.parsley().validate();

	  Swal({
	    title: 'Register new account?',
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
	        url: 'register_account',
	        success:function(data){
	          if (data == true) {
	            Swal(
	              'Registered!',
	              'Account has been added to the record.',
	              'success',
	            );
	            // form.find("input[type=text], input[type=date], textarea").val("");
	            jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
	          }
	          else {
	            Swal(
	              'Error!',
	              'Failed to add student to the record! Please try again.',
	              'error'
	            );
	          }
	        }
	      });
	    }
	  })
	});
});