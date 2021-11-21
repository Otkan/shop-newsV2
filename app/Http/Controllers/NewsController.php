<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Routing\Controller as BaseController;
use App\Support\ShopEnum;
class NewsController extends BaseController
{

    /**
     * @param Request $request
     * @return View
     */
    public function showList(Request $request): View
    {

        $request->validate([
            'shop_id' => 'nullable|int',
        ]);

        //todo: error message if validation fails

        $shop_id = $request->get('shop_id');

        if (!empty($shop_id)){

            return view(
                'news.list',
                [
                    'news'    => $this->showShopNews($shop_id),
                    'shop_id' => $shop_id,
                ]
            );

        }

        return view(
            'news.list',
            [
                'news' => $this->showAllNews(),
            ]
        );
    }

    /**
     * @param Request $request
     * @return View
     */
    public function showDetail(Request $request): View
    {

        return view(
            'news.detail',
            [
                'news' => $this->showNews($request->id),
            ]
        );
    }

    /**
     * @param Request $request
     * @return View
     */
    public function showCreate(Request $request): View
    {

        //todo: find a better way to solve this
        $selectedShop = array_key_first($request->all());
        //todo: create a default method to unset unintentionally values in Enum
        $shops        = ShopEnum::NAMES;
        unset($shops[ShopEnum::ALL]);

        if (!empty($selectedShop)){
            $availableShops = [];
            foreach ($shops as $number => $name){
                if ($selectedShop === $number){
                    $availableShops[$selectedShop] = $name;
                }
            }
            return view(
                'news.create',
                [
                    'shops' => $availableShops,
                ]
            );
        }

        return view(
            'news.create',
            [
                'shops' => $shops,
            ]
        );
    }

    /**
     * @param Request $request
     * @return Redirector
     */
    public function create(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect('news');
        }

        $request->validate([
            'title'   => 'required|max:50|string|min:3',
            'text'    => 'required|max:100|string|min:3',
            'shop_id' => 'required|int',
        ]);

        //todo: error message if validation fails

            $title    = $request->post('title');
            $shop_id  = $request->post('shop_id');
            $text     = $request->post('text');

            if (News::where('shop_id',$shop_id)->count() < 3) {

                 News::create([
                    'title'      => $title,
                    'text'       => $text,
                    'shop_id'    => $shop_id,
                    'user_id'    => 1, // auth()->id()
                ]);

                 // todo: message for save
                return redirect('news');
            }

        return redirect('news')
            ->withErrors(
                [
                    'message' => 'You can only have 3 News at once',
                ]
            );
    }

    //todo: outsource the next 3 methods in a repository
    /**
     * @return Collection
     */
    protected function showAllNews(): Collection
    {
        return News::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function showNews($id)
    {
        return News::where('id', $id)
            ->get()
            ->first();
    }

    /**
     * @param $shop_id
     * @return Collection
     */
    protected function showShopNews($shop_id): Collection
    {
        return News::where('shop_id', $shop_id)
            ->get();
    }

    public function saveDetail(Request $request)
    {
        // todo: make this method
    }

    public function delete(){
        // todo: make this method
    }
}
