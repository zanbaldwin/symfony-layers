<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invitations")
 */
class Invitation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=6)
     * @var string
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=256)
     * @var string
     */
    protected $email;

    /**
     * When sending invitation be sure to set this value to bool(true). It can prevent invitations from being sent
     * twice.
     *
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    protected $sent = false;

    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="invitation", cascade={"persist", "merge"})
     * @var \AppBundle\Entity\User
     */
    protected $user;

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {
        // Generate identifier only once, here a 6 character length code.
        $this->code = substr(md5(uniqid(rand(), true)), 0, 6);
    }

    /**
     * Get: Invitation Code
     *
     * @access public
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get: User's Email Address
     *
     * @access public
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Mark Invitation as Sent
     *
     * @access public
     * @return self
     */
    public function send()
    {
        $this->sent = true;
        return $this;
    }

    /**
     * Is Invitation Sent?
     *
     * @access public
     * @return boolean
     */
    public function isSent()
    {
        return $this->sent;
    }

    /**
     * Get: User Object
     *
     * @access public
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set: User's Email Address
     *
     * @access public
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Set: User Object
     *
     * @access public
     * @param \AppBundle\Entity\User $user
     * @return self
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
