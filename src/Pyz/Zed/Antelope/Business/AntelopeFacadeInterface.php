<?php

namespace Pyz\Zed\Antelope\Business;

use Generated\Shared\Transfer\AntelopeTransfer;
use Generated\Shared\Transfer\AntelopeResponseTransfer;

/**
 * @method \Pyz\Zed\Antelope\Business\AntelopeBusinessFactory getFactory()
 */
interface AntelopeFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\AntelopeTransfer $antelopeTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer
     */
    public function getAntelope(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;

    /**
     * @param \Generated\Shared\Transfer\AntelopeTransfer $antelopeTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer
     */
    public function update(AntelopeTransfer $antelopeTransfer): AntelopeTransfer;
}
