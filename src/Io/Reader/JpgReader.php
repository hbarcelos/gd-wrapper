<?php
/**
 * Defines JpgReader class.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Io\Reader;

use Hbarcelos\GdWrapper\Resource\ImageResource;

/**
 * Defines an implementation of a I/O device for JPEG files.
 *
 * Because JPEG files can have `.jpg` and `.jpeg` extensions, this class is needed for the right
 * operation of `ReaderFactory`, which tries to create a reader based on a file extension.
 */
class JpgReader extends JpegReader {
	// No need to change implementation
}
