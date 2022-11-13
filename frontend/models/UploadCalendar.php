<?php

namespace frontend\models;

use yii\base\Model;
use common\models\Schedule;
use yii\web\UploadedFile;

class UploadCalendar extends Model
{

    public $name;
    public $default_work_length;

    /**
     * @var UploadedFile $file
     */
    public $file;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','string','required']
        ];
    }

    public function setWorkdaysFromFile($filepath)
    {
        echo '<pre>';
        var_dump($filepath);
        echo '<pre>';
        exit;
    }

    public function save()
    {
        $schedule = new Schedule();
        if ($this->validate()) {
            $filepath = 'uploads/calendars/' . $this->file->baseName . '-' . time() . '.' . $this->file->extension;
            if($this->file->saveAs($filepath))
                $this->setWorkdaysFromFile($filepath);
        } else {
            return false;
        }

    }
}