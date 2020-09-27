<?php

namespace Greenfieldr\Golb\Domain\Model;

class FrontendUser extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{

    /**
     * @var Author
     */
    protected $author;

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        if($this->getName()) {
            return $this->getName();
        }

        $properties = [
            $this->getFirstName(),
            $this->getMiddleName(),
            $this->getLastName()
        ];

        return trim(implode($properties, ' '));
    }

}
