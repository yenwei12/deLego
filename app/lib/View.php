<?php

class View
{
    public function render($viewScript)
    {
        if ($viewScript == 'ar/index') {
            require '../app/view/' . $viewScript . '.phtml';
        } else {
            require '../app/view/header.phtml';
            require '../app/view/' . $viewScript . '.phtml';
            require '../app/view/footer.phtml';
        }
    }
}
