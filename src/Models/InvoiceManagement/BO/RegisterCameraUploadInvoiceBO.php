<?php

namespace GoApptiv\InvoiceManagement\Models\InvoiceManagement\BO;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class RegisterCameraUploadInvoiceBO
{
    public array $cameraUploadData;
    private array $stakeholders;

    /**
     * constructor
     */
    public function __construct()
    {
        //
    }

    /**
     * make object
     *
     * @return self
     */
    public static function make(array $cameraUploadData, array $stakeholders)
    {
        $instance = new self();
        $instance->setCameraUploadData($cameraUploadData);
        $instance->setStakeholders($stakeholders);
        return $instance;
    }

    /**
     * get data
     *
     * @return Collection
     */
    public function getData()
    {
        return collect([
            "source" => "camera_upload",
            "cameraUploadData" => $this->cameraUploadData,
            "stakeholders" => $this->stakeholders
        ]);
    }

    /**
     * Get the value of cameraUploadData
     */
    public function getCameraUploadData()
    {
        return $this->cameraUploadData;
    }

    /**
     * Set the value of cameraUploadData
     *
     * @return  self
     */
    public function setCameraUploadData($cameraUploadData)
    {
        $validator = Validator::make($cameraUploadData, [
            "*.fileUuid" => ["string"],
            "*.page" => ["integer"],
            "*.checked" => ["array"],
            "*.checked.perspective" => ["boolean"],
            "*.checked.blurness" => ["boolean"],
            "*.checked.completeVisibility" => ["boolean"],
            "*.checked.notDotMatrix" => ["boolean"],
            "*.checked.rotated" => ["boolean"]
        ]);
        if ($validator->fails()) {
            $validator->validate();
        }

        $this->cameraUploadData = $cameraUploadData;
        return $this;
    }

    /**
     * Get the value of stakeholders
     */
    public function getStakeholders()
    {
        return $this->stakeholders;
    }

    /**
     * Set the value of stakeholders
     *
     * @return  self
     */
    public function setStakeholders($stakeholders)
    {
        $validator = Validator::make($stakeholders, [
            "*.email" => ["string", "nullable"],
            "*.gst" => ["string", "nullable"],
            "*.customerUuid" => ["string", "nullable"],
            "*.type" => ["string", "nullable"]
        ]);
        if ($validator->fails()) {
            $validator->validate();
        }
        $this->stakeholders = $stakeholders;

        return $this;
    }
}
