<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Microsoft
 * @package    Microsoft_Log
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Log.php 22632 2010-07-18 18:30:08Z ramon $
 */

/**
 * @see Microsoft_AutoLoader
 */
require_once dirname(__FILE__) . '/AutoLoader.php';

/**
 * @category   Microsoft
 * @package    Microsoft_Log
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Log.php 22632 2010-07-18 18:30:08Z ramon $
 */
class Microsoft_Log
{
    const EMERG   = 0;  // Emergency: system is unusable
    const ALERT   = 1;  // Alert: action must be taken immediately
    const CRIT    = 2;  // Critical: critical conditions
    const ERR     = 3;  // Error: error conditions
    const WARN    = 4;  // Warning: warning conditions
    const NOTICE  = 5;  // Notice: normal but significant condition
    const INFO    = 6;  // Informational: informational messages
    const DEBUG   = 7;  // Debug: debug messages

    /**
     * @var array of priorities where the keys are the
     * priority numbers and the values are the priority names
     */
    protected $_priorities = array();

    /**
     * @var array of Microsoft_Log_Writer_Abstract
     */
    protected $_writers = array();

    /**
     * @var array of Microsoft_Log_Filter_Interface
     */
    protected $_filters = array();

    /**
     * @var array of extra log event
     */
    protected $_extras = array();

    /**
     *
     * @var string
     */
    protected $_defaultWriterNamespace = 'Microsoft_Log_Writer';

    /**
     *
     * @var string
     */
    protected $_defaultFilterNamespace = 'Microsoft_Log_Filter';


    /**
     * Class constructor.  Create a new logger
     *
     * @param Microsoft_Log_Writer_Abstract|null  $writer  default writer
     */
    public function __construct(Microsoft_Log_Writer_Abstract $writer = null)
    {
        $r = new ReflectionClass($this);
        $this->_priorities = array_flip($r->getConstants());

        if ($writer !== null) {
            $this->addWriter($writer);
        }
    }

    /**
     * Factory to construct the logger and one or more writers
     * based on the configuration array
     *
     * @param  array $config
     * @return Microsoft_Log
     */
    static public function factory($config = array())
    {
        if (!is_array($config) || empty($config)) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Configuration must be an array');
        }

        $log = new Microsoft_Log;

        if (!is_array(current($config))) {
            $log->addWriter(current($config));
        } else {
            foreach($config as $writer) {
                $log->addWriter($writer);
            }
        }

