<?php

require_once (__DIR__ . '/autoload.php');
spl_autoload_register("autoload");

use model\IntException as IntException;
use model\FloatException as FloatException;
use model\StringException as StringException;
use model\ArrayException as ArrayException;
use model\NullException as NullException;
use model\BooleanException as BooleanException;

/**
 * @throws IntException
 * @throws FloatException
 * @throws NullException
 * @throws ArrayException
 * @throws StringException
 * @throws BooleanException
 */
function calculate($value)
{
    if (is_int($value)) {
        throw new IntException();
    } else if (is_float($value)) {
        throw new FloatException();
    } else if (is_string($value)) {
        throw new StringException();
    } else if (is_null($value)) {
        throw new NullException();
    } else if (is_bool($value)) {
        throw new BooleanException();
    } else if (is_array($value)) {
        throw new ArrayException();
    } else {
        throw new Exception("Unknown type of value");
    }
}

try {
    $value = 5.50;
    calculate($value);
} catch (IntException) {
    echo "Значение int" . PHP_EOL;
} catch (FloatException) {
    echo "Значение float" . PHP_EOL;
} catch (StringException) {
    echo "Значение string" . PHP_EOL;
} catch (NullException) {
    echo "Значение null" . PHP_EOL;
} catch (BooleanException) {
    echo "Значение boolean" . PHP_EOL;
} catch (ArrayException) {
    echo "Значение array" . PHP_EOL;
}

spl_autoload_unregister("autoload");