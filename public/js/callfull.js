var n_month = new Array ("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
var d = new Date();
var mth = d.getMonth();	
var yer = d.getFullYear();
var request = null;
//-----------------------------------------------------------------
function createRequest() {
    
     try {
       request = new XMLHttpRequest();
     } catch (trymicrosoft) {
       try {
         request = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (othermicrosoft) {
         try {
           request = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (failed) {
           request = null;
         }
       }
     }
     if (request == null)
       alert("Error creating request object!");
   }
   function getCal(year, month) {
    
     createRequest();
	 mes=month;
	 mes++;
	 data="/"+year+"/"+mes;
	 var url = "/call/index" +data;
     request.open("GET", url, true);
	 // при получении ответа от сервера запускаем функцию заполнения датами
	 //alert(request.onreadystatechange);
	 request.onreadystatechange = function () {	fill_date(year, month);	} 
     request.send(null);
  }
function count(obj) {
          var count = 0;
          for(var prs in obj)
          {
                   if(obj.hasOwnProperty(prs)) count++;
          }
          return count;
       }

//---------------Функция заполнения календаря датами----------------------------------
function fill_date(year, month){
	// если пришел ответ (readyState == 4) от сервера заполняем календарь 	
if (request.readyState == 4) {
var arr1 = eval("(" + request.responseText + ")"); //преобразуем полученный ответ из json в асс. массив
//var webinarcount=count(arr1);
//var SummDok = document.getElementById('count'), 
//SummSumm=webinarcount;
//SummDok.innerHTML = SummSumm;
var dayCount = new Date(year, month + 1, 0).getDate(); //считаем количество дней в месяце
	//получаем день недели для первого числа месяца
	month++;
	var dateStr = month+"/1/"+year; 
	var d = new Date(dateStr);  
	var d_week = d.getDay();
	n_str = 1;
	y=1;
//очистка ячеек в первой строке
if(d_week==0) d_w=7; else d_w=d_week;
	while (y < d_w){
		document.getElementById("cell_"+"1" + y).style.visibility="hidden";
		myid = document.getElementById( "cell_"+"1" + y);
		myid.innerHTML = ""; y++;
	}
//Заполнение датами		
for (x=1; x <= dayCount; x++){
	st_str =n_str + "";
	//отображаем ранее скрытые ячейки 
	// меняем цвет выходных
	document.getElementById("cell_"+st_str + d_week).style.visibility="visible"; 
	if (d_week == 6 || d_week == 0) {document.getElementById("cell_"+st_str + d_week).style.background="";} 
	myid = document.getElementById("cell_"+ st_str + d_week);
	//полученные из базы даты новостей, дополняем ссылкой на скрипт извлечения вебинара 
	if (arr1[x])
			{
			//res="<a name=date href='templates/calendar/arhiv.php?id="+arr1[x]+"'><div id='link'>"+x+"</div></a>";
			res="<div id=date_vebinar_"+x+" onclick='return cal_call(this);' style='cursor:pointer'><div class=link id=link style='background: #fff;'>"+x+"</div><input type=hidden id=veb_"+x+" value="+arr1[x]+"></div>";
			//dates_vebinar=arr1[x];
			myid.innerHTML = res;
			
			}
		else {  
			res=x;
			myid.innerHTML = res;
		}
	if (d_week == 0) n_str++;
	if (d_week == 6) d_week = 0;
	else d_week++;
}
//Очистка последних ячеек
	z=1;
	while (z <= 10){
		st_str =n_str + "";
		document.getElementById("cell_"+st_str + d_week).style.visibility="hidden"; // скрываем не задействованные ячейки
		myid = document.getElementById("cell_"+st_str + d_week);
		myid.innerHTML = "";
		if (d_week == 0) n_str++;
		if (d_week == 6) d_week = 0;
		else d_week++; 
		z++;
	}
}	
}

//---------------------------Вызов текущего месяца
function cal()
{	 
	myid = document.getElementById("monthID");
	
	myid.innerHTML = n_month[mth];
	myid = document.getElementById("yr");
	myid.innerHTML = yer;
	getCal(d.getFullYear(), d.getMonth());

}

//--------------------------Функция вызова предыдущего месяца
function previos(){
    
	n_mon = document.getElementById("monthID").innerHTML;
	n_yr = document.getElementById("yr").innerHTML;
	if ( n_mon == "Январь" ||  n_mon == "January" )  // если январь то год минус 1 и следующий месяц под индексом "11"(декабрь)
		{  	n_yr = n_yr - 1;
			key = 11; 
	}
	else {                     // находим индекс месяца из массива имён n_month
			for(find in n_month){
  				if(n_month[find]==n_mon) {
    			key = find; 
				key = key -1; // и сдвигаем на предыдущий месяц
  				}
 			}
		}
		end_mth = key;
	//обратное включение перехода на следующий месяц
	if (n_yr !== yer && n_month[end_mth] !== n_month[mth] ){
		myid3 = document.getElementById("nxt");
		myid3.innerHTML = "›";
	}
	// заполнение календаря предыдущим месяцем
	myid = document.getElementById("monthID");
	myid.innerHTML = n_month[key];
	myid = document.getElementById("yr");
	myid.innerHTML = n_yr;
	getCal(n_yr, key);
}
//---------------------------------------Функция вызова следующего месяца
function next(){
	n_mon = document.getElementById("monthID").innerHTML;
	n_yr = document.getElementById("yr").innerHTML;
	
	
	if ( n_mon == "Декабрь" ||  n_mon == "December" ) //если декабрь , тогда год плюс 1 и идекс месяца 0
		{  	++n_yr;
			key = 0; 
			
		}
	else {                       // находим индекс месяца из массива имён n_month
			for(find in n_month){
  				if(n_month[find]==n_mon) {
    				 ++find;    // и сдвигаем на следующий месяц
					key=find;
  				}
 			}
	}
	end_mth = key-1;
	
		if (n_yr == yer && n_month[key] == n_month[mth] ){
		myid3 = document.getElementById("nxt");
		myid3.innerHTML = "›";
		}
		//заполнение календаря следующим месяцем
		myid = document.getElementById("monthID");
		myid.innerHTML = n_month[key];
		myid = document.getElementById("yr");
		myid.innerHTML = n_yr;
		getCal(n_yr, key);
	
}

