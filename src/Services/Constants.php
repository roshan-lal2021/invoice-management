<?php

namespace GoApptiv\InvoiceManagement\Services;

class Constants
{
    public static $APPLICATION_JSON = 'application/json';

    // status
    public static $FAILED = 'failed';
    public static $SUCCESS = 'success';
    public static $PENDING = 'pending';
    public static $PROCESSED = 'processed';

    // method types
    public static $GET_METHOD = 'GET';
    public static $POST_METHOD = 'POST';
    public static $PUT_METHOD = 'PUT';

    public static $REGISTRATION_STATUS = [];
    public static $PROCESSING_STATUS = [];

    public static function init()
    {

        // status
        self::$REGISTRATION_STATUS = [
            self::$PENDING,
            self::$SUCCESS,
            self::$FAILED
        ];

        self::$PROCESSING_STATUS = [
            self::$PENDING,
            self::$SUCCESS,
            self::$FAILED
        ];
    }
}

Constants::init();
