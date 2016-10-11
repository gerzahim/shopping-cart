<?php
namespace ShopCart\Http\ViewComposers;

use Illuminate\View\View;
use ShopCart\Http\Controllers\SettingController;

class SettingComposer
{
    //public $movieList = [];
    public $setting = [];
    /**
     * Create a movie composer.
     *
     * @return void
     */
    /*
    public function __construct()
    {

        
        $this->movieList = [
            'Shawshank redemption',
            'Forrest Gump',
            'The Matrix',
            'Pirates of the Carribean',
            'Back to the future',
        ];

        
    }*/

    public function __construct(SettingController $settings)
    {
        $this->setting = $settings->getSetting();
    }    

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('setting', end($this->setting));
    }
    
    /*
    public function compose(View $view) {
        $view->with('title', "Calling with View Composer Provider");
    }
    */
}