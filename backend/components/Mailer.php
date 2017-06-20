<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 20.06.17
 * Time: 7:57
 */

namespace backend\components;

use Yii;
use backend\models\Companies;
use backend\models\State;
use backend\models\Task;
use common\components\MailHelper;

class Mailer
{
    public function run() {
        $tasks = Task::find()
            ->where(['status' => Task::STATUS_ACTIVE]);
        
        if ($tasks->count() > 0) {
            foreach ($tasks->all() as $task) {
                $this->handleTask($task);
            }
        }
    }
    
    private function handleTask(Task $task)
    {
        //Rate
        $rate = $task->rate;

        $states = $task->states;

        $ids = [];

        foreach ($states as $state) {
            $ids[] = $state->company_id;
        }

        $ids = array_unique($ids);

        //Взять $rate записей из Companies, id которых нет в $ids
        $companies = Companies::find()
            ->where(['not in', 'id', $ids])
            ->andWhere(['not', ['email' => null]])
            ->andWhere(['site' => null])
            ->limit($rate);

        if ($companies->count() > 0) {
            echo $task->name . PHP_EOL;
            
            foreach ($companies->all() as $company) {
                $this->handleCompany($task, $company);
            }
        } else {
            $task->status = Task::STATUS_COMPLETE;
            $task->save();
        }
    }

    private function handleCompany(Task $task, Companies $company)
    {
        echo $company->name . PHP_EOL;
        
        if (empty($company->email)) {
            return;
        }

        $status = State::STATUS_ERROR;

        if ($this->sendMail($company,$task->subject, $task->content)) {
            $status = State::STATUS_COMPLETE;
        }

        $state = new State();
        $state->company_id = $company->id;
        $state->task_id = $task->id;
        $state->status = $status;
        $state->save();
    }

    private function sendMail(Companies $company, $subject, $content)
    {
        $from = Yii::$app->params['supportEmail'];

        echo 'Sending letter: ' . $company->name . ' from ' . $from . PHP_EOL;

        $emails = explode(',', $company->email);
        
        $result = true;

        foreach ($emails as $email) {
            $to = trim($email);

            echo '--to ' . $to . PHP_EOL;

            $res = MailHelper::sendMail($from, $to, $subject, $content);

            $result = ($result) ? $res : $result;
            
        }
        
        return $result;
    }
}