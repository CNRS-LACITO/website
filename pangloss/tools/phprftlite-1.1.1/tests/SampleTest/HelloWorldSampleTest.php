<?php
require_once '../../../../../pangloss/tools/phprftlite-1.1.1/tests/SampleTest/PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../PHPRtfLiteSampleTestCase.php';

/**
 * Created on 08.04.2010
 *
 * @author sz
 */
class HelloWorldSampleTest extends PHPRtfLiteSampleTestCase
{

    private $_name = 'hello_world';

    public function test()
    {
        $this->processTest($this->_name . '.php');
    }

    protected function getSampleFile()
    {
        return $this->getSampleDir() . '/generated/' . $this->_name . '.rtf';
    }

}