<?php


use App\Services\Settings\Settings;

function _lang($text, $parameters = [])
{
    return __($text, $parameters);
}

function ___($text, $parameters = [])
{
    $translate = $text;
    $translates = \Cache::get("languages_admin_perm") ?? [];
    if (isset($translates[app()->getLocale()]['admin_translates'][$translate])) {
        $_translate = $translates[app()->getLocale()]['admin_translates'][$translate];
        if ($_translate) {
            $translate = $_translate;
        }
        foreach ($parameters as $key => $value) {
            $translate = str_replace(":{$key}", $value, $translate);
        }
    }
    return $translate;
}

/**
 * @param string|null $key
 * @return \App\Services\Settings\SettingsValues|null
 */
function settings(string $key = null)
{
    $settings = (resolve(Settings::class))->getSettings();
    return !is_null($key) ? (!isset($settings->{$key}) ? null : $settings->{$key}) : $settings;
}

/**
 * @param string $name
 *
 * @return string
 */
function route_return(string $name): string
{
    return route($name, ['return' => (isset($_GET['return']) ? $_GET['return'] : $_SERVER['REQUEST_URI'])]);
}

function arrayRecursiveDiff($aArray1, $aArray2, $section = null)
{
//    if($section === "orders") {
//        $excludes = [
//            "responsible", "company", "passanger", "status_name", "preliminary", "driver","title"
//        ];
//        foreach ($excludes as $exclude) {
//            if (array_key_exists($exclude, $aArray1)) {
//                unset($aArray1[$exclude]);
//            }
//            if (array_key_exists($exclude, $aArray2)) {
//                unset($aArray2[$exclude]);
//            }
//        }
//    }
    $aReturn = array();
    foreach ($aArray1 as $mKey => $mValue) {
        if (array_key_exists($mKey, (array)$aArray2)) {
            if (is_array($mValue)) {
//                $aRecursiveDiff = arrayRecursiveDiff($mValue, $aArray2[$mKey]);
//                if (count($aRecursiveDiff)) { $aReturn[$mKey] = $aRecursiveDiff; }
            } else {
                if ($mValue != $aArray2[$mKey]) {
                    $aReturn[$mKey] = $mValue;
                }
            }
        } else {
            $aReturn[$mKey] = $mValue;
        }
    }
    return $aReturn;
}

/**
 * @return string
 */
function getReturn(): string
{
    return (isset($_GET['return']) ? $_GET['return'] : $_SERVER['REQUEST_URI']);
}

/**
 * @param string $name
 *
 * @return string
 */
function getRouteReturn(string $name = 'home'): string
{
    return (request()->get('return')) ? request()->get('return') : route($name);
}

/**
 * Add 'is-active' class (as parameter) if given boolean is true.
 *
 * @param bool $boolean
 * @param bool $withClass
 */
function isActive(bool $boolean, bool $asParameter = true): void
{
    if ($boolean) {
        echo ($asParameter) ? 'class="active"' : ' active';
    }
}

function isShow(bool $boolean, bool $asParameter = true): void
{
    if ($boolean) {
        echo ($asParameter) ? 'class="show"' : ' show';
    }
}

function isNotify(bool $boolean)
{
    if ($boolean) {
        return ' id=notify';
    }
    return '';
}

/**
 * Meger giver array with User's ID.
 *
 * @param array $attributes
 *
 * @return array
 */
function appendUserId(array $attributes): array
{
    return array_merge($attributes, ['user_id' => auth()->id()]);
}

/**
 * Return array of  not empty $_GET parameters
 *
 * @return array
 */
function getNotEmptyQueryParameters(): array
{
    $parameters = [];

    if (count($_GET)) {
        foreach ($_GET as $key => $value) {
            if ($value !== "") {
                $parameters[$key] = $value;
            }
        }
    }

    return $parameters;
}

function getClassName(object $class)
{
    $_class = explode("\\", get_class($class));
    return [strtolower(end($_class)) => $class];
}

function isAccordionActive(array $routes, array $lists)
{
    foreach ($routes as $route) {
        if (in_array($route, $lists)) {
            return [
                'show' => 'show',
                'expanded' => 'true',
                'class' => 'dropdown-toggle',
            ];
        }
    }
    return [
        'show' => '',
        'expanded' => 'false',
        'class' => 'dropdown-toggle collapsed',
    ];
}

function fractional_time($number)
{
    if (is_null($number) || $number === 0) {
        $number = 30;
    }
    $result = $number - floor($number);
    $timer = now()->copy()->addMinutes(floor($number));
    if ($result > 0) {
        $timer = $timer->addSeconds($result * 60);
    }
    return $timer;
}

function authorized()
{
    return auth()->check() || auth('api')->check();
}

function user()
{
    if (auth()->user()) {
        return auth()->user();
    }
    if (auth('api')->user()) {
        return auth('api')->user();
    }
    return null;
}