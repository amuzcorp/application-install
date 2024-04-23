<?php

namespace AmuzThemes\ApplicationInstall\Nova\Resources;

use App\Services\SortsIndexEntries;
use Illuminate\Support\Carbon;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ID;
use App\Nova\Resource;
use Mostafaznv\NovaCkEditor\CkEditor;
use PixelCreation\NovaFieldSortable\Sortable;
use AmuzThemes\ApplicationInstall\Models\AppRelease as ResourceModel;
use Trin4ik\NovaSwitcher\NovaSwitcher;

class AppRelease extends Resource
{
    use SortsIndexEntries;
    public static string $defaultSortField = 'sort_order';
    public static string $defaultSortDirection = 'DESC';

    public static string $model = ResourceModel::class;

    public function title(): string
    {
        return sprintf("%s(+%s) - %s +%s",
            $this->resource->getAttribute('os_type'),
            $this->resource->getAttribute('min_os_version'),
            $this->resource->getAttribute('version_code'),
            $this->resource->getAttribute('build_number'),
        );
    }

    public static function label(): string
    {
        return __('AppRelease');
    }

    public static $search = [
        'id',
    ];

    public static $group = "SMART-CHECKER";

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            NovaSwitcher::make(__('Public Version'),'is_public'),

            Sortable::make(__('Priority'),'sort_order')
                ->onlyOnIndex(),

            Select::make(__('Os Type'),'os_type')->options([
                "aos" => "Android",
                "ios" => "iOS"
            ])->required()->filterable(),
            Number::make(__("Minimum OS Version"), "min_os_version")
                ->dependsOn(['os_type'], function (Number $field, NovaRequest $request, FormData $formData) {
                    if ($formData->get('os_type') === 'aos') {
                        $field->default(13);
                    } elseif ($formData->get('os_type') === 'ios') {
                        $field->default(16);
                    }
                }),

            Text::make(__("Version Code"), "version_code")
                ->dependsOn(['os_type'], function (Text $field, NovaRequest $request, FormData $formData) {
                    $lastRelease = ResourceModel::query()
                        ->where('os_type',$formData->get('os_type'))
                        ->orderBy('build_number','DESC')->first();
                    if ($lastRelease) {
                        $field->default($lastRelease->getAttribute('version_code'));
                    }
                }),

            Number::make(__("Build Number"), "build_number")
                ->dependsOn(['os_type'], function (Number $field, NovaRequest $request, FormData $formData) {
                    $lastRelease = ResourceModel::query()
                        ->where('os_type',$formData->get('os_type'))
                        ->orderBy('build_number','DESC')->first();
                    if ($lastRelease) {
                        $field->default($lastRelease->getAttribute('build_number') + 1);
                    }
                })->required(),

            Select::make(__('Status'),'status')->options([
                'stable' => __('Stable Release'),
                'beta' => __('Beta Version'),
                'dev' => __('Development'),
                'arch' => __('Archived')
            ])->required(),

            Text::make(__('Install URL'),"install_url")
                ->dependsOn(['os_type'], function (Text $field, NovaRequest $request, FormData $formData) {
                    $lastRelease = ResourceModel::query()
                        ->where('os_type',$formData->get('os_type'))
                        ->orderBy('build_number','DESC')->first();
                    if ($lastRelease) {
                        $field->default($lastRelease->getAttribute('install_url'));
                    }
                })->required()->help(__("The recommended format is '/applications/ios/1_0_0/info.plist' or '/applications/aos/1_0_0/app.apk'.")),

            CkEditor::make(__('Release Note'),"content"),

            DateTime::make(__('Publish At'), "publish_at")
                ->size('w-2/3')
                ->default(Carbon::now()),
        ];
    }

    public function fieldsForIndex(NovaRequest $request): array
    {
        return [
            Text::make('OS',function(ResourceModel $appRelease){
                return sprintf("<div class='py-2 text-center'>%s</div><div class='text-center'>(+%s)</div>",$appRelease->getAttribute('os_type'),$appRelease->getAttribute('min_os_version'));
            })->asHtml(),
            Text::make('Build',function(ResourceModel $appRelease){
                return sprintf("<div class='py-2 flex content-between'>
                        <span class='flex-1 font-bold'>Build ID</span>
                        <span class=''>%s</span>
                    </div>
                    <div class='flex content-between'>
                        <div class='flex-1'>
                            <span class='flex-1 font-bold'>Version </span>
                            <span class='text-lg text-indigo-900'>%s</span>
                            <span class='text-gray-600 font-bold'>+%s</span>
                        </div>
                        <a href='%s' class='text-indigo-600' target='_blank'>Download</a>
                    </div>"
                    ,$appRelease->getKey()
                    ,$appRelease->getAttribute('version_code')
                    ,$appRelease->getAttribute('build_number')
                    ,$appRelease->getAttribute('install_url'));
            })->asHtml(),

            Text::make('Publish At',function(ResourceModel $appRelease){
                return "<div class='text-center'>" . $appRelease->getAttribute('published') . "</div>";
            })->asHtml(),
        ];
    }

    public function fieldsForDetail(NovaRequest $request): array
    {
        return $this->fields($request);
    }

    public function fieldsForInlineCreate(NovaRequest $request): array
    {
        return $this->fields($request);
    }

    public function fieldsForCreate(NovaRequest $request): array
    {
        return $this->fields($request);
    }

    public function fieldsForUpdate(NovaRequest $request): array
    {
        return $this->fields($request);
    }

    public function cards(NovaRequest $request): array
    {
        return [];
    }

    public function filters(NovaRequest $request): array
    {
        return [];
    }

    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
