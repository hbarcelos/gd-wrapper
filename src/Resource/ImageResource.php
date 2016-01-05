<?php
/**
 * Creates class \Hbarcelos\GdWrapper\Resource
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Resource;

/**
 * Concrete implementation of a wrapper for GD2 image resource type.
 */
class ImageResource extends AbstractResource
{
    /**
     * Creates a new image resource.
     *
     * @param resource $resource A GD2 resource for an image.
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }
}