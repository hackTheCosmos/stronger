<?php

class Form {
    public static function sanitize ($data)
    {
        return trim(strip_tags($data));
    }
}