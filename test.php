<?php
 

if (isset($_GET['test'])) {
   $hungle = file_get_contents($_GET['test']);
   $content = json_decode($hungle, true); 
   $head = $content[0]['question'];
   $block[] = $content[0]['items'];

   foreach ($block[0] as $key) {
   $quests[] = $key['quest']; 
   $answers = $key['answers'];   
   }



} else {
  echo '<h3>Тест не выбран</h3>';
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Генератор тестов на PHP и JSON</title>
</head>
<body>

<?php 
if (isset($head)) {
  echo "<h2>$head</h2>";
  ?>
    <form action="" method="POST" enctype="multipart/form-data"> 
    <fieldset>
  <?php foreach ($quests as $value ) {
  echo "<h4><em>$value</em></h4>"; 
    ?>

    <?php
    foreach ($answers as $ans) {
       $i = 0;
       $str = $ans['answer'];
      // echo "$str<br/>"; ?>
       
       <input type=radio name="<?= $i ?>" value="<?= $ans['answer'] ?>"><?= $ans['answer'] ?>
       <?php $i = $i++; ?>


<?php 
     }
     ?>
       <input class="submit" type="submit" name="add" value="отправить">
     
     <?php     
  } ?>

</fieldset>
</form> <?php
}
?>

<?php
if (isset ($POST['add'])) {
     foreach ($quests as $k) {
       var_dump($k);

     }
    // var_dump ("$ans['answer']");
  }
?>

<p><a href="list.php">Выбрать другой тест</a></p>


</body>
</html>