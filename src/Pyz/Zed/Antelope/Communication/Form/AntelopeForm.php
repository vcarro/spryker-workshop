<?php

namespace Pyz\Zed\Antelope\Communication\Form;

use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @method \Pyz\Zed\Antelope\Communication\AntelopeCommunicationFactory getFactory()
 * @method \Pyz\Zed\Antelope\AntelopeConfig getConfig()
 */
class AntelopeForm extends AbstractType
{
    public const FIELD_ID_ANTELOPE = 'id_antelope';

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AntelopeTransfer::class,
        ]);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addIdAntelopeField($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @return $this
     */
    private function addIdAntelopeField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_ID_ANTELOPE, HiddenType::class);

        return $this;
    }
}
