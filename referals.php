<?php
session_start();
include('save.php');
?>
<? 
$page="";

include("includes/header.php"); ?>
<div id="wrapper">
	<div id="top">
		<? include("includes/logo.php");?>
		<? include("includes/menu.php");
			echo getMenu(1);
		?>
	</div>
	<div id="filler"></div>
	<div id="pageContent">
		 
		<p id="h3_no_cufon">Страница для тестирования чатов</p>
		<br/>
		<span class="subheadSolutions">Чат второй - online.sms.uslugi</span>
        <ul class="bodyList">
			<li>ИСПОЛЬЗОВАНИЕ ЛЮБОГО JABBER-КЛИЕНТА, НА ЛЮБОЙ ПЛАТФОРМЕ</li>
			<li>ОБЩЕНИЕ С КЛИЕНТАМИ ПРИ ПОМОЩИ ОБЫЧНЫХ СМС</li>
			<li>ЛЕГКАЯ НАСТРОЙКА ВНЕШНЕГО ВИДА МОДУЛЯ</li>
			<li>ВОЗМОЖНОСТЬ ИНИЦИИРОВАТЬ ОБЩЕНИЕ (АВТОПРИВЕТСТВИЕ)</li>
			<li>ПОЛУЧЕНИЕ СТАТИСТИЧЕСКИХ ДАННЫХ О ВАШИХ КЛИЕНТАХ</li>
			<li>СЛЕЖЕНИЕ ЗА ПОСЕТИТЕЛЕМ!</li>
			<li>ДОБАВЛЕНИЕ СОБСТВЕННЫХ ВКЛАДОК</li>
			<li>ПРОВЕРКА ОРФОГРАФИИ В СООБЩЕНИЯХ</li>
		</ul>		
		<!--a style="padding: 10px; border: 1px solid #4c4c4c;display: inline-block;margin: 20px 0 20px 20px;" href="downloads/p3chat_admin_panel.png" download="Скриншот_админки">Здесь можно посмотреть скрин панели управления чатом</a-->
			
		

		<span class="subheadSolutions">Веб-клиент доступен по ссылке - <a href="https://lcab.sms-uslugi.ru/" style="text-decoration: underline !important;">lcab.sms-uslugi.ru/</a></span>
		<span class="subheadSolutions">login: <b>magenta-test</b></span>
		<span class="subheadSolutions">pass: <b>ntcn.pth</b></span>
		<span class="subheadSolutions">(Залогиниться и перейти на вкладку "На связи" в верхнем меню)</span>

		<span class="subheadSolutions" style="padding-bottom: 20px;">На той же странице можно посмотреть (внизу) как работать с чатом из разных ОС</span>
		<img src="online-jabber.jpg" alt="Как работать с Jabber" width=600>



		</div>
</div>
<script>
 	(function() {
		var s = document.createElement('script');
		s.type ='text/javascript';
		s.id = 'supportScript';
		s.charset = 'utf-8';
		s.async = true;
		s.src = 'https://lcab.sms-uslugi.ru/support/support.js?h=fb9f43996e80e9ebd62c1737f672a2c5';
		var sc = document.getElementsByTagName('script')[0];
		
		var callback = function(){
			/*
				Здесь вы можете вызывать API. Например, чтобы изменить отступ по высоте:
				supportAPI.setSupportTop(200);
			*/
		};
		
		s.onreadystatechange = s.onload = function(){
			var state = s.readyState;
			if (!callback.done && (!state || /loaded|complete/.test(state))) {
				callback.done = true;
				callback();
			}
		};
		
		if (sc) sc.parentNode.insertBefore(s, sc);
		else document.documentElement.firstChild.appendChild(s);
	})();
</script>
<? include("includes/footer.php"); ?>
