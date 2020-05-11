<?php


namespace App\Exceptions;


use Throwable;

class InvalidDataException extends \Exception
{
    private array $messages;
    /**
     * InvalidBodyException constructor.
     * @param $responseMessage
     */
    public function __construct($responseMessage = ""|[])
    {
        if(is_array($responseMessage))
        {
            $this->messages = $responseMessage;
            $responseMessage = json_encode($responseMessage);
        }
        parent::__construct($responseMessage, 422);
    }
    public function getMessages(): array
    {
        return $this->messages;
    }
}
