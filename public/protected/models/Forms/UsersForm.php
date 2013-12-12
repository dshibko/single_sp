<?php


class UsersForm extends CFormModel
{
	public $email;
	public $display_name;
	public $password;
	public $role_id;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('email, display_name, password, role_id', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'email'        => 'Email',
            'display_name' => 'Display Name',
            'password'     => 'Password',
            'role_id'      => 'Role',
		);
	}

    public function getElements()
    {
        return array(
            'elements'=>array(
                'email'=>array(
                    'type'=>'email',
                    'id'=>'email',
                    'maxlength'=>32,
                    'minlength'=>5,
                ),
                'display_name'=>array(
                    'type'=>'text',
                    'id'=>'display_name',
                    'maxlength'=>32,
                    'minlength'=>3,
                ),
                'password'=>array(
                    'type'=>'text',
                    'id'=>'password',
                    'maxlength'=>32,
                    'minlength'=>6,
                ),
                'role_id'=>array(
                    'type'=>'dropdownlist',
                    'id'=>'role_id',
                    'items'=>Role::model()->getAllRoles(),
                    'prompt'=>'Choose User Role'
                ),
            ),

            'buttons'=>array(
                'save'=>array(
                    'type'=>'submit',
                    'label'=>'Save',
                ),
                'cancel'=>array(
                    'type'=>'button',
                    'label'=>'Cancel',
                ),
            ),
        );
    }

}