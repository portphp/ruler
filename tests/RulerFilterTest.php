<?php

namespace Port\Ruler\Tests;

use PHPUnit\Framework\TestCase;
use Port\Ruler\RulerFilter;
use Hoa\Ruler\Ruler;
use Hoa\Ruler\Context;
use Prophecy\Argument;

class RulerFilterTest extends TestCase
{
    private $ruler;

    private $context;

    protected function setup()
    {
        $this->ruler = $this->prophesize(Ruler::class);
        $this->context = $this->prophesize(Context::class);

        $this->filter = new RulerFilter($this->ruler->reveal(), 'Test', $this->context->reveal());
    }

    public function testFilter()
    {
        $this->ruler->assert('Test', Argument::type(Context::class))
            ->willReturn(true);

        $this->assertTrue(
            $this->filter->__invoke(['test' => 'test'])
        );
    }
}
