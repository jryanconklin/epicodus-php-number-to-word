<?php
    require_once __DIR__.'/../src/NumberToWords.php';

    class NumberToWordsTest extends PHPUnit_Framework_TestCase
    {

        function test_convertToString_SingleDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 1;
            //Act
            $result = $test_NumberToWord->convertToString($input);
            //Assert
            $this->assertEquals('One', $result);
        }

        function test_convertToString_DoubleDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 45;
            //Act
            $result = $test_NumberToWord->convertToString($input);
            //Assert
            $this->assertEquals('Forty Five', $result);
        }

        function test_convertToString_SecondDoubleDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 90;
            //Act
            $result = $test_NumberToWord->convertToString($input);
            //Assert
            $this->assertEquals('Ninety', $result);
        }
        function test_convertToString_TripleZero()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 000;
            //Act
            $result = $test_NumberToWord->convertToString($input);
            //Assert
            $this->assertEquals('', $result);
        }

        function test_convertToString_ThreeDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 367;
            //Act
            $result = $test_NumberToWord->convertToString($input);
            //Assert
            $this->assertEquals('Three Hundred Sixty Seven', $result);
        }

        function test_breakString_SixDigits()
        {
            // Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 47834269654090;
            // Act
            $result = $test_NumberToWord->breakString($input);
            // Assert
            $this->assertEquals(array('47', '834', '269', '654', '090'), $result);
        }

        function test_convertWholeString_SixDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 289367;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Two Hundred Eighty Nine Thousand Three Hundred Sixty Seven', $result);
        }

        function test_convertWholeString_EightDigit()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 98289367;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Ninety Eight Million Two Hundred Eighty Nine Thousand Three Hundred Sixty Seven', $result);
        }

        function test_convertWholeString_EightZeroes()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 90000000;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Ninety Million', $result);
        }

        function test_convertWholeString_SixZeroes()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 9000000;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Nine Million', $result);
        }

        function test_convertWholeString_TenZeroes()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 9000000000;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Nine Billion', $result);
        }

        function test_convertWholeString_FifteenZeroes()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 9000000000000000;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Nine Quadrillion', $result);
        }

        function test_convertWholeString_EighteenZeroes()
        {
            //Arrange
            $test_NumberToWord = new NumberToWords;
            $input = 9000000000000000000;
            //Act
            $result = $test_NumberToWord->convertWholeString($input);
            //Assert
            $this->assertEquals('Nine Quintillion', $result);
        }



    }
?>
