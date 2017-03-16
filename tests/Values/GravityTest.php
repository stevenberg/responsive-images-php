<?php
/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license GNU General Public License, version 3
 */


namespace StevenBerg\ResponsiveImages\Tests\Values;

use DomainException;
use PHPUnit\Framework\TestCase;
use StevenBerg\ResponsiveImages\Values\Gravity;

class GravityTest extends TestCase
{
    public function testNonStringValue()
    {
        $this->expectException(DomainException::class);

        Gravity::value(1);
    }

    public function testInvalidStringValue()
    {
        $this->expectException(DomainException::class);

        Gravity::value('invalid');
    }

    public function testValidValues()
    {
        $values = ['auto', 'center'];

        foreach ($values as $value) {
            $shape = Gravity::value($value);

            $this->assertEquals($value, (string) $shape);
        }
    }
}
