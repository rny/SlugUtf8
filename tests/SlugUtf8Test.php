<?php

namespace Rny\SlugUtf8;
 
class SlugUtf8Test extends \PHPUnit_Framework_TestCase {
 
  public function test_sgmurphy()
  {
    // Basic usage
    $str = "This is an example string. Nothing fancy.";
    $str_expect = "this-is-an-example-string-nothing-fancy";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using French with unwanted characters ('?)
    $str = "Qu'en est-il français? Ça marche alors?";
    $str_expect = "qu-en-est-il-français-ça-marche-alors";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using transliteration
    $str = "Что делать, если я не хочу, UTF-8?";
    $str_expect = "chto-delat-esli-ya-ne-hochu-utf-8";
    $this->assertEquals(SlugUtf8::SlugUtf8($str, array('transliterate' => true)), $str_expect);

    // Example using transliteration on an unsupported language
    $str = "מה אם אני לא רוצה UTF-8 תווים?";
    $str_expect = "מה-אם-אני-לא-רוצה-utf-8-תווים";
    $this->assertEquals(SlugUtf8::SlugUtf8($str, array('transliterate' => true)), $str_expect);

    // Some other options
    $str = "This is an Example String. What's Going to Happen to Me?";
    $options = array(
      'delimiter' => '_',
        'limit' => 40,
        'lowercase' => false,
        'replacements' => array(
          '/\b(an)\b/i' => 'a',
          '/\b(example)\b/i' => 'Test'
        )
    );
    $str_expect = "This_is_a_Test_String_What_s_Going_to_Ha";
    $this->assertEquals(SlugUtf8::SlugUtf8($str,$options), $str_expect);

  }

  public function test_dot()
  {
    // Example using number dot 
    $str = "Ubuntu 16.04";
    $str_expect = "ubuntu-16.04";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using number dot
    $str = "how to install postgresql 9.5 under Ubuntu 16.04";
    $str_expect = "how-to-install-postgresql-9.5-under-ubuntu-16.04";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using mixed dot
    $str = "T.U.S.F.G.E.3.0.8";
    $str_expect = "t-u-s-f-g-e-3.0.8";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using number dot 
    $str = "this number is .18, is it right?";
    $str_expect = "this-number-is-18-is-it-right";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using dot in the beginning
    $str = ".18 increased ! ";
    $str_expect = "18-increased";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using dot in the beginning
    $str = " .18 increased ! ";
    $str_expect = "18-increased";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using dot in the ending
    $str = "this is 16.04.";
    $str_expect = "this-is-16.04";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using dot in the ending
    $str = "This is an Example String. ";
    $str_expect = "this-is-an-example-string";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using dot 
    $str = "This is chapter.1";
    $str_expect = "this-is-chapter-1";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
  }

  public function test_utf8()
  {
    // Example using Japanese
    $str = "お元気ですか？";
    $str_expect = "お元気ですか";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);
    
    // Example using Chinese/English mix
    $str = "現在的Nobody，未來的Somebody！";
    $str_expect = "現在的nobody-未來的somebody";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using Chinese
    $str = "牙好，胃口就好，身体倍儿棒，吃嘛嘛香。";
    $str_expect = "牙好-胃口就好-身体倍儿棒-吃嘛嘛香";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);

    // Example using Chinese
    $str = "明天的明天，你还会送我“水晶之恋”吗？";
    $str_expect = "明天的明天-你还会送我-水晶之恋-吗";
    $this->assertEquals(SlugUtf8::SlugUtf8($str), $str_expect);


  }


}