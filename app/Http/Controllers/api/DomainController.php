<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDomain;
use App\Http\Resources\DomainResource;
use App\Services\DomainService;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    protected $domainService;

    public function __construct(DomainService $domainService)
    {
        $this->domainService = $domainService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $domains = $this->domainService->getAllDomains();

        return DomainResource::collection($domains);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDomain $storeUpdateDomain)
    {
        $domains = $this->domainService->createNewDomain($storeUpdateDomain->validated());

        return new DomainResource($domains);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domains = $this->domainService->getDomain($id);

        return DomainResource::collection($domains);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDomain $request, $id)
    {
        $this->domainService->updateDomain($request->validated(),$id);

        return response()->json([
            'updated' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->domainService->deleteDomain($id);

        return response()->json(['delete'=>true],204);
    }
}
