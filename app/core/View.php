<?php
/**
 * It is a class for viewing dynamic content
 * It has only one method generate ()
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class View
{
    private $config;
    
    function __construct ( $config )
    {
        $this->config = $config;
    }

    /**
     * Generates page content by using template, content part and data
     *      for filling content part of page
     * 
     * @param string $contentView - path and file name of content part of generating page
     * @param string $templateView - path and file name of template of generating page
     * @param variant $data - data for filling content part of page
     * 
     */
    function generate ( $contentView, $templateView, $data = null )
    {
        include $templateView;
    }
}