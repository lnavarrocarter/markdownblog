// PARA CAMBIOS SIN GUARDAR

var unsaved = false;

$(":input").change(function(){ //trigers change in all input fields including text type
    unsaved = true;
});

$("form").on('submit',function(){
	var unsaved = false;
	return true;
});

function unloadPage(){ 
    if(unsaved){
        return "Tienes cambios sin guardar en esta página. ¿Estás seguro de que deseas continuar?";
    }
}

window.onbeforeunload = unloadPage;