# apache-php-markdown

Save files with \*.md on your Apache web server and have them automatically rendered as HTML.

## Installation

Clone this project.  Bootstrap it and install dependencies:

```bash
$ ./bootstrap_composer.sh
$ php composer.phar install
```

Ensure mod_php is installed and enabled in your Apache.  Then add the following to your VirtualHost:

```conf
RewriteEngine on
RewriteCond %{HTTP_ACCEPT} !text\/markdown
RewriteCond %{QUERY_STRING} !accept=text\/markdown
RewriteCond %{DOCUMENT_ROOT}%{REQUEST_FILENAME} -f
RewriteRule \.md$ /path/to/apache-php-markdown/render.php
```

Reload Apache, and now when you try to access a \*.md file, instead of plain text, you will see beautiful HTML.

## Add \<title\> tag to your pages

Save the following at the top of your \*.md file to give it a title tag:

```markdown
+++
title = "Hello, world!"
+++

rest of markdown document here
```

## Can't use PHP?

Check out [my Gist](https://gist.github.com/sffc/4789c562f636260a49f9e6bd26f39557) for how to set this up with client-side rendering.
