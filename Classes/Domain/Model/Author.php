<?php

namespace Greenfieldr\Golb\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Author extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $website;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var FrontendUser
     */
    protected $frontendUser = null;

    /**
     * @var string
     */
    protected $description;

    /**
     * Constructs a new author
     *
     */
    public function __construct()
    {
        $this->image = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return FrontendUser
     */
    public function getFrontendUser(): FrontendUser
    {
        return $this->frontendUser;
    }

    /**
     * @param FrontendUser $frontendUser
     */
    public function setFrontendUser(FrontendUser $frontendUser): void
    {
        $this->frontendUser = $frontendUser;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        if ($this->frontendUser) {
           return $this->frontendUser->getFullName();
        }

        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        if ($this->frontendUser) {
           return $this->frontendUser->getWww();
        }

        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        if ($this->frontendUser) {
           return $this->frontendUser->getEmail();
        }

        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Sets the images value
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Gets the images value
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImages()
    {
        if ($this->frontendUser) {
           return $this->frontendUser->getImage();
        }

        return $this->images;
    }

    /**
     * Calls getters of additional properties in frontend user model if frontend user is set.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if ($this->frontendUser && method_exists($this->frontendUser, $name)) {
            return $this->frontendUser->$name();
        }

        return null;
    }

}
