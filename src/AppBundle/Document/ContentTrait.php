<?php
namespace AppBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

trait ContentTrait
{
    /**
     * @PHPCR\Id
     */
    protected $id;

    /**
     * @PHPCR\ParentDocument
     */
    protected $parent;

    /**
     * @PHPCR\Nodename
     */
    protected $title;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $content;

    /**
     * Get: Document ID
     *
     * @access public
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get: Parent Document
     *
     * @access public
     * @return object
     */
    public function getParentDocument()
    {
        return $this->parent;
    }

    /**
     * Set: Parent Document
     *
     * @access public
     * @param object $document
     * @return self
     */
    public function setParentDocument($document)
    {
        $this->parent = $document;
        return $this;
    }

    /**
     * Get: Document Title
     *
     * @access public
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set: Document Title
     *
     * @access public
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get: Document Content
     *
     * @access public
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set: Document Content
     *
     * @access public
     * @param string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
