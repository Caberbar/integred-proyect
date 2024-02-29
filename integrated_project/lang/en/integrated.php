<?php
return [
    /* teachers */
    'teachers_modal' => [
        'teachers' => 'Teachers',
        'teacher' => 'Teacher',
        'seneca_user' => 'Seneca User:',
        'seneca_user_error_message' => 'The Seneca User must be composed of 7 letters and 3 numbers.',
        'seneca_user_error_invalid' => 'The user of Seneca format isn\'t valid.',

        'name' => 'Name:',
        'name_error_message' => 'Name must be between 3 and 30 characters long.',

        'last_name' => 'Last Name:',
        'last_name_error_message' => 'Each last name must be between 3 and 50 characters long.',
        'first_last_name_error_invalid' => 'The first last name format isn´t valid.',
        'second_last_name_error_invalid' => 'The second last name format isn´t valid.',

        'speciality' => 'Speciality:',
        'select_speciality_message' => 'Select a speciality.',
        'select_speciality_option' => 'Select a specialty',
        'high_school_option' => 'High school',
        'vocational_training_option' => 'Vocational training',

        'close_button' => 'Close',
        'save_button' => 'Save',

        'show_label' => 'Show',
        'entries_label' => 'entries',

        'search_label' => 'Search:',
        'create_teacher_button' => 'Create teacher',

        'actions_header' => 'Actions',
        'no_results_message' => 'No results found.',
        'no_teachers_message' => 'No teachers found.',
    ],
    'teachers_page' => [
        'column_seneca_user' => 'Seneca User',
        'column_name' => 'Name',
        'column_first_name' => 'First Name',
        'column_last_name' => 'Last Name',
        'column_speciality' => 'Speciality',
    ],

    /* formations */
    'formations_page' => [
        'formations' => 'Formations',
        'column_acronym' => 'Acronym',
        'column_denomination' => 'Denomination',
        'column_actions' => 'Actions',
        'no_results_message' => 'No se encontraron resultados.',
        'no_educations_message' => 'No se encontraron educaciones.',
    ],
    'formations_modal' => [
        'title' => 'Formation',
        'close_button' => 'Close',
        'acronym_label' => 'Acronym:',
        'acronym_error_message' => 'Acronym must be at least 2 characters long.',
        'denomination_label' => 'Denomination:',
        'denomination_error_message' => 'Denomination must be between 3 and 255 characters long.',
        'show_label' => 'Show',
        'entries_label' => 'entries',
        'search_label' => 'Search:',
        'create_formation_button' => 'Create Formation',
        'column_acronym' => 'Acronym',
        'column_denomination' => 'Denomination',
    ]
];
