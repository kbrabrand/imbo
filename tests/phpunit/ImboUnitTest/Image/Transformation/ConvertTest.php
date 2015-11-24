<?php
/**
 * This file is part of the Imbo package
 *
 * (c) Christer Edvartsen <cogo@starzinger.net>
 *
 * For the full copyright and license information, please view the LICENSE file that was
 * distributed with this source code.
 */

namespace ImboUnitTest\Image\Transformation;

use Imbo\Image\Transformation\Convert;

/**
 * @covers Imbo\Image\Transformation\Convert
 * @group unit
 * @group transformations
 */
class ConvertTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Convert
     */
    private $transformation;

    /**
     * Set up the transformation instance
     */
    public function setUp() {
        $this->transformation = new Convert();
    }

    /**
     * Tear down the transformation instance
     */
    public function tearDown() {
        $this->transformation = null;
    }

    /**
     * @covers Imbo\Image\Transformation\Convert::transform
     */
    public function testWillNotConvertImageIfNotNeeded() {
        $image = $this->getMock('Imbo\Model\Image');
        $image->expects($this->once())->method('getExtension')->will($this->returnValue('png'));
        $image->expects($this->never())->method('getBlob');

        $this->transformation->setImage($image);
        $this->transformation->transform(['type' => 'png']);
    }
}
