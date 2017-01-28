<?php

// Response.php

namespace Core\MyHttp;

/**
 * @property string version
 * @property array headers
 */
class Response implements ResponseInterface {


    public function __construct($version = "1.0")
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }


    /**
     * @param $header
     * @return $this
     */
    public function addHeader($header) {
        $this->headers[] = $header;
        return $this;
    }

    public function addHeaders(array $headers) {
        foreach($headers as $header) {
            $this->addHeader($header);
        }
        return $this;
    }

    public function getHeaders() {
        return $this->headers;
    }

    public function send() {
        if(!headers_sent()) {
            foreach($this->headers as $header) {
                header("$this->version $header", true);
            }
        }
    }
}