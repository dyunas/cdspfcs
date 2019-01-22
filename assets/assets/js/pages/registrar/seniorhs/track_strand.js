jQuery(document).ready(function() {
	jQuery.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'get_track_list',
		success:function(track){
			// console.log(track);
			var html = '<option value="">---</option>';
			if (track != false) {
				for(var x = 0; x <= track.length-1; x++){
					html += '<option value="'+track[x].trk_id+'">'+track[x].track+'</option>';
				}
			}
			// console.log(html);
			jQuery('#track').html(html);
		}
	});

	jQuery('#track').change(function() {
		var track_id = jQuery('#track').val();
		// console.log(track_id);
		jQuery.ajax({
			type: 'GET',
			dataType: 'json',
			data: {id: track_id},
			url: 'get_strand_list',
			success:function(strand){
				// console.log(strand);
				var html = '<option value="">---</option>';
				if (strand != false) {
					for(var x = 0; x <= strand.length-1; x++){
						html += '<option value="'+strand[x].strnd_id+'">'+strand[x].strand+'</option>';
					}
				}
				// console.log(html);
				jQuery('#strand').html(html);
			}
		});
	});
});