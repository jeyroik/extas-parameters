<?php
namespace extas\interfaces\parameters;

/**
 * Interface IHasParameters
 *
 * @package extas\interfaces\parameters
 * @author jeyroik@gmail.com
 */
interface IHasParameters
{
    public const FIELD__PARAMETERS = 'parameters';

    /**
     * @param bool $asArray return IParameter[] if false, return array of arrays otherwise
     *
     * @return IParameter[]|array
     */
    public function getParameters($asArray = false): array;

    /**
     * @param IParameter[]|array $parameters
     *
     * @return $this
     */
    public function setParameters($parameters);

    /**
     * @param string $name
     * @param IParameter|array $default
     * @param bool $asArray return IParameter if false, return array otherwise
     *
     * @return IParameter|array|null
     */
    public function getParameter($name, $default = null, $asArray = false);

    /**
     * @param string $name
     * @param IParameter|array $parameter
     *
     * @return $this
     */
    public function setParameter($name, $parameter);
}
