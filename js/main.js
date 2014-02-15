$(document).ready(function(){
	loadToggles();
});

function showLogin() {
	$("#login-block").togglePopup();
}

function login() {
	$.ajax({
		url: 'login.php',
		type: 'POST',
		data: $('#logform').serialize(),
		success: function( data ) {
			if(data.match(/\<ok\/\>/)) { 
                var text = "Вход выполнен успешно";
                $("#report").addClass("success_text");
                var islogin = true;
			} else {
                var text = "Неверные логин/пароль";
                $("#report").addClass("error_text");
			}
            
            function slide_w() {
				$("#report").slideUp("slow");
			}

            $("#report").text(text);
			$("#report").slideDown("slow");
			setTimeout(slide_w, 2000);

            if(islogin) {
                function toog_at() {
				    document.location.reload(); 
				}
				setTimeout(toog_at, 2000);
            }
		}
	});
}

function register() {
	$.ajax({ 
		url: 'register.php',
		type: 'POST',
		data: $('#logform').serialize(),
		success: function( data ) {
			$("#report").addClass("error_text");

			if(data.match(/\<ok\/\>/)) {
				var strtext = "Вы успешно зарегистрированы";
				$("#report").addClass("success_text");
				var ok = true;
			} else if(data.match(/\<bad1\/\>/)) {
				var strtext = "Заполните все поля";
			} else if(data.match(/\<bad2\/\>/)) {
				var strtext = "Пользователь с таким e-mail уже существует";
			} else if(data.match(/\<bad3\/\>/)) {
				var strtext = "Некорректный email";
			} else if (data.match(/\<mysqlerr\/\>/)) {
				var strtext = "Ошибка mysql";
			} else if (data.match(/\<bad4\/\>/)) {
				var strtext = "Неизвестная ошибка";
			} else {
				console.log(data);
			}
			   
			function slide_w() {
				$("#report").slideUp("slow");
			}
  
			$("#report").text(strtext);
			$("#report").slideDown("slow");
			setTimeout(slide_w, 2000);
			
			if(ok) {
				function closeAdd() {
					document.location.reload(); 
				}
				setTimeout(closeAdd, 2000);
			}
		}
	});
}


function logout() {
	$.ajax({
		url: 'logout.php',
		type: 'POST',
		data: 'logout',
		success: function( data ) {
			if(data.match(/\<ok\/\>/))
				document.location.reload(); 
			else
				alert('is bed');
		}
	});
}

function edit() {
	$.ajax({
		url: 'edit.php',
		type: 'POST',
		data: $('#editform').serializeArray(),
		success: function( data ) {
			if(data.match(/\<ok\/\>/)) { 
                var text = "Профиль успешно изменён";
                $("#editreport").addClass("success_text");
                var islogin = true;
			} else {
                var text = "Неверно указана группа";
                $("#editreport").addClass("error_text");
			}
            
            function slide_w() {
				$("#editreport").slideUp("slow");
			}

            $("#editreport").text(text);
			$("#editreport").slideDown("slow");
			setTimeout(slide_w, 2000);

            if(islogin) {
                function toog_at() {
				    document.location.reload(); 
				}
				setTimeout(toog_at, 2000);
            }
		}
	});
}

function changepass() {
	$.ajax({
		url: 'changepass.php',
		type: 'POST',
		data: $('#changepassform').serializeArray(),
		success: function( data ) {
			if(data.match(/\<ok\/\>/)) { 
                var text = "Пароль успешно обновлен";
                $("#changepassreport").addClass("success_text");
			} else if(data.match(/\<bad2\/\>/)) {
                var text = "Неверно указан текущий пароль";
                $("#changepassreport").addClass("error_text");
			} else if(data.match(/\<bad1\/\>/)) {
				var text = "Заполните все поля";
				$("#changepassreport").addClass("error_text");
			}
            
            function slide_w() {
				$("#changepassreport").slideUp("slow");
			}

            $("#changepassreport").text(text);
			$("#changepassreport").slideDown("slow");
			setTimeout(slide_w, 2000);
		}
	});
}