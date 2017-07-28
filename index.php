<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <title>HTML Encoding</title>
  </head>
  <body>
    <?php
      $linktext = '<Click> & learn more';
    ?>
    <a href=''>
      <?= htmlspecialchars($linktext)?>
    </a>
    <br>

    <?php
      $symbols = '¡ ¢ £ ¤ ¥ ¦ § ¨ © ª « ¬ ­ ® ¯ ° ± ² ³ ´ µ ¶ · ¸ ¹ º » ¼ ½ ¾ ¿ À Á Â Ã Ä Å Æ Ç È É Ê Ë Ì Í Î Ï Ð Ñ Ò Ó Ô Õ Ö × Ø Ù Ú Û Ü Ý Þ ß à á â ã ä å æ ç è é ê ë ì í î ï ð ñ ò ó ô õ ö ÷ ø ù ú û ü ý þ ÿ Œ œ Š š Ÿ ƒ ˆ ˜ Α Β Γ Δ Ε Ζ Η Θ Ι Κ Λ Μ Ν Ξ Ο Π Ρ Σ Τ Υ Φ Χ Ψ Ω α β γ δ ε ζ η θ ι κ λ μ ν ξ ο π ρ ς σ τ υ φ χ ψ ω ϑ ϒ ϖ       ‌ ‍ ‎ ‏ – — ‘ ’ ‚ “ ” „ † ‡ • … ‰ ′ ″ ‹ › ‾ ⁄ € ℑ ℘ ℜ ™ ℵ ← ↑ → ↓ ↔ ↵ ⇐ ⇑ ⇒ ⇓ ⇔ ∀ ∂ ∃ ∅ ∇ ∈ ∉ ∋ ∏ ∑ − ∗ √ ∝ ∞ ∠ ∧ ∨ ∩ ∪ ∫ ∴ ∼ ≅ ≈ ≠ ≡ ≤ ≥ ⊂ ⊃ ⊄ ⊆ ⊇ ⊕ ⊗ ⊥ ⋅ ⌈ ⌉ ⌊ ⌋ ⟨ ⟩ ◊ ♠ ♣ ♥ ♦™£•“—';
      echo htmlentities($symbols), '<br>';

      //Works normally for some reason, doesn't need to be encoded as entities in order to be viewed. I don't know what the example is talking about
      echo $symbols, '<br>', '<br>';

      $url_page = 'LearningPHP/index.php';
      $param1 = 'This is a string with < > characters';
      $param2 = '&#?*$[]+ are bad characters';

      $url = 'http://localhost/';
      //$url .= rawurlencode($url_page); From the example, this actually breaks the link by replacing '/' with '%2f'
      $url .= implode("/", array_map("rawurlencode", explode("/", $url_page))); //correct way
      $url .= '?param1=' . urlencode($param1);
      $url .= '&param2=' . urlencode($param2);
    ?>
    <a href="<?= htmlspecialchars($url)?>">
      <?= htmlspecialchars($linktext)?>
    </a>
  </body>
</html>
