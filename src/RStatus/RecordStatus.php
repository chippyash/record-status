<?php
/**
 * Record status management
 *
 * @author Ashley Kitson
 * @copyright Ashley Kitson, 2017, UK
 * @license GPL V3+ See LICENSE.md
 */
namespace Chippyash\RStatus;

use MyCLabs\Enum\Enum;

/**
 * Class RecordStatus
 *
 * What state is a record in?
 *
 * @method RecordStatus ACTIVE()
 * @method RecordStatus SUSPENDED()
 * @method RecordStatus DEFUNCT()
 */
final class RecordStatus extends Enum
{
    /**
     * Record is active
     */
    const ACTIVE = 'active';
    /**
     * Record is suspended
     */
    const SUSPENDED = 'suspended';
    /**
     * Record is defunct (no longer in use)
     */
    const DEFUNCT = 'defunct';

    /**
     * Can you change from one status to another
     *
     * Basically yes, except if this status == 'defunct'
     *
     * @return bool
     */
    public function canChange()
    {
        return !$this->equals(RecordStatus::DEFUNCT());
    }
}