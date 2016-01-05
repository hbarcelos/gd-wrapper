<?php
/**
 * Defines Orientation interface.
 * 
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Geometry\Position;

use Hbarcelos\GdWrapper\Geometry\Point;

/**
 * Abstraction for the positioning of an operation. 
 */
interface Position
{
	/**
	 * Will return the start point of an operation over an image based on these parameters.
	 * 
	 * @param Hbarcelos\GdWrapper\Geometry\Point $outsideDimensions The dimensions of the outter image.
	 * @param Hbarcelos\GdWrapper\Geometry\Point $insideDimensions The dimensions of the inner image.
	 * 
	 * return \Hbarcelos\GdWrapper\Geometry\Point The start point of the operation.
	 */
	public function getStartPoint(Point $outsideDimensions, Point $insideDimensions);
}