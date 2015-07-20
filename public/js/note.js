// JavaScript Document
function show_note()
{
var w = $('#log_height').position().top+($('#log_height').position().top)/1.3+'px';
$('#note').css('height',w);
$('#note').css('display','block');
}
function hide_note()
{
$('#note').css('display','none');
}