<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?= APP_NAME; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="<?= BASEPATH; ?>">

    <?php Template::load_styles(SRC_CSS_BOOTSTRAP . ';' . SRC_CSS_FONTAWESOME . ';css/main.css'); ?>

    <?php Template::load_scripts(SRC_JS_JQUERY . ';' . SRC_JS_BOOTSTRAP . ';' . SRC_JS_MODENIZER); ?>

  </head>
  <body>
