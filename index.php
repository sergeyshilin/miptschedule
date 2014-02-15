<?php 
	require_once("utils/redirect.php");
	require_once("classes/User.php");
	$user = new User();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
        <meta name="title" content="Физтех - Расписание" />
        <meta name="author" content="Sergey Shilin" />
        <meta name="Designer" content="Sergey Shilin" />
        <meta name="Publisher" content="Sergey Shilin" />
        <meta name="keywords" content="расписание мфти, расписание, мфти, schedule, mipt, физтех, физтех расписание" />
        <meta name="description" content="Расписание МФТИ" />
        <meta name="Publisher-URL" content="http://mipt-schedule.ru" />
        <meta name="Publisher-Email" content="snape@liceum8.ru" />
        <meta http-equiv="Reply-to" content="snape@liceum8.ru" />
        <meta name="revisit-after" content="1 weeks" />
        <meta name="robots" content="all" />
        <meta http-equiv="content-language" content="Russian" />
        <meta name="distribution" content="Local" />
        <script type="text/javascript" language="JavaScript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" language="JavaScript" src="js/main.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/synchronize.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/togglepopup.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/tooltip.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<title>ФизТех - Расписание</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<?php
					if($user->isLoggedIn() && $user->isAdmin()) {
						echo "<div id=\"leftblock\"><a href=\"admin.php\">Админка</a></div>";
					}
				?>
				<div id="loginbuttons">
					<?php 
						if ($user->isLoggedIn()) {
							echo "<a class=\"tooltip\" href=\"#\">";
							if($user->hasName())
								echo $user->getFullname();
							else
								echo $user->getEmail();
							echo ", ".$user->getGroup()." группа</a> | <div class=\"button\" onclick=\"logout();\">Выйти</div>";
						} else {
							echo "<div class=\"button\" onclick=\"showLogin();\">Войти</div>";
						}
					?>
				</div>
			</div>
			<div id="content">
				
				<div id="logo">
				</div>
				<div id="course">
					<input type="button" id="1" name="1" value="1 курс" onclick="setCourse(1)">
					<input type="button" id="2" name="2" value="2 курс" onclick="setCourse(2)">
					<input type="button" id="3" name="3" value="3 курс" onclick="setCourse(3)">
					<input type="button" id="4" name="4" value="4 курс" onclick="setCourse(4)">
					<input type="button" id="5" name="5" value="5 курс" onclick="setCourse(5)">
					<input type="button" id="6" name="6" value="6 курс" onclick="setCourse(6)">
				</div>
				<div id="faculty">
					<input type="button" name="1" value="ФРТК" onclick="setFaculty(1)">
					<input type="button" name="2" value="ФОПФ" onclick="setFaculty(2)">
					<input type="button" name="3" value="ФАКИ" onclick="setFaculty(3)">
					<input type="button" name="4" value="ФМХФ" onclick="setFaculty(4)">
					<input type="button" name="5" value="ФФКЭ" onclick="setFaculty(5)">
					<input type="button" name="7" value="ФУПМ" onclick="setFaculty(7)">
					<input type="button" name="8" value="ФПФЭ" onclick="setFaculty(8)">
					<input type="button" name="9" value="ФИВТ" onclick="setFaculty(9)">
					<input type="button" name="11" value="ФБМФ" onclick="setFaculty(11)">
				</div>
				<div id="group">
				</div>

				<?php 
					if($user->isLoggedIn()) { 
						echo "<script type=\"text/javascript\"> 
						setCourse(".$user->getCourse().");
						setFaculty(".$user->getFaculty().");
						getData(\"".$user->getGroup()."\");
					</script>";
					}
				?>

				</br>
				<div class="schedule" id="schedule">
					
				</div>
				
			</div>
			<div id="footsaver"></div>
		</div>
		<div id="footer">
			<hr>
			<div id="author">
				<div id="stat">
					<!-- Yandex.Metrika informer -->
					<a href="http://metrika.yandex.ru/stat/?id=22615795&amp;from=informer"
					target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/22615795/3_1_FFFFFFFF_FFFFFFFF_0_pageviews"
					style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:22615795,lang:'ru'});return false}catch(e){}"/></a>
					<!-- /Yandex.Metrika informer -->

					<!-- Yandex.Metrika counter -->
					<script type="text/javascript">
					(function (d, w, c) {
					    (w[c] = w[c] || []).push(function() {
					        try {
					            w.yaCounter22615795 = new Ya.Metrika({id:22615795,
					                    webvisor:true,
					                    clickmap:true,
					                    trackLinks:true});
					        } catch(e) { }
					    });

					    var n = d.getElementsByTagName("script")[0],
					        s = d.createElement("script"),
					        f = function () { n.parentNode.insertBefore(s, n); };
					    s.type = "text/javascript";
					    s.async = true;
					    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

					    if (w.opera == "[object Opera]") {
					        d.addEventListener("DOMContentLoaded", f, false);
					    } else { f(); }
					})(document, window, "yandex_metrika_callbacks");
					</script>
					<noscript><div><img src="//mc.yandex.ru/watch/22615795" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
					<!-- /Yandex.Metrika counter -->
				</div>
				<div id="copy">
					since 2013</br>
					author: <a href="mailto:snape@liceum8.ru">S.Shilin</a>
				</div>
			</div>
		</div>
		<?php if(!$user->isLoggedIn()) { ?>
			<div id="opaco" class="hidden"></div>
			<div id="popup" class="hidden"></div>
			<div id="login-block" class="hidden">
				<div class="bug">
					<h1>Войти</h1>
					<hr></hr>
					<form id="logform" onsubmit="login(); return false" action="">
						<p>
							<label class="label_text" for="username"> Ваш email </label>
							<input id="username" type="text" placeholder="например mymail@mail.ru" name="name" />
						</p>
						<p>
							<label class="label_text" for="password"> Ваш пароль </label>
							<input id="password" type="password" placeholder="например X8df!90EO" name="password" />
						</p>
						<p class="keeplogin">
							<input id="loginkeeping" type="checkbox" value="loginkeeping" name="loginkeeping" />
							<label for="loginkeeping">Запомнить меня</label>
						</p>
						<p class="button">
							<input id="loginb" type="submit" value="Войти" onclick="$(this).closest('form').attr('onsubmit', 'login(); return false');" />
							<input id="registerb" type="submit" value="Регистрация" onclick="$(this).closest('form').attr('onsubmit', 'register(); return false');" />
						</p>
					</form>
					<div id="report"></div>
	    		</div>
			</div>
			<?php } else { ?>
				<div style="display: none;">
    				<div id="edit_block" class="popup-window">
        				<h1>Профиль</h1>
						<hr></hr>
        				<form id="editform" onsubmit="edit(); return false" action="">
            				<p>
                				<label class="label_text" for="fullname"> Имя </label>
            					<input id="fullname" type="text" name="name" value="<?php echo $user->getFullname(); ?>" />
            				</p>
            				<p>
				                <label class="label_text" for="input-group">Группа</label>
				                <input id="input-group" type="text" name="group" value="<?php echo $user->getGroup(); ?>" />
            				</p>
            				<p class="button">
                				<input id="editb" type="submit" value="Сохранить" name="editinfo" />
            				</p>
            				<div id="editreport"></div>
        				</form>
        				
        				<form id="changepassform" onsubmit="changepass(); return false" action="">
            				<p>
                				<label class="label_text" for="oldpass"> Текущий пароль </label>
            					<input id="oldpass" type="password" name="oldpassword" />
            				</p>
            				<p>
				                <label class="label_text" for="newpass">Новый пароль</label>
				                <input id="newpass" type="password" name="newpassword" />
            				</p>
            				<p class="button">
                				<input id="changeb" type="submit" value="Изменить" name="editpass" />
            				</p>
            				<div id="changepassreport"></div>
        				</form>
    				</div>
				</div>
			<?php }?>
	</body>
</html>
