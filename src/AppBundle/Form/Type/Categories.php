<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class Categories extends AbstractType
{
    /**
     * Build Form
     *
     * @access public
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', 'entity', [
                'label' => 'form.blog.post.categories',
                'class' => 'AppBundle:Blog\Category',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    /**
     * Set Default Options
     *
     * @access public
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
    }

    /**
     * Get Form Name
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'form_blog_categories';
    }
}
