<?php
/**
 * Defines resize mode interface.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Action\MergeMode;

use Hbarcelos\GdWrapper\Action\Merge;
use Hbarcelos\GdWrapper\Resource\Resource;

class DefaultMerge implements Mode
{
    /**
     * Wil just return the resource as it is.
     *
     * {@inherit-doc}
     * @see Hbarcelos\GdWrapper\Action\MergeMode.Mode::getMergeResource()
     */
    public function getMergeResource(Merge $action, Resource $src)
    {
        return $action->getMergeResource();
    }
}