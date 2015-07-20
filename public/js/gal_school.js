// JavaScript Document
function school_photo(namber_drop)
{
	var q=namber_drop-1;
	var fall_1='#gal_school'+q;
	$(fall_1).removeClass('in');
	var w=namber_drop+1;
	fall_2='#gal_school'+w;
	$(fall_2).removeClass('in');

	var fall='#gal_school'+namber_drop;
	$(fall).addClass('in');
}
function school_photo_out()
{
	var temp;
		for(var i=1;i<4;i++)
		{
			temp='#gal_school'+i;
			$(temp).removeClass('in');		
		}
}
function video()
{
	$('#photo').css('display','none');
	$('#video').css('display','block');
	$('#back_video').css('background','rgb(244,230,211)');
	$('#back_photo').css('background','white');
}
function photo()
{
	$('#photo').css('display','block');
	$('#video').css('display','none');
	$('#back_video').css('background','white');
	$('#back_photo').css('background','rgb(244,230,211)');
}
var qwe=0;
function asd(){
	qwe=window.event.clientX;
}

function hid_gal_2(q)
{
	var temp="#slide_";
	for(var i=1;i<=q;i++)
	$(temp+i).removeClass('active');
	$('#change_gal').css('display','none');
	$('#main').css('display','block');
	$('#fancy_outer').css('display','none');
}
function qz(z)
{
	if($('#fancy_outer').css('display')=='block')
{
	$('#hid_up_gallery').css('display','none');
	var temp="#slide_"+z;
	$(temp).addClass('active');
	$('#change_gal').css('display','block');
	$('#main').css('display','none');
	$('#fancy_outer').css('display','none');
}	
}
function show_gal_2(q)
{
	setTimeout('qz('+q+')',50000000000000000000000000000000000);
}