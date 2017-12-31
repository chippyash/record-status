<?php
/**
 * Freetimers Web Application Framework
 *
 * @author    Ashley Kitson
 * @copyright Freetimers Communications Ltd, 2017, UK
 * @license   Proprietary See LICENSE.md
 */
namespace Chippyash\Test\RStatus;

use Chippyash\RStatus\RecordStatus;
use Chippyash\RStatus\RecordStatusRecording;

class RecordStatusRecordingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System Under Test
     *
     * @var RecordStatusRecording
     */
    protected $sut;

    /**
     * @var \ReflectionProperty
     */
    protected $rParam;

    protected function setUp()
    {
        $this->sut = $this->getMockForTrait('Chippyash\RStatus\RecordStatusRecording');
        $refl = new \ReflectionObject($this->sut);
        $this->rParam = $refl->getProperty('recordStatus');
        $this->rParam->setAccessible(true);
    }

    public function testYouCanGetTheRecordStatus()
    {
        $this->rParam->setValue($this->sut, RecordStatus::ACTIVE());
        $this->assertInstanceOf('Chippyash\RStatus\RecordStatus', $this->sut->getStatus());
    }

    public function testYouCanChangeAnActiveRecordState()
    {
        $this->rParam->setValue($this->sut, RecordStatus::ACTIVE());
        $this->assertTrue($this->sut->isStatusActive());
        $this->sut->setStatus(RecordStatus::SUSPENDED());
        $this->assertTrue($this->sut->isStatusSuspended());
    }

    public function testYouCanChangeASuspendedRecordState()
    {
        $this->rParam->setValue($this->sut, RecordStatus::SUSPENDED());
        $this->assertTrue($this->sut->isStatusSuspended());
        $this->sut->setStatus(RecordStatus::ACTIVE());
        $this->assertTrue($this->sut->isStatusActive());
    }

    /**
     * @expectedException \Chippyash\RStatus\RecordStatusException
     */
    public function testAttemptingToChangeADefunctRecordStateWillThrowAnException()
    {
        $this->rParam->setValue($this->sut, RecordStatus::DEFUNCT());
        $this->assertTrue($this->sut->isStatusDefunct());
        $this->sut->setStatus(RecordStatus::ACTIVE());
    }

    public function testYouCanTestTheRecordStatusState()
    {
        $this->rParam->setValue($this->sut, RecordStatus::ACTIVE());
        $this->assertTrue($this->sut->isStatusActive());
        $this->assertFalse($this->sut->isStatusSuspended());
        $this->assertFalse($this->sut->isStatusDefunct());

        $this->rParam->setValue($this->sut, RecordStatus::SUSPENDED());
        $this->assertFalse($this->sut->isStatusActive());
        $this->assertTrue($this->sut->isStatusSuspended());
        $this->assertFalse($this->sut->isStatusDefunct());

        $this->rParam->setValue($this->sut, RecordStatus::DEFUNCT());
        $this->assertFalse($this->sut->isStatusActive());
        $this->assertFalse($this->sut->isStatusSuspended());
        $this->assertTrue($this->sut->isStatusDefunct());
    }
}
