var course = 1;
var faculty = 1;

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
    syncSelect(faculty, course);
}

function setFaculty(_faculty) {
    document.getElementById("group").style.visibility='visible';
    faculty = _faculty;
    var inputs = document.getElementById("faculty").getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].name == faculty) {
            inputs[i].className = "faculty-hover";    
        } else if(inputs[i].name == prevfaculty) {
            inputs[i].className = "";
        }
    };
    syncSelect(faculty, course);
}

function syncSelect(_faculty, _course) {
    $.ajax({
        type: "POST",
        url: "utils/SelectData.php",
        data: {faculty : _faculty, course: _course},
        success: function(result) {
            var jsArr = result.split(",");
            var group = document.getElementById("group");
            group.options.length = 0;
            for (var i = 0; i < jsArr.length; i++) {
                group.options[group.options.length] = new Option(jsArr[i]);
            };
        },
        error: function() {
            /**
             * nothing to do
             */
        }
    });
}

function redirect(value) {
    window.location.href="schedule.php?gr=" + value + "";
}