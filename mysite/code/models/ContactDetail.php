<?php
class ContactDetails extends DataObject {
    private static $db = array(
        'Name' => 'Text'
        ,'WhereDidYouFindUs' => 'Text'
        ,'Email' => 'Text'
        ,'Phone' => 'Text'
        ,'Message' => 'Text'
     
    );

    private static $has_one = array(
        'ContactPage' => 'ContactPage'

    );

    private static $summary_fields = array(
        'Created.Nice'=> 'Date'
        ,'Name' => 'Name'
        ,'WhereDidYouFindUs' => 'Where did you find us'
        ,'Email' => 'Email'
        ,'Phone' => 'Phone'
        ,'Message' => 'Message'
    );

    private static $default_sort = 'ID DESC';

    public function getCMSFields(){
        $fields = parent::getCMSFields();
        
           

        return $fields;
    }
}

