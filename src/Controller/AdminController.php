<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdminController extends BaseAdminController
{
    protected function createBlogPostEntityFormBuilder($entity, $view)
    {
        $form = parent::createEntityFormBuilder($entity, $view);
        $form->add('translations', TranslationsType::class, [
        'fields' => [
                'content' => [
                    'field_type' => TextareaType::class,
                    'label' => 'content',
                    'locale_options' => [
                        'en' => ['label' => 'content'],
                        'fr' => ['label' => 'contenu'],
                    ]
                ]
            ],
            'excluded_fields' => ['details']
        ]);
        return $form;
    }
}
