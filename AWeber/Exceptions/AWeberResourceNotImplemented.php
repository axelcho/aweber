<?php
namespace AWeber\Exceptions;

/**
 * Thrown when attempting to use a resource that is not implemented.
 *
 * @uses AWeberException
 * @package
 * @version $id$
 */
class AWeberResourceNotImplemented extends AWeberException {

    public function __construct($object, $value) {
        $this->object = $object;
        $this->value = $value;
        parent::__construct("Resource \"{$value}\" is not implemented on this resource.");
    }
}
