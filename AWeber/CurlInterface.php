<?php

namespace AWeber;

/**
 * CurlInterface
 *
 * An object-oriented shim that wraps the standard PHP cURL library.
 *
 * This interface has been created so that cURL functionality can be stubbed
 * out for unit testing, or swapped for an alternative library.
 *
 * @see curl
 * @package
 * @version $id$
 */
interface CurlInterface
{

    /**
     * errNo
     *
     * Encapsulates curl_errno - Returns the last error number
     *
     * @param resource $ch - A cURL handle returned by init.
     * @access public
     * @return mixed the error number or 0 if no error occured.
     */
    public function errno($ch);

    /**
     * error
     *
     * Encapsulates curl_error - Return last error string
     *
     * @param resource $ch - A cURL handle returned by init.
     * @access public
     * @return mixed the error messge or '' if no error occured.
     */
    public function error($ch);

    /**
     * execute
     *
     * Encapsulates curl_exec - Perform a cURL session.
     *
     * @param resource $ch - A cURL handle returned by init.
     * @access public
     * @return TRUE on success, FALSE on failure.
     */
    public function execute($ch);

    /**
     * init
     *
     * Encapsulates curl_init - Initialize a cURL session.
     *
     * @param string $url - url to use.
     * @access public
     * @return mixed cURL handle on success, FALSE on failure.
     */
    public function init($url);

    /**
     * setopt
     *
     * Encapsulates curl_setopt - Set an option for cURL transfer.
     *
     * @param resource $ch - A cURL handle returned by init.
     * @param $option
     * @param mixed $value - The value to set.
     * @return True on success, FALSE on failure.
     * @internal param int $opt - The CURLOPT to set.
     * @access public
     */
    public function setopt($ch, $option, $value);
}


