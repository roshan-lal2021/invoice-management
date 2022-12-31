<?php

namespace Goapptiv\InvoiceManagement\Repositories\InvoiceManagement;

use Goapptiv\InvoiceManagement\Models\InvoiceManagement\InvoiceManagementLogData;
use GoApptiv\InvoiceManagement\Repositories\BaseRepositoryInterface;

interface InvoiceManagementLogRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Creates a new record
     *
     * @param InvoiceManagementLogData $data
     *
     * @return InvoiceManagementLog
     */
    public function store(InvoiceManagementLogData $data);

    /**
     * update invoice_management_id
     *
     * @param string $invoiceManagementId
     *
     * @return int
     */
    public function updateInvoiceManagementIdById(string $invoiceManagementId, int $id);

    /**
     * update registrationStatus
     *
     * @param string $registrationStatus
     *
     * @return int
     */
    public function updateRegistrationStatusById(string $registrationStatus, int $id);

    /**
     * update processingStatus
     *
     * @param string $processingStatus
     *
     * @return int
     */
    public function updateProcessingStatusById(string $processingStatus, int $id);

    /**
     * update errors
     *
     * @param string $errors
     *
     * @return int
     */
    public function updateErrorsById(string $errors, int $id);
}
