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
            ->add('name', 'text')
            ->add('category', 'text')
            ->add('description', 'textarea')
            ->add('priority', 'text')
            ->add('date', 'datetime')
            ->add('createDate', 'datetime')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('category')
            ->add('priority')
            ->add('date')
        ;
    }

    protected  function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
        ;
    }

    public function toString($object)
    {
        return $object instanceof Event ? $object->getName() : 'Event';
    }
}