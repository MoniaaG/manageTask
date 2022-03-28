<?php
namespace App\Statements;

class Priority {
    const low = 'low';
    const medium = 'medium';
    const high = 'high';

    public static function priority()
    {
        return [
            self::low,
            self::medium,
            self::high,
        ];
    }
}