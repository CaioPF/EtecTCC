var contador = 1;

setInterval(function(){
    document.getElementById('slide' + contador).checked = true;
    contador ++;

    if(contador > 3){
        contador = 1;
    }
}, 1000)
