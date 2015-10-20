<?php
namespace AppBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use Symfony\Cmf\Component\Routing\RouteReferrersReadInterface;

/**
 * @PHPCR\Document(referenceable=true)
 */
class Post implements RouteReferrersReadInterface
{
    use ContentTrait;
    use RouteReferrerTrait;

    /**
     * @access protected
     * @PHPCR\Date
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @access protected
     * @PHPCR\Date
     * @var \DateTime(nullable=true)
     */
    protected $updatedAt;

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime;
    }

    /**
     * Lifecycle Callback: Update At
     *
     * @access public
     * @PHPCR\PrePersist
     * @return void
     */
    public function __updatedAtLifecycleCallback()
    {
        $this->setUpdatedAt(new \DateTime);
    }

    /**
     * Get: Created At
     *
     * @access public
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set: Created At
     *
     * @access public
     * @param \DateTime $datetime
     * @return self
     */
    public function setCreatedAt(\DateTime $datetime)
    {
        $this->createdAt = $datetime;
        return $this;
    }

    /**
     * Get: Updated At
     *
     * @access public
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set: Update At
     *
     * @access public
     * @param \DateTime $datetime
     * @return self
     */
    public function setUpdatedAt(\DateTime $datetime)
    {
        $this->updatedAt = $datetime;
        return $this;
    }
}
