<?php
namespace Envoy\SlimStarter\Vote;

use \App;
use \Menu;
use \Route;

class Initialize extends \SlimStarter\Module\Initializer{

    public function getModuleName(){
        return 'Vote';
    }

    public function getModuleAccessor(){
        return 'vote';
    }

    public function registerAdminMenu(){

        $adminMenu = Menu::get('admin_sidebar');

        $vote = $adminMenu->createItem('vote', array(
            'label' => 'Votes',
            'icon'  => 'group',
            'url'   => 'admin/vote'
        ));

        $adminMenu->addItem('vote', $vote);
    }

    public function registerAdminRoute(){
        Route::resource('/vote', 'Vote\Controllers\Admin\VoteController');
    }
    
    public function registerPublicRoute(){
        Route::resource('/vote', 'Vote\Controllers\VoteController');
    }
}