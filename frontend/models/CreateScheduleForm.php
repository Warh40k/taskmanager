<?php

namespace frontend\models;

use common\models\Workday;
use DateTimeZone;
use yii\base\Model;
use common\models\Schedule;
use yii\web\UploadedFile;

class CreateScheduleForm extends Model
{

    public $schedule_id;
    public $name;
    public $default_work_length;
    public $default_time_start;

    /**
     * @var UploadedFile $calendar_path
     */
    public UploadedFile $calendar_path;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','string'],
            ['default_work_length', 'number'],
            ['default_time_start', 'string'],
            [['name', 'default_work_length', 'default_time_start'], 'required']
        ];
    }

    public function parseCsv($filepath)
    {
        $csv = [];

        if($stream = fopen($filepath, 'r')) {
            while($line = fgetcsv($stream)) {
                if(!intval($line[0])) {
                    continue;
                }

                $chars = ['+', '*'];
                $line = str_replace($chars, '', $line);
                $year = $line[0];

                if($year < date('Y'))
                    continue;

                for($month = 1; $month < count($line); $month++) {
                    $days = explode(',', $line[$month]);

                    $csv[$year][$month] = [];
                    $csv[$year][$month] = array_merge($csv[$year][$month], $days);
                }

            }
        }
        fclose($stream);
        return $csv;
    }

    public function setWorkdaysFromFile($filepath)
    {
        $csv = $this->parseCsv($filepath);
        $interval = new \DateInterval('P1D');
        $timezone = new DateTimeZone('Europe/Moscow');

        for($date = new \DateTime('now', $timezone); $date < new \DateTime("2025-01-01"); $date->add($interval)) {

            $day = $date->format('j');
            $month = $date->format('n');
            $year = $date->format('Y');

            if(!array_search($day,$csv[$year][$month])) {
                $workday = new Workday();
                $workday->date = $date->format("Y-m-d");
                $workday->time_start = $this->default_time_start;
                $workday->work_length = $this->default_work_length;
                $workday->schedule_id = $this->schedule_id;
                $workday->save();
            }
        }
    }

    public function upload()
    {
        $schedule = new Schedule();
        $schedule->name = $this->name;

        if ($this->validate() && $schedule->save()) {
            $this->schedule_id = $schedule->schedule_id;
            if(!is_dir('uploads/calendars'))
                mkdir('uploads/calendars', 0777, true);
            $filepath = 'uploads/calendars/' . $this->calendar_path->baseName . '-' . time() . '.' . $this->calendar_path->extension;
            if($this->calendar_path->saveAs($filepath))
                $this->setWorkdaysFromFile($filepath);
        } else {
            return false;
        }
    }
}