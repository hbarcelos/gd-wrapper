<?php
/**
 * Defines JpegWritter class.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Io\Writer;

use Hbarcelos\GdWrapper\Io\Exception;
use Hbarcelos\GdWrapper\Io\Preset;

/**
 * Defines an implementation of a I/O device for JPEG files.
 */
class JpegWriter extends AbstractWriter
{
    /**
     * Outputs an image resource with `imagejpeg` function.
     *
     * {@inheritdoc}
     *
     * @see Hbarcelos\GdWrapper\Io\Writer\AbstractWriter::doWrite()
     */
    protected function doWrite(
        $pathName,
        $quality = Preset::IMAGE_QUALITY_MAX,
        $_ = null
    ) {
        return call_user_func_array(
            'imagegif',
            array(
                $this->getResource(),
                $pathName
            )
        );
    }
}
