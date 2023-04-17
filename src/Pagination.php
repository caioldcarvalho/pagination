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


    /**
     * Create page navigation buttons
     */
    function createPaginationNav()
    {
        // Start nav
        $nav[] = '<nav>
        <ul class="pages">';

        // Append "Previous" button if previous page exists
        if ($this->hasPrevPage()) {
            $prev = $this->currentPage - 1;
            $nav[] = <<<HTML
                <li><a href="?page=$prev">Previous</a></li>
            HTML;
        }

        // Append 1 button for every page and add `active` if it's current page
        for ($i = 1; $i <= $this->getTotalPages(); $i++) {
            $active = $i == $this->currentPage ? 'active' : '';
            $nav[] = <<<HTML
                <li class="$active">
                    <a href="?page=$i">$i</a>
                </li>
            HTML;
        }

        // Append "Next" button if next page exists
        if ($this->hasNextPage()) {
            $next = $this->currentPage + 1;
            $nav[] = <<<HTML
                <li><a href="?page=$next">Next</a></li>
            HTML;
        }

        // End nav
        $nav[] = '</ul>
            </nav>';

        // Bind together whole nav
        $pages = implode('', $nav);

        return $pages;
        
    }
}

// End of File
