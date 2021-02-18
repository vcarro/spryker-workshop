<?php

namespace Pyz\Zed\Antelope\Communication;

use Generated\Shared\Transfer\AntelopeTransfer;
use Pyz\Zed\Antelope\Communication\Form\AntelopeForm;
use Pyz\Zed\Antelope\Communication\Form\DataProvider\AntelopeFormDataProvider;
use Pyz\Zed\Antelope\Communication\Table\AntelopeTable;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Symfony\Component\Form\FormInterface;

/**
 * @method \Pyz\Zed\Antelope\Persistence\AntelopeRepositoryInterface getRepository()
 * @method \Pyz\Zed\Antelope\Persistence\AntelopeQueryContainerInterface getQueryContainer()
 */
class AntelopeCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Pyz\Zed\Antelope\Communication\Table\AntelopeTable
     */
    public function createAntelopeTable(): AntelopeTable
    {
        return new AntelopeTable(
            $this->getQueryContainer()
        );
    }

    /**
     * @return AntelopeFormDataProvider
     */
    public function createAntelopeFormDataProvider(): AntelopeFormDataProvider
    {
        return new AntelopeFormDataProvider(
            $this->getRepository()
        );
    }

    /**
     * @param AntelopeTransfer|null $data
     * @param array $options
     *
     * @return FormInterface
     */
    public function getAntelopeEditForm(?AntelopeTransfer $data = null, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(AntelopeForm::class, $data, $options);
    }
}
