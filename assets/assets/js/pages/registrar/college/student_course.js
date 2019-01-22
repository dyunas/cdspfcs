jQuery(document).ready(function() {
	jQuery.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'get_student_course',
		success:function(course){
			// console.log(course);
			var html = '<option value="">Course</option>';
			if (course != false) {
				for(var x = 0; x <= course.length-1; x++){
					html += '<option value="'+course[x].course_id+'">'+course[x].course_code+'</option>';
				}
			}
			// console.log(html);
			jQuery('#stud_course').html(html);
		}
	});

	jQuery('#stud_course').change(function() {
		var course_id = jQuery('#stud_course').val();
		jQuery.ajax({
			type: 'GET',
			dataType: 'json',
			data: {id: course_id},
			url: 'get_course_years',
			success:function(yrLvl){
				console.log(yrLvl);
				var html = '<option value="">---</option>';
				if (yrLvl != false) {
					for(var x = 1; x <= yrLvl.no_of_yrs; x++){
						html += '<option value="'+x+'">'+x+'</option>';
					}
				}
				// console.log(html);
				jQuery('#yr_lvl').html(html);
			}
		});
	});
});