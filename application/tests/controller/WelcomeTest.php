<?php
/**
 * Created by PhpStorm.
 * User: symphp
 * Date: 2017/7/10
 * Time: 11:11
 */
class WelcomeTest extends CI_PHPUnit_Framework_TestCase
{

	public function testPushAndPop()
	{
		$stack = [];
		$this->assertEquals(0, count($stack));

		array_push($stack, 'foo');
		$this->assertEquals('foo', $stack[count($stack)-1]);
		$this->assertEquals(1, count($stack));

		$this->assertEquals('foo', array_pop($stack));
		$this->assertEquals(0, count($stack));
	}

}
