<?php

namespace Greenfieldr\Golb\Domain\Model\Dto;

/*
 * This file is part of TYPO3 CMS-based extension "golb".
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 3
 * of the License, or any later version.
 */

use Greenfieldr\Golb\Domain\Model\Category;

class PostsDemand implements DemandInterface
{
    const LIMIT_DEFAULT = 10;
    const ITEMS_PER_PAGE_DEFAULT = 10;
    const OFFSET_DEFAULT = 0;
    const ORDER_DEFAULT = 'date';
    const ORDER_DIRECTION_DEFAULT = 'DESC';
    const ARCHIVED_DEFAULT = false;
    const NON_ARCHIVED_DEFAULT = false;
    const TOP_POST_DEFAULT = false;
    const NON_TOP_POST_DEFAULT = false;

    /**
     * @var bool|null
     */
    protected $archived = null;

    /**
     * @var bool|null
     */
    protected bool|null $nonArchived = null;

    /**
     * @var bool|null
     */
    protected bool|null $topPost = null;

    /**
     * @var bool|null
     */
    protected bool|null $nonTopPost = null;

    /**
     * @var array
     */
    protected array $categories = [];

    /**
     * @var ?Category
     */
    protected ?Category $category = null;

    /**
     * @var array
     */
    protected array $tags = [];

    /**
     * @var int|null
     */
    protected int|null $limit = null;

    /**
     * @var int|null
     */
    protected int|null $offset = null;

    /**
     * @var array
     */
    protected array $excluded = [];

    /**
     * @var string|null
     */
    protected string|null $order = null;

    /**
     * @var string|null
     */
    protected string|null $orderDirection = null;

    /**
     * @var int
     */
    protected int $currentPage = 1;

    /**
     * @var int
     */
    protected int $itemsPerPage = 0;

    /**
     * @return bool
     */
    public function isArchived(): bool
    {
        return ($this->isArchivedSet()) ? $this->archived : self::ARCHIVED_DEFAULT;
    }

    public function isArchivedSet(): bool
    {
        return $this->archived !== null;
    }

    /**
     * @param bool $archived
     * @return PostsDemand
     */
    public function setArchived(bool $archived): PostsDemand
    {
        $this->archived = $archived;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNonArchived(): bool
    {
        return ($this->isNonArchivedSet()) ? $this->nonArchived : self::NON_ARCHIVED_DEFAULT;
    }

    public function isNonArchivedSet(): bool
    {
        return $this->nonArchived !== null;
    }

    /**
     * @param bool $nonArchived
     * @return PostsDemand
     */
    public function setNonArchived(bool $nonArchived): PostsDemand
    {
        $this->nonArchived = $nonArchived;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTopPost(): bool
    {
        return ($this->isTopPostSet()) ? $this->topPost : self::TOP_POST_DEFAULT;
    }

    public function isTopPostSet(): bool
    {
        return $this->topPost !== null;
    }

    /**
     * @param bool $topPost
     * @return PostsDemand
     */
    public function setTopPost(bool $topPost): PostsDemand
    {
        $this->topPost = $topPost;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNonTopPost(): bool
    {
        return ($this->isNonTopPostSet()) ? $this->nonTopPost : self::NON_TOP_POST_DEFAULT;
    }

    public function isNonTopPostSet(): bool
    {
        return $this->nonTopPost !== null;
    }

    /**
     * @param bool $nonTopPost
     * @return PostsDemand
     */
    public function setNonTopPost(bool $nonTopPost): PostsDemand
    {
        $this->nonTopPost = $nonTopPost;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     * @return PostsDemand
     */
    public function setCategories(array $categories): PostsDemand
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasCategories(): bool
    {
        return count($this->categories) > 0;
    }

    /**
     * @return ?Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return PostsDemand
     */
    public function setTags(array $tags): PostsDemand
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasTags(): bool
    {
        return count($this->tags) > 0;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return ($this->hasLimit()) ? $this->limit : self::LIMIT_DEFAULT;
    }

    /**
     * @param int $limit
     * @return PostsDemand
     */
    public function setLimit(int $limit): PostsDemand
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasLimit(): bool
    {
        return $this->limit !== null;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return ($this->hasOffset()) ? $this->offset : self::OFFSET_DEFAULT;
    }

    /**
     * @param int $offset
     * @return PostsDemand
     */
    public function setOffset(int $offset): PostsDemand
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasOffset(): bool
    {
        return $this->offset !== null;
    }

    /**
     * @return array
     */
    public function getExcluded(): array
    {
        return $this->excluded;
    }

    /**
     * @param array $excluded
     * @return PostsDemand
     */
    public function setExcluded(array $excluded): PostsDemand
    {
        $this->excluded = $excluded;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasExcluded(): bool
    {
        return count($this->excluded) > 0;
    }

    /**
     * @return string
     */
    public function getOrder(): string
    {
        return ($this->hasOrder()) ? $this->order : self::ORDER_DEFAULT;
    }

    /**
     * @param string $order
     * @return PostsDemand
     */
    public function setOrder(string $order): PostsDemand
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasOrder(): bool
    {
        return $this->order !== null;
    }

    /**
     * @return string
     */
    public function getOrderDirection(): string
    {
        return ($this->hasOrderDirection()) ? $this->orderDirection : self::ORDER_DIRECTION_DEFAULT;
    }

    /**
     * @return bool
     */
    public function hasOrderDirection(): bool
    {
        return $this->orderDirection !== null;
    }

    /**
     * @param string $orderDirection
     * @return PostsDemand
     */
    public function setOrderDirection(string $orderDirection): PostsDemand
    {
        $this->orderDirection = $orderDirection;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage(int $currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return bool
     */
    public function hasItemsPerPage(): bool
    {
        return $this->itemsPerPage > 0;
    }

    /**
     * @return int
     */
    public function getItemsPerPage(): int
    {
        return $this->hasItemsPerPage() ? $this->itemsPerPage : self::ITEMS_PER_PAGE_DEFAULT;
    }

    /**
     * @param int $itemsPerPage
     */
    public function setItemsPerPage(int $itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

}
