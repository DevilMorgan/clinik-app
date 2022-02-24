<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute solo puede contener letras.',
    'alpha_dash'           => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => 'El campo :attribute solo puede contener letras y números.',
    'array'                => 'El campo :attribute debe ser un array.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file'    => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed'            => 'El campo confirmación de :attribute no coincide.',
    'date'                 => 'El campo :attribute no corresponde con una fecha válida.',
    'date_equals'          => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format'          => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different'            => 'Los campos :attribute y :other deben ser diferentes.',
    'digits'               => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between'       => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions'           => 'El campo :attribute tiene dimensiones de imagen inválidas.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El campo :attribute debe ser una dirección de correo válida.',
    'ends_with'            => 'El campo :attribute debe finalizar con alguno de los siguientes valores: :values',
    'exists'               => 'El campo :attribute seleccionado no existe.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'gt'                   => [
        'numeric' => 'El campo :attribute debe ser mayor a :value.',
        'file'    => 'El archivo :attribute debe pesar más de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener más de :value caracteres.',
        'array'   => 'El campo :attribute debe contener más de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o más kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o más caracteres.',
        'array'   => 'El campo :attribute debe contener :value o más elementos.',
    ],
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo :attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'lt'                   => [
        'numeric' => 'El campo :attribute debe ser menor a :value.',
        'file'    => 'El archivo :attribute debe pesar menos de :value kilobytes.',
        'string'  => 'El campo :attribute debe contener menos de :value caracteres.',
        'array'   => 'El campo :attribute debe contener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
        'file'    => 'El archivo :attribute debe pesar :value o menos kilobytes.',
        'string'  => 'El campo :attribute debe contener :value o menos caracteres.',
        'array'   => 'El campo :attribute debe contener :value o menos elementos.',
    ],
    'max'                  => [
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
        'file'    => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'string'  => 'El campo :attribute no debe contener más de :max caracteres.',
        'array'   => 'El campo :attribute no debe contener más de :max elementos.',
    ],
    'mimes'                => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
        'array'   => 'El campo :attribute debe contener al menos :min elementos.',
    ],
    'not_in'               => 'El campo :attribute seleccionado es inválido.',
    'not_regex'            => 'El formato del campo :attribute es inválido.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'password'             => 'La contraseña es incorrecta.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato del campo :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values están presentes.',
    'same'                 => 'Los campos :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file'    => 'El archivo :attribute debe pesar :size kilobytes.',
        'string'  => 'El campo :attribute debe contener :size caracteres.',
        'array'   => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with'          => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values',
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El campo :attribute debe ser una zona horaria válida.',
    'unique'               => 'El valor del campo :attribute ya está en uso.',
    'uploaded'             => 'El campo :attribute no se pudo subir.',
    'url'                  => 'El formato del campo :attribute es inválido.',
    'uuid'                 => 'El campo :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'surgeries.*.number'    => [
            'integer' => 'Cada consultorio debe tener un indicador numérico.'
        ],
        'surgeries.*.type'  => [
            'min' => 'Cada tipo del consultorio de tener mínimo :min.'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        //Contact basic
        'name_first'        => 'Primer Nombre',
        'name_second'       => 'Segundo Nombre',
        'lastname_first'    => 'Primer Apellido',
        'lastname_second'   => 'Segundo Apellido',
        'id_card'           => 'Número de identificación',
        'card_type_id'      => 'Tipo de identificación',
        'document-type'     => 'Tipo de Documento',
        'photo'             => 'Foto',
        'birthday'          => 'Fecha de Nacimiento',
        'country_birth'     => 'País de Nacimiento',
        'code_country_birth'=> 'Código',
        'department_birth'  => 'Departamento de Nacimiento',
        'code_department_birth'=> 'Código',
        'city_birth'        => 'Ciudad de Nacimiento',
        'code_city_birth'   => 'Código',
        'blood_group'       => 'Grupo de sangre',
        'occupation'        => 'Ocupación',
        'code_occupation'   => 'Código',
        'marital_status'    => 'Estado civil',
        'biological-sex'    => 'Sexo Biológico',
        'gender'            => 'Género',
        'gender_identity'   => 'Identidad de género',
        'status'            => 'Estado',
        'accept_terms_conditions'       => 'Acepto términos y condiciones',
        'accept_sending_communications' => 'Acepto envío de comunicaciones',

        //contact
        'email'     => 'Correo electrónico',
        'web-site'     => 'Sitio Web',
        'linkedIn'     => 'LinkedIn',
        'other-social-red'     => 'Otra Red Social',
        'rethus'     => 'RETHUS',
        'mobile' => 'Móvil',
        'cellphone' => 'Celular',
        'phone'     => 'Teléfono',
        'country'   => 'País',
        'code_country' => 'Código',
        'department' => 'Departamento',
        'code_department' => 'Código',
        'city'      => 'Ciudad',
        'code_city' => 'Código',
        'address'   => 'Dirección',
        'locality'  => 'Localidad',
        'neighborhood' => 'Barrio',
        'stratum'   => 'Estrato',
        'ethnicity' => 'Etnia',
        'ethnic_community' => 'Comunidad étnica',
        'uptown'    => 'Zona',



        'college'    => 'Universidad',
        'proffessional-card'    => 'Tarjeta Profesional',
        'main-speciality'    => 'Especialidad Principal',
        'other-speciality'    => 'Otra Especialidad',

        //Medical security patient
        'entity'                    => 'Entidad médica',
        'code_entity'               => 'Código',
        'contributory_regime'       => 'Régimen contributivo',
        'status_medical'            => 'Afiliación',
        'opposition_organ_donation' => 'Oposición a la presunción legal de donación',
        'advance_directive'         => 'Voluntad anticipada ',
        'code_advance_directive'    => 'Código del documento de voluntad anticipada',
        'impairment'                => 'Categoría de discapacidad',


        'observation'   => 'Observación',
        'code'          => 'Código',
        'price'         => 'Precio',

        //Date assigned
        'date-type'     => 'Tipo de cita',
        'consent'       => 'Consentimiento',
        'agreement'     => 'Convenio',
        'place'         => 'Lugar',
        'description'   => 'Descripción',
        'money'         => 'Dinero',

        //agreements
        'second_name'   => 'Segundo nombre',
        'first_lastname' => 'Primer apellido',
        'second_lastname' => 'Segundo apellido',
        'email_optional' => 'Correo opcional',
        'code_agreement'=> 'código de convenio',
        'address_type'  => 'Tipo de establecimiento',
        'postcode'      => 'Código postal',
        'economic_activity' => 'Actividad económica',
        'business_type' => 'Tipo de empresa',
        'co-pay.*.moderating_fee' => 'Cuota moderadora',
        'co-pay.*.agreement_fee' => 'Cuota del convenio',

        //Consent
        'content' => 'Consentimiento',

        //user
        'password'          => 'Contraseña',
        'new-password'          => 'Nueva Contraseña',
        'confirm-password'          => 'Confirmar Contraseña',
        'code-profession'   => 'Código Profesión',
        'profession'        => 'Profesión',
        'digital-signature' => 'Firma digital',
        'surgery'           => 'Consultorio',

        //History medical
        'is_various' => 'Varios',
        'type-numeric' => 'Tipo de numero',
        'step' => 'Paso',
        'min' => 'Mínimo',
        'max' => 'Máximo',
        'name-true'     => 'Nombre de verdadero',
        'value-true'    => 'Valor de verdadero',
        'name-false'    => 'Nombre de falso',
        'value-false'   => 'Valor de falso',
        'list'          => 'Lista',
        'is_multiple'   => 'Selección multiple',
        'category'      => 'Categoría',
        'models'        => 'Modelos HC',
        'end_records'   => 'Últimos registros',
        'required'      => 'Requerido',
        'date_type'      => 'Tipo de cita',

        'date-history-medical'  => 'Fecha de la historia clinica',
        'history-medical'       => 'Historia clinica',
        'schedule'      => 'Horario',
        'type_taxpayer' => 'Tipo de contribuyente',
        'diagnosis'     => 'Diagnostico',
        'diagnosis-optional-one'=> 'Diagnostico opcional uno',
        'diagnosis-optional-two'=> 'Diagnostico opcional dos',
        'days-off'  => 'Dias de descanso',
        'description-days-off'  => 'Descripción de dias de descanso',
        'abstract'      => 'Resumen',
        'comments' => 'Comentarios',
        'marital-status' => 'Estado civil',
        'schooling-level' => 'Nivel de escolaridad',
     
        // Contact
        'theme' => 'Tema',
        'type-request' => 'Tipo de Solicitud',
        'message' => 'Mensaje',

        // My consulting room
        'first-name-social-reason' => 'Primer Nombre / Razón Social',
        'verification-digit' => 'DV',


        // Ultimas validaciones creadas y empleadas
        'date_attention' => 'Fecha de la atención',
        'full_name' => 'Nombre completo',
        'relationship' => 'Parentesco',
        'sender' => 'Médico o institución que remite',
        'type_service' => 'Tipo de servicio',
        'hospitalization' => 'Hospitalización',
        'consulting_room' => 'Consultorio',
        'floor' => 'Piso',
        'bed' => 'Cama',
        'caring_environment' => 'Entorno donde se realiza la atención',
        'input_path' => 'Vía de ingreso del usuario',
        'modality' => 'Modalidad',
        'service_group' => 'Grupo de servicio',
        'factor_type' => 'Tipo de factor de riesgo',
        'factor_name' => 'Nombre de factor de riesgo',
        'symptom' => 'Síntoma',
        'symptom_date' => 'Fecha de inicio del síntoma',
        'triage' => 'Triage',
        'date_time_triage' => 'Fecha y hora del triage',
        'body_weight' => 'Peso corporal',
        'height' => 'Altura',
        'systolic_blood_pressure' => 'Presión arterial sistólica',
        'diastolic_blood_pressure' => 'Presión arterial diastólica',
        'heart_rate' => 'Frecuencia cardiaca',
        'respiration_rate' => 'Frecuencia respiratoria',
        'body_temperature' => 'Temperatura corporal',
        'imc' => 'IMC',
        'Commercial_name' => 'Nombre comercial',
        'route_administration' => 'Vía de administración',
        'dose' => 'Dosis',
        'code_dose' => 'Código',
        'frequency' => 'Frecuencia',
        'duration' => 'Duración',
        'active_principle' => 'Principio activo',
        'consentration' => 'Concentración',
        'recommendation' => 'Recomendaciones',
        'master_formula' => 'Fórmula Magistral',
        'main_diagnostic' => 'Diagnóstico principal de ingreso CIE-10',
        'diagnostic_type' => 'Tipo de diagnóstico principal del ingreso ',
        'orphan_diseases' => 'Código de enférmedades huerfanas',
        'process' => 'Procedimiento',
        'catalogue_CUPS' => 'Catálogo CUPS',
        'number_field' => 'Campo número',
        'text_area' => 'Área de texto',
        'text_field' => 'Campo de texto',
        'range_field' => 'Rango',
        'Booleano_field' => 'Booleano',
        'Checklist_field' => 'Checklist',
        'type_technology' => 'Tipo de tecnología en salud',
        'code_technology' => 'Código de tecnología en salud',
        'name_technology' => 'Nombre de la tecnología en salud',
        'purpose_technology' => 'Finalidad de la tecnología en salud',
        'reason_consultation' => 'Motivo de consulta',
        'template'        => 'Plantilla',
        'days'  => 'Días',
        'main_discharge_diagnosis' => 'Diagnóstico principal del egreso CIE-10',
        'name_main_diagnosis' => 'Nombre correspondiente al diagnostico principal',
        'type_main_discharge_diagnosis' => 'Tipo de diagnostico principal del egreso',
        'confirmed_diagnosis_code' => 'Codigo de diagnostico confirmado',
        'orphan_disease_catalog_code' => 'Código del catalogo de enfermedades huerfanas',
        'diagnosis_name' => 'Nombre del diagnostico',
        'medicine' => 'Medicamento',
        'food' => 'Alimento',
        'environment_substance' => 'Sustancia del ambiente',
        'substance_comes_into_contact_skin' => 'Sustancia que entra en contacto con la piel',
        'insect_bite' => 'Picadura de insectos',
        'other_which_one' => 'Otro ¿Cúal?',
        'allergen_name' => 'Nombre del alérgeno',
        'parents' => 'Padres',
        'siblings' => 'Hermanos',
        'uncles' => 'Tíos',
        'grandparents' => 'Abuelos',
        'comorbidities' => 'Comorbilidades',
        'main_egress_procedure' => 'Procedimiento pricncipal del egreso',
        'complication_code' => 'Código de la complicación',
        'complication_code_orphan_diseases' => 'Código de la complicación (enfermedades huérfanas)',
        'complication_diagnosis_name' => 'Nombre del diagnóstico de la complicación',
        'procedures_performed' => 'Procedimientos realizados',
        'date_result_clinical_assessment' => 'Fecha del resultado de la valoración clínica',
        'identification_instrument_measure' => 'Identificación del instrumento para medir el resultado observado',
        'observed_result_parameter_code' => 'Código del parámetro del resultado observado',
        'value_result_observed_catalog' => 'Valor del resultado observado de acuerdo con el catalogo de resultados',
        'condition_destination_user_discharge' => 'Condición y destino del usuario al egreso',
        'patient_going_home' => 'Paciente con destino a su domicilio',
        'dead_patient' => 'Paciente muerto',
        'hospitalized_patient' => 'Paciente hospitalizado derivado de urgencias',
        'referred_another_institution' => 'Referido a otra institución',
        'against_referred_another_institution' => 'Contra referido a otra institución',
        'referred_referred_home_hospitalization' => 'Derivado o referido a hospitalización domiciliaria',
        'channeled_social_service' => 'Canalizado a servicio social',
        'basic_cause_death_code' => 'Codigo de la causa básica de muerte',
        'confirmed_diagnosis_code' => 'Código del diagnóstico confirmado',
        'orphan_disease_catalog_code' => 'Código del catálogo de enfermedades huérfanas',
        'name_diagnosis_underlying_cause_death' => 'Nombre correspondiente al diagnostico de la causa básica de muerte',
        'end_date_time_care' => 'Fecha y hora de la finalización de la atención',
        'code_health_service_provider_case_death' => 'Código del prestador de servicio de salud donde se refiere caso de muerte SGSSS',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',

    ],

];
