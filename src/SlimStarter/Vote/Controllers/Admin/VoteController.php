<?php

namespace Envoy\SlimStarter\Vote\Controllers\Admin;

use \App;
use \View;
use \Menu;
use \Envoy\SlimStarter\Vote\Models\Vote;
use \Admin\BaseController;

class VoteController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        Menu::get('admin_sidebar')->setActiveMenu('vote');
    }

    public function index($page = 1)
    {
        $this->data['title'] = 'Votes';
        
        $this->data['votes'] = Vote::paginateToArray(30);
        View::display('@vote/admin/index.twig', $this->data);
    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function create()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}