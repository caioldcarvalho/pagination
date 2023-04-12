<?php

namespace Caio\Pagination;

/**
 * Adapted from:
 * https://stackoverflow.com/a/35447397
 */

class Pagination
{
    public $cur_page;
    public $total;
    public $per_page;

    function __construct($cur_page, $total, $per_page)
    {
        $this->cur_page = $cur_page;
        $this->total    = $total;
        $this->per_page = $per_page;
    }

    function getTotalPage()
    {
        return ceil($this->total / $this->per_page);
    }

    function hasPrevPage()
    {
        return $this->cur_page > 1;
    }

    function hasNextPage()
    {
        return $this->cur_page < $this->getTotalPage();
    }

    function offset()
    {
        return ($this->cur_page - 1) * $this->per_page;
    }
}

// End of File
