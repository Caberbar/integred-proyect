document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var errors = {};
    errors['siglas'] = true;
    errors['denominacion'] = true;

    // Siglas Validation
    document.getElementById('siglas').addEventListener('focusout', function() {
        if(!validar('siglas', '^.{3,}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_siglas').classList.add('show');
            errors['siglas'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_siglas').classList.remove('show');
            errors['siglas'] = false;
        }
        actualizarBoton();
    });

    // Denominacion Validation
    document.getElementById('denominacion').addEventListener('focusout', function() {
        if(!validar('denominacion', '^.{3,255}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_denominacion').classList.add('show');
            errors['denominacion'] = false;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_denominacion').classList.remove('show');
            errors['denominacion'] = false;
        }
        actualizarBoton();
    });

    /**
     * Comprueba si hay errores y activa o desactiva el boton
     */
    function actualizarBoton(){
        var haveErrors = false;
        // console.log(errors);

        // Recorremos todos los errores y si hay alguno desactivamos el boton
        for(var key in errors){
            if(errors[key])
                haveErrors = true;
        }

        if(haveErrors)
            submit.setAttribute('disabled', true);
        else
            submit.removeAttribute('disabled');
    }

    /**
     * Valida un dato string segun su nombre y una expresion regular
     * @param {string} name Atributo name del input del que se va a sacar el dato
     * @param {string} regularExpression Expresión regular con la que se va a validar el dato
     * @returns {boolean} True si el dato cumple con la regex
     */
    function validar(name, regularExpression){
        campo = document.getElementById(name).value;
        regex = new RegExp(regularExpression);
        return regex.test(campo);
    }

    /**
     * Valida un número segun un minimo y un maximo.
     * Pon -1 para no determinar minimo o maximo
     * @param {string} name Atributo name del input del que se va a sacar el dato
     * @param {int} min Minimo valor que puede tener el número (inclusive)
     * @param {int} max Maximo valor que puede tener el número (inclusive)
     * @returns {boolean} True si el numero esta entre los valores especificados
     */
    function validarNum(name, min, max){
        campo = document.getElementsByName(name)[0].value;
        // Si el minimo esta determinado, comprobamos si el numero supera el minimo
        boolmin = (min > 0)? campo > min : true;
        // Si el maximo esta determinado, comprobamos si el numero es menor al maximo
        boolmax = (max > 0)? campo < max : true;
        return boolmin && boolmax;
    }

});