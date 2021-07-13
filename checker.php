<?php
// Köşeli parantez,süslü parantez ve normal parantez eşit sayıda ve doğru kapatılmış mı kontrol eder
class SyntaxCheck
{
    // Parantezleri kontrol eder
    public static function check_brackets($string)
    {
        $bracket_holder = [];
        // Her karakteri döngüye sokar
        for ($i = 0; $i < strlen($string); $i++) {
            // Karakterler kapanış parantezlerinden biriyse
            if (
                $string[$i] === ')' ||
                $string[$i] === ']' ||
                $string[$i] === '}'
            ) {
                $last = array_pop($bracket_holder);
                if (
                    ($string[$i] === ')' && $last !== '(') ||
                    ($string[$i] === '}' && $last !== '{') ||
                    ($string[$i] === ']' && $last !== '[')
                ) {
                    return false;
                }
            }
            // Karakterler açılış parantezlerinden biriyse
            elseif (
                $string[$i] === '(' ||
                $string[$i] === '[' ||
                $string[$i] === '{'
            ) {
                $bracket_holder[] = $string[$i];
            }
        }

        return !$bracket_holder;
    }
}
// Test dizisi farklı kurgulanmış string ifadelerle doldurularak test yapıldı
$tests = ['(,){,}[,]', '[(])', '([{}])', '(}'];
foreach ($tests as $k => $v) {
    $check = SyntaxCheck::check_brackets($v);
    $tests[$k] = false;
    if ($check) {
        $tests[$k] = true;
    }
}
var_dump($tests);
?>
