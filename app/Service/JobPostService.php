<?php

namespace App\Service;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class JobPostService
{

    /**
     * get all active jobs
     *
     * @param Request $request
     * @return Collection
     */
     public function getJobs(Request $request) : Collection {
        $jobs = JobPost::with('country' , 'location')->whereStatus(JobPost::STATUS_ENABLE);

        $request->location_id ? $jobs->whereLocationId($request->location_id) : null;
        $request->keyword ? $jobs->where('description' , 'LIKE' , "%$request->keyword%") : null;

        $jobs = $jobs->orderBy('id', 'desc')->get();

        return $jobs;
    }


    /**
     * store new job
     *
     * @param Request $request
     * @return JobPost
     */
    public function storeJob(Request $request) : JobPost {
        $job              = new JobPost();
        $job->title       = $request->title;
        $job->description = $request->description;
        $job->rate        = $request->rate;
        $job->country_id  = $request->country_id;
        $job->location_id = $request->location_id;
        $job->status      = $request->status;
        $job->save();

        return $job;
    }


    /**
     * update job
     *
     * @param Request $request
     * @param integer $id
     * @return JobPost|null
     */
    public function updateJob(Request $request, int $id): JobPost | null {
        $job              = JobPost::find($id);
        if(!$job){
            return null;
        }
        $job->title       = $request->title;
        $job->description = $request->description;
        $job->rate        = $request->rate;
        $job->country_id  = $request->country_id;
        $job->location_id = $request->location_id;
        $job->status      = $request->status;
        $job->save();

        return $job;
    }
}
