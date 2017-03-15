<?php

namespace Jaxon\App\Test;

use Jaxon\Module\Controller as JaxonController;

class Bts extends JaxonController
{
    public function sayHello($isCaps, $bNotify = true)
    {
        $html = $this->view->render('test/hello', ['isCaps' => $isCaps]);
        $this->response->assign('div2', 'innerHTML', $html);
        if(($bNotify))
        {
            $message = $this->view->render('test/message')
                ->with('element', 'div2')
                ->with('attr', 'text')
                ->with('value', $html);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }
    
    public function setColor($sColor, $bNotify = true)
    {
        $this->response->assign('div2', 'style.color', $sColor);
        if(($bNotify))
        {
            $message = $this->view->render('test/message')
                ->with('element', 'div2')
                ->with('attr', 'color')
                ->with('value', $sColor);
            $this->response->dialog->success($message);
        }
    
        return $this->response;
    }
    
    public function showDialog()
    {
        $buttons = array(array('title' => 'Close', 'class' => 'btn', 'click' => 'close'));
        $width = 300;
        $html = $this->view->render('test/credit')->with('library', 'Twitter Bootstrap');
        $this->response->dialog->show("Modal Dialog", $html, $buttons, compact('width'));
    
        return $this->response;
    }
}
