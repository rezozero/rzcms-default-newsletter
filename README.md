# RZCMS Default newsletter template

RZCMS use the generic node system to generate newsletter as well as your website pages. 
It uses [InlineStyle](https://github.com/christiaan/InlineStyle) library to inline CSS styles directly into your HTML code. You can add responsive CSS styles into `twig_templates/includes/styles.html.twig`.

## Howto

* Clone this repository into your `templates` folder
* Create a new node-type *with newsletter option* in your RZCMS backoffice
* Generate your newsletter template controller, you can see an example of generated controller in `nl_example_newsletter.php`
* Create your CSS or LESS file which will be *inlined* into your newsletter HTML code, example in `css/nl_example_newsletter.css`
* Create your main *Twig* template using the same name, example: `twig_templates/nl_example_newsletter.html.twig`. This twig file must extends `base.html.twig` template.