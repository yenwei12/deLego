<?php

class View
{
    public function render($viewScript)
    {
        require '../app/view/header.phtml';
        require '../app/view/' . $viewScript . '.phtml';
        require '../app/view/footer.phtml';
    }
}
