<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\SkillSets;
use App\Models\Skills;
use App\Models\Candidates;
use Carbon\Carbon;
use DB;

class ApplyController extends BaseController
{
    public function store() {
    	$job = Jobs::find(\request('job_id'));

    	if($job == null) {
    		return $this->out(
    			status: 'Gagal',
    			code: 404,
    			error: ['jabatan tidak ditemukan']
    		);
    	}

    	$emailValid = request('email');
    	if($emailValid == null) {
    		return $this->out(
    			status: 'Gagal',
    			code: 402,
    			error: ['email tidak boleh kosong']
    		);
    	}else if(!filter_var($emailValid, FILTER_VALIDATE_EMAIL)){
    		return $this->out(
    			status: 'Gagal',
    			code: 400,
    			error: ['penulisan email tidak benar']
    		);
    	}

    	$phoneValid = request('phone');
		if($phoneValid == null) {
    		return $this->out(
    			status: 'Gagal',
    			code: 402,
    			error: ['telpon tidak boleh kosong']
    		);
    	}else if(!filter_var($phoneValid, FILTER_SANITIZE_NUMBER_INT)){
    		return $this->out(
    			status: 'Gagal',
    			code: 400,
    			error: ['penulisan telpon tidak benar']
    		);
    	}  	

    	$candidate = new Candidates();
    	$candidate->job_id		= $job->id;
    	$candidate->name 		= request('name');
    	$candidate->email 		= request('email');
    	$candidate->phone 		= request('phone');
    	$candidate->year 		= request('year');
    	$candidate->created_by	= request('id');
    	$candidate->updated_by	= request('id');

    	if($candidate->save() == true) {
    		return $this->out(
    			data: $candidate,
    			status: 'OK',
    			code: 201
    		);
    	} else {
    		return $this->out(
    			status: 'Gagal',
    			error: ['gagal apply'],
    			code: 504
    		);
    	}
    }
}
