var k=<?session_start();echo "'".$_SESSION['login']."'";?>; //при входе должна быть сессия для индентифицирования отправителя
var y=<?echo "'".$_GET['to']."'";?>;// индентифицируем получателя.

function update(){ // функция обновления
var xhttp;
 if (window.XMLHttpRequest){
   xhttp=new XMLHttpRequest();}
  else {
   xhttp=new ActiveXObject("Microsoft.XMLHTTP");}
// создаем XMLHttpRequest и делаем его кроссбраузерным

xhttp.open('GET','chat1.php?to='+y+'&from='+k,true);
xhttp.send();
//отправляем все что надо на сервер
xhttp.onreadystatechange=function(){
      document.getElementById('b').innerHTML=xhttp.responseText; /* получаем сообщения, без разницы, изменилось ли, или нет.И вставляем в элемент с id "B" (в этом элементе у нас будут сообщения)*/
   }
}
  function get() //функция при отправки сообщения
  {
    var v=document.getElementById("b").innerHTML; //из id "B" берем текст, т.е всю переписку 
   var g=document.getElementById("a").value;// из id "А" берем сообщение
  var xhttp;
  if (window.XMLHttpRequest){
   xhttp=new XMLHttpRequest();}
  else {
   xhttp=new ActiveXObject("Microsoft.XMLHTTP");}
// создаем XMLHttpRequest и делаем его кроссбраузерным

   xhttp.onreadystatechange=function(){
   if (xhttp.readyState==4 && xhttp.status==200)
      document.getElementById('b').innerHTML=xhttp.responseText;
   }
// получаем текст, все сообщения + новое отправленное (см. дальше)
   d="<a href='ваш_сайт/?login="+k+"'>"+k+"</a><br>"+g+"<br>"; /* в эту переменную помещаем новоиспеченное сообщение с ссылкой на страницу пользователя */
   xhttp.open('GET','chat1.php?word='+d+'&to='+y+'&from='+k,true);
   xhttp.send(); // отправляем запрос со всем, что надо
     }
setInterval(update, 1000);// каждую секунду будем выполнять функцию для обновления