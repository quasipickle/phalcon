<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Filter\Sanitize;

use Codeception\Example;
use Phalcon\Filter\Sanitize\LowerFirst;
use UnitTester;

class LowerFirstCest
{
    /**
     * Tests Phalcon\Filter\Sanitize\LowerFirst :: __invoke()
     *
     * @dataProvider getData
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function filterSanitizeLowerFirstInvoke(UnitTester $I, Example $example)
    {
        $I->wantToTest('Filter\Sanitize\LowerFirst - __invoke()');

        $sanitizer = new LowerFirst();

        $I->assertEquals(
            $example[1],
            $sanitizer($example[0])
        );
    }

    /**
     * @return \string[][]
     */
    private function getData(): array
    {
        return [
            ['test', 'test'],
            ['tEsT', 'tEsT'],
            ['TEST', 'tEST'],
        ];
    }
}
