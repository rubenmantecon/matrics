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

    'accepted' => 'Cal acceptar el :attribute.',
    'active_url' => 'El :attribute no és un URL vàlid.',
    'after' => 'El :attribute ha de ser una data posterior a la data :date.',
    'after_or_equal' => 'El :attribute ha de ser una data posterior o igual a :date.',
    'alpha' => 'El :attribute només pot contenir lletres.',
    'alpha_dash' => 'El :attribute només pot contenir lletres, números, guions i guions baixos.',
    'alpha_num' => 'El :attribute només pot contenir lletres i nombres.',
    'array' => 'El :attribute ha de ser una matriu.',
    'before' => 'El :attribute ha de ser una data anterior a la :date.',
    'before_or_equal' => 'El :attribute ha de ser una data anterior o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute ha d\'estar entre :min i :max.',
        'file' => 'El :attribute ha d\'estar entre :min i :max kilobytes.',
        'string' => 'El :attribute ha d\'estar entre els caràcters :min i :max.',
        'array' => 'El :attribute ha de tenir entre :min i :max elements.',
    ],
    'boolean' => 'El camp :attribute ha de ser cert o fals.',
    'confirmed' => 'La confirmació del :attribute no coincideix.',
    'date' => 'El :attribute no és una data vàlida.',
    'date_equals' => 'El :attribute ha de ser una data igual a :date.',
    'date_format' => 'El :attribute no coincideix amb el format :format.',
    'different' => 'Els :attribute i :other han de ser diferents.',
    'digits' => 'El :attribute ha de ser :digits dígits.',
    'digits_between' => 'El :attribute ha d\'estar entre :min i :max dígits.',
    'dimensions' => 'El :attribute té dimensions d\'imatge no vàlides.',
    'distinct' => 'El camp :attribute té un valor duplicat.',
    'email' => 'El :attribute ha de ser una adreça de correu electrònic vàlida.',
    'ends_with' => 'El :attribute ha d\'acabar amb un dels següents :values.',
    'exists' => 'El :attribute seleccionat no és vàlid.',
    'file' => 'El :attribute ha de ser un fitxer.',
    'filled' => 'El camp :attribute ha de tenir un valor.',
    'gt' => [
        'numeric' => 'El :attribute ha de ser més gran que el :value.',
        'file' => 'El :attribute ha de ser més gran que :value kilobytes.',
        'string' => 'El :attribute ha de ser més gran que els caràcters de :value.',
        'array' => 'El :attribute ha de tenir més d\'elements de :value.',
    ],
    'gte' => [
        'numeric' => 'El :attribute ha de ser més gran o igual que el :value.',
        'file' => 'El :attribute ha de ser més gran o igual que :value kilobytes.',
        'string' => 'El :attribute ha de ser més gran o igual que els caràcters :value.',
        'array' => 'El :attribute ha de tenir :value o més elements.',
    ],
    'image' => 'El :attribute ha de ser una imatge.',
    'in' => 'El :attribute seleccionat no és vàlid.',
    'in_array' => 'El camp :attribute no existeix a :other.',
    'integer' => 'El :attribute ha de ser un enter.',
    'ip' => 'El :attribute ha de ser una adreça IP vàlida.',
    'ipv4' => 'El :attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6' => 'El :attribute ha de ser una adreça IPv6 vàlida.',
    'json' => 'El :attribute ha de ser una cadena JSON vàlida.',
    'lt' => [
        'numeric' => 'El :attribute ha de ser inferior a :value.',
        'file' => 'El :attribute ha de ser inferior a :value kilobytes.',
        'string' => 'El :attribute ha de ser més petit que els caràcters de :value.',
        'array' => 'El :attribute ha de tenir menys d\'elements de :value.',
    ],
    'lte' => [
        'numeric' => 'El :attribute ha de ser inferior o igual a :valor.',
        'file' => 'El :attribute ha de ser inferior o igual a :value kilobytes.',
        'string' => 'El :attribute ha de ser més petit o igual que els caràcters :value.',
        'array' => 'El :attribute no pot tenir més d\'elements de :value.',
    ],
    'max' => [
        'numeric' => 'El :attribute no pot ser més gran que :max.',
        'file' => 'El :attribute no pot ser més gran que :max kilobytes.',
        'string' => 'El :attribute no pot ser més gran que els :max caràcters.',
        'array' => 'El :attribute no pot tenir més de :max elements.',
    ],
    'mimes' => 'El :attribute ha de ser un fitxer de tipus: :values.',
    'mimetypes' => 'El :attribute ha de ser un fitxer de tipus: :values.',
    'min' => [
        'numeric' => 'El :attribute ha de ser almenys :min.',
        'file' => 'El :attribute ha de ser almenys :min kilobytes.',
        'string' => 'El :attribute ha de ser com a mínim :min caràcters.',
        'array' => 'El :attribute ha de tenir almenys elements :min.',
    ],
    'multiple_of' => 'El :attribute ha de ser un múltiple de :value.',
    'not_in' => 'El :attribute seleccionat no és vàlid.',
    'not_regex' => 'El format :attribute no és vàlid.',
    'numeric' => 'El :attribute ha de ser un número.',
    'password' => 'La contrasenya és incorrecta.',
    'present' => 'El camp de :attribute ha d\'estar present.',
    'regex' => 'El format :attribute no és vàlid.',
    'required' => 'El camp :attribute es obligatori.',
    'required_if' => 'El camp de :attribute es requereix quan :other és :value.',
    'required_unless' => 'El camp de :attribute és obligatori llevat que :other estigui en :values.',
    'required_with' => 'El camp de :attribute es requereix quan hi ha :values.',
    'required_with_all' => 'El camp :attribute és obligatori quan hi ha :values.',
    'required_without' => 'El camp :attribute és obligatori quan els :values no estan presents.',
    'required_without_all' => 'El camp :attribute és obligatori quan no hi ha cap :values present.',
    'same' => 'Els :attribute i :other han de coincidir.',
    'size' => [
        'numeric' => 'El :attribute ha de ser :size.',
        'file' => 'El :attribute ha de ser :size kilobytes.',
        'string' => 'El :attribute ha de ser :size caràcters.',
        'array' => 'El :attribute ha de contenir :size elements.',
    ],
    'starts_with' => 'El :attribute ha de començar amb un dels següents :values.',
    'string' => 'El :attribute ha de ser una cadena de text.',
    'timezone' => 'El :attribute ha de ser una zona vàlida.',
    'unique' => 'El :attribute ja ha estat agafat.',
    'uploaded' => 'El :attribute no s\'ha pogut pujar.',
    'url' => 'El format :attribute no és vàlid.',
    'uuid' => 'El :attribute ha de ser un UUID vàlid.',

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
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
