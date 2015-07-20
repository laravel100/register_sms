// JavaScript Document
function show_courses()
{
	$('#my_cab').css('display','none');
	$('#my_blog').css('display','none');
	$('#my_courses').css('display','block');
}
function show_blog()
{
	$('#my_cab').css('display','none');
	$('#my_blog').css('display','block');
	$('#my_courses').css('display','none');
}
function show_cab()
{
	$('#my_cab').css('display','block');
	$('#my_blog').css('display','none');
	$('#my_courses').css('display','none');
}
// function show_time(q)
// {
	// var temp = '#timetable_'+q;
	// if($(temp).css('display')=='none')
	// $(temp).css('display','block');
	// else
	// $(temp).css('display','none');	
// }
// function hide_time()
// {
	// var temp;
	// for(var i=1;i<4;i++)
	// {
		// temp = '#timetable_'+i;
		// $(temp).css('display','none');
	// }
// }
function show_time(q)
{
	var temp = '#timetable_'+q;
	if($(temp).css('visibility')=='hidden')
	$(temp).css('visibility','visible');
	else
	$(temp).css('visibility','hidden');	
}
function hide_time()
{
	var temp;
	for(var i=1;i<4;i++)
	{
		temp = '#timetable_'+i;
		$(temp).css('visibility','hidden');
	}
}
//animate({'margin-left':'-100%'},1000); visibility:hidden;