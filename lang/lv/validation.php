<?php

return [

    'required' => 'Lauks :attribute ir obligāts.',
    'string' => 'Laukam :attribute jābūt teksta virknei.',
    'max' => [
        'array' => 'Laukā :attribute nedrīkst būt vairāk par :max elementiem.',
        'file' => 'Lauks :attribute nedrīkst būt lielāks par :max kilobaitiem.',
        'numeric' => 'Lauks :attribute nedrīkst būt lielāks par :max.',
        'string' => 'Lauks :attribute nedrīkst būt garāks par :max rakstzīmēm.',
    ],
    'min' => [
        'array' => 'Laukā :attribute jābūt vismaz :min elementiem.',
        'file' => 'Lauka :attribute izmēram jābūt vismaz :min kilobaitiem.',
        'numeric' => 'Laukam :attribute jābūt vismaz :min.',
        'string' => 'Laukam :attribute jābūt vismaz :min rakstzīmēm.',
    ],
    'numeric' => 'Laukam :attribute jābūt skaitlim.',
    'integer' => 'Laukam :attribute jābūt veselam skaitlim.',
    'email' => 'Laukam :attribute jābūt e-pasta adresei.',
    'exists' => 'Izvēlētais :attribute ir nederīgs.',
    'password' => [
        'letters' => 'Laukam :attribute ir jāietver vismaz viens burts.',
        'mixed' => 'Laukam :attribute ir jāietver vismaz viens lielais un viens mazais burts.',
        'numbers' => 'Laukam :attribute ir jāietver vismaz viens cipars.',
        'symbols' => 'Laukam :attribute ir jāietver vismaz viens simbols.',
        'uncompromised' => 'Norādītā :attribute ir parādījusies datu noplūdē. Lūdzu, izvēlieties citu :attribute.',
    ],
    'current_password' => 'Parole ir nepareiza.',
    'confirmed' => 'Lauks :attribute nesakrīt.',
    'unique' => 'Lauks :attribute jau ir aizņemts.',
    'lowercase' => 'Laukam :attribute ir jābūt rakstītam ar mazajiem burtiem.',

];
