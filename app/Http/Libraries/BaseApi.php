<?php

namespace App\Http\Libraries;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class BaseApi
{
    protected $base;
    protected $token;

    public function __construct()
    {
        $this->base = "https://api-ra.smkwikrama.sch.id";
        $this->base = env('API_URL');
    }

    public function index(String $endpoint, Array $data = [])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function create(String $endpoint, Array $data = [])
    {
        return $this->client()->post($endpoint, $data);
    }

    private function client()
    {
        return Http::withHeaders(['api-token' => Session::get('token')])->baseUrl($this->base);
    }
}