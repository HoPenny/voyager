<?php

namespace App\Widgets;

use App\Models\Article;
use TCG\Voyager\Widgets\BaseDimmer;

class ArticleDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Article::count();
        // $count = Voyager::model('User')->count();
        // $string = trans_choice('voyager::dimmer.user', $count);
        $string = "文章數量:" . $count;

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => "{$string}",
            'text' => "目前文章為" . $count . "篇",
            'button' => [
                'text' => "顯示文章",
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    //判斷使用者是否有權限瀏覽
    public function shouldBeDisplayed()
    {
        return true;
    }
}