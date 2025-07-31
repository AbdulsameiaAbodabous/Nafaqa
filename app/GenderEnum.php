<?php

namespace App;

enum GenderEnum: int
{
    case Male = 1;
    case Female = 2;

    public function label(): string
    {
        return match($this) {
            self::Male => 'Male',
            self::Female => 'Female',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::Male => 'primary',
            self::Female => 'pink',
        };
    }
}
