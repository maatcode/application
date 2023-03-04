<?php
declare(strict_types=1); /** @noinspection ALL */
/** @noinspection ALL */

/** @noinspection ALL */

namespace Maatcode\Application\Exception;

use Exception;

abstract class AbstractException extends Exception implements ExceptionInterface
{
    /**
     * @var string
     */
    protected $message = 'Unknown exception';     // Exception message
    /**
     * @var string
     */
    private string $string;                            // Unknown
    /**
     * @var int
     */
    protected $code = 0;                       // User-defined exception code
    /**
     * @var string
     */
    protected string $file;                              // Source filename of exception
    /**
     * @var int
     */
    protected int $line;                              // Source line of exception
    /**
     * @var string
     */
    private string $trace;                             // Unknown

    /**
     * @throws AbstractException
     */
    public function __construct($message = null, $code = 0)
    {
        if (!$message)
        {
            throw new $this('Unknown ' . get_class($this));
        }
        parent::__construct($message, $code);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
            . "{$this->getTraceAsString()}";
    }

}
