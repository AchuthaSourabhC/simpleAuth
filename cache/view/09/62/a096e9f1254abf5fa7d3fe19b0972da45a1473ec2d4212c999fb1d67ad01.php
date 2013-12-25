<?php

/* user/login.html */
class __TwigTemplate_0962a096e9f1254abf5fa7d3fe19b0972da45a1473ec2d4212c999fb1d67ad01 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("user/index.html");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
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

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        // line 5
        echo "  <!-- Load jQuery and the validate plugin -->
  <meta charset=\"utf-8\">
  <script src=\"";
        // line 7
        echo (isset($context["host"]) ? $context["host"] : null);
        echo "/public/js/jquery1.9.1.js\"></script>
  <script src=\"";
        // line 8
        echo (isset($context["host"]) ? $context["host"] : null);
        echo "/public/js/jquery_validate.js\"></script>
  <!-- jQuery Form Validation code -->
  
  ";
        // line 12
        echo "
  <script>
  // When the browser is ready...
  \$(function() {
  
    // Setup form validation on the #register-form element
    \$(\"#login-form\").validate({
    
        // Specify the validation rules
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },

        },
        
        // Specify the validation error messages
        messages: {
            password: {
                required: \"Please provide a password\",
                minlength: \"Your password must be at least 6 characters long\"
            },
            email: \"Please enter a valid email address\", 
        },      
        submitHandler: function(form) {
            form.submit();
        }
    });
  });
  
  </script>
";
    }

    // line 50
    public function block_content($context, array $blocks = array())
    {
        // line 51
        echo "<div class=\"form-wrap\">
    <div class=\"form-title\">Login Here</div>
    <form action=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["host"]) ? $context["host"] : null), "html", null, true);
        echo "/user/check\" method=\"post\" id=\"login-form\" novalidate=\"novalidate\">
        <div class=\"error\">
        ";
        // line 55
        if (((isset($context["error"]) ? $context["error"] : null) == 1)) {
            // line 56
            echo "          ";
            echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
            echo "
        ";
        }
        // line 58
        echo "        </div>
        <div class=\"label\">Email</div><input type=\"text\" id=\"email\" name=\"email\" /><br />
        <div class=\"label\">Password</div><input type=\"password\" id=\"password\" name=\"password\" /><br />

        <div ><input type=\"submit\" name=\"submit\" value=\"Submit\" class=\"submit-reg\" /></div>
        
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "user/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 58,  102 => 56,  100 => 55,  95 => 53,  91 => 51,  88 => 50,  48 => 12,  42 => 8,  38 => 7,  34 => 5,  32 => 4,  29 => 3,);
    }
}
