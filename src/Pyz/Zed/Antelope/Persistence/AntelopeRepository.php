<?php

namespace Pyz\Zed\Antelope\Persistence;

use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Pyz\Zed\Antelope\Persistence\AntelopePersistenceFactory getFactory()
 */
class AntelopeRepository extends AbstractRepository implements AntelopeRepositoryInterface
{
    /**
     * @param int $idAntelope
     *
     * @return \Generated\Shared\Transfer\AntelopeTransfer|null
     */
    public function findAntelopeById(int $idAntelope): ?AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createPyzAntelopeQuery()
            ->findOneByIdAntelope($idAntelope);

        if ($antelopeEntity === null) {
            return null;
        }

        $antelopeTransfer = new AntelopeTransfer();

        return $antelopeTransfer->fromArray($antelopeEntity->toArray());
    }

    /**
     * @param AntelopeTransfer $antelopeTransfer
     *
     * @return AntelopeTransfer|null
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function update(AntelopeTransfer $antelopeTransfer): ?AntelopeTransfer
    {
        $antelopeEntity = $this->getFactory()
            ->createPyzAntelopeQuery()
            ->filterByIdAntelope($antelopeTransfer->getIdAntelope())
            ->findOneOrCreate();

        $antelopeEntity->fromArray($antelopeTransfer->toArray());

        if ($antelopeEntity->isNew() || $antelopeEntity->isModified()) {
            $antelopeEntity->save();
        }

        return $antelopeTransfer;
    }
}
