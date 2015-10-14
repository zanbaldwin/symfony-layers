<?php
namespace AppBundle\Entity\Blog;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_categories")
 */
class Category
{
    /**
     * @access protected
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    protected $id;

    /**
     * @access protected
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @access protected
     * @ORM\Column(type="string")
     * @var string
     */
    protected $slug;

    /**
     * @access protected
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Blog\Post", mappedBy="categories")
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $posts;

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
     * Get: Category Name
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Category Name
     *
     * @access public
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Get: Posts in Categories
     *
     * @access public
     * @return \Doctrine\Common\Collection\ArrayCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add Post to Category
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Post $post
     * @return self
     */
    public function addPost(Post $post)
    {
        $this->posts->add($post);
        return $this;
    }

    /**
     * Remove Post from Category
     *
     * @access public
     * @param \AppBundle\Entity\Blog\Post $post
     * @return self
     */
    public function removePost(Post $post)
    {
        $this->posts->remove($post);
        return $this;
    }

    /**
     * Magic Method: To string
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
