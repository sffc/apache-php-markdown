<!DOCTYPE html>
<?php

require "vendor/autoload.php";

$md_path = $_SERVER["DOCUMENT_ROOT"] . $_SERVER["SCRIPT_NAME"];

$parser = new \Hyn\Frontmatter\Parser(new \cebe\markdown\GithubMarkdown());
$parser->setFrontmatter(\Hyn\Frontmatter\Frontmatters\TomlFrontmatter::class);
$result = $parser->parse(file_get_contents($md_path));

if ($result["meta"] && array_key_exists("title", $result["meta"])) {
  $title = $result["meta"]["title"];
} else {
  $title = NULL;
}

?>
<html>
<head>
<meta charset="utf-8"/>
<?php
if ($title) {
  echo "<title>" . $title . "</title>\n";
}
?>
<link rel="stylesheet" type="text/css" href="//markdowncss.github.io/splendor/css/splendor.css"/>
</head>
<body>
<?php
echo $result["html"];
?>
<p style="text-align: right;">
  powered by <a href="https://github.com/sffc/apache-php-markdown">sffc/apache-php-markdown</a><br/>
  <a href="?accept=text/markdown">view raw markdown</a>
</p>
</body>
</html>
