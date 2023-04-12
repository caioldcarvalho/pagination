<?php

namespace Caio\Pagination;

/**
 * Adapted from:
 * https://stackoverflow.com/a/35447397
 */

class Pagination
{
    public $currentPage;
    public $totalItems;
    public $itemsPerPage;

    function __construct($currentPage, $totalItems, $itemsPerPage)
    {
        $this->currentPage  = $currentPage;
        $this->totalItems   = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
    }

    function getTotalPages()
    {
        return ceil($this->totalItems / $this->itemsPerPage);
    }

    function hasPrevPage()
    {
        return $this->currentPage > 1;
    }

    function hasNextPage()
    {
        return $this->currentPage < $this->getTotalPages();
    }

    function offset()
    {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }
}

// End of File
