<?php
return array(
    // set your paypal credential
    'client_id' => 'ASeK7M740oGaBDQ6q7XUBTP4g2OiSjo7uw4iUzPVxamdPFhrEHEjbYkEtoC2vZMTYUP5M2EaBKFLonQP',
    'secret' => 'EL3Vnb3_ssAamapQ5cbQZpboT3ayIE8bDQt8e99uGuQxHExiqmah4KnnWflzR2TNNfWrlKD8Mgf1dQGj',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);