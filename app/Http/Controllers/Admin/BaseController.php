<?php
namespace App\Http\Controllers\Admin;

use App\Models\File;

abstract class BaseController extends Controller
{

    /**
     * @var string
     */
    protected $entity;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $parent_entity;

    /**
     * @var string
     */
    protected $section;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var int
     */
    protected $itemsPerPage = 50;

    /**
     * @var array
     */
    protected $dependencies = [];

    /**
     * @var array
     */
    protected $counts = [];

    /**
     * @var array
     */
    protected $filters = [];

    /**
     * @var string
     */
    protected $title;

    protected $global_title;

    /**
     * @var bool
     */
    protected $hasParent = false;

    /**
     * @var bool
     */
    protected $canBeAdded = true;

    /**
     * @var bool
     */
    protected $canBeExported = false;


    /**
     * @var bool
     */
    protected $trashed = false;

    /**
     * @var string
     */
    protected $add_title = "Добавить запись";


    /**
     * @var string
     */
    protected $create_url;

    protected $breadcrumbs;

    /**
     * @param string $title
     *
     * @return void
     */
    protected function setTitle(string $title): void
    {
        $this->title = $title;
    }


    /**
     * @return void
     */
    protected function setCounts(): void
    {
        //
    }


    /**
     * @param string $key
     * @param mixed $data
     */
    protected function enject(string $key, $data): void
    {
        $this->dependencies[$key] = $data;
    }


    /**
     * @param array $data
     *
     * @return array
     */
    protected function getData(array $data = []): array
    {
        $_data = [
            'dependencies' => array_merge($this->dependencies, [
                'filters' => $this->filters,
                'counts' => $this->counts,
            ]),
            'globals' => [
                'title' => empty($this->title) ? $this->global_title : $this->title,
                'global_title' => $this->global_title,
                'section' => $this->section,
                'entity' => $this->entity,
                'index' => '',
                'breadcrumbs' => $this->breadcrumbs
            ],
        ];
        if ($this->canBeAdded && stripos(request()->route()->getName(), "create") === false) {
            if (!is_null($this->create_url)) {
                $_data['globals']['create_url'] = $this->create_url;
            } elseif ($this->hasParent || !is_null($this->parent_entity)) {
                if ($this->hasParent && is_null($this->parent_entity)) {
                    $_data['globals']['create_url'] = $this->create_url;
                } else {
                    $_data['globals']['create_url'] = route("{$this->entity}.create", $this->parent_entity);
                }
            } else {
                $_data['globals']['create_url'] = route("{$this->entity}.create");
            }
        }

        if (\Route::has("{$this->entity}.index")) {
            if ($this->hasParent) {
                $_data['globals']['index'] = route("{$this->entity}.index", request()->route()->parameters);
            } else {
                $_data['globals']['index'] = route("{$this->entity}.index");
            }
        }

        if (!is_null($this->parent_entity)) {
            $_data['globals']['parent'] = getClassName($this->parent_entity);
        }


        $_data['globals']['add_title'] = $this->add_title;


        if (isset($this->link_title)) {
            $_data['globals']['link_title'] = $this->link_title;;
        }


        if ($this->trashed) {
            $_data['globals']['trashed'] = route("{$this->entity}.trashed");
        }

        if (isset($data['paginates'])) {
            $_data['globals']['paginates'] = $data['paginates'];
        }

//        dd($this->dependencies);

        return array_merge($data, $_data);
    }


    /**
     * @return int
     */
    protected function getId(): int
    {
        return request()->get('id', -1);
    }


    public function deleteItem($entity)
    {
        if (request()->has('delete')) {
            foreach (request('delete') ?? [] as $item => $value) {
                if ($value && $value[0] === '[') {
                    $files = json_decode($value);
                    File::whereIn('id',$files)->delete();
                } else {
                    if (!request()->has($item) && $value) {
                        $entity->update([$item => null]);
                    }
                }
            }
        }
    }

}
