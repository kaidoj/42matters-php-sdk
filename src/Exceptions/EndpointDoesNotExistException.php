<?php
namespace Kaidoj\SDK\Exceptions;

use Exception;

class EndpointDoesNotExistException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct(sprintf('Endpoint \'%s\' does not exist', $name));
    }
}