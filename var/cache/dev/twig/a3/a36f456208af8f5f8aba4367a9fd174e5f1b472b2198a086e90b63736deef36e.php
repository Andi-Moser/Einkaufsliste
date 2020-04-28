<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* item/list.html.twig */
class __TwigTemplate_626a66f722b5ef2924ead7199d191f21eb7ca37e61a152ff259890c9991abac4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "item/list.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "item/list.html.twig"));

        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">

    <title>Einkaufsliste</title>
</head>
<body>
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-12\">
            <h1>Einkaufsliste</h1>

            <table class=\"table\">
                <tr>
                    <th>#</th>
                    <th>Anzahl</th>
                    <th>Name</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>

                ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? $this->getContext($context, "items")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "                    <tr>
                        <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", []), "html", null, true);
            echo "</td>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "count", []), "html", null, true);
            echo "</td>
                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", []), "html", null, true);
            echo "</td>
                        <td><a href=\"/list?edit=";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", []), "html", null, true);
            echo "\" class=\"btn btn-info\">Bearbeiten</a></td>
                        <td><a href=\"/delete/";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", []), "html", null, true);
            echo "\" class=\"btn btn-danger\">X</a></td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "            </table>

            <form action=\"/add\" method=\"post\">
                <div class=\"form-group\">
                    <label for=\"count\">Anzahl</label>
                    <input type=\"number\" class=\"form-control\" id=\"count\" name=\"count\">
                </div>
                <div class=\"form-group\">
                    <label for=\"name\">Name</label>
                    <input type=\"number\" class=\"form-control\" id=\"name\" name=\"name\">
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Hinzufügen</button>
            </form>

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>
</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "item/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 37,  88 => 34,  84 => 33,  80 => 32,  76 => 31,  72 => 30,  69 => 29,  65 => 28,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">

    <title>Einkaufsliste</title>
</head>
<body>
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-12\">
            <h1>Einkaufsliste</h1>

            <table class=\"table\">
                <tr>
                    <th>#</th>
                    <th>Anzahl</th>
                    <th>Name</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>

                {% for item in items %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ item.count }}</td>
                        <td>{{ item.name }}</td>
                        <td><a href=\"/list?edit={{ item.id }}\" class=\"btn btn-info\">Bearbeiten</a></td>
                        <td><a href=\"/delete/{{ item.id }}\" class=\"btn btn-danger\">X</a></td>
                    </tr>
                {%  endfor %}
            </table>

            <form action=\"/add\" method=\"post\">
                <div class=\"form-group\">
                    <label for=\"count\">Anzahl</label>
                    <input type=\"number\" class=\"form-control\" id=\"count\" name=\"count\">
                </div>
                <div class=\"form-group\">
                    <label for=\"name\">Name</label>
                    <input type=\"number\" class=\"form-control\" id=\"name\" name=\"name\">
                </div>
                <button type=\"submit\" class=\"btn btn-primary\">Hinzufügen</button>
            </form>

        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=\"https://code.jquery.com/jquery-3.4.1.slim.min.js\" integrity=\"sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js\" integrity=\"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo\" crossorigin=\"anonymous\"></script>
<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js\" integrity=\"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6\" crossorigin=\"anonymous\"></script>
</body>
</html>", "item/list.html.twig", "E:\\Dropbox\\BBZW\\02_Unterricht\\02_M151\\DevServer\\Symfony\\app\\Resources\\views\\item\\list.html.twig");
    }
}
