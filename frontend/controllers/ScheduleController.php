<?php

namespace frontend\controllers;

use common\models\Employee;
use common\models\Schedule;
use common\models\search\ScheduleSearch;
use common\models\Task;
use common\models\Workday;
use frontend\models\CreateScheduleForm;
use yii\base\ErrorException;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
{
    public int $interval_length = 30;

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Schedule models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schedule model.
     * @param int $schedule_id Schedule ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     * @throws Exception
     */
    public function actionView(int $schedule_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($schedule_id),
        ]);
    }

    public function actionGetEvents($schedule_id)
    {
        // Определение дефолтного значения дня расписания
        $default_day = Workday::findOne(['schedule_id' => $schedule_id,'default' => 1]);

        if(!$default_day)
            throw new Exception('No default days in schedule');

        // Задаем интервал для составления расписания (от даты создания расписания до текущей + 30 дней)
        $current_date = new \DateTime();
        $interval = new \DateInterval('P30D');
        date_add($current_date, $interval);
        $period = (new \DatePeriod(new \DateTime($default_day->date), new \DateInterval('P1D'), $current_date))
            ->getIterator();

        // Получение выходных и нестандартных дней
        $workdays = Workday::find()
            ->where(['default' => 0,]);

        if ($schedule_id)
            $workdays->andWhere(['schedule_id' => $schedule_id]);

        $workdays = ArrayHelper::index($workdays->all(), 'date');

        $events = [];

        foreach($period as $date) {
            $date = $date->format('Y-m-d');

            $day = $default_day;

            if($db_date = ArrayHelper::getValue($workdays, $date))

                if ($db_date->weekend)
                    continue;
                else
                    $day = $db_date;

            $event = [];
//            $event['title'] = $date;
            $event['start'] = $date.'T'.$day->time_start;
            $task_length = \DateInterval::createFromDateString($day->work_length.' hours');
            $event['end'] = $date.'T'.date_add(new \DateTime($day->time_start), $task_length)->format('H:i');
            $events[] = $event;
        }
        return json_encode($events);
    }

    /**
     * Creates a new Schedule model.else {
            $model->loadDefaultValues();
        }

     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CreateScheduleForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->upload()) {
                return $this->redirect(['view', 'schedule_id' => $model->schedule_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $schedule_id Schedule ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($schedule_id)
    {
        $model = $this->findModel($schedule_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'schedule_id' => $model->schedule_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $schedule_id Schedule ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     */
    public function actionDelete($schedule_id)
    {
        $this->findModel($schedule_id)->delete();
        try {
            Workday::deleteAll(['schedule_id' => $schedule_id]);
            Employee::deleteScheduleId($schedule_id);
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $schedule_id Schedule ID
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($schedule_id)
    {
        if (($model = Schedule::findOne(['schedule_id' => $schedule_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
