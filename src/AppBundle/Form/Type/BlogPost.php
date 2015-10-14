<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class BlogPost extends AbstractType
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
            ->add('title', 'text', [
                'label' => 'form.blog.post.title',
            ])
            ->add('content', 'textarea', [
                'label' => 'form.blog.post.content',
            ])
            ->add('categories', new Categories, [
                'label' => 'form.blog.post.categories'
                ])
            ->add('save', 'submit', [
                'label' => 'form.blog.post.save',
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
        return 'form_blog_post';
    }
}
