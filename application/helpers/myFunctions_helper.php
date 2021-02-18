<?php

//- echo json object from array
function json_output ($val)
{
    
    $res = json_encode($val);

    //- set content type
    header('Content-Type: application/json');
    echo $res;
}

//- check or get http method
function http_method($check = false)
{
    //- return http method if $check is false
    if(!$check)
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    //- Return Boolean 
    return $_SERVER['REQUEST_METHOD'] == $check;
}


function parsePutRequest()
{
    // Fetch content and determine boundary
    $raw_data = file_get_contents('php://input');
    return json_decode($raw_data, true);
    
    $boundary = substr($raw_data, 0, strpos($raw_data, "\r\n"));

    // Fetch each part
    $parts = array_slice(explode($boundary, $raw_data), 1);
    $data = array();

    foreach ($parts as $part) 
    {
        // If this is the last part, break
        if ($part == "--\r\n") break; 

        // Separate content from headers
        $part = ltrim($part, "\r\n");
        list($raw_headers, $body) = explode("\r\n\r\n", $part, 2);

        // Parse the headers list
        $raw_headers = explode("\r\n", $raw_headers);
        $headers = array();
        foreach ($raw_headers as $header) {
            list($name, $value) = explode(':', $header);
            $headers[strtolower($name)] = ltrim($value, ' '); 
        } 

        // Parse the Content-Disposition to get the field name, etc.
        if (isset($headers['content-disposition'])) {
            $filename = null;
            preg_match(
                '/^(.+); *name="([^"]+)"(; *filename="([^"]+)")?/', 
                $headers['content-disposition'], 
                $matches
            );
            list(, $type, $name) = $matches;
            isset($matches[4]) and $filename = $matches[4]; 

            // handle your fields here
            switch ($name) {
                // this is a file upload
                case 'userfile':
                    file_put_contents($filename, $body);
                    break;

                // default for all other files is to populate $data
                default: 
                    $data[$name] = substr($body, 0, strlen($body) - 2);
                    break;
            } 
        }

    }

    return $data;
}





