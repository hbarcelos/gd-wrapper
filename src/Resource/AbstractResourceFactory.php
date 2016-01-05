<?php
/**
 * Creates class \Hbarcelos\GdWrapper\Resource\AbstractResourceFactory.
 *
 * @author Henrique Barcelos
 */
namespace Hbarcelos\GdWrapper\Resource;

/**
 * Abstract factory for `\Hbarcelos\GdWrapper\Resource\Resource` types.
 */
abstract class AbstractResourceFactory
{
    /**
     * @var string Fully qualified name for the Resource interface
     */
    const RESOURCE_INTERFACE = '\\Hbarcelos\\GdWrapper\\Resource\\Resource';
    
    /**
     * @var string The fully qualified name of the class created by the factory.
     */
    private $className;
    
    /**
     * Allows subclasses to initialize default values for `$className`.
     *
     * @param string $className
     *
     * @throws \InvalidArgumentException If `$className` is not a valid class name.
     * @throws \InvalidArgumentException If `$className` is not instantiable.
     * @throws \DomainException If `$className` is not subclass of
     *     \Hbarcelos\GdWrapper\Resource\Resource.
     */
    protected function __construct($className)
    {
        $this->setClassName($className);
    }
    
    /**
     * Sets class name of products of this factory object.
     *
     * @param string $className
     *
     * @return void
     *
     * @throws \InvalidArgumentException If `$className` is not a valid class name.
     * @throws \InvalidArgumentException If `$className` is not instantiable.
     * @throws \DomainException If `$className` is not subclass of
     *     \Hbarcelos\GdWrapper\Resource\Resource.
     */
    final protected function setClassName($className)
    {
        try {
            $refl = new \ReflectionClass($className);
            if (!$refl->isInstantiable()) {
                throw new \InvalidArgumentException(
                    "Class '{$className}' is not instantiable"
                );
            }
            if (!$refl->implementsInterface(self::RESOURCE_INTERFACE)) {
                throw new \DomainException(
                    "Class '{$className}' is not a " . self::RESOURCE_INTERFACE . ' subclass'
                );
            }
        } catch (\ReflectionException $e) {
            throw new \InvalidArgumentException($e->getMessage(), $e->getCode(), $e);
        }
        
        $this->className = (string) $className;
    }
    
    /**
     * Obtains class name of this factory object.
     *
     * @return
     */
    final public function getClassName()
    {
        return $this->className;
    }
    
    /**
     * Creates a concrete instance of `\Hbarcelos\GdWrapper\Resource\Resource`.
     *
     * @return Hbarcelos\GdWrapper\Resource\Resource
     *
     * @throws \DomainException If factory cannot determine which type of resource to create.
     * @throws \LogicException If there is an error in creating the product, like
     *     wrong or missing parameters.
     */
    abstract public function create();
}
