<?php

namespace GoApptiv\InvoiceManagement\Services;

use Illuminate\Support\Collection;

class Utils
{
    /**
     * Generate Reference Number
     *
     * @param string $fileName
     *
     * @return string
     */
    public static function generateReferenceNumber($fileName)
    {
        return md5(time()) . substr(bin2hex(random_bytes(6)), 0, 6) . base64_encode($fileName);
    }

    /**
     * Check if collection contains all keys
     *
     * @param Collection $data
     * @param array $keys
     * @return bool
     */
    public static function containsAll($data, $keys)
    {
        foreach ($keys as $key) {
            if (!$data->has($key)) {
                return false;
            }
        }
        return true;
    }
}
