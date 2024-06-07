<?php

namespace App\Enums;


/**
 * Перечисление статусов студента.
 */
enum StudentStatus: int
{
    /**
     * Статус активного студента.
     */
    case Active = 0;

    /**
     * Статус студента, который завершил обучение.
     */
    case Complete = 1;

    /**
     * Статус студента, который покинул учебное заведение.
     */
    case Left = 2;

    /**
     * Статус студента, признанного несоответствующим.
     */
    case Unsuitable = 3;

    /**
     * Статическое свойство для хранения описаний статусов.
     */
    // private  array $descriptionMap = [
    //     self::Active => 'Active',
    //     self::Complete => 'Complete',
    //     self::Left => 'Left',
    //     self::Unsuitable => 'Unsuitable',
    // ];

    /**
     * Получить описание статуса студента.
     *
     * @return string Описание статуса.
     */
    public function description()
    {
        /**
         * Статическое свойство для хранения описаний статусов. Всё равно нужно оптимизатсия
         */
        $descriptionMap = [
            self::Active => 'Active',
            self::Complete => 'Complete',
            self::Left => 'Left',
            self::Unsuitable => 'Unsuitable',
        ];

        return $descriptionMap[$this->value];
    }
}