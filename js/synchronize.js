function syncSelect(course) {
	$.ajax({
        type: "POST",
        url: "utils/SelectData.php",
        data: {course : course},
        success: function(result) {
        	var jsArr = result.split(",");
        	console.log(jsArr);
        	var select = document.getElementById("group");
        	select.options.length = 0;
			for (var i = 0; i < jsArr.length; i++) {
				select.options[select.options.length] = new Option(jsArr[i]);
			};
        },
        error: function() {
        	alert('Problem whith POST!');
        }
    });
}