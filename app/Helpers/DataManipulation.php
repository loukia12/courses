<?php

namespace App\Helpers;

class DataManipulation
{
    /**
     * Remove client submitted data that is not needed for the request
     *
     * @param arr $whitelist    The data list that is needed for the web-service call
     * @param arr $payload_data The data that has been supplied by the client
     *
     * @return arr              An array that has had all extra data removed
     */
    public static function removeExtraData($whitelist, $client_data)
    {
        $data = array();

        foreach ($client_data as $entry => $value) {
            if (!isset($whitelist[$entry])) {
                unset($client_data[$entry]);
                continue;
            }

            $data[$entry] = trim($value);
        }

        return $data;
    }
}
