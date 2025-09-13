<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../../static/styles/normalize.css">
<link rel="stylesheet" href="../../static/styles/styles.css">
<title>Practice with Arrays</title>
</head>
<body>
<main>
  <h1>Practice with Arrays</h1>
  <?php
    function outputArray($arr) {
      echo '<ul>';
      foreach ($arr as $key => $a) {
        echo "<li><strong>$key</strong>: $a</li>";
      }
      echo '</ul>';
      echo '<hr>';
    }
    $numbers = [5, 7, 11, 3, -5];

    $colors = [
      'blanchedalmond' => '#ffebcd',
      'lightsalmon' => '#ffa07a',
      'burlywood' => '#deb887',
      'lemonchiffon' => '#fffacd',
      'hotpink' => '#ff69b4',
      'papayawhip' => '#ffefd5'
    ];

    echo '<h2>Original Arrays</h2>';
    echo '<h3>$numbers</h3>';
    outputArray($numbers);
    echo '<h3>$colors</h3>';
    outputArray($colors);
    
    echo '<h2>array_reverse()</h2>';
    echo '<p>Returns a new array in reverse order.</p>';
    $reversedNumbers = array_reverse($numbers);
    $reversedColors = array_reverse($colors);
    outputArray($reversedNumbers);
    outputArray($reversedColors);
    
    echo '<h2>sort()</h2>';
    echo '<p>Sorts on value and re-indexes.</p>';
    sort($numbers);
    outputArray($numbers);

    echo '<h2>asort()</h2>';
    echo '<p>Sorts on value. Keeps key-value pairs together.</p>';
    asort($colors);
    outputArray($colors);
    
    echo '<h2>ksort()</h2>';
    echo '<p>Sorts on key. Keeps key-value pairs together.</p>';
    ksort($colors);
    outputArray($colors);
    
    echo '<h2>rsort()</h2>';
    echo '<p>Sorts in reverse on value and re-indexes.</p>';
    rsort($numbers);
    outputArray($numbers);

    echo '<h2>arsort()</h2>';
    echo '<p>Sorts in reverse on value. Keeps key-value pairs.</p>';
    arsort($colors);
    outputArray($colors);
    
    echo '<h2>krsort()</h2>';
    echo '<p>Sorts in reverse on key. Keeps key-value pairs.</p>';
    krsort($colors);
    outputArray($colors);
    
    echo '<h2>shuffle()</h2>';
    echo '<p>Randomly shuffles array and re-indexes. ';
    shuffle($numbers);
    outputArray($numbers);
    
    echo '<h2>array_keys()</h2>';
    echo '<p>Returns keys as indexed array.</p>';
    $colorKeys = array_keys($colors);
    outputArray($colorKeys);
    
    echo '<h2>count()</h2>';
    echo '<p>Counts the number of elements in an array.</p>';
    echo 'Number of numbers: ' . count($numbers);
    echo '<br>';
    echo 'Number of colors: ' . count($colors);

    echo '<h2>explode()</h2>';
    echo '<p>Splits a string on a string to create an array.';
    $spells = 'Riddikulus, Obliviate, Avada Kedavra, Expelliarmus';
    $spellsArray = explode(', ', $spells);
    outputArray($spellsArray);

    echo '<h2>implode()</h2>';
    echo '<p>Joins an array on a string to create a string.</p>';
    $spells = implode(' - ', $spellsArray);
    echo $spells;

    echo '<h2>is_array()</h2>';
    echo '<p>Checks if a passed-in argument is an array.</p>';

    function outputIsArray($arr) {
      if (is_array($arr)) {
        echo '<p>That is an array:</p>';
        outputArray($arr);
      } else {
        echo '<p>That is not an array.</p>';
      }
    }
    
    outputIsArray($spellsArray);
    outputIsArray($spells);

    echo '<h2>array_key_exists()</h2>';
    echo '<p>Checks if an array contains a key.</p>';

    function hasKey($key, $arr) {
      if (array_key_exists($key, $arr)) {
        echo "<p>$key is in that array.</p>";
      } else {
        echo "<p>$key is not in that array.</p>";
      }
    }
    
    hasKey('hotpink', $colors);
    hasKey('olivedrab', $colors);

  
    echo '<h2>array_walk()</h2>';

    function createButton($color, $text) {
      echo "<button style='background-color:$color'
        onclick='document.body.style.backgroundColor=\"$color\";'>
          $text</button>";
    }
    
    array_walk($colors, "createButton");
  ?>
</main>
</body>
</html>