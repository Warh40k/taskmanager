<?php

namespace frontend\models;

use common\models\Employee;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $employee_id;
    public $username;
    public $email;
    public $password;
    public $employee;

    public $first_name;
    public $second_name;
    public $third_name;
    public $date_attempt;
    public $position;
    public $department;
    public $schedule;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'trim'],
            [['username','first_name', 'second_name','third_name','date_attempt', 'position','department', 'schedule', 'password'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Логин уже занят'],
            [['username', 'email', 'first_name', 'second_name', 'third_name'], 'string', 'min' => 2, 'max' => 255],

            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой адрес почты уже есть в системе'],

            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            [['employee', 'position', 'department', 'schedule'], 'integer'],
            ['employee', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой сотрудник уже зарегистрирован'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $employee = new Employee();

        $employee->first_name = $this->first_name;
        $employee->second_name = $this->second_name;
        $employee->third_name = $this->third_name;
        $employee->date_attempt = $this->date_attempt;
        $employee->position = $this->position;
        $employee->schedule = $this->schedule;
        $employee->department = $this->department;

        $employee->save();

        $this->employee_id = $employee->employee_id;

        $user->username = $this->username;
        $user->email = $this->email;
        $user->employee = $this->employee_id;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();



        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
