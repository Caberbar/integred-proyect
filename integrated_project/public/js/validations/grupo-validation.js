document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var errors = {};
    errors['denominacion'] = true;
    errors['curso_escolar'] = true;
    errors['curso'] = true;
    errors['formacion'] = true;
    errors['turno'] = true;

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

    // Curso Escolar Validation
    document.getElementById('curso_escolar').addEventListener('focusout', function() {
        if(!validar('curso_escolar', '^.{3,}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_curso_escolar').classList.add('show');
            errors['curso_escolar'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_curso_escolar').classList.remove('show');
            errors['curso_escolar'] = false;
        }
        actualizarBoton();
    });

    // Curso Validation
    document.getElementById('curso').addEventListener('focusout', function() {
        if(document.getElementById('curso').value == -1){
            document.getElementById('error_curso').classList.add('show');
            errors['curso'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_curso').classList.remove('show');
            errors['curso'] = false;
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

    // Turn Validation
    document.getElementById('turno').addEventListener('focusout', function() {
        if(document.getElementById('turno').value == -1){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_turno').classList.add('show');
            errors['turno'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_turno').classList.remove('show');
            errors['turno'] = false;
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
});