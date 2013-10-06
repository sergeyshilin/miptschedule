var course = 1;
var prevcourse = 0;
var faculty = 1;
var prevfaculty = 0;
var group = 1; 
var prevgroup = 0;

function setCourse(_course) {
    course = _course;
    var inputs = document.getElementById("course").getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].name == course) {
            inputs[i].className = "course-hover";    
        } else if(inputs[i].name == prevcourse) {
            inputs[i].className = "";
        }
    };
    prevcourse = course;
    syncSelect(faculty, course);
}

function setFaculty(_faculty) {
    faculty = _faculty;
    var inputs = document.getElementById("faculty").getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].name == faculty) {
            inputs[i].className = "faculty-hover";    
        } else if(inputs[i].name == prevfaculty) {
            inputs[i].className = "";
        }
    };
    prevfaculty = faculty;
    syncSelect(faculty, course);
}

function syncSelect(_faculty, _course) {
	$.ajax({
        type: "POST",
        url: "utils/SelectData.php",
        data: {faculty : _faculty, course: _course},
        success: function(result) {
        	var jsArr = result.split(",");
        	// console.log(jsArr);
        	var group = document.getElementById("group");
            group.innerHTML = "";
			for (var i = 0; i < jsArr.length; i++) {
                var input = document.createElement("input");
                input.setAttribute("type", "button");
                input.setAttribute("name", jsArr[i]);
                input.setAttribute("value", jsArr[i]);
                input.setAttribute("onClick", "getData(" + jsArr[i] +")");
                group.appendChild(input);
			};
        },
        error: function() {
        	/**
             * nothing to do
             */
        }
    });
}

function getData(_group) {
    group = _group;
    var inputs = document.getElementById("group").getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].name == group) {
            inputs[i].className = "group-hover";    
        } else if(inputs[i].name == prevgroup) {
            inputs[i].className = "";
        }
    } 
    prevgroup = group;
    $.ajax({
        type: "POST",
        data: {group: _group},
        url: 'utils/GetData.php',
        cache: false,
        beforeSend: function() { $('#schedule').html('<div id="loader"></div>'); },
        success: function(html) {
            $('#schedule').html(html);
        }
    });
}