<?php
class ContactPage extends Page {
	public static $has_one = array(
        'ContactDetail' => 'ContactDetails',
        'ContactBannerPageImage'=>'PageImage',
        'ContactBannerPageImageLink' => 'SiteTree'
    );
	public static $db = 
	array(
		'ReceiverEmail' => 'Varchar(50)',
		'Reply' => 'Varchar(500)',
        'Subject' => 'Varchar(500)',
		'GoogleMapShortCode' => 'HTMLText'
	);


	public function getCMSFields() 
	{
		$fields = parent::getCMSFields();
		
		$fields->addFieldToTab('Root.Main', new EmailField('ReceiverEmail'), 'Content');
		$fields->addFieldToTab('Root.Main', new TextareaField('Reply'), 'Content');
        $fields->addFieldToTab('Root.Main', new UploadField("ContactBannerPageImage"), 'Content');
        $fields->addFieldToTab('Root.Main', new TreeDropdownField("ContactBannerPageImageLinkID", "Set Contact Banner Page image Link", "SiteTree"));

        $fields->addFieldToTab("Root.GoogleMapShortCode", HtmlEditorField::create("GoogleMapShortCode", "Google Map ShortCode"));
          
		
		return $fields;
	}
}
class ContactPage_Controller extends Page_Controller {
	
    private static $allowed_actions = array('ContactForm','ContactDetails');
    public static $mail_sent = false;
   

 public function ContactForm()
      {
        
        $fields = new FieldList
        ( 
            TextField::create("Name")->setAttribute('placeholder', 'First Name'),
             EmailField::create("Email")->setAttribute('placeholder', 'Email'),
             TextField::create("Phone")->setAttribute('placeholder', 'Phone'),
             TextField::create("WhereDidYouFindUs")->setAttribute('placeholder', 'Where Did You Find Us'),
            TextAreaField::create("Message")->setAttribute('placeholder', 'Message')       
            
        ); 
    
      
          $actions = new FieldList(
                FormAction::create("doSubmitForm", 'SEND')
            );
            $required = new RequiredFields('Name','Email','Message','WhereDidYouFindUs','Phone');
            $form = new Form($this, 'ContactForm', $fields, $actions, $required);
           
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
                <p><strong>Name:</strong> {$data['Name']}</p>
                <p><strong>Email:</strong> {$data['Email']}</p>
                <p><strong>Phone:</strong> {$data['Phone']}</p>
                <p><strong>WhereDidYouFindUs:</strong> {$data['WhereDidYouFindUs']}</p>
                
                <p><strong>Message:</strong> {$data['Message']}</p>
            ";
            $email->setBody($message);
            $email->send();

            // Create a record in the DB
            $submission = ContactDetails::create();
            $form->saveInto($submission);
            $submission->write();

            //Grab success message from $this page and redirect back
            $thx = $this->Reply;
            $form->sessionMessage($thx, 'Reply');
            return $this->redirectBack();

            Controller::curr()->redirectBack();
        }
    

    
}

