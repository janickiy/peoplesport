<?php

namespace App\Nova\Fields\Trix;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PendingAttachment extends Model
{
    protected $table = 'pending_media';

    public static function persistDraft($draftId, $field, $model)
    {
        static::where('draft_id', $draftId)->get()->each->persist($field, $model);
    }

    public function persist($field, $model)
    {
        $media = new Media();
        $media->fill([
            //... $model ???
        ]);
        $media->model_type = $model->getMorphClass();
        $media->model_id = $model->getKey();
        $media->save();

        $this->delete();
    }

    public function purge()
    {
        $this->delete();
    }
}
