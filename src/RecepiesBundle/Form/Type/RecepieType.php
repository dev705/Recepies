<?php
namespace RecepiesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecepieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('body', 'textarea')
            //->add('unmappedBonusText', 'textarea', array('mapped'=>false))
            ->add('save', 'submit', array('label' => 'Commit Edited Recepie'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        //Every form needs to know the name of the class that holds the underlying data (e.g. AppBundle\Entity\Task).
        //Usually, this is just guessed based off of the object passed to the second argument to createForm (i.e. $task).
        $resolver->setDefaults(array(
            'data_class' => 'RecepiesBundle\Entity\Recepie'
        ));

    }

    public function getName()
    {
        return 'recepie';
    }
}