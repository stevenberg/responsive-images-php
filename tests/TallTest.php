<?php

namespace StevenBerg\ResponsiveImages\Tests;

use PHPUnit\Framework\TestCase;
use StevenBerg\ResponsiveImages\SizeRange;
use StevenBerg\ResponsiveImages\Tall;
use StevenBerg\ResponsiveImages\Urls\Simple;
use StevenBerg\ResponsiveImages\Values\Gravity;
use StevenBerg\ResponsiveImages\Values\Name;
use StevenBerg\ResponsiveImages\Values\Size;

class TallTest extends TestCase
{
    protected function setUp()
    {
        $this->image = new Tall(
            Name::value('test.jpg'),
            Gravity::value('center'),
            new Simple('https://example.com')
        );
    }

    public function testSource()
    {
        $this->assertEquals(
            'https://example.com/width-100_height-200_gravity-center_test.jpg',
            $this->image->source(Size::value(100))
        );
    }

    public function testSourceSet()
    {
        $expected = implode(', ', [
            'https://example.com/width-100_height-200_gravity-center_test.jpg 100w',
            'https://example.com/width-200_height-400_gravity-center_test.jpg 200w',
            'https://example.com/width-300_height-600_gravity-center_test.jpg 300w',
            'https://example.com/width-400_height-800_gravity-center_test.jpg 400w',
            'https://example.com/width-500_height-1000_gravity-center_test.jpg 500w',
            'https://example.com/width-600_height-1200_gravity-center_test.jpg 600w',
            'https://example.com/width-700_height-1400_gravity-center_test.jpg 700w',
            'https://example.com/width-800_height-1600_gravity-center_test.jpg 800w',
            'https://example.com/width-900_height-1800_gravity-center_test.jpg 900w',
            'https://example.com/width-1000_height-2000_gravity-center_test.jpg 1000w',
        ]);

        $range = SizeRange::from(100, 1000, 100);

        $this->assertEquals($expected, $this->image->sourceSet($range));
    }
}
