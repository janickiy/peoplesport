<?php

namespace App\Nova\Fields\Trix;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StorePendingAttachment
{
    /**
     * @return Model
     */
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request)
    {
        $media = $this->model
            ->addMediaFromRequest('attachment')
            ->toMediaCollection();

        $media->model_type = get_class($this->model);
        $media->model_id = $request->draftId;
        $media->save();

        return $media->getUrl();
    }
}
