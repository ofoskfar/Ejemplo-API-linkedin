<script>
function validar(){
    var us = document.getElementById("usuario").value;
    var pas = document.getElementById("password").value;

    if(us == "" || pas == ""){
	    alert("Complete los campos");
            document.getElementById("msg").innerHTML = "*Los campos en rojo son obligatorios";
	    document.getElementById("msg").style.color = "red";
	    document.getElementById("usuario").style.border = "1px solid red";
	    document.getElementById("password").style.border = "1px solid red";
	    return false;
    }
    else{
            var request = new XMLHttpRequest();
	    request.onreadystatechange = function(){
	        if(request.readyState == 4 && request.status == 200){
		    if(request.responseText == 1){
		        location.href='index.php';
		    }
		    else{
		        document.getElementById("msg").innerHTML = request.responseText;
	                document.getElementById("usuario").value = "";
	                document.getElementById("password").value = "";		
		    }
		}
	    };
	    request.open("GET", "ini_login.php?us=" + us + "&pas=" + pas, true);
	    request.send();
    }
}
</script>
