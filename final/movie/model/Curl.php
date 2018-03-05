<?php

class Curl {

    /** @var resource cURL handle */
    private $ch;

    /** @var mixed The response */
    private $response = false;

    /**
     * @param string $url
     * @param array  $options
     */
    public function __construct($url, array $options = array())
    {
        $this->ch = curl_init($url);

        foreach ($options as $key => $val) {
            curl_setopt($this->ch, $key, $val);
        }

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
    }

    /**
     * Get the response
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function getResponse()
    {
        if ($this->response) {
            return $this->response;
        }

        $response = curl_exec($this->ch);
        $error    = curl_error($this->ch);
        $errno    = curl_errno($this->ch);

        if (is_resource($this->ch)) {
            curl_close($this->ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }

        return $this->response = $response;
    }

    /**
     * Let echo out the response
     * @return string
     */
    public function __toString()
    {
        return $this->getResponse();
    }



//    public static function executeUrl($url) {
//        $ch = curl_init();
//        //Set the URL that you want to GET by using the CURLOPT_URL option.
//        curl_setopt($ch, CURLOPT_URL, $url);
//        //Set CURLOPT_RETURN TRANSFER so that the content is returned as a variable.
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        //Set CURLOPT_FOLLOW LOCATION to true to follow redirects.
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        //Set method to GET
//        curl_setopt($ch, CURLOPT_HTTPGET, true);
//
//        //Execute the request.
//        $data = curl_exec($ch);
//
//        //Close the cURL handle.
//        curl_close($ch);
//        $json_output = json_decode($data);
//
//        $results = $json_output->results;
//
//        return $results;
//    }
//
//    public static function curlPost($url, $data=NULL, $headers = NULL) {
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        if(!empty($data)){
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        }
//
//        if (!empty($headers)) {
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        }
//
//        $response = curl_exec($ch);
//
//        if (curl_error($ch)) {
//            trigger_error('Curl Error:' . curl_error($ch));
//        }
//
//        curl_close($ch);
//        $json_output = json_decode($response);
//        $results = $json_output->results;
//
//        return $results;
//    }

}
