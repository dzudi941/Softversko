<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\BlogPost;

/**
* 
*/
class BlogPostAdmin extends AbstractAdmin
{
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->tab('Post')
				->with('Content', ['class' => 'col-md-9'])
					->add('title', 'text')
					->add('body', 'textarea')
                    ->add('draft', 'checkbox')
				->end()

				->with('Meta data', ['class' => 'col-md-3'])
					->add('category', 'sonata_type_model', [
						'class' => 'AppBundle\Entity\Category',
						'property' => 'name',
					])
				->end()
			->end()

			->tab('Test')
			->end()
		;
	}

	protected function configureListFields(ListMapper $listMapper)
	{
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            ->add('draft')
        ;
	}

	protected  function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('title')
            ->add('category', null, [], 'entity', [
                'class' => 'AppBundle\Entity\Category',
                'choice_label' => 'name',
            ])
        ;
    }

    public function toString($object)
	{
		return $object instanceof BlogPost ? $object->getTitle() : 'Blog Post';
	}
}