<?php
namespace extas\interfaces\parameters;

use extas\interfaces\IHasName;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\templates\IHasTemplate;

/**
 * Interface IParameter
 *
 * Абстрактная сущность, которая в обязательном порядке обладает следующими свойствами:
 * - имя
 * - значение
 *
 * @package extas\interfaces\services
 * @author jeyroik@gmail.com
 */
interface IParameter extends IItem, IHasName, IHasValue, IHasTemplate
{
    public const SUBJECT = 'extas.parameter';
}
