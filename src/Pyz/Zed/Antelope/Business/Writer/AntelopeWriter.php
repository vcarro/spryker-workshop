<?php

namespace Pyz\Zed\Antelope\Business\Writer;

use Generated\Shared\Transfer\AntelopeResponseTransfer;
use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

class AntelopeWriter implements AntelopeWriterInterface
{
    /**
     * @var \Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface
     */
    protected $antelopeRepository;

    /**
     * @param \Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface $antelopeRepository
     */
    public function __construct(AntelopeRepositoryInterface $antelopeRepository)
    {
        $this->antelopeRepository = $antelopeRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\AntelopeTransfer $antelopeTransfer
     *
     * @return \Generated\Shared\Transfer\AntelopeResponseTransfer|null
     */
    public function update(AntelopeTransfer $antelopeTransfer): ?AntelopeResponseTransfer
    {
        $antelopeTransfer = $this->antelopeRepository->update($antelopeTransfer);

        return (new AntelopeResponseTransfer())
            ->setAntelope($antelopeTransfer)
            ->setIsSuccessful(true);
    }
}
