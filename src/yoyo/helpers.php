<?php

namespace Yoyo;

use Clickfwd\Yoyo\Services\Configuration;
use Clickfwd\Yoyo\Yoyo;

if (! function_exists('Yoyo\yoyo_render')) {
    function yoyo_render($name, $variables = [], $attributes = []): string
    {
        $yoyo = Yoyo::getInstance();

        return $yoyo->mount($name, $variables, $attributes)->render();
    }
}

function yoyo_scripts($return = false)
{
    $output = Configuration::scripts();
    if ($return) {
        return $output;
    }
    echo $output;
}

function yoyo_styles($return = false)
{
    $output = Configuration::styles();
    if ($return) {
        return $output;
    }
    echo $output;
}

function encode_vals($vals)
{
    echo \Clickfwd\Yoyo\YoyoHelpers::encode_vals($vals);
}

function is_spinning($expression = null)
{
    $request = Yoyo::request();

    if ($request->isYoyoRequest()) {
        if (! $expression) {
            return true;
        }

        echo $expression;
    } elseif (! $expression) {
        return false;
    }
}

function not_spinning($expression = null)
{
    $request = Yoyo::request();

    if (! $request->isYoyoRequest()) {
        if (! $expression) {
            return true;
        }

        echo $expression;
    } elseif (! $expression) {
        return false;
    }
}
