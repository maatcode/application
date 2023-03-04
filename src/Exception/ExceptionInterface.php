<?php
declare(strict_types=1);

namespace Maatcode\Application\Exception;

interface ExceptionInterface
{
    /* Protected methods inherited from Exception class */
    /**
     * @return mixed
     */
    public function getMessage();                 // Exception message

    /**
     * @return mixed
     */
    public function getCode();                    // User-defined Exception code

    /**
     * @return mixed
     */
    public function getFile();                    // Source filename

    /**
     * @return mixed
     */
    public function getLine();                    // Source line

    /**
     * @return mixed
     */
    public function getTrace();                   // An array of the backtrace()

    /**
     * @return mixed
     */
    public function getTraceAsString();           // Formatted string of trace

    /* Overrideable methods inherited from Exception class */
    /**
     * @return mixed
     */
    public function __toString();                 // Formatted string for display

    /**
     * @param $message
     * @param $code
     */
    public function __construct($message = null, $code = 0);
}
