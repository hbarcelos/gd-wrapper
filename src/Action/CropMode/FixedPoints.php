<?php
/**
 * Defines a crop mode with proportional size edges.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Action\CropMode;

use Hbarcelos\GdWrapper\Geometry\Point;

/**
 * This crop mode crops from a point to another point.
 */

class FixedPoints implements Mode
{
    /**
     * @var Hbarcelos\GdWrapper\Geometry\Point The start point of cropping.
     */
    private $start;
    
    /**
     * @var Hbarcelos\GdWrapper\Geometry\Point The end point of cropping.
     */
    private $end;
    
    /**
     * Creates a FixedPoints crop mode.
     * 
     * @param Hbarcelos\GdWrapper\Geometry\Point $start The start point of cropping.
     * @param Hbarcelos\GdWrapper\Geometry\Point $end The end point of cropping.
     */
    public function __construct(Point $start, Point $end)
    {
        $this->setStart($start);
        $this->setEnd($end);
    }
    
    /**
     * Sets the start point of cropping.
     * 
     * @param Hbarcelos\GdWrapper\Geometry\Point $start The start point of cropping.
     * 
     * @return void
     */
    public function setStart(Point $start)
    {
        $this->start = $start;
    }
    
    /**
     * Sets the end point of cropping.
     * 
     * @param Hbarcelos\GdWrapper\Geometry\Point $end The end point of cropping.
     * 
     * @return void
     */
    public function setEnd(Point $end)
    {
        $this->end = $end;
    }
    
    /**
     * (non-PHPdoc)
     * @see Hbarcelos\GdWrapper\Action\CropMode\Mode::getCropInfo()
     */
    public function getCropInfo($width, $height)
    {
        return new CropInfo(
            $this->start, 
            $this->end->getX() - $this->start->getX(), 
            $this->end->getY() - $this->start->getY()
        );
    }
}
