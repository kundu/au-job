<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\JobPostResource;
use App\Models\JobPost;
use App\Service\JobPostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JobPostController extends BaseController
{

    private $baseController;
    private $jobPostService;

    function __construct(BaseController $baseController, JobPostService $jobPostService)
    {
        $this->baseController = $baseController;
        $this->jobPostService = $jobPostService;

    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $jobs = $this->jobPostService->getJobs($request);
            return $this->baseController->sendResponse(200, true, JobPostResource::collection($jobs), "Job List");
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->sendResponse(500, false, [], 'Internal Server Error. Please inform admin to check log file.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title'       => 'required|string|max:254',
                'description' => 'required|string|max:10000',
                'rate'        => 'required|numeric',
                'country_id'  => 'required|exists:countries,id',
                'location_id' => 'required|exists:locations,id',
                'status'      => 'sometimes|in:' . JobPost::STATUS_ENABLE . ',' . JobPost::STATUS_DISABLE
            ]);

            if ($validator->fails()) {
                return $this->baseController->sendResponse(422, false, $validator->errors(), 'Invalid input',);
            }

            $job = $this->jobPostService->storeJob($request);
            return $this->baseController->sendResponse(200, true, $job, "Job created successfully");
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->sendResponse(500, false, [], 'Internal Server Error. Please inform admin to check log file.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title'       => 'required|string|max:254',
                'description' => 'required|string|max:10000',
                'rate'        => 'required|numeric',
                'country_id'  => 'required|exists:countries,id',
                'location_id' => 'required|exists:locations,id',
                'status'      => 'sometimes|in:' . JobPost::STATUS_ENABLE . ',' . JobPost::STATUS_DISABLE
            ]);

            if ($validator->fails()) {
                return $this->baseController->sendResponse(422, false, $validator->errors(), 'Invalid input',);
            }

            $job = $this->jobPostService->updateJob($request, $id);
            if($job){
                return $this->baseController->sendResponse(200, true, $job, "Job Updated successfully");
            }
            return $this->baseController->sendResponse(404, true, null, "Job not found");
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->sendResponse(500, false, [], 'Internal Server Error. Please inform admin to check log file.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
