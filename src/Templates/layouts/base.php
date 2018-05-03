<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Oquizz - <?= $title ?></title>
  <!-- CSS Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- CSS du site -->
  <link rel="stylesheet" href="<?= $BASE_PATH ?>/assets/css/style.css">

</head>
<body>

<?=$this->insert('partials/header')?>

<?=$this->section('content')?>

<?=$this->insert('partials/footer')?>

</body>
</html>
