<?php

/* AdminBundle:Template:_css.html.twig */
class __TwigTemplate_c75794c6558bf765afef7f6da61888ee63d91cfcc37754bdfee085d6ae99d4b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('stylesheets', $context, $blocks);
    }

    public function block_stylesheets($context, array $blocks = array())
    {
        // line 2
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3d0a135_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_3d0a135_0") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/admin/glgcms_font-awesome.min_1.css");
            // line 9
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t";
            // asset "3d0a135_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_3d0a135_1") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/admin/glgcms_bootstrap_2.css");
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t";
            // asset "3d0a135_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_3d0a135_2") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/admin/glgcms_extender_3.css");
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t";
        } else {
            // asset "3d0a135"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_assetic_3d0a135") : $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("assets/compressed/admin/glgcms.css");
            echo "\t<link href=\"";
            echo twig_escape_filter($this->env, ($context["asset_url"] ?? null), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
\t";
        }
        unset($context["asset_url"]);
    }

    public function getTemplateName()
    {
        return "AdminBundle:Template:_css.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  31 => 9,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "AdminBundle:Template:_css.html.twig", "/var/www/vhosts/glg-tests.nl/glg-tests.nl/src/GlgProductions/AdminBundle/Resources/views/Template/_css.html.twig");
    }
}
