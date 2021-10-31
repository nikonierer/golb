<?php

namespace Blog\Golb\DataProcessing;

use Blog\Golb\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class MetaInformationProcessor implements DataProcessorInterface
{

    /**
     * Process CSV field data to split into a multi dimensional array
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        /** @var ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $pageRepository = $objectManager->get(PageRepository::class);

        $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration, 'blogPost');
        $blogPost = $pageRepository->findByIdentifier((int)$cObj->data['uid']);
        $processedData[$targetVariableName] = $blogPost;

        return $processedData;
    }
}