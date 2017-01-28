<?php

// Request.php

namespace Core\MyHttp;

/**
 * @property array params
 * @property  string uri
 */
class Request implements RequestInterface{

    public function __construct($uri, $params = array())
    {
        $this->uri = $uri;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function getParam($key) {
        if(isset($this->params[$key])) {
            throw new \InvalidArgumentException(
                "The request parameter with key '$key' is invalid"
            );
        }
        return $this->params[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    public function match()
    {
        // TODO: Implement match() method.
    }
}