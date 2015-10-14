<?php
namespace AppBundle\Request\Converter;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class PostConverter implements ParamConverterInterface
{
    /**
     * Constructor
     *
     * @access public
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Apply
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter $configuration
     * @return \AppBundle\Entity\Blog\Post
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        var_dump($request, $configuration);
        exit;
    }

    /**
     * Supports
     *
     * @access public
     * @param \Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter $configuration
     * @return boolean
     */
    public function supports(ParamConverter $configuration)
    {
        $postClass = 'AppBundle\Entity\Blog\Post';
        if ($configuration->getClass() !== $postClass && !is_subclass_of($configuration->getClass(), $postClass)) {
            return false;
        }
        return true;
    }
}
