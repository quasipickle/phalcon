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

namespace Phalcon\Tests\Unit\Version;

use Phalcon\Tests\Fixtures\Traits\VersionTrait;
use Phalcon\Version\Version;
use UnitTester;

/**
 * Class GetPartCest
 *
 * @package Phalcon\Tests\Unit\Version
 */
class GetPartCest
{
    use VersionTrait;

    /**
     * Tests Phalcon\Version :: getPart()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function versionGetPart(UnitTester $I)
    {
        $I->wantToTest('Version - getPart()');

        /*
         * Note: getId() returns a version string in the format ABBCCDE
         * where A is the major version, BB is the medium version (2 digits)
         * CC is the minor version (2 digits), D is the release type (see
         * Phalcon\Version) and E is the release number (for example 2 for RC2)
         */
        $id = Version::getId();

        // The major version is the first digit
        $expected = (int) $id[0];
        $actual   = Version::getPart(Version::VERSION_MAJOR);
        $I->assertEquals($expected, $actual);

        // The medium version is the second and third digits
        $expected = (int) ($id[1] . $id[2]);
        $actual   = Version::getPart(Version::VERSION_MEDIUM);
        $I->assertEquals($expected, $actual);

        // The minor version is the fourth and fifth digits
        $expected = (int) ($id[3] . $id[4]);
        $actual   = Version::getPart(Version::VERSION_MINOR);
        $I->assertEquals($expected, $actual);

        $expected = $this->numberToSpecial($id[5]);
        $actual   = Version::getPart(Version::VERSION_SPECIAL);
        $I->assertEquals($expected, $actual);


        $special  = $this->numberToSpecial($id[5]);
        $expected = ($special) ? $id[6] : 0;
        $actual   = Version::getPart(Version::VERSION_SPECIAL_NUMBER);
        $I->assertEquals($expected, $actual);

        $expected = Version::get();
        $actual   = Version::getPart(7);
        $I->assertEquals($expected, $actual);
    }
}
