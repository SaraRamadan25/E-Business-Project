<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class posts extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'order'  => Post::find(1),
            'orders' => Post::paginate(),
           /* 'name' =>request('name'),
            'title' =>request('title'),*/

        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'posts';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Go print')->method('print'),
        ];
    }

    public function print(): void
    {
        Toast::warning('Hello, world! This is a toast message.');

    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('screenTemplate')
        ];
    }
}
