<?php
namespace AWeber;

class CurlResponse
{
    public $body = '';
    public $headers = array();

    public function __construct($response)
    {
        # Extract headers from response
        $pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';
        preg_match_all($pattern, $response, $matches);
        $headers = explode("\r\n", str_replace("\r\n\r\n", '', array_pop($matches[0])));

        # Extract the version and status from the first header
        $version_and_status = array_shift($headers);
        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version_and_status, $matches);
        $this->headers['Http-Version'] = $matches[1];
        $this->headers['Status-Code'] = $matches[2];
        $this->headers['Status'] = $matches[2].' '.$matches[3];

        # Convert headers into an associative array
        foreach ($headers as $header) {
            preg_match('#(.*?)\:\s(.*)#', $header, $matches);
            $this->headers[$matches[1]] = $matches[2];
        }

        # Remove the headers from the response body
        $this->body = preg_replace($pattern, '', $response);
    }

    public function __toString()
    {
        return $this->body;
    }

    public function headers(){
        return $this->headers;
    }
}
