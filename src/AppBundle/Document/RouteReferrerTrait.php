<?php
namespace AppBundle\Document;

trait RouteReferrerTrait
{
    /**
     * @access protected
     * @var array
     */
    protected $routes;

    /**
     * Get: Routes
     *
     * @access public
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
