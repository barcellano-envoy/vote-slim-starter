<?php
namespace Envoy\SlimStarter\Vote;

use \App;
use \Menu;
use \Route;

class Initialize extends \SlimStarter\Module\Initializer{

    public function getModuleName(){
        return '../../vendor/barcellano-envoy/vote-slim-starter/src/SlimStarter/Vote';
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
        Route::resource('/vote', 'Envoy\SlimStarter\Vote\Controllers\Admin\VoteController');
    }
    
    public function registerPublicRoute(){
        Route::resource('/vote', 'Envoy\SlimStarter\Vote\Controllers\VoteController');
    }
}