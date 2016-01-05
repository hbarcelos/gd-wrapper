<?php
/**
 * Defines the Proportional resizing mode.
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Action\ResizeMode;

use Hbarcelos\GdWrapper\Geometry\Point;

/**
 * Represents a proportional resizing.
 */
class Proportional implements Mode
{
    /**
     * @var int The proportion of the resizing action.
     */
    private $proportion;
    
    /**
     * Creates an proportional resizing mode.
     *
     * Considering `$proportion` parameter:
     *
     * * when it is `1`, means that the image will not be resized.
     * * when it is `1.2`, means that the resulting image will be 20% larger.
     * * when it is `0.5`, means that the resulting image will be half the size.
     * * and so on...
     *
     * @param int $proportion
     *
     * @throws \InvalidArgumentException If `$proportion <= 0`.
     */
    public function __construct($proportion)
    {
        $this->setProportion($proportion);
    }
    
    /**
     * Sets the proportion of the resizing action.
     *
     * @param int $proportion The proportion of the resizing action
     *
     * @return void
     *
     * @throws \InvalidArgumentException If `$proportion <= 0`.
     */
    public function setProportion($proportion)
    {
        $proportion = (float) $proportion;
        if ($proportion <= 0) {
            throw new \InvalidArgumentException(
                "Resizing proportion should be greater than zero, {$proportion} given"
            );
        }
        
        $this->proportion = $proportion;
    }
    
    /**
     * Gets the proportion of the resizing operation.
     *
     * @return int
     */
    public function getProportion()
    {
        return $this->proportion;
    }
    
    /**
     * {@inheritdoc}
     *
     * @see Hbarcelos\GdWrapper\Action\ResizeMode\Mode::getNewDimensions()
     */
    public function getNewDimensions($width, $height)
    {
        $width = (int) $width;
        $height = (int) $height;
        
        if ($width == 0 || $height == 0) {
            throw new \InvalidArgumentException(
                "Invalid initial dimensions: [{$width}, {$height}]"
            );
        }
        
        return new Point(
            round($width * $this->proportion),
            round($height * $this->proportion)
        );
    }
}