<?php

namespace Pyz\Zed\Antelope\Communication\Form\DataProvider;

use \Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface;

class AntelopeFormDataProvider
{
    /** @var AntelopeRepositoryInterface */
    private $antelopeRepository;

    public function __construct(AntelopeRepositoryInterface $antelopeRepository)
    {
        $this->antelopeRepository = $antelopeRepository;
    }

    /**
     * @param int|null $idAntelope
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer
     */
    public function getData(?int $idAntelope = null): AntelopeTransfer
    {
        return $this->getAntelopeTransfer($idAntelope);
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return  [
            'data_class' => AntelopeTransfer::class
        ];
    }

    /**
     * @param int|null $idAntelope
     *
     * @return AntelopeTransfer
     */
    private function getAntelopeTransfer(?int $idAntelope = null): AntelopeTransfer
    {
        $antelopeTransfer = new AntelopeTransfer();

        if ($idAntelope === null) {
            return $antelopeTransfer;
        }

        return $this->antelopeRepository->findAntelopeById($idAntelope) ?? $antelopeTransfer;
    }
}
