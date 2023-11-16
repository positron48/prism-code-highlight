# Prism code highliter

The Bolt extension automatically add [prism](https://prismjs.com/) syntax highliter on your site.

Current build of prism [here](https://prismjs.com/download.html#themes=prism&languages=markup+css+clike+javascript+arduino+bash+c+csharp+cpp+dart+dns-zone-file+docker+gcode+git+go+graphql+http+java+javadoclike+log+lua+makefile+markdown+markup-templating+nginx+php+phpdoc+php-extras+processing+python+scheme+sql+twig+uri&plugins=line-numbers+toolbar+copy-to-clipboard).

Enabled languages:

* markup
* css
* clike
* javascript
* arduino
* bash
* c
* csharp
* cpp
* dart
* dns-zone-file
* docker
* gcode
* git
* go
* graphql
* http
* java
* javadoclike
* log
* lua
* makefile
* markdown
* markup-templating
* nginx
* php
* phpdoc
* php-extras
* processing
* python
* scheme
* sql
* twig
* uri

Enabled plugins:

* line-numbers
* toolbar
* copy-to-clipboard

## Install 

```bash
composer require positron48/prism-code-highlight
```

Config is available on `config/extensions/positron48-prismcodehighlight.yaml`. 
You can enable or disable prism on backend (admin pages) and frontend separately. 

## Customization

You can also make your own build and rewrite css and js file at `/assets/prism-code-highlight/` after installation of extension.
