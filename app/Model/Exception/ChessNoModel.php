<?php

namespace app\Model\Exception;


class ChessNoModel extends \Exception
{
    protected $message = 'Шахматная позиция не найдена.';
}