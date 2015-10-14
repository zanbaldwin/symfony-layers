<?php
namespace AppBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * @access protected
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @return integer
     */
    protected $id;

    /**
     * @access protected
     * @ORM\Column(type="string")
     * @return string
     */
    protected $title;

    /**
     * @access protected
     * @ORM\Column(type="string")
     * @return string
     */
    protected $slug;

    /**
     * @access protected
     * @ORM\Column(type="datetime")
     * @return \DateTime
     */
    protected $createdOn;

    /**
     * @access protected
     * @ORM\Column(type="text")
     * @return string
     */
    protected $content;

    /**
     * @access protected
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Blog\Category", inversedBy="posts")
     * @ORM\JoinTable(name="post_categories")
     * @return \Doctrine\Common\Collections\ArrayCollections
     */
    protected $categories;

    /**
     * Get: ID
     *
     * @access public
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get: Post Title
     *
     * @access public
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set: Post Title
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
     * Get: URL Slug
     *
     * @access public
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set: URL Slug
     *
     * @access public
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get: Created On
     *
     * @access public
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set: Created On
     *
     * @access public
     * @param \DateTime $createdOn
     * @return self
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * Get: Post Content
     *
     * @access public
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set: Post Content
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

    /**
     * Get: Post Categories
     *
     * @access public
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set Categories
     *
     * @access public
     * @param array $categories
     * @return self
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Add Category to Post
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Category $category
     * @return self
     */
    public function addCategory(Category $category)
    {
        $this->categories->add($category);
        return $this;
    }

    /**
     * Remove Category from Post
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Category $category
     * @return self
     */
    public function removeCategory(Category $category)
    {
        $this->categories->remove($category);
        return $this;
    }
}
