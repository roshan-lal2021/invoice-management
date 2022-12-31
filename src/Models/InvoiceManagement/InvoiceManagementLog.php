<?php

namespace GoApptiv\InvoiceManagement\Models\InvoiceManagement;

use GoApptiv\InvoiceManagement\Models\BaseModel;

/**
 *
 * @property int $id
 * @property string $reference_number
 * @property string $invoice_management_id
 * @property string $payload
 * @property string $registration_status
 * @property string $processing_status
 * @property string $errors
 *
 */
class InvoiceManagementLog extends BaseModel
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'invoice_management_logs';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Hidden attributes
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
