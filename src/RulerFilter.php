<?php

namespace Port\Ruler;

use Hoa\Ruler\Ruler;
use Hoa\Ruler\Context;

class RulerFilter
{
    private $ruler;

    private $rule;

    private $context;

    public function __construct(Ruler $ruler, string $rule, Context $context)
    {
        $this->ruler = $ruler;
        $this->rule = $rule;
        $this->context = $context;
    }

    public function __invoke(array $item)
    {
        $context = clone $this->context;
        $context['entity'] = $item;

        return $this->ruler->assert($this->rule, $context);
    }
}
