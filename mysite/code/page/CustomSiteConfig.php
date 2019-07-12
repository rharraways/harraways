<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CustomSiteConfig extends DataExtension{
     
     private static $db = array(			
		'Phone' => "Varchar(250)",
                'Fax' => "Varchar(250)",
                'FreePhone' => "Varchar(250)",
                 'Email' => "Varchar(250)",
                  'Information' => "Varchar(250)",
                 'Facebook' => "Varchar(250)",
                 'Instagram' => "Varchar(250)",
                 'Address' => "Varchar(450)",
                 'InstagramIframe' => "HTMLText"
		 		
	  );
  
    public function updateCMSFields(FieldList $fields) 
    {
        $fields->addFieldToTab("Root.Main",
            TextareaField::create("Address", "Harraways Address")->setRows(8)

        );
         $fields->addFieldToTab("Root.Main", 
            new TextareaField("Phone", "Harraways Phone Number")
        );
         $fields->addFieldToTab("Root.Main", 
            new TextareaField("Fax", "Harrayways Fax")
        );
        $fields->addFieldToTab("Root.Main",
            new TextareaField("Information", "Information")
        );
         $fields->addFieldToTab("Root.Main", 
            new TextareaField("FreePhone", "Harraways Free Phone")
        );
         $fields->addFieldToTab("Root.Main", 
            new TextareaField("Email", "Harrayways Email")
        );
         
        $fields->addFieldToTab("Root.Main", 
            new TextareaField("Facebook", "Harrayways Facebook")
        );

        $fields->addFieldToTab("Root.Main", 
            new TextareaField("Instagram", "Harrayways Instagram")
        );

       $fields->addFieldToTab("Root.Main", 
            HtmlEditorField::create("InstagramIframe", "Instagram Iframe'")
 
        );
       
    }
  
     
   
}

