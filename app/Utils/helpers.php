<?php

if ( ! function_exists('sort_by'))
{
	/**
	 * Add link sort
	 *
	 * @param  string   $route
	 * @param  string  $column
	 * @param  string   $body
	 * @return string
	 */
	function sort_by($route, $column, $body)
	{
		$icon = null;
		$request = Request::all();
		$request['sortBy'] = $column;

		if ((Request::get('sortBy') == $column)) {
			$request['direction'] = (Request::get('direction') == 'asc') ? 'desc' : 'asc';
			$icon = '<i class="fa fa-sort-'.strtolower($request['direction']).' fa-fw"></i>';
		}

		$link = link_to_route($route, $body, $request) . $icon;

		return $link;
	}
}