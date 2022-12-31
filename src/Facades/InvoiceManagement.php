<?php

namespace GoApptiv\InvoiceManagement\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 
 * @method static GoApptiv\InvoiceManagement\Services\InvoiceManagement\InvoiceManagementService registerCameraUploadInvoice(RegisterCameraUploadInvoiceBO $data)
 *
 */
class InvoiceManagement extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'goapptiv-invoice-management';
    }
}
