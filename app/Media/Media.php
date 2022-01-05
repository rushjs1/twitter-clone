<?php 
namespace App\Media;
use App\Media\MediaTypes;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{

    public function type()
    {
        return MimeTypes::type($this->mime_type);
    }
}