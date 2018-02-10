<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\Event;

/**
 *
 */
class EventAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Event')
            ->with('Content', ['class' => 'col-md-9'])
            ->add('name', 'text')
            ->add('description', 'textarea')
            ->add('priority', 'text')
            ->end()

            ->with('Meta data', ['class' => 'col-md-3'])
            ->add('category', 'sonata_type_model', [
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name',
            ])
            ->end()
            ->end()

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('category.name')
            ->add('draft')
        ;
    }

    protected  function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('category', null, [], 'entity', [
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => 'name',
            ])
        ;
    }

    public function toString($object)
    {
        return $object instanceof Event ? $object->getName() : 'Event';
    }
}