jQuery(document).ready(function() {
  jQuery('.docu:checkbox').on('click', function(){
    if(jQuery(this).is(':checked')){
      jQuery(this).val(1);
    }
    else {
      jQuery(this).val(0);
    }
  });

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
      title: 'Register Student?',
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
          url: 'register_student',
          success:function(data){
            if (data == true) {
              Swal(
                'Registered!',
                'Student has been added to the record.',
                'success',
              );
              // form.find("input[type=text], input[type=date], textarea").val("");
              jQuery(':input').not(':button, :submit, :reset, :hidden').removeAttr('checked').removeAttr('selected').val('');
              jQuery('#perm_addrs').prop('readonly', false);
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

  var ticker = jQuery('#addr_ticker');
  var cur_addrs = jQuery('#cur_addrs');
  var perm_addrs = jQuery('#perm_addrs');
  ticker.on('click', function() {
    if (ticker.is(':checked')){
      perm_addrs.val(cur_addrs.val());
      perm_addrs.prop('readonly', true);
    }
    else{
      perm_addrs.prop('readonly', false);
      perm_addrs.val('');
    }
  });
});