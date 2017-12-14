<?php

class Commit
{
    public $init = [
        'start_time' => [
            'year'  => 2017,
            'month' => 9,
            'day'   => 29,
        ],

        'end_time' => [
            'year'  => 2017,
            'month' => 12,
            'day'   => 15,
        ],

        'repository_url' => false,

        'max_count' => 10,

        'min_count' => 1,
    ];

    public function run()
    {
        if ($this->init['repository_url']) {
            system("sudo git init");
            system('sudo git remote add origin ' . $this->init['repository_url']);
        }

        while (true) {
            $this->checkRun();
            $this->setSystemTime($this->getStartTime());

            $rand = rand($this->init['min_count'], $this->init['max_count']);

            for ($i = 0; $i < $rand; $i ++) {
                file_put_contents('./commit.text', $this->str_random(200));
                system('sudo git add .');
                system('sudo git commit -m "first commit"');
            }
            unset($i);
            $this->addDate();
        }
    }

    public function checkRun()
    {
        if ($this->getStartTime() >= $this->getEndTime()) {
            system('sudo git push -u origin master');
            echo('operation over :)');
            exit();
        }
    }

    public function getStartTime()
    {
        return strtotime(implode('/', array_values($this->init['start_time'])));
    }

    public function getEndTime()
    {
        return strtotime(implode('/', array_values($this->init['end_time'])));
    }

    public function setSystemTime($date)
    {
        $y       = date('Y', $date);
        $m       = date('m', $date);
        $d       = date('d', $date);
        $h       = date('H', $date);
        $i       = date('i', $date);
        $strTime = $m . $d . $h . $i . $y;
        system("sudo date {$strTime}");
    }

    function str_random($length = 8)
    {
        $chars  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|";
        $string = '';
        for ($i = 0; $i < $length; $i ++) {
            $string .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $string;
    }

    public function addDate()
    {
        $date                     = $this->getStartTime() + 24 * 60 * 60;
        $this->init['start_time'] = [
            'year'  => date('Y', $date),
            'month' => date('m', $date),
            'day'   => date('d', $date),
        ];
    }
}

$commit = new Commit();

$commit->run();
