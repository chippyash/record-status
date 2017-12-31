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
 * Interface RecordStatusRecordable
 *
 * Interface for a class that can change record status
 */
interface RecordStatusRecordable
{
    /**
     * Return the record status
     *
     * @return RecordStatus
     */
    public function getStatus();

    /**
     * Set the record status
     *
     * @param RecordStatus $status
     *
     * @return $this
     */
    public function setStatus(RecordStatus $status);

    /**
     * Is record status == active
     *
     * @return bool
     */
    public function isStatusActive();

    /**
     * Is record status == suspended
     *
     * @return bool
     */
    public function isStatusSuspended();

    /**
     * Is record status == defunct
     *
     * @return bool
     */
    public function isStatusDefunct();
}