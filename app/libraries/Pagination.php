<?php 
/**
 * Pagination - Responsible for common pagination functions
 * @author Pasan Madhuranga
 */
class Pagination{
    public function __construct() 
    {
        
    }
    
   //function creates page links
    function pagination($count, $href) 
    {
        $output = '';
        if(!isset($_REQUEST["pageNumber"])) $_REQUEST["pageNumber"] = 1;
        if(PER_PAGE!= 0)
        $pages  = ceil($count/PER_PAGE);

        //if pages exists after loop's lower limit
        if($pages>1) 
        {
            if(($_REQUEST["pageNumber"]-3)>0) 
            {
                $output = $output . '<a href="' . $href . 'pageNumber=1" class="page">1</a>';
            }
            if(($_REQUEST["pageNumber"]-3)>1) 
            {
                $output = $output . '...';
            }

            //Loop for provides links for 2 pages before and after current page
            for($i=($_REQUEST["pageNumber"]-2); $i<=($_REQUEST["pageNumber"]+2); $i++)	
            {
                if($i<1) continue;
                if($i>$pages) break;
                if($_REQUEST["pageNumber"] == $i)
                $output = $output . '<span id='.$i.' class="current">'.$i.'</span>';
                else				
                $output = $output . '<a href="' . $href . "pageNumber=".$i . '" class="page">'.$i.'</a>';
            }

            //if pages exists after loop's upper limit
            if(($pages-($_REQUEST["pageNumber"]+2))>1) 
            {
                $output = $output . '...';
            }
            if(($pages-($_REQUEST["pageNumber"]+2))>0) 
            {
                if($_REQUEST["pageNumber"] == $pages)
                    $output = $output . '<span id=' . ($pages) .' class="current">' . ($pages) .'</span>';
                else				
                    $output = $output . '<a href="' . $href .  "pageNumber=" .($pages) .'" class="page">' . ($pages) .'</a>';
            }

        }
        return $output;
    }

    //function calculate total records count and trigger pagination function	
    function paginateResults($count, $href) 
    {
        $page_links = $this->pagination($count, $href);
        return $page_links;
    }
}