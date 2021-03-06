<?php
declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2018 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Plugin;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("plugin")
 */
class Plugin
{
    /**
     * @var string class name of the plugin.
     *
     * @todo this serialized name is misleading, the (old) docs should be reviewed for accuracy
     *
     * @Serializer\Type("string")
     * @Serializer\XmlAttribute
     * @Serializer\SerializedName("path")
     */
    protected $className;

    /**
     * @Serializer\XmlList(entry = "parameter")
     * @Serializer\Type("array<phpDocumentor\Plugin\Parameter>")
     * @var Parameter[] parameters that are configured by the user
     */
    protected $parameters = [];

    /**
     * Initialize the plugin configuration definition with the given class name.
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Returns the class name for this plugin.
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Returns the parameters associated with this plugin.
     *
     * @return Parameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
