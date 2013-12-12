<?php

class SiteController extends Controller
{

	public function init()
	{
        if (Yii::app()->user->getIsGuest() && Yii::app()->request->pathInfo != 'login') {
            return $this->redirect('/login');
        }
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
                case 'view':
                    $post = Yii::app()->request->getPost('projects');
                    $form = $this->editProject($id, $post, $do);
                    return $this->render('projectsEdit', array('form' => $form, 'do' => $do));
                    break;
                default:
                    return $this->redirect('/projects');
                    break;
            }
        }
    }

    protected function editProject($id = false, $post = false, $do = 'add')
    {
        $projectsForm = new ProjectsForm();
        $projectsModel = new Projects();

        if (!empty($post)) {
            $projectsForm->attributes = $post;
            $projectsForm->favicon = $_FILES['projects'];
            if ($projectsForm->validate()) {
                $project = !empty($id) ? $projectsModel->findByPk($id) : $projectsModel;
                $project->attributes = $post;
                $project->custom_styles = $post['custom_styles'];
                $project->project_url = preg_replace('#(http.*\:\/\/)#', '', trim($project->project_url, '/'));

                $project->favicon = '';
                if (!empty($_FILES['projects']) && $_FILES['projects']['error']['favicon'] == 0) {
                    $name = $_FILES['projects']['name']['favicon'];
                    $nameArr = explode('.', $name);
                    if (!in_array($nameArr[count($nameArr) - 1], $projectsForm->allowedFaviconTypes)) {
                        $projectsForm->addError('favicon', 'asd');
                    } else {
                        $imagePath = Yii::app()->basePath.'/../assets/fav'.$post['prefix'].'.png';
                        move_uploaded_file($_FILES['projects']['tmp_name']['favicon'], $imagePath);
                        $image = Yii::app()->image->load($imagePath);
                        $image->resize(30, 30);
                        $image->save();
                        $project->favicon = $post['prefix'].'-fav.png';
                    }
                }
                if ($project->save()) {
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

    public function actionUsers($do = false, $id = false)
    {
        if (empty($do)) {
            $userModel = new User();
            $users = $userModel->with('role')->findAll();

            return $this->render('users', array('users' => $users));
        } else {
            if (!empty($id) && (int)$id == 0) {
                return $this->redirect('/users');
            }
            switch ($do) {
                case 'add':
                case 'edit':
                case 'view':
                    $post = Yii::app()->request->getPost('user');
                    $form = $this->editUser($id, $post, $do);
                    return $this->render('usersEdit', array('form' => $form, 'edit' => $id, 'do' => $do));
                    break;
                default:
                    return $this->redirect('/users');
                    break;
            }
        }
    }

    protected function editUser($id = false, $post = false, $do = 'add')
    {
        $usersForm = new UsersForm();
        $userModel = new User();

        if (!empty($post)) {
            $usersForm->attributes = $post;
            if ($usersForm->validate()) {
                $user = !empty($id) ? $userModel->findByPk($id) : $userModel;
                $post['password'] = !empty($id) ? $post['password'] : crypt($post['password']);
                $user->attributes = $post;
                if ($user->save(false)) {
                    return $this->redirect('/users');
                }
            }
        } else {
            $user = !empty($id) ? $userModel->findByPk($id) : $userModel;
            if (!empty($user)) {
                $usersForm->attributes = $user->attributes;
            }
        }
        $form = new CForm($usersForm->getElements(), $usersForm);

        return $form;
    }
/*
    public function actionOpta()
    {
        $feedsFrequency = array('F1' => 86400, 'F40' => 43200, 'F7' => 300, 'F2' => 86400);
        $sourcePath = Yii::app()->params['sp_source_path'];

        $projects = Projects::model()->findAllByAttributes(array('created' => 1));

        foreach ($projects as $project) {
            $projectOpta = Opta::model()->findAllByAttributes(array('project_id' => $project->id));
            foreach ($projectOpta as $feed) {
                if ($feed->last_sync <= time() - $feedsFrequency[$feed->feed_type]) {
                    print_r(exec('cd '.$sourcePath.'; php public/index.php opta '.$feed->feed_type.' '.$project['project_url']));
                    $feed->last_sync = time();
                    $feed->save();
                }
            }
        }
        print_r($projects);
    }
*/
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

	public function actionLogin()
	{
		$model = new LoginForm;

		$post = Yii::app()->request->getPost('LoginForm');
		if(!empty($post))
		{
			$model->attributes = $post;
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		$this->renderPartial('login',array('model'=>$model));
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