<?php
namespace App\Statements;

class Status {
    const toDo = 'To do';
    const inProgress = 'In progress';
    const done = 'Done';
    const test = 'Test';
    const other = 'Other';


    public static function status()
    {
        return [
            self::toDo,
            self::inProgress,
            self::done,
            self::test,
            self::other
        ];
    }
}