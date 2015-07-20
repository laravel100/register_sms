

function show(controller,sort,num){
//console.log(num);
	//¬ыполн¤ем если по кнопке кликнули
   $.ajax({
          url: controller,
          type: "POST",
          data: {"num": num, "sort":sort},
          cache: false,
          success: function(html){
			//alert(html);
			//alert(JSON.parse(html).length);
		  if(JSON.parse(html).length==9){
			$("#load").show();
		  }
				
              if(JSON.parse(html).length<9){  // смотрим ответ от сервера и выполн¤ем соответствующее действие
			     $("#load").hide();
                 //alert("Больше нет записей"); 
              }
			     function shuffle( array ) {	
					for(var j, x, i = array.length; i; j = parseInt(Math.random() * i), x = array[--i], array[i] = array[j], array[j] = x);
					return true;
				}
				//alert(JSON.parse(html).length);
				var sections={'студенты':'students','выпускники':'graduates','обзоры косметики':'cosmetics','преподаватели':'teachers'};

				var block_types = [ "preview_form_1", "preview_form_2", "preview_form_3","preview_form_4"];
				var first = ["preview_form_6","preview_form_5"];
				for(var i=0;i<4;i++){
					first.push(block_types[Math.floor(Math.random() * block_types.length)])
				}
				var second = ["preview_form_5","preview_form_5","preview_form_5"];
				for(var i=0;i<3;i++){
					second.push(block_types[Math.floor(Math.random() * block_types.length)])
				}
				
				
				var blocks=[first,second];

				var json=JSON && JSON.parse(html) || $.parseJSON(html);
				var count_of_blocks=6;
				var count_of_news=json.length;
				var counter_of_news=0;
				var count_count=0;
				var total_news=json.length;
				//alert(total_news);
				//alert(count_of_news);
				var current_array=blocks[Math.floor(Math.random() * blocks.length)];
				shuffle(current_array);
				//alert(current_array);
				var parent=document.getElementById('block_news')
				for(var i=0;i<3;i++){
					if(total_news==count_count){
						break
					}
					var news=document.createElement('div');
					news.className='head_content_td_'+(i+1);
					parent.appendChild(news);
					for(var j=0;j<2;j++){
					if(total_news==count_count){
						break
					}
						if(true){
							var news_item=document.createElement('div');
							news_item.className=current_array[counter_of_news];
							counter_of_news++;
							count_count++;
							//news_item.className='preview_form_2';
							news_item.onMouseOver=show_button();
							news.appendChild(news_item);
							switch(news_item.className){
								case "preview_form_1":  
														
														var title=document.createElement('div');
														title.className='preview_title';
														title.innerHTML=json[total_news-count_of_news]['title'];
														news_item.appendChild(title);
														var prew_content=document.createElement('div');
														prew_content.className='preview_content_1';
														news_item.appendChild(prew_content);
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];;
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.style.marginTop="130px";
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
														var img=document.createElement('img');
														img.src='/media/images/blog/news/'+json[total_news-count_of_news]['img'];
														img.width=280;
														img.height=290;
														prew_content.appendChild(img);
														var date=document.createElement('div');
														date.className='preview_date';
														date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
														news_item.appendChild(date);
														var news_type=document.createElement('span');
														news_type.className='preview_section';
														date.appendChild(news_type);
														var link=document.createElement('a');
														link.style.textDecoration='none';
														link.style.textTransform='uppercase';
														//alert(sections[json[total_news-count_of_news]['name']]);
														if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
														link.href="http://academie.by/blog/teachers";
														link.innerHTML='преподаватели';
														}else{
														link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
														link.innerHTML=json[total_news-count_of_news]['name'];
														}
														news_type.appendChild(link);
														break
								case "preview_form_2": 
														var title=document.createElement('div');
														title.className='preview_title';
														title.innerHTML=json[total_news-count_of_news]['title'];
														news_item.appendChild(title);
														var prew_content=document.createElement('div');
														prew_content.className='preview_content_2';
														news_item.appendChild(prew_content);
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.style.marginTop="130px";
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
														var div_img=document.createElement('div');
														div_img.className='preview_content_img_2';
														prew_content.appendChild(div_img);
														var img=document.createElement('img');
														img.src='/media/images/blog/news/'+json[total_news-count_of_news]['img'];
														img.width=280;
														img.height=290;
														div_img.appendChild(img);
														var div_text=document.createElement('div');
														div_text.className='preview_content_text_2';
														div_text.innerHTML=json[total_news-count_of_news]['title2'];
														prew_content.appendChild(div_text);
														var date=document.createElement('div');
														date.className='preview_date';
														date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
														news_item.appendChild(date);
														var news_type=document.createElement('span');
														news_type.className='preview_section';
														date.appendChild(news_type);
														var link=document.createElement('a');
														link.style.textDecoration='none';
														link.style.textTransform='uppercase';
														if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
														link.href="http://academie.by/blog/teachers";
														link.innerHTML='преподаватели';
														}else{
														link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
														link.innerHTML=json[total_news-count_of_news]['name'];
														}
														news_type.appendChild(link);
														break
								case "preview_form_3": 
														var title=document.createElement('div');
														title.className='preview_title';
														title.innerHTML=json[total_news-count_of_news]['title'];
														news_item.appendChild(title);
														var prew_content=document.createElement('div');
														prew_content.className='preview_content_3';
														news_item.appendChild(prew_content);
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.style.marginTop="130px";
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
														var div_img=document.createElement('div');
														div_img.className='preview_content_img_3';
														prew_content.appendChild(div_img);
														var img=document.createElement('img');
														img.src='/media/images/blog/news/'+json[total_news-count_of_news]['img'];
														img.width=280;
														img.height=290;
														div_img.appendChild(img);
														var div_text=document.createElement('div');
														div_text.className='preview_content_text_3';
														div_text.innerHTML=json[total_news-count_of_news]['title2'];
														prew_content.appendChild(div_text);
														var date=document.createElement('div');
														date.className='preview_date';
														date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
														news_item.appendChild(date);
														var news_type=document.createElement('span');
														news_type.className='preview_section';
														date.appendChild(news_type);
														var link=document.createElement('a');
														link.style.textDecoration='none';
														link.style.textTransform='uppercase';
														if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
														link.href="http://academie.by/blog/teachers";
														link.innerHTML='преподаватели';
														}else{
														link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
														link.innerHTML=json[total_news-count_of_news]['name'];
														}
														news_type.appendChild(link);
								break
								case "preview_form_4": 
														var title=document.createElement('div');
														title.className='preview_title';
														title.innerHTML=json[total_news-count_of_news]['title'];
														news_item.appendChild(title);
														var prew_content=document.createElement('div');
														prew_content.className='preview_content_4';
														news_item.appendChild(prew_content);
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.style.marginTop="130px";
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
														var text=document.createElement('div');
														text.className='forecad';
														text.innerHTML='~';
														prew_content.appendChild(text);
														var text_content=document.createElement('div');
														text_content.innerHTML=json[total_news-count_of_news]['title2'];
														prew_content.appendChild(text_content);
														var text_end=document.createElement('div');
														text_end.className='forecad';
														text_end.innerHTML='~';
														prew_content.appendChild(text_end);
														var date=document.createElement('div');
														date.className='preview_date';
														date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
														news_item.appendChild(date);
														var news_type=document.createElement('span');
														news_type.className='preview_section';
														date.appendChild(news_type);
														var link=document.createElement('a');
														link.style.textDecoration='none';
														link.style.textTransform='uppercase';
														if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
														link.href="http://academie.by/blog/teachers";
														link.innerHTML='преподаватели';
														}else{
														link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
														link.innerHTML=json[total_news-count_of_news]['name'];
														}
														news_type.appendChild(link);
								break
								case "preview_form_5":  var counter=0;
														for(var k=0;k<2;k++){
														if(json.length==9 && total_news<count_count){
															break
														}
														if(counter>0){
															count_count++;
																counter++;
																count_of_news--;
															}
															if(counter>0){
																var news_item=document.createElement('div');
																news_item.className='preview_form_5';
																news.appendChild(news_item);
																}
															var title=document.createElement('div');
															title.className='preview_title';
															title.innerHTML=json[total_news-count_of_news]['title'];
															news_item.appendChild(title);
															var prew_content=document.createElement('div');
															prew_content.className='preview_content_5';
															prew_content.innerHTML=json[total_news-count_of_news]['title2'];
															news_item.appendChild(prew_content);
													
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.style.marginTop="35px";
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
															var date=document.createElement('div');
															date.className='preview_date';
															date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
															news_item.appendChild(date);
															var news_type=document.createElement('span');
															news_type.className='preview_section';
															date.appendChild(news_type);
															var link=document.createElement('a');
															link.style.textDecoration='none';
															link.style.textTransform='uppercase';
															if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
															link.href="http://academie.by/blog/teachers";
															link.innerHTML='преподаватели';
															}else{
															link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
															link.innerHTML=json[total_news-count_of_news]['name'];
															}
															news_type.appendChild(link);
															if(counter==0){
																counter++;
																
															}
															if(json.length<9 && total_news==count_count){
															break
														}
														}
														
								break
								case "preview_form_6": var counter=0;
														for(var k=0;k<3;k++){
														if(json.length==9 && total_news<count_count){
															break
														}
														if(counter>0){
															count_count++;
																counter++;
																count_of_news--;
															}
															if(counter>0){
																var news_item=document.createElement('div');
																news_item.className='preview_form_6';
																news.appendChild(news_item);
																}
															var title=document.createElement('div');
															title.className='preview_title';
															title.innerHTML=json[total_news-count_of_news]['title'];
															news_item.appendChild(title);
															var prew_content=document.createElement('div');
															prew_content.className='preview_content_6';
															prew_content.innerHTML=json[total_news-count_of_news]['title2'];
															news_item.appendChild(prew_content);
														var prew=document.createElement('div');
														prew.className='preview_content_read_'+json[total_news-count_of_news]['id'];
														prew_content.appendChild(prew);
														var hid=document.createElement('input');
														hid.type='hidden';
														hid.value=json[total_news-count_of_news]['id'];
														prew.appendChild(hid);
														var but=document.createElement('a');
														but.className='preview_content_button';
														but.href="http://academie.by/blog/news/"+json[total_news-count_of_news]['id'];
														but.innerHTML='ЧИТАТЬ';
														prew.appendChild(but);
															var date=document.createElement('div');
															date.className='preview_date';
															date.innerHTML=json[total_news-count_of_news]['date_created'].slice(0, 10);
															news_item.appendChild(date);
															var news_type=document.createElement('span');
															news_type.className='preview_section';
															date.appendChild(news_type);
															var link=document.createElement('a');
															link.style.textDecoration='none';
															link.style.textTransform='uppercase';
															if(typeof sections[json[total_news-count_of_news]['name']]==='undefined'){
															link.href="http://academie.by/blog/teachers";
															link.innerHTML='преподаватели';
															}else{
															link.href="http://academie.by/blog/"+sections[json[total_news-count_of_news]['name']];
															link.innerHTML=json[total_news-count_of_news]['name'];
															}
															news_type.appendChild(link);
															
															if(counter==0){
																counter++;
															}
															if(json.length<9 && total_news==count_count){
															break
														}
														}
								break
							}
							
						
							count_of_news--;
							news.onMouseOver=show_button();
						}
					}
					count_of_blocks--;
				}
				var clear = document.createElement('div');
                clear.style.clear='both';
				parent.appendChild(clear);
                // $(".head_block_new").append(response);
                
              }
           
        });
	
    function show_button(){
		$("[class^=preview_content_]").mouseover(function() {
			var iden = $(this).find('input').val();
	    $(".preview_content_read_"+iden).show();
		  
	    });
		$("[class^=preview_content_]").mouseout(function() {
	      $("[class^=preview_content_read_]").hide();
		});
	    }

}


function now_news_main() {
  $('.head_content_news').empty();
  num = 9;
  scroll_array=[0];
  show("/otherNews/comment","date_created",0);  
	
}
	
function popular_news_main(){
  $('.head_content_news').empty();
  num = 9;
  scroll_array=[0];
  show("/otherNews/main","review",0);  
	
}
		   
function all_news_main(){
	$('.head_content_news').empty();
	num = 9;
scroll_array=[0];
  show("/otherNews/main","1",0);
	

 }
		   

		