<?php

/* user/index.html */
class __TwigTemplate_9d0e02e298fa9d4c55eb0b9457d78c62ff48a6d79039e3523c3ea80c2acbecd5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>

<html lang=\"en\">
\t<head>
\t\t<title>D-Wars</title>
          <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> 
        <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/public/js/bootstrap.js\"></script>
        <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/public/js/jquery1.9.1.js\"></script>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/public/css/jquery_ui.css\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/public/css/bootstrap.css\">
\t\t
          
            <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/public/css/main.css\">
\t\t";
        // line 14
        $this->displayBlock('head', $context, $blocks);
        // line 18
        echo "
\t</head>

\t<body>
        <div class=\"nav\" data-role=\"header\">
            ";
        // line 23
        $this->displayBlock('header', $context, $blocks);
        // line 41
        echo "            
        </div>
        
        <div class=\"page-wrap\" data-role=\"page\">
            <div class=\"post-wrap\">
                ";
        // line 46
        $this->displayBlock('content', $context, $blocks);
        // line 50
        echo "            </div>
         
            <div class=\"footer-wrap\">
                 <script>
                \$(document).ready(function() {
                    \$('.page-wrap').css('top',( \$('.nav').outerHeight()+10));
                });
            </script>
                ";
        // line 58
        $this->displayBlock('footer', $context, $blocks);
        // line 61
        echo "            </div>
         
        </div>
\t</body>
</html>";
    }

    // line 14
    public function block_head($context, array $blocks = array())
    {
        // line 15
        echo "      

        ";
    }

    // line 23
    public function block_header($context, array $blocks = array())
    {
        // line 24
        echo "            <div class=\"title\">simpleAuth ()</div>
            
\t\t\t<div class=\"nav-wrap\" >
\t\t\t\t<ul>
                    <li>{</li>
\t\t\t\t\t<li><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/index/\">home</li>
\t\t\t\t\t<li><a href=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/index/about\">about</li>
\t\t\t\t\t<li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/user/register\">register</a></li>
                    ";
        // line 32
        if (((isset($context["loggedIn"]) ? $context["loggedIn"] : null) == 1)) {
            // line 33
            echo "\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
            echo "/user/logout\">logout</a></li>
                    ";
        } else {
            // line 35
            echo "                    <li><a href=\"";
            echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
            echo "/user/login\">login</a></li>
                    ";
        }
        // line 37
        echo "                    <li>}</li>
\t\t\t\t</ul>
\t\t\t</div>
            ";
    }

    // line 46
    public function block_content($context, array $blocks = array())
    {
        // line 47
        echo "                Welcome to simpleAuth<br>Use the links on Navigation bar above to try it's features
                
                ";
    }

    // line 58
    public function block_footer($context, array $blocks = array())
    {
        // line 59
        echo "                
                ";
    }

    public function getTemplateName()
    {
        return "user/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 59,  154 => 58,  148 => 47,  145 => 46,  138 => 37,  132 => 35,  126 => 33,  124 => 32,  120 => 31,  116 => 30,  112 => 29,  105 => 24,  102 => 23,  96 => 15,  93 => 14,  85 => 61,  83 => 58,  73 => 50,  71 => 46,  64 => 41,  62 => 23,  55 => 18,  53 => 14,  49 => 13,  43 => 10,  39 => 9,  35 => 8,  31 => 7,  23 => 1,);
    }
}
