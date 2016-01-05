<?php
/**
 * Defines a start alignment class.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Geometry\Alignment;

use Hbarcelos\GdWrapper\Geometry\Padding\Padding;

/**
 * Positions the inner segment at the beginning of the outer segment.
 *
 * A positive padding value will move the alignment to the right.
 *
 * For example:
 * <code>
 * $align = new Start(new Padding\Fixed(10));
 * $align->getPosition(100, 40); // Will return 10
 * </code>
 */
class Start extends AbstractAlignment
{
	/**
	 * Will return `0` plus the value of the padding.
	 *
	 * {@inherit-doc}
	 * @see Hbarcelos\GdWrapper\Geometry\Alignment\Alignment::getPosition()
	 */
	public function getPosition($outsideDimension, $insideDimension)
	{
		return $this->getPaddingValue($outsideDimension);
	}
}