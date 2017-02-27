<?php

namespace Tazer\CacheManager\Test\Cache;
use Tazer\CacheManager\Cache;

class StupidTest extends \PHPUnit_Framework_TestCase
{
	
	public function testTrueIsTrue()
	{
        
		$foo = true;
		$this->assertTrue($foo);	
	}

    public function testCacheIsSayingHello()
    {
           $cache = new Cache();
            $this->assertEquals($cache->sayHallo(), 'Hallo!');
    }


	
}
