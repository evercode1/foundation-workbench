<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Queries\GridQueries\GridQuery;

class ApiController extends Controller
{

    // Begin Tank Api Data Grid Method

    public function tankData(Request $request)
    {

        return GridQuery::sendData($request, 'TankQuery');

    }

    // End Tank Api Data Grid Method



    // Begin Widget Api Data Grid Method

    public function widgetData(Request $request)
    {

        return GridQuery::sendData($request, 'WidgetQuery');

    }

    // End Widget Api Data Grid Method

}