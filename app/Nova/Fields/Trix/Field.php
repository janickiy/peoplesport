<?php

namespace App\Nova\Fields\Trix;

use Laravel\Nova\Fields\Trix;

class Field
{
    public static function makeWithModel($model, ...$arguments)
    {
        return (new Trix(...$arguments))
            ->attach(new StorePendingAttachment($model));


        /*
            ->attach(new StorePendingAttachment())
            ->detach(new DetachAttachment())
            ->delete(new DeleteAttachments())
            ->discard(new DiscardPendingAttachments());*/
    }
}
