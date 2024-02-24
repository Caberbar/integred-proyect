document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var form = document.getElementById('insert-form');
    // Click al boton de submit
    submit.addEventListener('click', function(event) {
        // Evitamos que el boton haga submit
        event.preventDefault();
        var haveErrors = false;

        // Denominacion
        if(!validar('denominacion', '^.{3,255}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_denominacion').classList.add('show');
            haveErrors = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_denominacion').classList.remove('show');
        }

        // Curso Escolar
        if(!validar('curso_escolar', '^\\d{4}\\/\\d{4}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_curso_escolar').classList.add('show');
            haveErrors = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_curso_escolar').classList.remove('show');
        }

        // Si no hay ningun error, hacemos submit
        if(!haveErrors)
            form.submit();
    });

    /**
     * Valida un dato string segun su nombre y una expresion regular
     * @param {string} name Atributo name del input del que se va a sacar el dato
     * @param {string} regularExpression Expresión regular con la que se va a validar el dato
     * @returns {boolean} True si el dato cumple con la regex
     */
    function validar(name, regularExpression){
        campo = document.getElementsByName(name)[0].value;
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
        boolmin = (min > 0)? campo >= min : true;
        // Si el maximo esta determinado, comprobamos si el numero es menor al maximo
        boolmax = (max > 0)? campo <= max : true;
        return boolmin && boolmax;
    }

});