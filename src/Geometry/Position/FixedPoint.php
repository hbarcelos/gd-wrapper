<?php
/**
 * Defines a fixed point positioning mode.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Geometry\Position;

use Hbarcelos\GdWrapper\Geometry\Point;

/**
 * Represents a fixed point positioning mode.
 */
class FixedPoint implements Position
{
	/**
	 * @var Point The start point of an operation.
	 */
	private $startPoint;
	
	/**
	 * Creates a fixed point positioning mode.
	 *
	 * @param Point $start The start point of an operation
	 */
	public function __construct(Point $start)
	{
		$this->setStartPoint($start);
	}
	
	/**
	 * Seths the start point of an operation.
	 *
	 * @param Point $start
	 *
	 * @return void
	 */
	public function setStartPoint(Point $start)
	{
		$this->startPoint = $start;
	}
	
	/**
	 * {@inherit-doc}
	 * @see Hbarcelos\GdWrapper\Geometry\Position\Position::getStartPoint()
	 */
	public function getStartPoint(Point $outsideDimensions, Point $insideDimensions)
	{
		return $this->startPoint;
	}
}