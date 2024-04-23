<?php

namespace AmuzThemes\ApplicationInstall\Models;

use AmuzThemes\ApplicationInstall\Database\Factories\AppReleaseFactory;
use App\Services\SortableTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\Translatable\HasTranslations;

class AppRelease extends Model implements Sortable
{
    use HasFactory;
    use HasUuids;
    use SortableTrait;
    use HasTranslations;

    protected static function newFactory(): AppReleaseFactory
    {
        return AppReleaseFactory::new();
    }

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
