<?php
/**
 * SAccounts
 
 * @author Ashley Kitson
 * @copyright Ashley Kitson, 2017, UK
 * @license GPL V3+ See LICENSE.md
 */
namespace Chippyash\Test\RStatus;

use Chippyash\RStatus\RecordStatus;

class RecordStatusTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetValuesAsConstants()
    {
        $this->assertInternalType('string', RecordStatus::ACTIVE);
        $this->assertEquals('active', RecordStatus::ACTIVE);
        $this->assertInternalType('string', RecordStatus::SUSPENDED);
        $this->assertEquals('suspended', RecordStatus::SUSPENDED);
        $this->assertInternalType('string', RecordStatus::DEFUNCT);
        $this->assertEquals('defunct', RecordStatus::DEFUNCT);
    }

    public function testCanGetValuesAsClassesUsingStaticMethods()
    {
        $this->assertInstanceOf(
            'Chippyash\RStatus\RecordStatus',
            RecordStatus::ACTIVE()
        );
        $this->assertInstanceOf(
            'Chippyash\RStatus\RecordStatus',
            RecordStatus::SUSPENDED()
        );
        $this->assertInstanceOf(
            'Chippyash\RStatus\RecordStatus',
            RecordStatus::DEFUNCT()
        );
    }

    public function testYouCanTestForChangingFromActiveToAnotherStatus()
    {
        $this->assertTrue(RecordStatus::ACTIVE()->canChange());
    }

    public function testYouCanTestForChangingFromSuspendedToAnotherStatus()
    {
        $this->assertTrue(RecordStatus::SUSPENDED()->canChange());
    }

    public function testChangingFromDefunctStatusToAnotherStatusIsNotAllowed()
    {
        $this->assertFalse(RecordStatus::DEFUNCT()->canChange());
    }
}
