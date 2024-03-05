document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var errors = {};
    errors['horas'] = true;
    errors['siglas'] = true;
    errors['denominacion'] = true;
    errors['curso'] = true;
    errors['especialidad'] = true;
    errors['formacion'] = true;

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

    // Denominacion Validation
    document.getElementById('denominacion').addEventListener('focusout', function() {
        if(!validar('denominacion', '^.{2,255}$')){ 
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

    // Curso Validation
    document.getElementById('curso').addEventListener('focusout', function() {
        if(!validarCurso() || document.getElementById('curso').value == -1){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_curso').classList.add('show');
            errors['curso'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_curso').classList.remove('show');
            errors['curso'] = false;
        }
        actualizarBoton();
    });

    // Speciality Validation
    document.getElementById('especialidad').addEventListener('focusout', function() {
        if(!validar('especialidad', '^(secundaria|formacion profesional)$') || 
            document.getElementById('especialidad').value == -1){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_especialidad').classList.add('show');
            errors['especialidad'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_especialidad').classList.remove('show');
            errors['especialidad'] = false;
        }
        actualizarBoton();
    });

    // Formation Validation
    document.getElementById('formacion').addEventListener('focusout', function() {
        if(document.getElementById('formacion').value == -1){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_formacion').classList.add('show');
            errors['formacion'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_formacion').classList.remove('show');
            errors['formacion'] = false;
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
     * @param {string} id Atributo id del input del que se va a sacar el dato
     * @param {string} regularExpression Expresión regular con la que se va a validar el dato
     * @returns {boolean} True si el dato cumple con la regex
     */
    function validar(id, regularExpression){
        campo = document.getElementById(id).value;
        regex = new RegExp(regularExpression);
        return regex.test(campo);
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

    /**
     * Comprueba si el curso es válido para la especialidad seleccionada (FP no puede tener 3º ni 4º)
     * @returns {boolean} True si el curso es correcto para la especialidad seleccionada
     */
    function validarCurso(){
        curso = document.getElementById('curso').value;
        especialidad = document.getElementById('especialidad').value;
        // Es valido si la especialidad no es fp y el curso es mayor a 2
        $valido = !(especialidad == "formacion profesional" && curso > 2)
        return $valido;
    }

});