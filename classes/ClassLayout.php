<?php

namespace Classes;
use Models\ClassCrud;

class ClassLayout
{

    public static function setHeadRestrito($permition)
    {
        $session = new ClassSessions();
        $session->verifyInsideSession($permition);
    }

    #Setar as tags do head
    public static function setHeader($title, $description, $author = 'Flávio',$css=false)
    {

        $html = "<!DOCTYPE html>\n";
        $html .= "<html lang='pt-br'>\n";
        $html .= "<head>\n";
        $html .= "    <meta charset='UTF-8'>\n";
        $html .= "    <meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
        $html .= "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html .= "    <meta name='author' content='$author'>\n";
        $html .= "    <meta name='format-detection' content='telephone=no'>\n";
        $html .= "    <meta name='description' content='$description'>\n";
        $html .= "    <link href='" . DIRCSS . "bootstrap.min.css' rel='stylesheet' >\n";
        $html .= "    <script src='" . DIRJS . "bootstrap.min.js' ></script>\n";
        $html .= "    <title>$title</title>\n";
        #FAVICON
        $html .= "<link rel='stylesheet' href='" . DIRCSS . "global.css'>\n";
        $html .= "<link rel='stylesheet' href='" . DIRCSS . "style.css'>\n";
        if ($css != null) {
            if (is_array($css)) {
                foreach ($css as $script) {
                    $html .= "<script src='" . DIRCSS . $script . "'></script>\n";
                }
            } else {
                $html .= "<script src='" . DIRCSS . $css . "'></script>\n";
            }
        }
        $html .= "</head>\n\n";
        $html .= "<body>\n";
        echo $html;
    }

    #Setar as tags do footer
    public static function setFooter($js=null)
    {
        $html = "<script src='" . DIRJS . "zepto.min.js'></script>\n";
        $html .= "<script src='" . DIRJS . "vanilla-masker.min.js'></script>\n";
        $html .= "<script type='module' src='" . DIRJS . "javascript.js'></script>\n";
        if ($js != null) {
            if (is_array($js)) {
                foreach ($js as $script) {
                    $html .= "<script type='module' src='" . DIRJS . $script . "'></script>\n";
                }
            } else {
                $html .= "<script type='module' src='" . DIRJS . $js . "'></script>\n";
            }
        }
        #JAVASCRIPT
        $html .= "</body>\n";
        $html .= "</html>";
        echo $html;
    }
    #Setar a NavBar do site
    public static function navBar()
    {

        $html = "<nav class='navbar navbar-expand-lg bg-body-tertiary'>
            <div class='container-fluid'>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarTogglerDemo01' aria-controls='navbarTogglerDemo01' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarTogglerDemo01'>
                    <a class='navbar-brand' href='". DIRPAGE."index'>Home</a>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link active' aria-current='page' href='". DIRPAGE."agendamento'>agendamento</a>
                        </li>

                    </ul>
                </div>
                <h2 class='tituloNav'>Barbearia</h2>
          </nav>\n";
        echo $html;
    }
 
}
