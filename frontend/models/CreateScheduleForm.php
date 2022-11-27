<?php

namespace frontend\models;

use common\models\Workday;
use DateTimeZone;
use Exception;
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
    public $calendar_path;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','string'],
            ['default_work_length', 'number'],
            ['default_time_start', 'string'],
            [['name', 'default_work_length', 'default_time_start', 'calendar_path'], 'required', 'message' => 'Данное поле является обязательным'],
            ['calendar_path', 'file', 'extensions' => ['csv']],
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
        try {
            $csv = $this->parseCsv($filepath);
            $interval = new \DateInterval('P1D');
            $timezone = new DateTimeZone('Europe/Moscow');

            for($date = new \DateTime('now', $timezone); $date < new \DateTime("2025-01-01"); $date->add($interval)) {

                $day = $date->format('j');
                $month = $date->format('n');
                $year = $date->format('Y');

                if(!in_array($day,$csv[$year][$month])) {
                    $workday = new Workday();
                    $workday->date = $date->format("Y-m-d");
                    $workday->time_start = $this->default_time_start;
                    $workday->work_length = $this->default_work_length;
                    $workday->schedule_id = $this->schedule_id;
                    $workday->save();
                }
            }
        }
        catch (Exception $e) {
            return false;
        } finally {
            unlink($filepath);
        }

        return true;
    }

    public function upload()
    {
        $this->calendar_path = UploadedFile::getInstance($this, 'calendar_path');
        $schedule = new Schedule();
        $schedule->name = $this->name;

        if ($this->validate() && $schedule->save()) {
            $this->schedule_id = $schedule->schedule_id;
            if(!is_dir('uploads/calendars'))
                mkdir('uploads/calendars', 0777, true);
            $filepath = 'uploads/calendars/' . $this->calendar_path->baseName . '-' . time() . '.' . $this->calendar_path->extension;
            if($this->calendar_path->saveAs($filepath) && $this->setWorkdaysFromFile($filepath))
                return true;
        }
        return false;
    }
}