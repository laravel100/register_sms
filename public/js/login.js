// JavaScript Document
var w = $('#log_height').position().top+($('#log_height').position().top)/1.3+'px';
$('#back').css('height',w);
function vie_win(){

		$('#back').css('display','block');
		$('#back').css('z-index','9000');
		$('#vxod').css('display','block');
		$('#vost').css('display','none');
		$('#registr').css('display','none');
}
function hid_win(){

		$('#back').css('display','none');
		$('#back').css('z-index','0');
		$('#registr').css('display','none');
		$('#vost').css('display','none');
}
function show_reg(){
	$('#vxod').css('display','none');
	$('#registr').css('display','block');
	$('#vost').css('display','none');
}
function show_vost(){
	$('#vxod').css('display','none');
	$('#registr').css('display','none');
	$('#vost').css('display','block');
}	
function show_vxod(){
	$('#vxod').css('display','block');
	$('#registr').css('display','none');
	$('#vost').css('display','none');
}
