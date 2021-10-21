<?php

namespace App\Form;

use App\Entity\OrderItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddToPanierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ajoute la quantité choisis part l'utilisateur de la pizza selectionner quand il clique sur le bouton.
        $builder->add('quantity');
        $builder->add('add', SubmitType::class, [
            'label' => 'Add to panier'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderItem::class,
        ]);
    }
}
