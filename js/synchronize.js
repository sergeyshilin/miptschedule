var course = 1;
var prevcourse = 0;
var faculty = 1;
var prevfaculty = 0;
var group = 1; 
var prevgroup = 0;

function setCourse(_course) {
    course = _course;
    $("#course").children("input").each(function() {
        if(this.name == course) {
            this.className = "course-hover";    
        } else if(this.name == prevcourse) {
            this.className = "";
        }
    });
    prevcourse = course;
    syncSelect(faculty, course);
}

function setFaculty(_faculty) {
    faculty = _faculty;
    $("#faculty").children("input").each(function() {
        if(this.name == faculty) {
            this.className = "faculty-hover";    
        } else if(this.name == prevfaculty) {
            this.className = "";
        }
    });
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
        	var group = document.getElementById("group");
            group.innerHTML = "";
			for (var i = 0; i < jsArr.length; i++) {
                var input = document.createElement("input");
                input.setAttribute("type", "button");
                input.setAttribute("name", jsArr[i]);
                input.setAttribute("value", jsArr[i]);
                input.setAttribute("onClick", "getData(\"" + jsArr[i] + "\")");
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
    
    $.ajax({
        type: "POST",
        data: {group: _group},
        url: 'utils/GetData.php',
        cache: false,
        beforeSend: function() { $('#schedule').html('<div id="loader"></div>'); },
        success: function(html) {
            $('#schedule').html(html);

            $("#group").children("input").each(function() {
                if(!this.name.localeCompare(group)) {
                    this.className = "group-hover";    
                } else if(!this.name.localeCompare(prevgroup)) {
                    this.className = "";
                }
            });

            $('.tooltip-right').liTip({
                themClass: 'liTipColored',
                timehide: 500,
                posY: 'bottom',
                radius: '5px',
                maxWidth: '150px',
                tipEvent: 'click',
                colored: true,
                content: false
            });

            prevgroup = group;
        }
    });   
}