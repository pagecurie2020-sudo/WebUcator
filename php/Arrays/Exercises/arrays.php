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
    // Prove it. This one is done for you.
    $reversedNumbers = array_reverse($numbers);
    $reversedColors = array_reverse($colors);
    outputArray($reversedNumbers);
    outputArray($reversedColors);
    
    echo '<h2>sort()</h2>';
    echo '<p>Sorts on value and re-indexes.</p>';
    // Prove it with the $numbers array. This one is done for you.
    sort($numbers);
    outputArray($numbers);

    echo '<h2>asort()</h2>';
    echo '<p>Sorts on value. Keeps key-value pairs together.</p>';
    // Prove it with the $colors array.
    
    echo '<h2>ksort()</h2>';
    echo '<p>Sorts on key. Keeps key-value pairs together.</p>';
    // Prove it with the $colors array.
    
    echo '<h2>rsort()</h2>';
    echo '<p>Sorts in reverse on value and re-indexes.</p>';
    // Prove it with the $numbers array.

    echo '<h2>arsort()</h2>';
    echo '<p>Sorts in reverse on value. Keeps key-value pairs.</p>';
    // Prove it with the $colors array.
    
    echo '<h2>krsort()</h2>';
    echo '<p>Sorts in reverse on key. Keeps key-value pairs.</p>';
    // Prove it with the $colors array.
    
    echo '<h2>shuffle()</h2>';
    echo '<p>Randomly shuffles array and re-indexes.';
    // Prove it with the $numbers array.
    
    echo '<h2>array_keys()</h2>';
    echo '<p>Returns keys as indexed array.</p>';
    // Prove it with the $colors array.
    
    echo '<h2>count()</h2>';
    echo '<p>Counts the number of elements in an array.</p>';
    /*
      Using count(), output
        Number of numbers: 5<br>
        Number of colors: 6
    */

    echo '<h2>explode()</h2>';
    echo '<p>Splits a string on a string to create an array.';
    $spells = 'Riddikulus, Obliviate, Avada Kedavra, Expelliarmus';
    /*
      Explode $spells into an array and assign that to $spellsArray.
      Then pass $spellsArray to outputArray(). It should output:
        0: Riddikulus
        1: Obliviate
        2: Avada Kedavra
        3: Expelliarmus
    */
    

    echo '<h2>implode()</h2>';
    echo '<p>Joins an array on a string to create a string.</p>';
    /*
      Implode $spellsArray on ' - ' and assign that to $spells.
      Then output the $spells string. It should output:
        Riddikulus - Obliviate - Avada Kedavra - Expelliarmus
    */

    echo '<h2>is_array()</h2>';
    echo '<p>Checks if a passed-in argument is an array.</p>';
    /*
      Write a function called outputIsArray() that takes one parameter:
        - $arr
      If $arr is an array, the function should output:
          <p>That is an array:</p>
        And then it should pass the array to outputArray().
      If $arr is not an array, the function should output:
          <p>That is not an array.</p>

      Pass $spellsArray to outputIsArray().
      Pass $spells to outputIsArray().
    */

    echo '<h2>array_key_exists()</h2>';
    echo '<p>Checks if an array contains a key.</p>';
    /*
      Write a function called hasKey() that takes two parameters:
        - $key
        - $arr
      If $key is found in $arr, the function should output:
        <p>$key is in that array.</p>
      If $key is not found in $arr, the function should output:
        <p>$key is not in that array.</p>

      Use hasKey() to check if these colors are in the $colors array:
        - hotpink
        - olivedrab
    */
  
    echo '<h2>array_walk()</h2>';
    // The createButton() function creates a colored button that,
    // when clicked, changes the background color of the page
    function createButton($color, $text) {
      echo "<button style='background-color:$color'
        onclick='document.body.style.backgroundColor=\"$color\";'>
          $text</button>";
    }
    
    // Use array_walk() to create buttons for all the colors in the
    // $colors array
  ?>
</main>
</body>
</html>