<?php

namespace Goapptiv\InvoiceManagement\Repositories\InvoiceManagement;

use GoApptiv\InvoiceManagement\Exception\DataFieldsMissing;
use GoApptiv\InvoiceManagement\Models\InvoiceManagement\InvoiceManagementLog;
use Goapptiv\InvoiceManagement\Models\InvoiceManagement\InvoiceManagementLogData;
use GoApptiv\InvoiceManagement\Repositories\MySql\MySqlBaseRepository;
use GoApptiv\InvoiceManagement\Services\Utils;

class InvoiceManagementLogRepository extends MySqlBaseRepository implements InvoiceManagementLogRepositoryInterface
{
    /**
     * Creates a new record
     *
     * @param InvoiceManagementLogData $data
     *
     * @return InvoiceManagementLog
     */
    public function store(InvoiceManagementLogData $data)
    {
        $processedData = collect($this->formFields($data));

        if (!Utils::containsAll($processedData, ['reference_number', 'payload'])) {
            throw new DataFieldsMissing();
        }

        $model = new InvoiceManagementLog($processedData->toArray());

        $model->save();

        return $model->refresh();
    }

    /**
     * update invoice_management_id
     *
     * @param string $invoiceManagementId
     *
     * @return int
     */
    public function updateInvoiceManagementIdById(string $invoiceManagementId, int $id)
    {
        return InvoiceManagementLog::where("id", $id)->update(["invoice_management_id" => $invoiceManagementId]);
    }

    /**
     * update registrationStatus
     *
     * @param string $registrationStatus
     *
     * @return int
     */
    public function updateRegistrationStatusById(string $registrationStatus, int $id)
    {
        return InvoiceManagementLog::where("id", $id)->update(["registration_status" => $registrationStatus]);
    }

    /**
     * update processingStatus
     *
     * @param string $processingStatus
     *
     * @return int
     */
    public function updateProcessingStatusById(string $processingStatus, int $id)
    {
        return InvoiceManagementLog::where("id", $id)->update(["processing_status" => $processingStatus]);
    }

    /**
     * update errors
     *
     * @param string $errors
     *
     * @return int
     */
    public function updateErrorsById(string $errors, int $id)
    {
        return InvoiceManagementLog::where("id", $id)->update(["errors" => $errors]);
    }

    /**
     *
     * Get Fields
     *
     * @param InvoiceManagementLogData $data
     * @return Collection
     */
    public function formFields(InvoiceManagementLogData $data)
    {
        $fields = collect([]);

        if ($data->getReferenceNumber() !== null) {
            $fields->put('reference_number', $data->getReferenceNumber());
        }

        if ($data->getInvoiceManagementId() !== null) {
            $fields->put('template_code', $data->getInvoiceManagementId());
        }

        if ($data->getPayload() !== null) {
            $fields->put('file_name', $data->getPayload());
        }

        if ($data->getRegistrationStatus() !== null) {
            $fields->put('file_type', $data->getRegistrationStatus());
        }

        if ($data->getProcessingStatus() !== null) {
            $fields->put('file_size_in_bytes', $data->getProcessingStatus());
        }

        if ($data->getErrors() !== null) {
            $fields->put('uuid', $data->getErrors());
        }

        return $fields;
    }
}
