<?php

/* AdminBundle:Auth:login.html.twig */
class __TwigTemplate_e0e7d05e9c41bc2da5564c4ba04ec855e2d3ca69b5af5c26d9d5372a8b422afe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "locale", array()), "html", null, true);
        echo "\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

\t\t<title>GLGCMS Login</title>
\t\t";
        // line 9
        $this->loadTemplate("AdminBundle:Template:_favicon.html.twig", "AdminBundle:Auth:login.html.twig", 9)->display($context);
        // line 10
        echo "\t\t";
        $this->loadTemplate("AdminBundle:Template:_css.html.twig", "AdminBundle:Auth:login.html.twig", 10)->display($context);
        // line 11
        echo "\t\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b2531ef_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_b2531ef_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/login_main_1.css");
            // line 19
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t";
            // asset "b2531ef_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_b2531ef_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/login_metisMenu_2.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t";
            // asset "b2531ef_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_b2531ef_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/login_onoffcanvas_3.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t";
            // asset "b2531ef_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_b2531ef_3") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/login_animate_4.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t";
        } else {
            // asset "b2531ef"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_b2531ef") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/login.css");
            echo "\t\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t\t";
        }
        unset($context["asset_url"]);
        // line 21
        echo "\t</head>
\t<body class=\"login\">
\t\t<div class=\"form-signin\">
\t\t\t<div class=\"text-center\">
\t\t\t\t<h3 class=\"text-muted\">Glg CMS</h3>
\t\t\t</div>
\t\t\t<hr>
\t\t\t<div class=\"tab-content\">
\t\t\t\t<div id=\"login\" class=\"tab-pane active\">
\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t<p class=\"text-muted text-center\">
\t\t\t\t\t\t\tEnter your username and password
\t\t\t\t\t\t</p>
\t\t\t\t\t\t<input class=\"form-control top\" name=\"username\" placeholder=\"Username\" type=\"text\" />
\t\t\t\t\t\t<input class=\"form-control bottom\" name=\"password\" placeholder=\"Password\" type=\"password\" />
\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t<label>
\t\t\t\t\t\t\t\t<input type=\"checkbox\"> Remember me </label>
\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Sign in</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t\t<div class=\"tab-pane\" id=\"forgot\">
\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t<p class=\"text-muted text-center\">Enter your e-mail</p>
\t\t\t\t\t\t<input type=\"email\" name=\"email\" placeholder=\"mail@mydomain.com\" class=\"form-control\" />
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<button class=\"btn btn-lg btn-block btn-danger\" type=\"submit\">Recover Password</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<hr>
\t\t\t<div class=\"text-center\">
\t\t\t\t<ul class=\"list-inline\">
\t\t\t\t\t<li><a class=\"text-muted active\" href=\"#login\" data-toggle=\"tab\">Login</a></li>
\t\t\t\t\t<li><a href=\"#forgot\" class=\"text-muted active\" data-toggle=\"tab\">Forgot Password</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

\t\t";
        // line 62
        $this->loadTemplate("AdminBundle:Template:_js_global.html.twig", "AdminBundle:Auth:login.html.twig", 62)->display($context);
        // line 63
        echo "\t\t<script type=\"text/javascript\">
\t\t\tjQuery(document).ready(function(){
\t\t\t\tjQuery(\".list-inline li > a\").on(\"click\", function(){
\t\t\t\t\tvar activeForm = jQuery(this).attr('href') + ' > form';
\t\t\t\t\tjQuery(activeForm).addClass(\"animated fadeIn\");

\t\t\t\t\tsetTimeout(function(){
\t\t\t\t\t\tjQuery(activeForm).removeClass(\"animated fadeIn\")
\t\t\t\t\t}, 1000);
\t\t\t\t});
\t\t\t});
\t\t</script>
\t\t}
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "AdminBundle:Auth:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 63,  117 => 62,  74 => 21,  42 => 19,  37 => 11,  34 => 10,  32 => 9,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AdminBundle:Auth:login.html.twig", "/var/www/vhosts/glg-tests.nl/glg-tests.nl/src/GlgProductions/AdminBundle/Resources/views/Auth/login.html.twig");
    }
}
