<?php

namespace AmuzThemes\ApplicationInstall\Models;

use App\Services\SortableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\Translatable\HasTranslations;

class AppRelease extends Model implements Sortable
{
    use HasUuids;
    use SortableTrait;
    use HasTranslations;

    public array $translatable = [
        'title',
    ];

    public array $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'publish_at' => 'datetime',
    ];

    protected $appends = [
        'published',
    ];

    public function getPublishedAttribute(){
        return $this->getAttribute('publish_at')->diffForHumans();
    }
}
