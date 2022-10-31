<?php

namespace App\Http\Controllers\Admin;

use App\Filesystem\File;
use App\Filesystem\Source;
use App\Filesystem\Validator\ImageValidator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Cache;

class CoreController extends BaseController
{
    /**
     * @var bool
     */
    protected $canBeAdded = false;

    protected $entity = "admin.home";

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected $global_title = "Аналитика";

    public function home(): View
    {
        return view('admin.index', $this->getData([]));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function access(): \Illuminate\View\View
    {
        $this->setTitle('Доступ запрещен');

        return view('core.access', $this->getData());
    }

    public function upload()
    {
        if (request()->hasFile('file')) {
            $validator = (new ImageValidator(['file']));
            $image = (new File(new Source('images')))->load('file')->validate($validator)->save();
            if ($image->failed) {
                abort(403, ___('Не удалось загрузить картинку'));
            }
            return response()->json(['location' => $image->getStoredPath()]);
        }
    }
}
