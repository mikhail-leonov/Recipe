<?php
include_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/index.const');
include_once(dirname(dirname(__FILE__)) . '/TestCaseEx.php');
require_once(IMPORT . 'destination.csv.class.php');


use PHPUnit\Framework\TestCase;

class CSVDestinationTest extends TestCase
{
    /**
     * TestCase class extention Trait
     *
     */
    use TestCaseEx;

    public function testInstance()
    {
        $obj = new CSVDestination();
        $this->assertNotEmpty($obj);
        $this->assertInstanceOf(CSVDestination::class, $obj);

        $obj = DestinationFactory::build("csv");
        $this->assertNotEmpty($obj);
        $this->assertInstanceOf(CSVDestination::class, $obj);
    }

}
