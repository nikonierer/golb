<?php

namespace Greenfieldr\Golb\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * The repository for tags
 */
class TagRepository extends Repository
{
    /**
     * default query settings from typo3
     * @var Typo3QuerySettings
     */
    protected $defaultQuerySettings;

    /**
     * @var array
     */
    protected $defaultOrderings = [
        'title' => QueryInterface::ORDER_ASCENDING,
        'uid' => QueryInterface::ORDER_ASCENDING
    ];

    public function initializeObject()
    {
        $this->defaultQuerySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $this->defaultQuerySettings->setRespectStoragePage(false);
        $this->defaultQuerySettings->setIgnoreEnableFields(false);
        $this->defaultQuerySettings->setRespectSysLanguage(true);
        $this->setDefaultQuerySettings($this->defaultQuerySettings);
    }
}