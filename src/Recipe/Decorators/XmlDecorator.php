<?php
/**
 * Recipe - A recipe manager
 *
 * @author      Mikhail Leonov <mikecommon@gmail.com>
 * @copyright   (c) Mikhail Leonov
 * @link        https://github.com/mikhail-leonov/recipe
 * @license     MIT
 */

namespace Recipe\Decorators;

use \Recipe\Utils\Util;
use \Recipe\Utils\Array2XML;
use \Recipe\Abstracts\AbstractDecorator;
use \Recipe\Interfaces\DecoratorInterface;


/**
 * XML Class Decorator
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class XmlDecorator extends AbstractDecorator implements DecoratorInterface
{
    /**
     * Decorate
     *
     * @var stdClass $obj parameters
     *
     * @return string decorated Object
     */
    public function Decorate(\stdClass $obj) : string
    {
        $obj = Util::obj2arr($obj);
        $xml = Array2XML::createXML('root', $obj);
        return $xml->saveXML();
    }
}
