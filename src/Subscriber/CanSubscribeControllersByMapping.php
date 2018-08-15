<?php

/**
 * Trait CanSubscribeControllersByMapping
 *
 * @method static array getControllerMapping()
 */
trait CanSubscribeControllersByMapping
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        $controllerPaths = array_keys(self::getControllerMapping());

        $result = [];

        foreach ($controllerPaths as $controllerPath) {
            $result['Enlight_Controller_Dispatcher_ControllerPath_' . $controllerPath] = 'returnControllerPath';
        }

        return $result;
    }

    /**
     * @param Enlight_Event_EventArgs $args
     *
     * @return string
     */
    public function returnControllerPath(Enlight_Event_EventArgs $args)
    {
        $prefix = 'Enlight_Controller_Dispatcher_ControllerPath_';

        if (strpos($args->getName(), $prefix) === 0) {
            $key = substr($args->getName(), strlen($prefix));
            $mapping = self::getControllerMapping();

            if (array_key_exists($key, $mapping)) {
                return $mapping[$key];
            }
        }

        return null;
    }
}
