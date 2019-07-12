<?php
class ContentImage extends DataObject {
	static $db = array(
	 );
	
	static $has_one = array(
         'Section' => 'Section',
         'FaqSection' => 'FaqSection',
	     'MemberProfilePage' => 'MemberProfilePage'
	);
	
        
        
	public function getCMSFields() {
        $fields = parent::getCMSFields();
		
		return $fields;	
	}
       
        
}