jQuery(function() {
	var acadForm = jQuery('#acadYearForm');

	acadForm.parsley({
	  errorClass: 'is-invalid text-danger',
	  // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	acadForm.on('submit', function(e) {
	  e.preventDefault();

	  Swal({
	    title: 'Update academic year?',
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
	        data: acadForm.serialize(),
	        dataType: 'json',
	        url: 'aysem/update_acadyear',
	        success:function(data){
          	Swal(
          	  'Updated!',
          	  'Academic year has been updated.',
          	  'success',
          	);

          	jQuery('#acadYear').html(data.acadYear);
          	jQuery('#acadYrModal').modal('hide');
	        },
	        error:function(){
	        	Swal(
              'Error!',
              'Failed to update academic year! Please try again.',
              'error'
            );
	        }
	      });
	    }
	  })
	});

	var semForm = jQuery('#semForm');

	semForm.parsley({
	  errorClass: 'is-invalid text-danger',
	  // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	semForm.on('submit', function(e) {
	  e.preventDefault();

	  Swal({
	    title: 'Update semester?',
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
	        data: semForm.serialize(),
	        dataType: 'json',
	        url: 'aysem/update_semester',
	        success:function(data){
          	Swal(
          	  'Updated!',
          	  'Semester has been updated.',
          	  'success',
          	);

          	jQuery('#semester').html(data.semester+' Semester');
          	jQuery('#semesterModal').modal('hide');
	        },
	        error:function(){
	        	Swal(
              'Error!',
              'Failed to update semester! Please try again.',
              'error'
            );
	        }
	      });
	    }
	  })
	});
});