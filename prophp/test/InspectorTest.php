<?php require_once 'Autoload.php';

class InspectorTest extends PHPUnit_Framework_TestCase
{
	public $Inspector;

	public function setUp()
	{
		//$this->Inspector = new Inspector();
	}
	public function testConstructor()
	{
		$this->assertEquals(1, get_include_path());
	}
}