        return $log;
    }


    /**
     * Construct a writer object based on a configuration array
     *
     * @param  array $spec config array with writer spec
     * @return Microsoft_Log_Writer_Abstract
     */
    protected function _constructWriterFromConfig($config)
    {
        $writer = $this->_constructFromConfig('writer', $config, $this->_defaultWriterNamespace);

        if (!$writer instanceof Microsoft_Log_Writer_Abstract) {
            $writerName = is_object($writer)
                        ? get_class($writer)
                        : 'The specified writer';
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception("{$writerName} does not extend Microsoft_Log_Writer_Abstract!");
        }

        if (isset($config['filterName'])) {
            $filter = $this->_constructFilterFromConfig($config);
            $writer->addFilter($filter);
        }

        return $writer;
    }

    /**
     * Construct filter object from configuration array or Microsoft_Config object
     *
     * @param  array $config
     * @return Microsoft_Log_Filter_Interface
     */
    protected function _constructFilterFromConfig($config)
    {
        $filter = $this->_constructFromConfig('filter', $config, $this->_defaultFilterNamespace);

        if (!$filter instanceof Microsoft_Log_Filter_Interface) {
             $filterName = is_object($filter)
                         ? get_class($filter)
                         : 'The specified filter';
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception("{$filterName} does not implement Microsoft_Log_Filter_Interface");
        }

        return $filter;
    }

    /**
     * Construct a filter or writer from config
     *
     * @param string $type 'writer' of 'filter'
     * @param array $config
     * @param string $namespace
     * @return object
     */
    protected function _constructFromConfig($type, $config, $namespace)
    {
        if (!is_array($config) || empty($config)) {
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Configuration must be an array');
        }

        $params    = isset($config[ $type .'Params' ]) ? $config[ $type .'Params' ] : array();
        $className = $this->getClassName($config, $type, $namespace);
        if (!class_exists($className)) {
            require_once 'Microsoft/Loader.php';
            Microsoft_Loader::loadClass($className);
        }

        $reflection = new ReflectionClass($className);
        if (!$reflection->implementsInterface('Microsoft_Log_FactoryInterface')) {
            require_once 'Zend/Log/Exception.php';
            throw new Microsoft_Log_Exception(
                'Driver does not implement Microsoft_Log_FactoryInterface and can not be constructed from config.'
            );
        }

        return call_user_func(array($className, 'factory'), $params);
    }

    /**
     * Get the writer or filter full classname
     *
     * @param array $config
     * @param string $type filter|writer
     * @param string $defaultNamespace
     * @return string full classname
     */
    protected function getClassName($config, $type, $defaultNamespace)
    {
        if (!isset($config[ $type . 'Name' ])) {
            require_once 'Zend/Log/Exception.php';
            throw new Microsoft_Log_Exception("Specify {$type}Name in the configuration array");
        }
        $className = $config[ $type . 'Name' ];

        $namespace = $defaultNamespace;
        if (isset($config[ $type . 'Namespace' ])) {
            $namespace = $config[ $type . 'Namespace' ];
        }

        $fullClassName = $namespace . '_' . $className;
        return $fullClassName;
    }

    /**
     * Class destructor.  Shutdown log writers
     *
     * @return void
     */
    public function __destruct()
    {
        foreach($this->_writers as $writer) {
            $writer->shutdown();
        }
    }

    /**
     * Undefined method handler allows a shortcut:
     *   $log->priorityName('message')
     *     instead of
     *   $log->log('message', Microsoft_Log::PRIORITY_NAME)
     *
     * @param  string  $method  priority name
     * @param  string  $params  message to log
     * @return void
     * @throws Microsoft_Log_Exception
     */
    public function __call($method, $params)
    {
        $priority = strtoupper($method);
        if (($priority = array_search($priority, $this->_priorities)) !== false) {
            switch (count($params)) {
                case 0:
                    /** @see Microsoft_Log_Exception */
                    require_once 'Microsoft_/Log/Exception.php';
                    throw new Microsoft_Log_Exception('Missing log message');
                case 1:
                    $message = array_shift($params);
                    $extras = null;
                    break;
                default:
                    $message = array_shift($params);
                    $extras  = array_shift($params);
                    break;
            }
            $this->log($message, $priority, $extras);
        } else {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Bad log priority');
        }
    }

    /**
     * Log a message at a priority
     *
     * @param  string   $message   Message to log
     * @param  integer  $priority  Priority of message
     * @param  mixed    $extras    Extra information to log in event
     * @return void
     * @throws Microsoft_Log_Exception
     */
    public function log($message, $priority, $extras = null)
    {
        // sanity checks
        if (empty($this->_writers)) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('No writers were added');
        }

        if (! isset($this->_priorities[$priority])) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Bad log priority');
        }

        // pack into event required by filters and writers
        $event = array_merge(array('timestamp'    => date('c'),
                                    'message'      => $message,
                                    'priority'     => $priority,
                                    'priorityName' => $this->_priorities[$priority]),
                              $this->_extras);

        // Check to see if any extra information was passed
        if (!empty($extras)) {
            $info = array();
            if (is_array($extras)) {
                foreach ($extras as $key => $value) {
                    if (is_string($key)) {
                        $event[$key] = $value;
                    } else {
                        $info[] = $value;
                    }
                }
            } else {
                $info = $extras;
            }
            if (!empty($info)) {
                $event['info'] = $info;
            }
        }

        // abort if rejected by the global filters
        foreach ($this->_filters as $filter) {
            if (! $filter->accept($event)) {
                return;
            }
        }

        // send to each writer
        foreach ($this->_writers as $writer) {
            $writer->write($event);
        }
    }

    /**
     * Add a custom priority
     *
     * @param  string   $name      Name of priority
     * @param  integer  $priority  Numeric priority
     */
    public function addPriority($name, $priority)
    {
        // Priority names must be uppercase for predictability.
        $name = strtoupper($name);

        if (isset($this->_priorities[$priority])
            || false !== array_search($name, $this->_priorities)) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Existing priorities cannot be overwritten');
        }

        $this->_priorities[$priority] = $name;
    }

    /**
     * Add a filter that will be applied before all log writers.
     * Before a message will be received by any of the writers, it
     * must be accepted by all filters added with this method.
     *
     * @param  int|Microsoft_Log_Filter_Interface $filter
     * @return void
     */
    public function addFilter($filter)
    {
        if (is_integer($filter)) {
            /** @see Microsoft_Log_Filter_Priority */
            require_once 'Microsoft/Log/Filter/Priority.php';
            $filter = new Microsoft_Log_Filter_Priority($filter);

        } elseif ($filter instanceof Microsoft_Config || is_array($filter)) {
            $filter = $this->_constructFilterFromConfig($filter);

        } elseif(! $filter instanceof Microsoft_Log_Filter_Interface) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception('Invalid filter provided');
        }

        $this->_filters[] = $filter;
    }

    /**
     * Add a writer.  A writer is responsible for taking a log
     * message and writing it out to storage.
     *
     * @param  mixed $writer Microsoft_Log_Writer_Abstract or Config array
     * @return void
     */
    public function addWriter($writer)
    {
        if (is_array($writer)) {
            $writer = $this->_constructWriterFromConfig($writer);
        }

        if (!$writer instanceof Microsoft_Log_Writer_Abstract) {
            /** @see Microsoft_Log_Exception */
            require_once 'Microsoft/Log/Exception.php';
            throw new Microsoft_Log_Exception(
                'Writer must be an instance of Microsoft_Log_Writer_Abstract'
                . ' or you should pass a configuration array'
            );
        }

        $this->_writers[] = $writer;
    }

    /**
     * Set an extra item to pass to the log writers.
     *
     * @param  $name    Name of the field
     * @param  $value   Value of the field
     * @return void
     */
    public function setEventItem($name, $value)
    {
        $this->_extras = array_merge($this->_extras, array($name => $value));
    }
}
