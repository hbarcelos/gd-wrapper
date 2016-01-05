<?php
/**
 * Defines resize mode interface.
 *
 * @author Henrique Barcelos
 */

namespace Hbarcelos\GdWrapper\Action\MergeMode;

use Hbarcelos\GdWrapper\Action\Merge;
use Hbarcelos\GdWrapper\Resource\Resource;
use Hbarcelos\GdWrapper\Resource\TransparentResourceFactory;

class SaveAlphaChannel implements Mode
{
    /**
     * Will just return the resource as it is.
     *
     * {@inherit-doc}
     * @see Hbarcelos\GdWrapper\Action\MergeMode\Mode::getMergeResource()
     */
    public function getMergeResource(Merge $action, Resource $src)
    {
        $mergeResource = $action->getMergeResource();
        $startPoint = $action->getStartPoint($src);
        
        $factory = $action->getResourceFactory($mergeResource->getWidth(), $mergeResource->getHeight());
        $cut = $factory->create();
        
        imagecopy(
            $cut->getRaw(), $src->getRaw(),
            0, 0, $startPoint->getX(), $startPoint->getY(),
            $cut->getWidth(), $cut->getHeight()
        );
        
        imagealphablending($cut->getRaw(), true);
        
        imagecopy(
            $cut->getRaw(), $mergeResource->getRaw(),
            0, 0, 0, 0,
            $cut->getWidth(), $cut->getHeight()
        );
        
        return $cut;
    }
}
