<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= APP_NAME; ?></title>
    <base href="<?= BASEPATH; ?>">

    <?php Template::load_styles(SRC_CSS_BOOTSTRAP . ';' . SRC_CSS_FONTAWESOME . ';css/cineflow.css'); ?>

    <?php Template::load_scripts(SRC_JS_JQUERY . ';' . SRC_JS_BOOTSTRAP); ?>

  </head>
  <body>
