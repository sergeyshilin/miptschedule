var course = 1;
var prevcourse = 0;
var faculty = 1;
var prevfaculty = 0;

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
                input.setAttribute("type", "submit");
                input.setAttribute("name", "getSchedule");
                input.setAttribute("value", jsArr[i]);
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