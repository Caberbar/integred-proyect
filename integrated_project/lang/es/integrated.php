<?php
return [
    'teachers_modal' => [
        'teachers' => 'Profesores',
        'teacher' => 'Profesor',
        'seneca_user' => 'Usuario de Seneca:',
        'seneca_user_error_message' => 'El usuario de Seneca debe estar compuesto por 7 letras y 3 números.',
        'seneca_user_error_invalid' => 'El formato del usuario de Seneca no es válido.',

        'name' => 'Nombre:',
        'name_error_message' => 'El nombre debe tener entre 3 y 30 caracteres de longitud.',

        'last_name' => 'Apellidos:',
        'last_name_error_message' => 'Cada apellido debe tener entre 3 y 50 caracteres de longitud.',
        'first_last_name_error_invalid' => 'El formato del primer apellido no es válido.',
        'second_last_name_error_invalid' => 'El formato del segundo apellido no es válido.',

        'speciality' => 'Especialidad:',
        'select_speciality_message' => 'Selecciona una especialidad.',
        'select_speciality_option' => 'Selecciona una especialidad',
        'high_school_option' => 'Educación secundaria',
        'vocational_training_option' => 'Formación profesional',

        'close_button' => 'Cerrar',
        'save_button' => 'Guardar',

        'show_label' => 'Mostrar',
        'entries_label' => 'entradas',

        'search_label' => 'Buscar:',
        'create_teacher_button' => 'Crear profesor',

        'actions_header' => 'Acciones',
        'no_results_message' => 'No se encontraron resultados.',
        'no_teachers_message' => 'No se encontraron profesores.',
    ],
    'teachers_page' => [
        'column_seneca_user' => 'Usuario de Seneca',
        'column_name' => 'Nombre',
        'column_first_name' => 'Primer Apellido',
        'column_last_name' => 'Segundo Apellido',
        'column_speciality' => 'Especialidad',
    ],

    /* formaciones */
    'formations_page' => [
        'formations' => 'Formaciones',
        'column_acronym' => 'Acrónimo',
        'column_denomination' => 'Denominación',
        'column_actions' => 'Acciones',
        'no_results_message' => 'No se encontraron resultados.',
        'no_educations_message' => 'No se encontraron educaciones.',
    ],
    'formations_modal' => [
        'title' => 'Formación',
        'close_button' => 'Cerrar',
        'acronym_label' => 'Acrónimo:',
        'acronym_error_message' => 'El acrónimo debe tener al menos 2 caracteres de longitud.',
        'denomination_label' => 'Denominación:',
        'denomination_error_message' => 'La denominación debe tener entre 3 y 255 caracteres de longitud.',
        'show_label' => 'Mostrar',
        'entries_label' => 'entradas',
        'search_label' => 'Buscar:',
        'create_formation_button' => 'Crear Formación',
        'column_acronym' => 'Acrónimo',
        'column_denomination' => 'Denominación',
    ],
];
