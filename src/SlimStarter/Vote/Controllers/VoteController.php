<?php

namespace Envoy\SlimStarter\Vote\Controllers;

use \App;
use \View;
use \Menu;
use \Response;
use \BaseController;
use \Envoy\SlimStarter\Vote\Models\Vote;
use \Input;
use \Exception;

class VoteController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index() {
        Response::status(501);
        Response::headers()->set('Content-Type', 'application/json');
        Response::setBody(json_encode(
            array(
                'success'   => false,
                'message'   => 'Method not implemented',
                'code'      => 501
            )
        ));
    }
    
    public function show($id)
    {
        
    }

    public function store()
    {
        $vote    = null;
        $message = '';
        $success = false;
        $code = 500;

        try{
            $input = Input::post();

            $vote = Vote::addVote([
                'entry_id'       => $input['entry_id'],
                'ip_address'    => ip2long($this->app->request->getIp())
            ]);

            $success = true;
            $code    = 200;
            $message = 'Vote entered successfully';
        }catch (Exception $e){
            $message = $e->getMessage();
        }

        Response::headers()->set('Content-Type', 'application/json');
        Response::setStatus($code);
        Response::setBody(json_encode(
            array(
                'success'   => $success,
                'message'   => $message,
                'code'      => $code
            )
        ));
    }

    public function edit($id)
    {
        Response::status(501);
        Response::headers()->set('Content-Type', 'application/json');
        Response::setBody(json_encode(
            array(
                'success'   => false,
                'message'   => 'Method not implemented',
                'code'      => 501
            )
        ));
    }

    public function update($id)
    {
        Response::status(501);
        Response::headers()->set('Content-Type', 'application/json');
        Response::setBody(json_encode(
            array(
                'success'   => false,
                'message'   => 'Method not implemented',
                'code'      => 501
            )
        ));
    }

    public function destroy($id)
    {
        Response::status(501);
        Response::headers()->set('Content-Type', 'application/json');
        Response::setBody(json_encode(
            array(
                'success'   => false,
                'message'   => 'Method not implemented',
                'code'      => 501
            )
        ));
    }
}



