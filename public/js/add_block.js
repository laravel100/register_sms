$(document).ready(function() {
	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('href');
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		$('#mask').fadeIn(1000);
		$('#mask').fadeTo("slow",0.8);
		var winH = $(window).height();
		var winW = $(window).width();
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
		$(id).fadeIn(2000);
	});
	$('.window .closes').click(function (e) {
		e.preventDefault();
		$('#mask, .window').hide();
	});
    $('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
	
});
	
$(function(){
	$('#add_text').submit(function(){
					// Отсылаем паметры
					var body = tinyMCE.get('body');
					var body_text=body.getContent();
					var id_block_1 = $('#id_block_1').val();
	                var id_new = $('#id_new').val();
						$.ajax({
							type: "POST",
							url: "../../adminNews/add_block_text",
							cache: false,
							data: {body_text: body_text, id_block_1: id_block_1, id_new: id_new}, // <- look this
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								body.setContent(''); // <-- look this
								add_id();
								
							}
						});
				return false;
				});
		
});
$(function(){
	    $('#add_two_text').submit(function(e){
				 
					// Отсылаем паметры
					var body = tinyMCE.get('body_two_text');
					var body_two_text = body.getContent();
					var id_block_2 = $('#id_block_2').val();
	                var id_new = $('#id_new').val();
					
						$.ajax({
							type: "POST",
							url: "../add_block_two_text",
							cache: false,
							data: {body_two_text: body_two_text, id_block_2: id_block_2, id_new: id_new},
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								body.setContent('');
								add_id();
							}
						});
				return false;
				});
});
$(function(){		
		$('#add_quote').submit(function(e){
				 
					// Отсылаем паметры
					var body = tinyMCE.get('body_quote');
					var body_quote = body.getContent();
					var quote_avtor = $('#quote_avtor').val();
					var id_block_3 = $('#id_block_3').val();
	                var id_new = $('#id_new').val();
					
						$.ajax({
							type: "POST",
							url: "../add_block_quote",
							cache: false,
							data: {body_quote: body_quote, id_block_3: id_block_3, id_new: id_new, quote_avtor: quote_avtor},
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								body.setContent('');
								add_id();
							}
						});
				return false;
				});
});
$(function(){			
		$('#add_slider').submit(function(e){
				 
					// Отсылаем паметры
					var alt=[];
					var id_block_4 = $('#id_block_4').val();
	                var id_new = $('#id_new').val();
					for (k=0; k<=15; k++){
						if(typeof $('#alt_'+k).val()!='undefined'){
						alt[k]=$('#alt_'+k).val();
						}else{}
					}
					alt_slider=alt;
						$.ajax({
							type: "POST",
							url: "../add_block_slider",
							cache: false,
							data: "image_slider="+image_slider+"&id_block_4="+id_block_4+"&id_new="+id_new+"&alt_slider="+alt_slider,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
				});
});	
$(function(){			
		$('#add_slider_text').submit(function(e){
				 
					// Отсылаем паметры
					var alt=[];
					var id_block_5 = $('#id_block_5').val();
	                var id_new = $('#id_new').val();
				    for (k=0; k<=15; k++){
						if(typeof $('#alt_'+k).val()!='undefined'){
						alt[k]=$('#alt_'+k).val();
						}else{}
					}
					alt_slider_text=alt;  
					
						$.ajax({
							type: "POST",
							url: "../add_block_slider_text",
							cache: false,
							data: "image_slider_text="+image_slider_text+"&id_block_5="+id_block_5+"&id_new="+id_new+"&alt_slider_text="+alt_slider_text,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
		});
});	

 $(function(){		
		$('#add_video_text').submit(function(e){
				 
					// Отсылаем паметры
					var video_link = $('#video_link').val();
					var id_block_6 = $('#id_block_6').val();
	                var id_new = $('#id_new').val();
					
						$.ajax({
							type: "POST",
							url: "../add_block_video_text",
							cache: false,
							data: "video_link="+video_link+"&id_block_6="+id_block_6+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
		});
});		
	
$(function(){		
		$('#add_header').submit(function(e){
					
					// Отсылаем паметры
					//var image_name = $('#image_name').val();
					//var chk_filename = $('#chk_filename').val();
					//var chk_rename = $('#chk_rename').val();
					//var rename = $('#rename').val();"rename="+rename+"chk_filename="+chk_filename+"chk_rename="+chk_rename+
					var id_block_7 = $('#id_block_7').val();
	                var id_new = $('#id_new').val();
					var alt_image_header = $('#alt_image_header').val();
					alert(name);
						$.ajax({
							type: "POST",
							url: "../add_block_header",
							cache: false,
							data: "&name="+name+"&id_block_7="+id_block_7+"&id_new="+id_new+"&alt_image_header="+alt_image_header,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false; 
		});
		
});	
$(function(){	
		$('#add_header1').submit(function(e){
				 
					// Отсылаем паметры
					//var image_name1 = $('#image_name1').val();
					var id_block_8 = $('#id_block_8').val();
	                var id_new = $('#id_new').val();
					var alt_image_header1 = $('#alt_image_header1').val();
					
						$.ajax({
							type: "POST",
							url: "../add_block_header1",
							cache: false,
							data: "&name="+name+"&id_block_8="+id_block_8+"&id_new="+id_new+"&alt_image_header1="+alt_image_header1,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
		});
});	
$(function(){	
		$('#add_header2').submit(function(e){
				 
					// Отсылаем паметры
					//var image_name2 = $('#image_name2').val();
					var id_block_9 = $('#id_block_9').val();
	                var id_new = $('#id_new').val();
					var alt_image_header2 = $('#alt_image_header2').val();
					
						$.ajax({
							type: "POST",
							url: "../add_block_header2",
							cache: false,
							data: "&name="+name+"&id_block_9="+id_block_9+"&id_new="+id_new+"&alt_image_header2="+alt_image_header2,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
		});
});	
$(function(){	
		$('#add_image').submit(function(e){
				 
					// Отсылаем паметры
					//var image_name3 = $('#image_name3').val();
					var id_block_10 = $('#id_block_10').val();
	                var id_new = $('#id_new').val();
					var alt_image_img = $('#alt_image_img').val();
						$.ajax({
							type: "POST",
							url: "../add_block_image",
							cache: false,
							data: "name="+name+"&id_block_10="+id_block_10+"&id_new="+id_new+"&alt_image_img="+alt_image_img,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								add_id();
							}
						});
				return false;
		});
});
$(function(){
	$('#add_text_fon').submit(function(){
				 
					// Отсылаем паметры
					var body_fon = tinyMCE.get('body_fon');
					var body_text_fon=body_fon.getContent();
					var id_block_11 = $('#id_block_11').val();
					var color = $('#color_fon').val();
	                var id_new = $('#id_new').val();
						$.ajax({
							type: "POST",
							url: "../add_block_text_fon",
							cache: false,
							data: {body_text_fon: body_text_fon, id_block_11: id_block_11, id_new: id_new, color: color},
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty();
							    $("#block_body").html(html);
								$('#mask').hide();
								$('.window').hide();
								body_fon.setContent('');
								add_id();
							}
						});
				return false;
				});
		
});

function text(id_new, number){
						$.ajax({
							type: "POST",
							url: "../edit_block_text",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};

function text_two(id_new, number){	
	
						$.ajax({
							type: "POST",
							url: "../edit_block_text_two",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};

 function text_quote(id_new, number){	
		
						$.ajax({
							type: "POST",
							url: "../edit_block_text_quote",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};
 
 function text_fon(id_new, number){
						$.ajax({
							type: "POST",
							url: "../edit_block_text_fon",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};
function video_text(id_new, number){
						$.ajax({
							type: "POST",
							url: "../edit_block_video",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};


function delete_block(id_new, number){
						$.ajax({
							type: "POST",
							url: "../delete_block",
							cache: false,
							data: "number="+number+"&id_new="+id_new,
							// Выводим то что вернул PHP
							success: function(html){
							    $("#block_body").empty(); 
							    $("#block_body").html(html);
								add_id();
							}
						});
				return false;
};

function add_id() {
	
	$('#block_body').sortable({
        items: '> div[class^=body_block]'
    });
	var chieldArray=$('.ui-sortable').children('div[class^=body_block]');
	for (var i = 0; i < chieldArray.length; i++) {
		var val_id=$('.id_block_'+i).attr('id');
		chieldArray[i].id=val_id;
		var a=$('#'+val_id).next('div[style="cursor:pointer;"]');//.appendTo('#'+val_id);
		var b=$('#'+val_id).next('div[style="cursor:pointer;"]').next();//.appendTo('#'+val_id);
		if(b){
		var c=$.merge(a,b);
		c.appendTo('#'+val_id);
		}else{
		a.appendTo('#'+val_id);
		}
	}
	$('.body_block').find('br').remove();

}






