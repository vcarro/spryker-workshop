<?php

namespace Pyz\Zed\Antelope\Communication\Form;

use Generated\Shared\Transfer\AntelopeTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @method \Pyz\Zed\Antelope\Communication\AntelopeCommunicationFactory getFactory()
 * @method \Pyz\Zed\Antelope\AntelopeConfig getConfig()
 */
class AntelopeForm extends AbstractType
{
    public const FIELD_ID_ANTELOPE = 'id_antelope';
    public const FIELD_NAME = 'name';
    public const FIELD_COLOR = 'color';

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
        $this->addIdAntelopeField($builder)
            ->addNameField($builder)
            ->addColorField($builder);
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

    /**
     * @param FormBuilderInterface $builder
     * @return $this
     */
    private function addNameField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_NAME, TextType::class, [
            'label' => 'Name',
        ]);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return $this
     */
    private function addColorField(FormBuilderInterface $builder)
    {
        $builder->add(static::FIELD_COLOR, TextType::class, [
            'label' => 'Color',
        ]);

        return $this;
    }
}
