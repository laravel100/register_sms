// JavaScript Document
function show_com(q)
{
var temp="#com"+q;
var temp1="#but_com"+q;
var temp2="#but_hid"+q;
$(temp).addClass('in');
$(temp1).css('display','none');
$(temp2).css('display','block');
}
function hid_com(q)
{
var temp="#com"+q;
var temp1="#but_com"+q;
var temp2="#but_hid"+q;
$(temp).removeClass('in');
$(temp2).css('display','none');
$(temp1).css('display','block');

}