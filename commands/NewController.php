<?php

namespace app\commands;

use app\models\Metrics;
use Codeception\Command\Console;
use yii\console\Controller;
use yii\console\ExitCode;

class NewController extends Controller
{

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    /**
     * This command echoes url content.
     * @param string $url the url to be echoed.
     * @return int Exit code
     */
    public function actionParse($url = "https://ru.wikipedia.org/wiki/Заглавная_страница")
    {
        $data = file_get_contents($url);
        preg_match("#<span class=\"mw\-headline\"[А-Яа-яЁё\-\w\d\s=\.\/:\"\']*>.*?<\/a>#imu", $data, $matches);

        /*
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($data);
        libxml_clear_errors();
        $tfa = $dom->getElementById("main-tfa");

        $tfaText = "";
        foreach ($tfa->getElementsByTagName("p") as $p) {
            $tfaText .= $p->nodeValue;
        }
        */
        echo strip_tags($matches[0]);



        return ExitCode::OK;
    }

    public function actionProgress()
    {
        $items = 10000;
        \yii\helpers\Console::startProgress(0, $items);

        for ($i = 0; $i < $items; $i++) {
            $metrics = new Metrics();
            $metrics->counter_id = rand(0, 9999);
            $metrics->date_create = time();
            $metrics->source_id = rand(0, 9999);
            $metrics->save();
            \yii\helpers\Console::updateProgress($i, $items);
        }
    }

}