<?php

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeTransfer;

interface AntelopeWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\AntelopeTransfer $antelopeTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer|null
     */
    public function update(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer;
}
