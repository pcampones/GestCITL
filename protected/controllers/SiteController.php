<?php require '/../../protected/extensions/smtpmail/PHPMailer.php'?>
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
        $mail->Mailer="smtp";
        $mail->IsHTML(true);
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port=  587;
        $mail->SMTPAuth = true;
         $mail-> IsSMTP();
        $mail->Username = "pedrocampones2@gmail.com"; // Your Email Address
        $mail->Password = "pedro1908"; // Your Password
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

            if ($model->validate())

            {
				/*$mail = Yii::app()->Smtpmail;*/
				$mail->SetFrom($model->email, $model->name);
                $mail->FromName ="CITLLEIRIA";
				$mail->Subject = $model->subject;
				$msg = $model->body . '<br />' . $model->name;
				$mail->MsgHtml($msg);
				$mail->CharSet = "UTF-8";
				//$mail->AddAddress('citlleiria@gmail.com', "Citl11 Leiria");
				$mail->AddAddress($model->email, $model->name);


                if (!$mail->Send()) {
					Yii::app()->user->setFlash('insuccess', 'Email não enviado!');
				} else {
					Yii::app()->user->setFlash('success','Email enviado com sucesso!');

				}


				$this->refresh();

			}
		}

		$this->render('contact', array('model' => $model));
	}

	public function actionPagamentos()
	{
		//TODO: ALTERAR ESTE CODIGO DE ACORDO COM OS PAGAMENTOS

		$model = new PagamentosForm;
		/*
		$mail = new PHPMailer();
		$mail->Mailer="smtp";
		$mail->IsHTML(true);
		$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";
		$mail->Port=  587;
		$mail->SMTPAuth = true;
		$mail-> IsSMTP();
		$mail->Username = "citlleiria@gmail.com"; // Your Email Address
		$mail->Password = "citlleiriaa"; // Your Password
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

			if ($model->validate())

			{
				//$mail = Yii::app()->Smtpmail;
				$mail->SetFrom($model->email, $model->name);
				$mail->FromName ="CITLLEIRIA";
				$mail->Subject = $model->subject;
				$msg = $model->body . '<br />' . $model->name;
				$mail->MsgHtml($msg);
				$mail->CharSet = "UTF-8";
				//$mail->AddAddress('citlleiria@gmail.com', "Citl11 Leiria");
				$mail->AddAddress($model->email, $model->name);


				if (!$mail->Send()) {
					Yii::app()->user->setFlash('error', 'Mail não enviado' . $mail->ErrorInfo);

				} else {
					Yii::app()->user->setFlash('sucess', 'Mail enviado');
					echo var_dump(@$mail);
					return $mail->ErrorInfo;

				}


				$this->refresh();

			}
		}
		*/
		$this->render('pagamentos', array('model' => $model));
	}



	public function actionAgenda()
	{
		//TODO: ALTERAR ESTE CODIGO DE ACORDO COM A AGENDA

		$model = new AgendaForm;
		/*
		$mail = new PHPMailer();
		$mail->Mailer="smtp";
		$mail->IsHTML(true);
		$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";
		$mail->Port=  587;
		$mail->SMTPAuth = true;
		$mail-> IsSMTP();
		$mail->Username = "citlleiria@gmail.com"; // Your Email Address
		$mail->Password = "citlleiriaa"; // Your Password
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

			if ($model->validate())

			{
				//$mail = Yii::app()->Smtpmail;
				$mail->SetFrom($model->email, $model->name);
				$mail->FromName ="CITLLEIRIA";
				$mail->Subject = $model->subject;
				$msg = $model->body . '<br />' . $model->name;
				$mail->MsgHtml($msg);
				$mail->CharSet = "UTF-8";
				//$mail->AddAddress('citlleiria@gmail.com', "Citl11 Leiria");
				$mail->AddAddress($model->email, $model->name);


				if (!$mail->Send()) {
					Yii::app()->user->setFlash('error', 'Mail não enviado' . $mail->ErrorInfo);

				} else {
					Yii::app()->user->setFlash('sucess', 'Mail enviado');
					echo var_dump(@$mail);
					return $mail->ErrorInfo;

				}


				$this->refresh();

			}
		}
		*/
		$this->render('agenda', array('model' => $model));
	}



	public function actionListaAlunos()
	{
		//TODO: ALTERAR ESTE CODIGO DE ACORDO COM A LISTA DE ALUNOS

		$model = new ListaAlunosForm;
		/*
		$mail = new PHPMailer();
		$mail->Mailer="smtp";
		$mail->IsHTML(true);
		$mail->SMTPSecure = "tls";
		$mail->Host = "smtp.gmail.com";
		$mail->Port=  587;
		$mail->SMTPAuth = true;
		$mail-> IsSMTP();
		$mail->Username = "citlleiria@gmail.com"; // Your Email Address
		$mail->Password = "citlleiriaa"; // Your Password
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];

			if ($model->validate())

			{
				//$mail = Yii::app()->Smtpmail;
				$mail->SetFrom($model->email, $model->name);
				$mail->FromName ="CITLLEIRIA";
				$mail->Subject = $model->subject;
				$msg = $model->body . '<br />' . $model->name;
				$mail->MsgHtml($msg);
				$mail->CharSet = "UTF-8";
				//$mail->AddAddress('citlleiria@gmail.com', "Citl11 Leiria");
				$mail->AddAddress($model->email, $model->name);


				if (!$mail->Send()) {
					Yii::app()->user->setFlash('error', 'Mail não enviado' . $mail->ErrorInfo);

				} else {
					Yii::app()->user->setFlash('sucess', 'Mail enviado');
					echo var_dump(@$mail);
					return $mail->ErrorInfo;

				}


				$this->refresh();

			}
		}
		*/
		$this->render('listaALunos', array('model' => $model));

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

