<?php

class ErrorController extends Controller
{
    public function index($callbackRoute){

        try
        {
            if($callbackRoute != null)
            {
                $parms = explode('/', $callbackRoute);
                $callbackRoute = "./index.php?c=" . $parms[0] . "&a=" . $parms[1];
            }
        }
        catch(Exception $_)
        {
            $callbackRoute = null;
        }



        $this->RenderView('error','index', ['callbackroute' => $callbackRoute],'error');
    }

}