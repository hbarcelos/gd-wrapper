<?php
/**
 * Defines Abstract Action class.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Action;

use Hbarcelos\GdWrapper\Action\ResizeMode\Mode;
use Hbarcelos\GdWrapper\Resource\EmptyResourceFactory;
use Hbarcelos\GdWrapper\Resource\AbstractResourceFactory;
use Hbarcelos\GdWrapper\Resource\Resource;

/**
 * Abstraction for an action.
 */
abstract class AbstractAction implements Action
{
    
    /**
     * @var string The resource factory class name.
     */
    private $resourceFactoryClass;
    
    /**
     * @var Hbarcelos\GdWrapper\Resource\EmptyResourceFactory The resource factory.
     */
    private $resourceFactory;
    
    /**
     * Creates an action with the classname of a factory that might be needed to create resources
     * in the actions performed by the concrete classes.
     *
     * By default, if no `$resourceFactoryClass` is provided, will be created an instance of
     * `\Hbarcelos\GdWrapper\Resource\EmptyResourceFactory`.
     *
     * IMPORTANT: to apply actions on images with transparency, the factory should be an instance of
     * `\Hbarcelos\GdWrapper\Resource\TransparentResourceFactory`.
     *
     * @param string $resourceFactoryClass [OPTIONAL] The name of the class.
     */
    public function __construct($resourceFactoryClass = null)
    {
        if ($resourceFactoryClass === null) {
            $resourceFactoryClass = "\\Hbarcelos\\GdWrapper\\Resource\\EmptyResourceFactory";
        }
        $this->resourceFactoryClass = (string) $resourceFactoryClass;
    }

    /**
     * Obtains the resource factory;
     *
     * @param $width The width of the images that will be created by the factory
     *
     * @return Hbarcelos\GdWrapper\Resource\EmptyResourceFactory A resource factory.
     */
    public function getResourceFactory($width, $height)
    {
        if ($this->resourceFactory === null) {
            $reflection = new \ReflectionClass($this->resourceFactoryClass);
            $this->resourceFactory = $reflection->newInstance($width, $height);
        }
        return $this->resourceFactory;
    }
    
    /**
     * Sets the name of the resource factory class.
     * The class should be derived from '\Hbarcelos\GdWrapper\Resource\EmptyResourceFactory` or
     * must have the same assignature in the constructor.
     *
     * @param string $resourceFactory
     */
    public function setResourceFactoryClass($resourceFactoryClass)
    {
        $this->resourceFactoryClass = $resourceFactoryClass;
        $this->resourceFactory = null;
    }
    
    /**
     * Obtains the name of the resource factory class.
     *
     * return string The name of the class
     */
    public function getResourceFactoryClass()
    {
        return $this->resourceFactoryClass;
    }
}