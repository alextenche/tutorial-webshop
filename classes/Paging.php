<?php
class Paging {

	private $_records;
	private $_max_pp;
	private $_numb_of_pages;
	private $_numb_of_records;
	private $_current;
	private $_offset = 0;
	public static $_key = 'pg';
	public $_url;
	
	
	// constructor
	public function __construct( $rows, $max = 10 ) {
		$this->_records = $rows;
		$this->_numb_of_records = count($this->_records);
		$this->_max_pp = $max;
		$this->_url = Url::getCurrentUrl(self::$_key);
		$current = Url::getParam(self::$_key);
		$this->_current = !empty($current) ? $current : 1;
		$this->numberOfPages();
		$this->getOffset();
	}

	
	// gets the number of pages that will be displayed
	private function numberOfPages() {
		$this->_numb_of_pages = ceil($this->_numb_of_records / $this->_max_pp);
	}
	
	
	// gets offset property
	private function getOffset() {
		$this->_offset = ($this->_current - 1) * $this->_max_pp;
	}
	
	
	
	// get records for a page
	public function getRecords() {
		$out = array();
		if ($this->_numb_of_pages > 1) {
			$last = ($this->_offset + $this->_max_pp);
			
			for($i = $this->_offset; $i < $last; $i++) {
				if ($i < $this->_numb_of_records) {
					$out[] = $this->_records[$i];
				}
			}
		} else {
			$out = $this->_records;
		}
		return $out;
	}
	
	
	
	// creates paging navigation - first, previous, next, last links
	private function getLinks() {
		if ($this->_numb_of_pages > 1) {
			
			$out = array();
			
			// first link
			if ($this->_current > 1) {
				$out[] = "<a href=\"".$this->_url."\" >First</a>";
			} else {
				$out[] = "<span style='color:#ccc'>First</span>";
			}
			
			
			// previous link
			if ($this->_current > 1) {
				
				// previous page number
				$id = ($this->_current - 1);
				
				$url = $id > 1 ? 
					$this->_url."&amp;".self::$_key."=".$id :
					$this->_url;
				$out[] = "<a href=\"{$url}\">Previous</a>";
				
			} else {
				$out[] = "<span style='color:#ccc'>Previous</span>";
			}
			
			
			// next link
			if ($this->_current != $this->_numb_of_pages) {
				// next page number
				$id = ($this->_current + 1);
				
				$url = $this->_url."&amp;".self::$_key."=".$id;
				$out[] = "<a href=\"{$url}\">Next</a>";
				
			} else {
				$out[] = "<span style='color:#ccc'>Next</span>";
			}
			
			
			// last link
			if ($this->_current != $this->_numb_of_pages) {
				$url = $this->_url."&amp;".self::$_key."=".$this->_numb_of_pages;
				$out[] = "<a href=\"{$url}\">Last</a>";
			} else {
				$out[] = "<span style='color:#ccc'>Last</span>";
			}
			
			return "<li>" . implode("</li><li>", $out) . "</li>";
			
		}	
	}
	
	
	// display the pagination 
	public function getPaging() {

		$links = $this->getLinks();

		if (!empty($links)) {
			$out  = '<div class="pagination text-center"><ul class="pagination">';
			$out .= $links;
			$out .= "</ul></div>";
			return $out;
		}
	}



/*<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1111</a></li>
    <li><a href="#">2222</a></li>
    <li><a href="#">3333</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>*/









	
	
}