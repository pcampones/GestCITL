<?php
class SiteContropller extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
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

        $model = new ContactForm;
        $mail = new PHPMailer();
        $mail-> IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port=  587;
        $mail->SMTPAuth = true;
        $mail->Username = "citlleiria@gmail.com"; // Your Email Address
        $mail->Password = "citlleiriaa"; // Your Password
        $mail->SMTPSecure = 'tls'; // Check Your Server's Connections for TLS or SSL
     /*   $mail->From = "citlleiria@gmail.com";
  /*      $mail->FromName = $name;*/
   /*     $mail->Subject = $subject;*/
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

            if ($model->validate())

            {
				$mail = Yii::app()->Smtpmail;
				$mail->SetFrom('citlleiria@gmail.com', $model->name);
				$mail->Subject = $model->subject;
				$msg = $model->body . '<br />' . $model->email . '<br/>' . $model->name;
				$mail->MsgHtml($msg);
				$mail->CharSet = "UTF-8";
				$mail->AddAddress('citlleiria@gmail.com', "Citl Leiria");
				$mail->AddAddress($model->email, "Citl Leiria");
				if (!$mail->Send()) {
					Yii::app()->user->setFlash('error', 'Mail não enviado' . $mail->ErrorInfo);
					echo(var_dump($mail->ErrorInfo));
					return $mail->ErrorInfo;
				} else {
					Yii::app()->user->setFlash('sucess', 'Mail enviado');
					echo(var_dump($mail->ErrorInfo));
					return $mail->ErrorInfo;


				}
				echo(var_dump($mail->ErrorInfo));
				return $mail->ErrorInfo;

				$this->refresh();

			}
		}

		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login', array('model' => $model));
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
    /**
     *
     */

