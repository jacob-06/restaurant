<?php 

	class SignupForm extends Form 
		{
			public function build()
				{
					$this->addFormField('name');
					$this->addFormField('email');
					$this->addFormField('password');
					$this->addFormField('image');
					$this->addFormField('adress');
					$this->addFormField('phone');
					$this->addFormField('zip');
				}
		} 

?>