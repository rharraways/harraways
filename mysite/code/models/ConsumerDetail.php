<?php
class ConsumerDetail extends DataObject {
    private static $db = array(
        'FirstName' => 'Text'
        ,'LastName' => 'Text'
        ,'Email' => 'Text'
        ,'Phone' => 'Text'
        ,'Address' => 'Text'
        ,'Suburb' => 'Text'
        ,'City' => 'Text'
        ,'PostCode' => 'Text'
       ,'Product' => 'Text'
    );

    private static $has_one = array(
        'ConsumerPanelPage' => 'ConsumerPanelPage'

    );

    private static $summary_fields = array(
        'Created.Nice'=> 'Date'
        ,'FirstName' => 'First Name'
        ,'LastName' => 'Last Name'
        ,'Email' => 'Email'
        ,'Phone' => 'Contact Number'
        ,'Address' => 'Address'
        ,'Suburb' => 'Suburb'
        ,'City' => 'City'
        ,'PostCode' => 'Post Code'
        ,'Product' => 'Product'
    );

    private static $default_sort = 'ID DESC';

    public function getCMSFields(){
        $fields = parent::getCMSFields();
        return $fields;
    }
}
