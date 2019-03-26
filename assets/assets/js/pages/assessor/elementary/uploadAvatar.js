jQuery(function() {
	var uploadForm = jQuery('#uploadForm');

	uploadForm.parsley({
	  errorClass: 'is-invalid text-danger',
	  errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
	  errorTemplate: '<span></span>',
	  trigger: 'change'
	});

	uploadForm.on('submit', function(e) {
	  e.preventDefault();

	  Swal({
	    title: 'Upload avatar?',
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
	        url: 'upload_avatar',
	        success:function(data){
	          if (data != false) {
	            Swal(
	              {
	              	title: 'Uploaded!',
	              	text: 'Avatar has been uploaded.',
	              	type: 'success'
	            	}).then(
	            	function(){
	            		jQuery('#uploadModal').modal('hide');
	            	  window.location.reload();
	            	}
	            );
	          }
	          else {
	            Swal(
	              'Error!',
	              'Failed to upload avatar! Please try again.',
	              'error'
	            );
	          }
	        },
	        error:function(){
	        	//
	        }
	      });
	    }
	  })
	});
});