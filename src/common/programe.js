var programme_arr = new Array("Catalyse","Ignite","Refresh","General");

var s_b = new Array();
s_b[0]="";
s_b[1]=" RTE | TRAFFIC | BEACH CLEAN UP | TREE PLANTATION ";
s_b[2]="COMPUTERS-KANINI| MENTORING-LAKSHYA| MATHEMATICS-LITTLE ENISTEINS| SCIENCE-LITTLE ENISTEINS| ENGLISH-SPEAK OUT| ROBOTICS-YANTRA | ARTS";
s_b[3]="Nakshatra | bpl | bsl | jdw ";
s_b[4]="Nakshatra | bpl | bsl | jdw ";
s_b[5]="Nakshatra | bpl | bsl | jdw ";
function print_programme(programme_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(programme_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Programme','');
	option_str.selectedIndex = 0;
	for (var i=0; i<programme_arr.length; i++) {
		option_str.options[option_str.length] = new Option(programme_arr[i],programme_arr[i]);
	}
}

function print_project(project_id, project_index){
	var option_str = document.getElementById(project_id);
	option_str.length=0;
	option_str.options[0] = new Option('Select Project','');
	option_str.selectedIndex = 0;
	var project_arr = s_b[project_index].split("|");
	for (var i=0; i<project_arr.length; i++) {
		option_str.options[option_str.length] = new Option(project_arr[i],project_arr[i]);
	}
}
