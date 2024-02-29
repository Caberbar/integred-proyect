<?php
return [
    /* teachers settings */
    'teachers_modal' => [
        'teachers' => 'Lehrer',
        'teacher' => 'Lehrer',
        'seneca_user' => 'Seneca-Benutzer:',
        'seneca_user_error_message' => 'Der Seneca-Benutzer muss aus 7 Buchstaben und 3 Zahlen bestehen.',
        'seneca_user_error_invalid' => 'Das Format des Seneca-Benutzers ist ungültig.',

        'name' => 'Name:',
        'name_error_message' => 'Der Name muss zwischen 3 und 30 Zeichen lang sein.',

        'last_name' => 'Nachname:',
        'last_name_error_message' => 'Jeder Nachname muss zwischen 3 und 50 Zeichen lang sein.',
        'first_last_name_error_invalid' => 'Das Format des ersten Nachnamens ist ungültig.',
        'second_last_name_error_invalid' => 'Das Format des zweiten Nachnamens ist ungültig.',

        'speciality' => 'Spezialität:',
        'select_speciality_message' => 'Wählen Sie eine Spezialität aus.',
        'select_speciality_option' => 'Wählen Sie eine Spezialität',
        'high_school_option' => 'Gymnasium',
        'vocational_training_option' => 'Berufsausbildung',

        'close_button' => 'Schließen',
        'save_button' => 'Speichern',

        'show_label' => 'Zeigen',
        'entries_label' => 'Einträge',

        'search_label' => 'Suche:',
        'create_teacher_button' => 'Lehrer erstellen',

        'actions_header' => 'Aktionen',
        'no_results_message' => 'Keine Ergebnisse gefunden.',
        'no_teachers_message' => 'Keine Lehrer gefunden.',
    ],
    'teachers_page' => [
        'column_seneca_user' => 'Seneca-Benutzer',
        'column_name' => 'Name',
        'column_first_name' => 'Vorname',
        'column_last_name' => 'Nachname',
        'column_speciality' => 'Spezialität',
    ],

    /* Ausbildungen */
    'formations_page' => [
        'formations' => 'Ausbildungen',
        'column_acronym' => 'Akronym',
        'column_denomination' => 'Bezeichnung',
        'column_actions' => 'Aktionen',
        'no_results_message' => 'Keine Ergebnisse gefunden.',
        'no_educations_message' => 'Keine Ausbildungen gefunden.',
    ],
    'formations_modal' => [
        'title' => 'Ausbildung',
        'close_button' => 'Schließen',
        'acronym_label' => 'Akronym:',
        'acronym_error_message' => 'Das Akronym muss mindestens 2 Zeichen lang sein.',
        'denomination_label' => 'Bezeichnung:',
        'denomination_error_message' => 'Die Bezeichnung muss zwischen 3 und 255 Zeichen lang sein.',
        'show_label' => 'Anzeigen',
        'entries_label' => 'Einträge',
        'search_label' => 'Suche:',
        'create_formation_button' => 'Ausbildung erstellen',
        'column_acronym' => 'Akronym',
        'column_denomination' => 'Bezeichnung',
    ],

];
