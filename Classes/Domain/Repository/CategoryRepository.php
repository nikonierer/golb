<?php

namespace Greenfieldr\Golb\Domain\Repository;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * The repository for categories
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
{

    /**
     * @param $id
     * @param string $tableName
     * @param string $fieldName
     * @return QueryResultInterface
     */
    public function findByRelation($id, $tableName = 'tt_content', $fieldName = 'categories')
    {
        $query = $this->createQuery();
        $query->statement(
            'SELECT * ' .
            'FROM sys_category as cat, sys_category_record_mm as mm ' .
            'WHERE mm.tablenames = "' . $tableName . '" ' .
            'AND mm.uid_foreign = ' . (int)$id . ' ' .
            'AND mm.fieldname = "' . $fieldName . '" ' .
            'AND cat.uid = mm.uid_local'
        );

        return $query->execute();
    }
}