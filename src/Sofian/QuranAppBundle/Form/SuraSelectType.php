<?php
/**
 * Created by PhpStorm.
 * User: sofian
 * Date: 19/07/2016
 * Time: 16:42
 */

namespace Sofian\QuranAppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SuraSelectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sura', 'entity', array(
            'class' => 'SofianQuranAppBundle:Sura',
            'label' => '',
            'choice_label' => 'getListTitle'
        ));

    }
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return "SuraSelectForm";
    }
}