<?php
namespace frontend\controllers;

use frontend\models\Call;
use frontend\models\Order;
use frontend\models\OrderForm;
use frontend\models\PhoneForm;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class FeedbackController extends Controller
{
    public $phoneForm;
    public $orderForm;

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionPhone()
    {
        $model = new PhoneForm();
        $this->phoneForm = $model;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $this->orderPhoneCall($model);

            Yii::$app->session->setFlash('success', 'Ваш запрос принят, наш специалист позвонит вам в ближайшее время.');

        } else {

            Yii::$app->session->setFlash('error', 'Во время запроса произошла ошибка, пожалуйста, убедитесь что вы отправляете корректную форму.');

        }

        return $this->redirect(Yii::$app->request->referrer);

    }
    
    public function actionOrder()
    {
        $model = new OrderForm();
        $this->orderForm = $model;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $this->order($model);

            Yii::$app->session->setFlash('success', 'Ваш заказ принят, наш специалист свяжется с вами в ближайшее время для уточнения деталей.');

        } else {

            Yii::$app->session->setFlash('error', 'Во время запроса произошла ошибка, пожалуйста, убедитесь что вы отправляете корректную форму.');

        }

        return $this->redirect(['site/home', '#' => "get-site"]);
    }

    private function orderPhoneCall(PhoneForm $model)
    {
        $call = new Call();
        $call->phone = $model->phone;
        return $call->save();
    }
    
    private function order(OrderForm $model)
    {
        $order = new Order();
        $order->phone = $model->phone;
        $order->email = $model->email;
        $order->body = $model->body;
        return $order->save();
    }
    
}
