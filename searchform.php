<?php
/**
 * 검색 폼
 */
?>

<form class="form-search" role="search" method="get" id="searchform" 
	action="<?php echo home_url( '/' ); ?>">
    <input class="span12 search-query" type="text" value="" name="s" id="s" 
    	placeholder="Search" />
</form>