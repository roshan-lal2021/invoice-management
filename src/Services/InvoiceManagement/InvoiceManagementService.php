<?php

namespace GoApptiv\InvoiceManagement\Services\InvoiceManagement;

use Exception;
use GoApptiv\InvoiceManagement\Models\InvoiceManagement\BO\RegisterCameraUploadInvoiceBO;
use Goapptiv\InvoiceManagement\Models\InvoiceManagement\InvoiceManagementLogData;
use Goapptiv\InvoiceManagement\Repositories\InvoiceManagement\InvoiceManagementLogRepositoryInterface;
use GoApptiv\InvoiceManagement\Services\Constants;
use GoApptiv\InvoiceManagement\Services\Endpoints;
use GoApptiv\InvoiceManagement\Traits\RestCall;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class InvoiceManagementService
{
    use RestCall;

    private InvoiceManagementLogRepositoryInterface $invoiceManagementLogRepository;

    /**
     * constructer
     *
     * @param InvoiceManagementLogRepositoryInterface $invoiceManagementLogRepository
     *
     * @return void
     */
    public function __construct(InvoiceManagementLogRepositoryInterface $invoiceManagementLogRepository)
    {
        $this->invoiceManagementLogRepository = $invoiceManagementLogRepository;
    }

    /**
     * register invoice
     *
     * @param RegisterCameraUploadInvoiceBO $data
     *
     * @return string
     */
    public function registerCameraUploadInvoice(RegisterCameraUploadInvoiceBO $data)
    {
        Log::info("Registering camera upload invoice...");
        $payload = $data->getData();
        $referenceNumber = "ID-" . Carbon::now()->getTimestamp() . "-" . rand(3, 999);
        $payload->referenceId =  $referenceNumber;

        $data = new InvoiceManagementLogData();
        $data->setReferenceNumber($referenceNumber);
        $data->setPayload(json_encode($payload));
        $invoiceManagementLog = $this->invoiceManagementLogRepository->store($data);
        try {
            $this->makeRequest(
                "POST",
                $payload,
                env("INVOICE_MANAGEMENT_DOMAIN") . Endpoints::$POST_REGISTER_INVOICE_EXTRACT_API,
                [],
                []
            );
        } catch (Exception $e) {
            Log::info("!Error occured");
            $this->invoiceManagementLogRepository->updateRegistrationStatusById(Constants::$FAILED, $invoiceManagementLog->id);
            $this->invoiceManagementLogRepository->updateProcessingStatusById(Constants::$FAILED, $invoiceManagementLog->id);
            $this->invoiceManagementLogRepository->updateErrorsById($e->getMessage(), $invoiceManagementLog->id);
            return $referenceNumber;
        }

        $this->invoiceManagementLogRepository->updateRegistrationStatusById(Constants::$SUCCESS, $invoiceManagementLog->id);
        Log::info("Invoice registeration completed.");
        return $referenceNumber;
    }
}
