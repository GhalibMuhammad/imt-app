<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Libraries\BaseApi;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->base = env('API_URL');
        $this->client = new Client();
        $this->baseApi = new BaseApi();
    }

    public function authenticate(Request $request)
    {
        try {
            $url = $this->base . '/api/auth/login';

            $credentials = base64_encode($request->username.':'.$request->password);

            $response = $this->client->post($url, [
                'Authorization' => ['Basic '.$credentials],
                'form_params' => [
                    'email' => "admin@admin.com",
                    'password' => "Wikramaku242411!",
                ],
            ]);

            // $coba = auth()->guard('api')->attempt([$request->username,$request->password]);

            // dd($coba);

            Session::put('token', json_decode($response->getBody())->token);

        //    dd(Session::get("token"));
       
            $urlSiswa = '/api/user/get-siswa';
            $resSiswa = $this->baseApi->index($urlSiswa);
            $siswas = json_decode($resSiswa->getBody())->data;

            dd($siswas);
            // return view('admin.presences.create', compact('siswas'));
       



        } catch (\Exception $e) {
            throw $e;
        }

        // $auth = (new BaseApi)->
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}