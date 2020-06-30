<?php

namespace App\Utils;

abstract class LogActionType
{

    const TYPES = [
        'Excluir'               => 1,
        'Incluir'               => 2,
        'AtribuirPerfil'        => 3,
        'Alterar'               => 4,
        'AtribuirPermissão'     => 5,
        'RemoverPermissão'      => 6,
        'Entrou'                => 7,
        'LoginFalhou'           => 8,
        'Importar'              => 9,
    ];
}
