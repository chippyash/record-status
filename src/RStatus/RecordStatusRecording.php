<?php
/**
 * Record status management
 *
 * @author    Ashley Kitson
 * @copyright Ashley Kitson, 2017, UK
 * @license   GPL V3+ See LICENSE.md
 */
namespace Chippyash\RStatus;

/**
 * Class RecordStatusRecording
 *
 * Trait implementing RecordStatusRecordable interface
 */
trait RecordStatusRecording
{
    /**
     * @var RecordStatus
     */
    protected $recordStatus;

    /**
     * Return the record status
     *
     * @return RecordStatus
     */
    public function getStatus()
    {
        return $this->recordStatus;
    }

    /**
     * Set the record status
     *
     * @param RecordStatus $status
     *
     * @return $this
     *
     * @throws RecordStatusException
     */
    public function setStatus(RecordStatus $status)
    {
        if (!$this->recordStatus->canChange()) {
            throw new RecordStatusException('Cannot change status on a defunct record');
        }

        $this->recordStatus= $status;

        return $this;
    }

    /**
     * Is record status == active
     *
     * @return bool
     */
    public function isStatusActive()
    {
        return $this->recordStatus->equals(RecordStatus::ACTIVE());
    }

    /**
     * Is record status == suspended
     *
     * @return bool
     */
    public function isStatusSuspended()
    {
        return $this->recordStatus->equals(RecordStatus::SUSPENDED());
    }

    /**
     * Is record status == defunct
     *
     * @return bool
     */
    public function isStatusDefunct()
    {
        return $this->recordStatus->equals(RecordStatus::DEFUNCT());
    }
}