// PARA CAMBIOS SIN GUARDAR

var unsaved = false;

$(":input").change(function(){ //trigers change in all input fields including text type
    unsaved = true;
});

$("#submitBtn").click(function(){
	unsaved = false;
});

$("#modalCancel").click(function(){
    $('form').get(0).reset();
    unsaved = false;
});

function unloadPage(){ 
    if(unsaved){
        return "Tienes cambios sin guardar en esta página. ¿Estás seguro de que deseas continuar?";
    }
}

window.onbeforeunload = unloadPage;

