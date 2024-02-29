document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var errors = {};
    errors['horas'] = true;
    errors['profesor'] = true;
    errors['modulo'] = true;
    errors['grupo'] = true;

    // Horas Validation
    document.getElementById('horas').addEventListener('focusout', function() {
        if(!validarNum('horas', 1, -1)){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_horas').classList.add('show');
            haveErrors = true;
            errors['horas'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_horas').classList.remove('show');
            errors['horas'] = false;
        }
        actualizarBoton();
    });

    // Profesor Validation
    document.getElementById('profesor').addEventListener('focusout', function() {
        if(document.getElementById('profesor').value == -1){
            document.getElementById('error_profesor').classList.add('show');
            errors['profesor'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_profesor').classList.remove('show');
            errors['profesor'] = false;
        }
        actualizarBoton();
    });

    // Grupo Validation
    document.getElementById('grupo').addEventListener('focusout', function() {
        if(document.getElementById('grupo').value == -1){
            document.getElementById('error_grupo').classList.add('show');
            errors['grupo'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_grupo').classList.remove('show');
            errors['grupo'] = false;
        }
        actualizarBoton();
    });

    // Modulo Validation
    document.getElementById('modulo').addEventListener('focusout', function() {
        if(document.getElementById('modulo').value == -1){
            document.getElementById('error_modulo').classList.add('show');
            errors['modulo'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_modulo').classList.remove('show');
            errors['modulo'] = false;
        }
        actualizarBoton();
    });

    /**
     * Comprueba si hay errores y activa o desactiva el boton
     */
    function actualizarBoton(){
        var haveErrors = false;
        // Recorremos todos los errores y si hay alguno desactivamos el boton
        for(var key in errors){
            if(errors[key]){
                haveErrors = true;
                console.log(key);
            }
        }

        if(haveErrors)
            submit.setAttribute('disabled', true);
        else
            submit.removeAttribute('disabled');
    }

    /**
     * Valida un número segun un minimo y un maximo.
     * Pon -1 para no determinar minimo o maximo
     * @param {string} id Atributo id del input del que se va a sacar el dato
     * @param {int} min Minimo valor que puede tener el número (inclusive)
     * @param {int} max Maximo valor que puede tener el número (inclusive)
     * @returns {boolean} True si el numero esta entre los valores especificados
     */
    function validarNum(id, min, max){
        campo = document.getElementById(id).value;
        // Si el minimo esta determinado, comprobamos si el numero supera el minimo
        boolmin = (min > 0)? campo > min : true;
        // Si el maximo esta determinado, comprobamos si el numero es menor al maximo
        boolmax = (max > 0)? campo < max : true;
        return boolmin && boolmax;
    }
});