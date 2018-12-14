<?php

if (!function_exists('pages_folder')) {
    /**
     * @param null $path
     * @return string
     */
    function pages_folder($path = null)
    {
        return implode(DIRECTORY_SEPARATOR, array_filter([
            (config('autoview.pages_folder') ?: null),
            $path
        ]));
    }
}

if (!function_exists('autoview')) {
    /**
     * @param null $view
     * @param bool $ignoreBase
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function autoview($view = null, $ignoreBase = false)
    {
        if ($ignoreBase) {
            $path = $view;

        } else {

            $baseFolder = pages_folder();

            $currentAction = explode('@', class_basename(request()->route()->getActionName()));

            $path = implode('.', array_filter([
                $baseFolder,
                strtolower(str_replace('Controller', '', $currentAction[0])),
                $view ?: $currentAction[1]
            ]));
        }

        return view($path);
    }
}