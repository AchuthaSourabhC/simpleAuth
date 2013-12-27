<?php

/* dashboard/index.html */
class __TwigTemplate_5bd8b5547aa05688668f90fbe50f8d1fd0b473a1068913ea7d7c0f5cbad9338f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("user/index.html");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'nav' => array($this, 'block_nav'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "user/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "
";
    }

    // line 9
    public function block_nav($context, array $blocks = array())
    {
        // line 10
        echo "\t <li><a href=\"";
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/user/logout\">logout</a></li>
";
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "
Welcome ";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : null), "html", null, true);
        echo " are logged in !

";
    }

    public function getTemplateName()
    {
        return "dashboard/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 15,  51 => 14,  48 => 13,  41 => 10,  38 => 9,  33 => 6,  30 => 5,);
    }
}
