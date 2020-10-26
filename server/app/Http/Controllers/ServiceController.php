<?php

namespace App\Http\Controllers;
use App\Http\Resources\Service as ServiceResource;

use Illuminate\Http\Request;
class ServiceController extends Controller
{
    //
    public function index() {
        $services = \DB::table('services')->get();
        return ServiceResource::collection($services);
    }
}
