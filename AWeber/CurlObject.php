<?php

namespace AWeber;

/**
 * CurlObject
 *
 * A concrete implementation of CurlInterface using the PHP cURL library.
 *
 * @package
 * @version $id$
 */
class CurlObject implements CurlInterface
{

    public function errno($ch)
    {
        return curl_errno($ch);
    }

    public function error($ch)
    {
        return curl_error($ch);
    }

    public function execute($ch)
    {
        return curl_exec($ch);
    }

    public function init($url)
    {
        return curl_init($url);
    }

    public function setopt($ch, $option, $value)
    {
        return curl_setopt($ch, $option, $value);
    }

}
