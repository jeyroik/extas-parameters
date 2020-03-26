<?php
namespace extas\components\parameters;

use extas\interfaces\parameters\IHasParameters;
use extas\interfaces\parameters\IParameter;

/**
 * Trait THasParameters
 *
 * @property $config
 * @method getSubjectForExtension()
 *
 * @deprecated Please, use jeyroik/extas-samples instead.
 * @package extas\components\parameters
 * @author jeyroik@gmail.com
 */
trait THasParameters
{
    /**
     * @param bool $asArray return IParameter[] if false, return array of arrays otherwise
     *
     * @return IParameter[]|array
     */
    public function getParameters($asArray = false): array
    {
        $parameters = $this->config[IHasParameters::FIELD__PARAMETERS] ?? [];

        if (!$asArray) {
            $items = [];
            foreach ($parameters as $parameterData) {
                $parameter = new Parameter($parameterData);
                foreach ($this->getPluginsByStage($this->getSubjectForExtension() . '.parameter') as $plugin) {
                    $plugin($parameter);
                }
                $items[] = $parameter;
            }

            return $items;
        }

        return $parameters;
    }

    /**
     * @param IParameter[]|array $parameters
     *
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->config[IHasParameters::FIELD__PARAMETERS] = [];

        foreach ($parameters as $parameter) {
            $data = $parameter instanceof IParameter ? $parameter->__toArray() : $parameter;
            $this->config[IHasParameters::FIELD__PARAMETERS][] = $data;
        }

        return $this;
    }

    /**
     * @param string $name
     * @param IParameter|array $default
     * @param bool $asArray return IParameter if false, return array otherwise
     *
     * @return IParameter|array|null
     */
    public function getParameter($name, $default = null, $asArray = false)
    {
        $parameters = $this->config[IHasParameters::FIELD__PARAMETERS] ?? [];
        $byName = array_column($parameters, null, IParameter::FIELD__NAME);

        $parameter = $byName[$name] ?? [];

        if (empty($parameter)) {
            return $default;
        }

        return $asArray ? $parameter : new Parameter($parameter);
    }

    /**
     * @param string $name
     * @param IParameter|array $parameter
     *
     * @return $this
     */
    public function setParameter($name, $parameter)
    {
        $parameters = $this->config[IHasParameters::FIELD__PARAMETERS] ?? [];
        $byName = array_column($parameters, null, IParameter::FIELD__NAME);
        $byName[$name] = $parameter instanceof IParameter ? $parameter->__toArray() : $parameter;

        $this->config[IHasParameters::FIELD__PARAMETERS] = array_values($byName);

        return $this;
    }
}
