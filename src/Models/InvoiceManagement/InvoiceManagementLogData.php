<?php

namespace Goapptiv\InvoiceManagement\Models\InvoiceManagement;

class InvoiceManagementLogData
{
    private ?string $referenceNumber = null;
    private ?string $invoiceManagementId = null;
    private ?string $payload = null;
    private ?string $registrationStatus = null;
    private ?string $processingStatus = null;
    private ?string $errors = null;

    /**
     * constructor
     */
    public function __construct()
    {
    }

    /**
     * Get the value of referenceNumber
     */
    public function getReferenceNumber()
    {
        return $this->referenceNumber;
    }

    /**
     * Set the value of referenceNumber
     *
     * @return  self
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->referenceNumber = $referenceNumber;

        return $this;
    }

    /**
     * Get the value of invoiceManagementId
     */
    public function getInvoiceManagementId()
    {
        return $this->invoiceManagementId;
    }

    /**
     * Set the value of invoiceManagementId
     *
     * @return  self
     */
    public function setInvoiceManagementId($invoiceManagementId)
    {
        $this->invoiceManagementId = $invoiceManagementId;

        return $this;
    }

    /**
     * Get the value of payload
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Set the value of payload
     *
     * @return  self
     */
    public function setPayload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * Get the value of registrationStatus
     */
    public function getRegistrationStatus()
    {
        return $this->registrationStatus;
    }

    /**
     * Set the value of registrationStatus
     *
     * @return  self
     */
    public function setRegistrationStatus($registrationStatus)
    {
        $this->registrationStatus = $registrationStatus;

        return $this;
    }

    /**
     * Get the value of processingStatus
     */
    public function getProcessingStatus()
    {
        return $this->processingStatus;
    }

    /**
     * Set the value of processingStatus
     *
     * @return  self
     */
    public function setProcessingStatus($processingStatus)
    {
        $this->processingStatus = $processingStatus;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }
}
