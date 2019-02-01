
	jQuery('#feeTbl tbody').on('click', '[class^=editRow]', function () {
    var data = jQuery(this).attr('data-id');

    jQuery.ajax({
    	type: 'GET',
    	data: {id: data},
    	dataType: 'json',
    	url: 'fee-mgr/get_fee_table',
    	before:function(){
    		//
    	},
    	success:function(data){
    		console.log(data);
    		jQuery.ajax({
    			type: 'GET',
    			url: 'fee-mgr/get_departments',
    			dataType: 'json',
    			success:function(dept){
    				// console.log(dept);
    				// var html = '<option value="'+data.fee_for+'">'+data.fee_for+' - '+data.dept_code+'</option>';
    				var html = '<option value="">---</option>'
    				if (dept != false){
    					for(let x = 0;x <= dept.length - 1;x++) {
    						if (dept[x].dept_id == data.fee_for){
    							html += '<option value="'+dept[x].dept_id+'" selected>'+dept[x].dept_id+' - '+dept[x].dept_code+'</option>';
    						} else {
    							html += '<option value="'+dept[x].dept_id+'">'+dept[x].dept_id+' - '+dept[x].dept_code+'</option>';
    						}
    					}

    					jQuery('.fFor').html(html);
    				}else {
    					jQuery('.fFor').html(html);
    				}
    			}
    		});

    		var html = '<small style="display:block;padding: 10px 10px 10px 0px;font-size: 11px;"><i>Fields with (*) are mandatory. Please don\'t leave it blank</i></small>'+
    		    '<div class="row form-group">'+
    		      '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
    		        '<div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Fee Name:</label></div>'+
    		        '<div class="col-lg-9 col-sm-10 col-xs-12">'+
    		          '<input type="text" id="fname" name="fname" placeholder="Fee Name" value="" class="form-control form-control-sm" required data-parsley-required-message="This field is required" maxlength="50">'+
    		        '</div>'+
    		      '</div>'+
    		    '</div>'+
    		    '<div class="row form-group">'+
    		      '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
    		        '<div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Fee Code:</label></div>'+
    		        '<div class="col-lg-3 col-sm-3 col-xs-12">'+
    		          '<input type="text" id="fcode" name="fcode" placeholder="Fee Code" class="form-control form-control-sm" data-parsley-remote="fee-mgr/check_feecode" data-parsley-remote-options=\"{ "type": "GET", "dataType": "json", "data": { "fcode": "value" } }\" data-parsley-remote-message="Code already exists" required data-parsley-required-message="This field is required" maxlength="10">'+
    		        '</div>'+
    		      '</div>'+
    		    '</div>'+
    		    '<div class="row form-group">'+
    		      '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
    		        '<div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*Amount:</label></div>'+
    		        '<div class="col-lg-3 col-sm-3 col-xs-12">'+
    		          '<input type="text" id="amnt" name="amnt" placeholder="Amount" class="form-control form-control-sm" data-parsley-type="integer" required data-parsley-required-message="This field is required" maxlength="5">'+
    		        '</div>'+
    		      '</div>'+
    		    '</div>'+
    		    '<div class="row form-group">'+
    		      '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'+
    		        '<div class="col-lg-1 col-sm-2 d-none d-sm-block" style="padding: 5px 0px 5px 0px;"><label class="form-control-label">*For:</label></div>'+
    		        '<div class="col-lg-3 col-sm-3 col-xs-12">'+
    		          '<select name="fFor" class="fFor form-control form-control-sm" required data-parsley-required-message="This field is required">'+
    		            '<option value="">---</option>'+
    		          '</select>'+
    		        '</div>'+
    		      '</div>'+
    		    '</div>';

  		  jQuery('#editRes').html(html);

  		  var eform = jQuery('#editFeeModal');

  		  eform.parsley({
  		    errorClass: 'is-invalid text-danger',
  		    // successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
  		    errorsWrapper: '<span class="form-text text-danger" style="font-size: 12px;"></span>',
  		    errorTemplate: '<span></span>',
  		    trigger: 'change'
  		  });

  		  eform.on('submit', function(e) {
  		    e.preventDefault();

  		    Swal({
  		      title: 'Update fee?',
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
  		          data: eform.serialize(),
  		          dataType: 'json',
  		          url: 'fee-mgr/update_fee',
  		          success:function(res){
  		            if (res != false) {
  		              Swal(
  		                'Created!',
  		                'Fee has been updated to the record.',
  		                'success',
  		              );
  		              console.log(res);
  		              var status = '';
  		              if (res.status == 1){
  		              	status = '<span class="badge badge-success">Active</span>';
  		              }else{
  		              	status = '<span class="badge badge-danger">Inactive</span>';
  		              }
  		              dtble.row.add([
  		                  res.row_id,
  		                  res.fee_code,
  		                  res.fee_name,
  		                  '<span class="text-right" style="display:block">'+res.amount+'</span>',
  		                  '<span class="text-center" style="display:block">'+res.dept_code+'</span>',
  		                  '<span class="text-center" style="display:block">'+status+'</span>',
  		                  '<button type="button" data-id="'+res.row_id+'" data-toggle="modal" data-target="#editFeeModal" data-backdrop="static" data-keyboard="false" class="editRow btn btn-outline-primary btn-sm"><i class="ti ti-pencil"></i></button>',
  		                ]).draw();

  		              jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
  		            }
  		            else {
  		              Swal(
  		                'Error!',
  		                'Failed to update record to the record! Please try again.',
  		                'error'
  		              );
  		            }
  		          }
  		        });
  		      }
  		    })
  		  });
    	}
    });
  });