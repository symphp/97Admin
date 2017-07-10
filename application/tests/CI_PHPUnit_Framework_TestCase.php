<?php
use PHPUnit\Framework\TestCase;
class CI_PHPUnit_Framework_TestCase extends TestCase
{
	/**
	 * @var CI_Controller
	 */
	public $CI=null;

	protected function setUp()
	{
		$this->CI = & get_instance();
	}
}