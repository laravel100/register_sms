
function cal_call(el){	
	var dates_vebinar = $(el).find('input').val();
	$.ajax({
		type: "POST",
		url: "index/calendar",
		cache: false,
		data: "&dates_vebinar_1="+dates_vebinar,
		success: function(html){
			$("#main_calendar").hide();
			$("#main_calendar_description").css('display','block');
			$("#main_calendar_description").html(html);		
			//$(".main_calendar_description").empty();
		}
	});	
	return true;		
}
