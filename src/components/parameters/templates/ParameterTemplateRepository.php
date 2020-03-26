<?php
namespace extas\components\parameters\templates;

use extas\components\repositories\Repository;
use extas\components\templates\Template;
use extas\interfaces\parameters\templates\IParameterTemplateRepository;

/**
 * Class ParameterTemplateRepository
 *
 * @deprecated Please, use jeyroik/extas-samples instead.
 * @package extas\components\parameters
 * @author jeyroik@gmail.com
 */
class ParameterTemplateRepository extends Repository implements IParameterTemplateRepository
{
    protected string $itemClass = Template::class;
    protected string $name = 'parameters_templates';
    protected string $pk = Template::FIELD__NAME;
    protected string $scope = 'extas';
}
