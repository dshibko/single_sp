<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" forms stored under 'protected/views/site/forms'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->redirect('projects');
	}

    public function actionProjects($do = false, $id = false)
    {
        if (empty($do)) {
            $projectsModel = new Projects();
            $projects = $projectsModel->with('appClub')->findAll();

            return $this->render('projects', array('projects' => $projects));
        } else {
            if (!empty($id) && (int)$id == 0) {
                return $this->redirect('/projects');
            }
            switch ($do) {
                case 'add':
                case 'edit':
                    $post = Yii::app()->request->getPost('projects');
                    $form = $this->editProject($id, $post);
                    return $this->render('projectsEdit', array('form' => $form));
                    break;
                default:
                    return $this->redirect('/projects');
                    break;
            }
        }
    }

    protected function editProject($id = false, $post = false)
    {
        $projectsForm = new ProjectsForm();
        $projectsModel = new Projects();

        if (!empty($post)) {
            $projectsForm->attributes = $post;
            if ($projectsForm->validate()) {
                $project = !empty($id) ? $projectsModel->findByPk($id) : $projectsModel;
                $project->attributes = $post;
                if ($project->save(true)) {
                    return $this->redirect('/projects');
                }
            }
        } else {
            $project = !empty($id) ? $projectsModel->findByPk($id) : $projectsModel;
            if (!empty($project)) {
                $projectsForm->attributes = $project->attributes;
            }
        }
        $form = new CForm($projectsForm->getElements(), $projectsForm);

        return $form;
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}