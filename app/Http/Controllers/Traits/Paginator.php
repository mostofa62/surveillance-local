<?php

namespace App\Http\Controllers\Traits;

trait Paginator{

	public  function arrayPaginator($array,
	 $request,
	 $perPage = 10)
    {
        
        $page = $request->get('page', 1);
        //$perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        return new \Illuminate\Pagination\LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }

}