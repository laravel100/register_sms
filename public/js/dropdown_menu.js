// JavaScript Document
function dropmen(){
			$('#drop').css('display','block');
		}
function dropout(){
			$('#drop').css('display','none');
		}
function menu(namber_menu){
			var menu='#collapse'+namber_menu;
			$(menu).addClass('in');
			var i=namber_menu+1;
			var menu_close='#collapse'+i;
			if($(menu_close).hasClass('in'))
				$(menu_close).removeClass('in');
		}
function menuclose(namber_menu){
			var i=namber_menu-1;
			var menu='#collapse'+i;
			$(menu).removeClass('in');
		}
var q = $('#posit').position().left+'px';
$('#drop').css('margin-left',q);