<?php
/**
 * Defines Writer interface.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Io\Writer;

use Hbarcelos\GdWrapper\Io\Exception;
use Hbarcelos\GdWrapper\Resource\Resource;
use Hbarcelos\GdWrapper\Io\Preset;

/**
 * Represents an output "device" for resources.
 */
interface Writer
{
    /**
     * This parameter should be used with `write` method to
     * indicate that the destination of output is the standard output.
     *
     * @var null
     */
    const STDOUT = null;

    /**
     * Provides an output to an image resource.
     *
     * If you want to output to standar output, `$pathName` parameter
     * should be `STDOUT` class constant of this interface.
     *
     * @param string $pathName A path where to save the resource.
     * @param int $quality (optional) The quality of generated image.
     * 		Its value MUST be in a range from 0 to 100.
     * @param mixed $_ (optional) Additional parameters passed to
     * 		the concrete implementation method.
     *
     * @return void
     *
     * @throws Exception If cannot write the contents on file system.
     *
     * @see Hbarcelos\GdWrapper\Io\Preset
     */
    public function write(
        $pathName,
        $quality = Preset::IMAGE_QUALITY_MAX,
        $_ = null
    );

    /**
     * Obtains the GD2 image resource instance in which this object is working on.
     *
     * @return resource
     */
    public function getResource();

    /**
     * Sets GD2 image resource for this object.
     *
     * @param resource $resource A valid GD2 image resource
     * 
     * @return void
     * 
     * @throws \InvalidArgumentException If `$resource` is not a valid resource.
     */
    public function setResource($resource);
}
