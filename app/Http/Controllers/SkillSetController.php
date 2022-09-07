<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SkillSets;
use App\Models\Skills;
use App\Models\Candidates;

class SkillSetController extends BaseController
{
    public function store() {
    	$candidate = Candidates::find(\request('candidate_id'));
    	$skill = Skills::find(\request('skill_id'));

    	$skillSet = new SkillSets();
    	$skillSet->candidate_id	= $candidate->id;
    	$skillSet->skill_id 	= $skill->id;

    	if($skillSet->save() == true) {
    		return $this->out(
    			data: $skillSet,
    			status: 'OK',
    			code: 201
    		);
    	} else {
    		return $this->out(
    			status: 'Gagal',
    			error: ['gagal menyimpan'],
    			code: 504
    		);
    	}
    }
}
