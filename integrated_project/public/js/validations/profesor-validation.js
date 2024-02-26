document.addEventListener('DOMContentLoaded', function() {
    var submit = document.getElementById('insert-submit');
    var errors = {};
    errors['usu_seneca'] = true;
    errors['nombre'] = true;
    errors['apellidos'] = true;
    errors['especialidad'] = true;

    // Seneca User Validation
    document.getElementById('usu_seneca').addEventListener('focusout', function() {
        if(!validar('usu_seneca', '^[A-Za-z]{7}\\d{3}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_usu_seneca').classList.add('show');
            errors['usu_seneca'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_usu_seneca').classList.remove('show');
            errors['usu_seneca'] = false;
        }
        actualizarBoton();
    });

    // First Name Validation
    document.getElementById('nombre').addEventListener('focusout', function() {
        if(!validar('nombre', '^.{3,30}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_nombre').classList.add('show');
            errors['nombre'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_nombre').classList.remove('show');
            errors['nombre'] = false;
        }
        actualizarBoton();
    });

    // Last Names Validation
    document.getElementById('apellido1').addEventListener('focusout', function() {
        validarApellidos();
    });
    document.getElementById('apellido2').addEventListener('focusout', function() {
        validarApellidos();
    });
    function validarApellidos(){
        if(!validar('apellido1', '^.{3,50}$') || !validar('apellido2', '^.{3,50}$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_apellidos').classList.add('show');
            errors['apellidos'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_apellidos').classList.remove('show');
            errors['apellidos'] = false;
        }
        actualizarBoton();
    }

    // Speciality Validation
    document.getElementById('speciality').addEventListener('focusout', function() {
        if(!validar('speciality', '^(secundaria|formacion profesional)$')){ 
            // Si hay errores mostramos el mensaje de error
            document.getElementById('error_speciality').classList.add('show');
            errors['especialidad'] = true;
        }else{ 
            // Si no hay errores escondemos el mensaje de error
            document.getElementById('error_speciality').classList.remove('show');
            errors['especialidad'] = false;
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