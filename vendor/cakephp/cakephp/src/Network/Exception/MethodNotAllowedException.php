<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\Network\Exception;

/**
 * Represents an HTTP 405 error.
 */
class MethodNotAllowedException extends HttpException
{

    /**
     * {@inheritDoc}
     */
    protected $_defaultCode = 405;

    /**
     * Constructor
     *
     * @param string|null $message If no message is given 'Method Not Allowed' will be the message
     * @param int $code Status code, defaults to 405
     * @param \Exception|null $previous The previous exception.
     */
    public function __construct($message = null, $code = null, $previous = null)
    {
        if (empty($message)) {
            $message = 'Method Not Allowed';
        }
        parent::__construct($message, $code, $previous);
    }
}
