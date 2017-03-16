<?php
/**
 * @author Steven Berg <steven@stevenberg.net>
 * @copyright 2017 Steven Berg
 * @license GNU General Public License, version 3
 */

namespace StevenBerg\ResponsiveImages;

use StevenBerg\ResponsiveImages\Values\Size;

class Square extends Image
{
    protected function options(Size $size): array
    {
        return [
            'width' => $size,
            'height' => $size,
            'gravity' => $this->gravity,
        ];
    }
}
