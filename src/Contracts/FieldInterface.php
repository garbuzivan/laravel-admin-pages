<?php

namespace GarbuzIvan\LaravelPages\Contracts;

use Closure;
use Illuminate\Database\Schema\Blueprint;

interface FieldInterface
{
    /**
     * Получить название поля
     *
     * @access public
     * @return string
     */
    public function getName(): string;

    /**
     * Получить заголовок поля
     *
     * @access public
     * @return string
     */
    public function getTitle(): string;

    /**
     * Получить содержимое поля
     *
     * @access public
     * @return mixed
     */
    public function getValue();

    /**
     * Генерация поля
     *
     * @param $table
     * @param Closure $next
     * @return Blueprint
     */
    public function migration(Blueprint $table, Closure $next): Blueprint;

    /**
     * Формирование Factory для поля
     *
     * @param array $seed
     * @return array
     */
    public function seed(array $seed) : array;

    /**
     * Правила заполнения поля
     *
     * @param $rules
     * @return array
     */
    public function rules(array $rules) : array;

    /**
     * Текст ошибок валидации поля
     *
     * @param array $message
     * @return array
     */
    public function validateMessage(array $message) : array;
}
