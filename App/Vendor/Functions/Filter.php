<?php
/**
 * Sanitize String
 * @param string $data
 * @return mixed
 */
 function string($data)
{
    if (isString($data))
        return filter_var($data, FILTER_SANITIZE_STRING);
    else
        return false;
}

/**
 * @param $data
 * @return bool
 */
 function isString($data)
{
    return is_string($data);
}

/**
 * @param int $data
 * @return int
 */
 function int($data)
{
    if (isInt($data))
        return filter_var($data, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);
    else
        return false;
}

/**
 * @param int $data
 * @return bool
 */
 function isInt($data)
{
    return is_numeric($data);
}

/**
 * @param string $data
 * @return string
 */
 function email(string $data)
{
    if (isEmail($data))
        return filter_var($data, FILTER_SANITIZE_EMAIL);
    else
        return false;
}

/**
 * @param string $data
 * @return bool
 */
 function isEmail(string $data)
{
    return filter_var(($data), FILTER_VALIDATE_EMAIL);
}

/**
 * @param string $data
 * @return string
 */
 function url( $data)
{
    if (isUrl($data))
        return filter_var($data,FILTER_SANITIZE_URL);
    else
        return false;
}

/**
 * @param string $data
 * @return bool
 */
 function isUrl(string $data)
{
    return filter_var(($data), FILTER_VALIDATE_URL);
}

/**
 * @param $data
 * @return string
 */
 function html($data)
{
    return htmlspecialchars($data);
}


/**
 * @param $data
 * @return string
 */
 function htmlToString($data)
{
    return htmlentities(String($data));
}


/**
 * @param $data
 * @param string $filter
 * @return mixed
 */
 function spaceToMains($data, $filter = "string")
{
    if ($filter == "int")
        return str_replace(' ','-',int($data));
    else
        return str_replace(' ','-',String($data));
}

/**
 * @param $data
 * @return mixed
 */
function bool($data)
{
    return String(is_bool($data));
}

/**
 * @param $data
 * @return bool
 */
function is_empty($data)
{
    return is_null($data);
}


/**
 * @param $data
 * @return bool
 */
function isArray($data)
{
    $data = String($data);
    return is_array($data);
}
