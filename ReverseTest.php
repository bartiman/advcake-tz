<?php

require_once 'vendor/autoload.php';
require_once "Reverse.php";

use PHPUnit\Framework\TestCase;

class ReverseTest extends TestCase
{
    private $reverse;

    protected function setUp(): void
    {
        $this->reverse = new Reverse();
    }
    /**
     * @depends testWord
     */
    public function testRevertCharacters()
    {
        $result = $this->reverse->revertCharacters("Привет! Давно не виделись.");
        $this->assertEquals("Тевирп! Онвад ен ьсиледив.", $result);

        $result = $this->reverse->revertCharacters("Как дела");
        $this->assertEquals("Как алед", $result);

        $result = $this->reverse->revertCharacters("Как дела, как дела?");
        $this->assertEquals("Как алед, как алед?", $result);
    }

    public function testWord()
    {
        $result = $this->reverse->word("Привет");
        $this->assertEquals("Тевирп", $result);

        $result = $this->reverse->word("Добрый!");
        $this->assertEquals("Йырбод!", $result);

        $result = $this->reverse->word("как1");
        $this->assertEquals("1как", $result);
    }
}
