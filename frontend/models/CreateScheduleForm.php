<?php

namespace frontend\models;

use yii\base\Model;
use common\models\Schedule;
use yii\web\UploadedFile;

class CreateScheduleForm extends Model
{

    public $schedule_id;
    public $name;
    public $default_work_length;

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
            ['name', 'required']
        ];
    }

    public function setWorkdaysFromFile($filepath)
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

                for($j = 1; $j < count($line); $j++) {
                    $days = explode(',', $line[$j]);
                    $csv[$year][$j] = [];
                    $csv[$year][$j] = array_merge($csv[$year][$j], $days);
                }

            }
        }
        fclose($stream);
        return $csv;
    }

    public function upload()
    {
        $schedule = new Schedule();
        if ($this->validate()) {
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