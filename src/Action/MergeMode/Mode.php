<?php
/**
 * Defines resize mode interface.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Action\MergeMode;

use Hbarcelos\GdWrapper\Action\Merge;
use Hbarcelos\GdWrapper\Resource\Resource;

interface Mode
{
    /**
     * Obtains the merge resource to be used in the merging action.
     *
     * @param Hbarcelos\GdWrapper\Action\Merge $action The action that will be performed.
     * @param Hbarcelos\GdWrapper\Resource\Resource $src The image resource on which the action will be applied.
     *
     * @return Hbarcelos\GdWrapper\Resource\Resource The merge resource.
     */
    public function getMergeResource(Merge $action, Hbarcelos\GdWrapper\Resource\Resource $src);
}
