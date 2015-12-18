var xmlhttp=false;

try {
	xmlhttp = new ActiveXobject("Msxm12.XMLHTTP");
} catch (e){
	try {
		xmlhttp = new ActiveXobject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined'){
	xmlhttp = new XMLHttpRequest();
}

function bukutamu(key){
	var obj = document.getElementById("pencarian");
	var url = 'proses.php?key='+key;
	
	xmlhttp.open("GET",url);
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			obj.innerHTML = xmlhttp.responseText;
		} else{
			obj.innerHTML = "<div align='center'><img src='waiting.gif' alt='loading' />";
		}
	}
	xmlhttp.send(null);
}