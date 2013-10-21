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
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" language="JavaScript" src="js/synchronize.js"></script>
		<script type="text/javascript" language="JavaScript" src="js/jquery-1.7.2.min.js"></script>
		<title>ФизТех - Расписание</title>
	</head>
	<body>
		<div id="head">
			<div id="title">ФизТех - Расписание</div>
		</div>
		<div id="content">
			<div id="selects">
				<select name="course" id="course" onchange="setCourse(selectedIndex);">
					<option selected disabled><span>Курс</span></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
				<select name="faculty" id="faculty" onchange="setFaculty(this.value);">
					<option selected disabled>Факультет</option>
					<option value="1">ФРТК</option>
					<option value="2">ФОПФ</option>
					<option value="3">ФАКИ</option>
					<option value="4">ФМХФ</option>
					<option value="5">ФФКЭ</option>
					<option value="7">ФУПМ</option>
					<option value="8">ФПФЭ</option>
					<option value="9">ФИФТ</option>
					<option value="11">ФМБФ</option>
				</select>
		       	<select name="group" id="group" onchange="redirect(this.value);">
		       		<option selected disabled>Группа</option>
		       	</select>
        	</div>
		</div>
		<div id="footer">
			<hr>
			<div id="author">
				<div id="stat">
					<!-- Yandex.Metrika informer -->
					<a href="http://metrika.yandex.ru/stat/?id=22616431&amp;from=informer"
					target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/22616431/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
					style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:22616431,lang:'ru'});return false}catch(e){}"/></a>
					<!-- /Yandex.Metrika informer -->

					<!-- Yandex.Metrika counter -->
					<script type="text/javascript">
					(function (d, w, c) {
					    (w[c] = w[c] || []).push(function() {
					        try {
					            w.yaCounter22616431 = new Ya.Metrika({id:22616431,
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
					<noscript><div><img src="//mc.yandex.ru/watch/22616431" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
					<!-- /Yandex.Metrika counter -->
				</div>
				<div id="copy">
					since 2013</br>
					author: <a href="mailto:snape@liceum8.ru">S.Shilin</a>
				</div>
			</div>
		</div>
	</body>
</html>