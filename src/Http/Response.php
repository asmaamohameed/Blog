<?php

namespace Blog\Http;

class Response
{
    public function statusCode($code = 404)
    {
        return http_response_code($code);
    }
}