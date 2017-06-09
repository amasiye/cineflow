<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
  <head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title><?= APP_NAME; ?></title>
    <base href="<?= BASEPATH; ?>">
    <link rel="icon" href="icon.png" type="image/png" sizes="16x16">

    <?php Template::load_styles(SRC_CSS_BOOTSTRAP . ';' . SRC_CSS_FONTAWESOME . ';css/cineflow.css'); ?>

    <?php Template::load_scripts(SRC_JS_JQUERY . ';' . SRC_JS_BOOTSTRAP . '; js/cineflow.js'); ?>

  </head>
  <body id="body">
