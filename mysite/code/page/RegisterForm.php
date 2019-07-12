class RegisterForm extends Page {
    public function __construct($controller, $name) {
        $fields = new FieldList(
            TextField::create('FirstName'),
            TextField::create('Surname'),
            TextField::create('Email'),
            PasswordField::create('Password'),
            PasswordField::create('ConfirmPassword'),
            TextField::create('Username')

        );

        $actions = new FieldList(
            new FormAction('doRegister', 'Register')
        );

        $validator = new RequiredFields(
          'Email', 'Password', 'ConfirmPassword', 'Username'
        );

        parent::__construct($controller, $name, $fields, $actions, $validator);

        $this->disableSecurityToken();
    }

    public function doRegister($data, $form) {
        $group = Group::get()->filter('Title','Client')->first();
        $member = new Member();
        $form->saveInto($member);
        $password = $data['Password'];
        $member->changePassword($password);
        $member->addToGroupByCode('Administrators') // Or could be another group I setup e.g 'Students' etc;
        $member->write();
        $member->Groups()->add($group);

        return $this->controller->redirect($this->controller->Link('thanks'));
    }
}
class RegisterForm_Controller extends Page_Controller {

    
}

