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

    'accepted' => ':attribute laukam jābūt pieņemtam.',
    'accepted_if' => ':attribute laukam jābūt pieņemtam, kad :other ir :value.',
    'active_url' => ':attribute laukam jābūt derīgai URL adresei.',
    'after' => ':attribute laukam jābūt datumam pēc :date.',
    'after_or_equal' => ':attribute laukam jābūt datumam pēc vai vienādam ar :date.',
    'alpha' => ':attribute laukā drīkst būt tikai burti.',
    'alpha_dash' => ':attribute laukā drīkst būt tikai burti, cipari, domuzīmes un pasvītras.',
    'alpha_num' => ':attribute laukā drīkst būt tikai burti un cipari.',
    'array' => ':attribute laukam jābūt masīvam.',
    'ascii' => ':attribute laukā drīkst būt tikai vienbaitu alfabēta burti un simboli.',
    'before' => ':attribute laukam jābūt datumam pirms :date.',
    'before_or_equal' => ':attribute laukam jābūt datumam pirms vai vienādam ar :date.',
    'between' => [
        'array' => ':attribute laukā jābūt no :min līdz :max vienībām.',
        'file' => ':attribute laukam jābūt no :min līdz :max kilobaitiem.',
        'numeric' => ':attribute laukam jābūt no :min līdz :max.',
        'string' => ':attribute laukam jābūt no :min līdz :max rakstzīmēm.',
    ],
    'boolean' => ':attribute laukam jābūt patiesam vai nepatiesam.',
    'can' => ':attribute laukā ir neatļauta vērtība.',
    'confirmed' => ':attribute apstiprinājums nesakrīt.',
    'contains' => ':attribute laukā trūkst nepieciešamās vērtības.',
    'current_password' => 'Parole ir nepareiza.',
    'date' => ':attribute laukam jābūt derīgam datumam.',
    'date_equals' => ':attribute laukam jābūt datumam, kas ir vienāds ar :date.',
    'date_format' => ':attribute laukam jāatbilst formātam :format.',
    'decimal' => ':attribute laukam jābūt ar :decimal decimālzīmēm.',
    'declined' => ':attribute laukam jābūt noraidītam.',
    'declined_if' => ':attribute laukam jābūt noraidītam, kad :other ir :value.',
    'different' => ':attribute un :other laukiem jābūt atšķirīgiem.',
    'digits' => ':attribute laukam jābūt :digits cipariem.',
    'digits_between' => ':attribute laukam jābūt no :min līdz :max cipariem.',
    'dimensions' => ':attribute laukam ir nederīgi attēla izmēri.',
    'distinct' => ':attribute laukam ir dublēta vērtība.',
    'doesnt_end_with' => ':attribute laukam nedrīkst beigties ar vienu no šiem: :values.',
    'doesnt_start_with' => ':attribute laukam nedrīkst sākties ar vienu no šiem: :values.',
    'email' => ':attribute laukam jābūt derīgai e-pasta adresei.',
    'ends_with' => ':attribute laukam jābeidzas ar vienu no šiem: :values.',
    'enum' => 'Izvēlētais :attribute ir nederīgs.',
    'exists' => 'Izvēlētais :attribute ir nederīgs.',
    'extensions' => ':attribute laukam jābūt failam ar vienu no šīm paplašinājumiem: :values.',
    'file' => ':attribute laukam jābūt failam.',
    'filled' => ':attribute laukam jābūt aizpildītam.',
    'gt' => [
        'array' => ':attribute laukam jābūt vairāk nekā :value vienībām.',
        'file' => ':attribute laukam jābūt lielākam par :value kilobaitiem.',
        'numeric' => ':attribute laukam jābūt lielākam par :value.',
        'string' => ':attribute laukam jābūt lielākam par :value rakstzīmēm.',
    ],
    'gte' => [
        'array' => ':attribute laukam jābūt :value vienībām vai vairāk.',
        'file' => ':attribute laukam jābūt lielākam vai vienādam ar :value kilobaitiem.',
        'numeric' => ':attribute laukam jābūt lielākam vai vienādam ar :value.',
        'string' => ':attribute laukam jābūt lielākam vai vienādam ar :value rakstzīmēm.',
    ],
    'hex_color' => ':attribute laukam jābūt derīgai heksadecimālai krāsai.',
    'image' => ':attribute laukam jābūt attēlam.',
    'in' => 'Izvēlētais :attribute ir nederīgs.',
    'in_array' => ':attribute laukam jābūt :other laukā.',
    'integer' => ':attribute laukam jābūt veselam skaitlim.',
    'ip' => ':attribute laukam jābūt derīgai IP adresei.',
    'ipv4' => ':attribute laukam jābūt derīgai IPv4 adresei.',
    'ipv6' => ':attribute laukam jābūt derīgai IPv6 adresei.',
    'json' => ':attribute laukam jābūt derīgai JSON virknei.',
    'list' => ':attribute laukam jābūt sarakstam.',
    'lowercase' => ':attribute laukam jābūt mazajiem burtiem.',
    'lt' => [
        'array' => ':attribute laukam jābūt mazāk nekā :value vienībām.',
        'file' => ':attribute laukam jābūt mazākam par :value kilobaitiem.',
        'numeric' => ':attribute laukam jābūt mazākam par :value.',
        'string' => ':attribute laukam jābūt mazākam par :value rakstzīmēm.',
    ],
    'lte' => [
        'array' => ':attribute laukam nedrīkst būt vairāk nekā :value vienības.',
        'file' => ':attribute laukam jābūt mazākam vai vienādam ar :value kilobaitiem.',
        'numeric' => ':attribute laukam jābūt mazākam vai vienādam ar :value.',
        'string' => ':attribute laukam jābūt mazākam vai vienādam ar :value rakstzīmēm.',
    ],
    'mac_address' => ':attribute laukam jābūt derīgai MAC adresei.',
    'max' => [
        'array' => ':attribute laukam nedrīkst būt vairāk nekā :max vienības.',
        'file' => ':attribute laukam nedrīkst būt lielākam par :max kilobaitiem.',
        'numeric' => ':attribute laukam nedrīkst būt lielākam par :max.',
        'string' => ':attribute laukam nedrīkst būt lielākam par :max rakstzīmēm.',
    ],
    'max_digits' => ':attribute laukam nedrīkst būt vairāk nekā :max cipari.',
    'mimes' => ':attribute laukam jābūt failam ar tipu: :values.',
    'mimetypes' => ':attribute laukam jābūt failam ar tipu: :values.',
    'min' => [
        'array' => ':attribute laukam jābūt vismaz :min vienībām.',
        'file' => ':attribute laukam jābūt vismaz :min kilobaitiem.',
        'numeric' => ':attribute laukam jābūt vismaz :min.',
        'string' => ':attribute laukam jābūt vismaz :min rakstzīmēm.',
    ],
    'min_digits' => ':attribute laukam jābūt vismaz :min cipariem.',
    'missing' => ':attribute laukam jābūt trūkstošam.',
    'missing_if' => ':attribute laukam jābūt trūkstošam, kad :other ir :value.',
    'missing_unless' => ':attribute laukam jābūt trūkstošam, ja :other nav :value.',
    'missing_with' => ':attribute laukam jābūt trūkstošam, kad :values ir klāt.',
    'missing_with_all' => ':attribute laukam jābūt trūkstošam, kad :values ir klāt.',
    'multiple_of' => ':attribute laukam jābūt vairākkārtīgam no :value.',
    'not_in' => 'Izvēlētais :attribute ir nederīgs.',
    'not_regex' => ':attribute formāts ir nederīgs.',
    'numeric' => ':attribute laukam jābūt skaitlim.',
    'password' => [
        'letters' => ':attribute laukam jābūt vismaz vienam burtam.',
        'mixed' => ':attribute laukam jābūt vismaz vienam lielajam un vienam mazajam burtam.',
        'numbers' => ':attribute laukam jābūt vismaz vienam ciparam.',
        'symbols' => ':attribute laukam jābūt vismaz vienam simbolam.',
        'uncompromised' => 'Norādītais :attribute ir parādījies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
    ],
    'present' => ':attribute laukam jābūt klāt.',
    'present_if' => ':attribute laukam jābūt klāt, kad :other ir :value.',
    'present_unless' => ':attribute laukam jābūt klāt, ja :other nav :value.',
    'present_with' => ':attribute laukam jābūt klāt, kad :values ir klāt.',
    'present_with_all' => ':attribute laukam jābūt klāt, kad :values ir klāt.',
    'prohibited' => ':attribute lauks ir aizliegts.',
    'prohibited_if' => ':attribute lauks ir aizliegts, kad :other ir :value.',
    'prohibited_unless' => ':attribute lauks ir aizliegts, ja :other nav :values.',
    'prohibits' => ':attribute lauks aizliedz :other būt klāt.',
    'regex' => ':attribute formāts ir nederīgs.',
    'required' => ':attribute lauks ir obligāts.',
    'required_array_keys' => ':attribute laukam jābūt ierakstiem: :values.',
    'required_if' => ':attribute lauks ir obligāts, kad :other ir :value.',
    'required_if_accepted' => ':attribute lauks ir obligāts, kad :other ir pieņemts.',
    'required_if_declined' => ':attribute lauks ir obligāts, kad :other ir noraidīts.',
    'required_unless' => ':attribute lauks ir obligāts, ja :other nav :values.',
    'required_with' => ':attribute lauks ir obligāts, kad :values ir klāt.',
    'required_with_all' => ':attribute lauks ir obligāts, kad :values ir klāt.',
    'required_without' => ':attribute lauks ir obligāts, kad :values nav klāt.',
    'required_without_all' => ':attribute lauks ir obligāts, kad neviens no :values nav klāt.',
    'same' => ':attribute laukam jāatbilst :other laukam.',
    'size' => [
        'array' => ':attribute laukam jābūt :size vienībām.',
        'file' => ':attribute laukam jābūt :size kilobaitiem.',
        'numeric' => ':attribute laukam jābūt :size.',
        'string' => ':attribute laukam jābūt :size rakstzīmēm.',
    ],
    'starts_with' => ':attribute laukam jāsākas ar vienu no šiem: :values.',
    'string' => ':attribute laukam jābūt virknei.',
    'timezone' => ':attribute laukam jābūt derīgai laika zonai.',
    'unique' => ':attribute jau ir aizņemts.',
    'uploaded' => ':attribute neizdevās augšupielādēt.',
    'uppercase' => ':attribute laukam jābūt lielajiem burtiem.',
    'url' => ':attribute laukam jābūt derīgai URL adresei.',
    'ulid' => ':attribute laukam jābūt derīgam ULID.',
    'uuid' => ':attribute laukam jābūt derīgam UUID.',

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
