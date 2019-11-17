<?php
class ConsumerPanelPage extends Page 
{
    public static $has_one = array(
        'ConsumerDetail' => 'ConsumerDetails',
        'ConsumerPanelBanner'=>'PageImage',
        'ConsumerPanelBannerLink' => 'SiteTree'
    );

   public static $db = 
    array(
        'ReceiverEmail' => 'Varchar(50)',
        'Reply' => 'Varchar(500)',
        'Subject' => 'Varchar(500)',
       
        
    );

     public function getTextToDisplayAfterSubmission(){
            return $this->getField("TextToDisplayAfterSubmission");
        }
    public function getCMSFields() 
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new EmailField('ReceiverEmail'), 'Content');
        $fields->addFieldToTab('Root.Main', new TextareaField('Reply'), 'Content');
        $fields->addFieldToTab('Root.Main', new UploadField("ConsumerPanelBanner"), 'Content');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("ConsumerPanelBannerLinkID", "Set Consumer Panel Banner image Link", "SiteTree"));


        $config = GridFieldConfig_RecordEditor::create();
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'FirstName' => 'FirstName',
            'LastName' => 'LastName',
            'Created' => 'Created'
        ));

       
        return $fields;
    }

    
}
class ConsumerPanelPage_Controller extends Page_Controller 
{


    private static $allowed_actions = array('ConsumerForm');

  
     public function ConsumerForm() {

            $fields = new FieldList(

                TextField::create("FirstName")->setAttribute('placeholder', 'First Name'),
                TextField::create("LastName")->setAttribute('placeholder', 'Last Name'),
                TextField::create("Phone")->setAttribute('placeholder', 'Phone'),
                EmailField::create("Email")->setAttribute('placeholder', 'Email'),
                TextField::create("Address")->setAttribute('placeholder', 'Address')->setAttribute('id', 'address2_line_1')
                ->setAttribute('class','text addy-2-line1'),
                TextField::create("Suburb")->setAttribute('placeholder', 'Suburb')->setAttribute('id', 'suburb_2')
                    ->setAttribute('class','text addy-2-suburb'),
                TextField::create("City")->setAttribute('placeholder', 'City')->setAttribute('id', 'city_2')
                    ->setAttribute('class','text addy-2-city'),
                TextField::create("PostCode")->setAttribute('placeholder', 'Post Code')->setAttribute('id', 'postcode_2')
                    ->setAttribute('class','text addy-2-postcode'),
                ListboxField::create( $name = "Product", $title = "Product", $ListPageByTypeUniqueColumn('Product', 'ProductType'))->setAttribute('placeholder', 'products')
                    ->setMultiple(true));



            $actions = new FieldList(
                FormAction::create("doSubmitForm", 'SIGN ME UP!')
            );
            $required = new RequiredFields('FirstName','Email','LastName','Phone','PostCode','City','Suburb','Product');
            $form = new Form($this, 'ConsumerForm', $fields, $actions, $required);
            $form->setFormMethod('POST', true);
            return $form;
        }

     public function doSubmitForm($data, $form) 
    {
            
            $sendTo = $this->ReceiverEmail;
            $email = new Email();
            $email->setTo($sendTo);
            $email->setFrom($data['Email']);
            $email->setSubject($this->Subject);
            $message = "
                <p><strong>Name:</strong> {$data['FirstName']}</p>
                <p><strong>LAST Name:</strong> {$data['LastName']}</p>
                <p><strong>Email:</strong> {$data['Email']}</p>
                <p><strong>Phone:</strong> {$data['Phone']}</p>
                <p><strong>Address:</strong> {$data['Address']}</p>
                 <p><strong>Suburb:</strong> {$data['Suburb']}</p>
                <p><strong>City:</strong> {$data['City']}</p>
                <p><strong>PostCode:</strong> {$data['PostCode']}</p>
                 <p><strong>Product:</strong> {$data['Product']}</p>
             
            ";
            $email->setBody($message);
            $email->send();

            // Create a record in the DB
            $submission = ConsumerDetail::create();
            $form->saveInto($submission);
            $submission->write();

            //Grab success message from $this page and redirect back
            $thx = $this->Reply;
            $form->sessionMessage($thx, 'Reply');
            return $this->redirectBack();

            Controller::curr()->redirectBack();
        }
    
   
  

   
 
    
   
}









