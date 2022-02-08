<?php

namespace Core\Modules\Desafio\NFeSync;

class NFeSyncException extends \DomainException
{
    public function __construct(\Throwable $previous = null, string $message = '', int $code = 0)
    {
        parent::__construct($message, $code, $previous);
    }
}
