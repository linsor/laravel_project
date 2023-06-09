<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Faker\Provider\Base;
use Illuminate\Auth\Events\Validated;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request) {
        
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('post.index');
    }
}

