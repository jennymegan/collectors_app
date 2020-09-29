<?php
require '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessPopulateTable()
    {
        $input=[['cover_art' => 'test.jpg', 'artist_firstname' =>'Testy', 'artist_lastname' => 'Testerson', 'album' => 'Test', 'year' => 1987]];
        $expectedOutput=' 
                 <div class="collection_item">
                  <div>
                     <img src="test.jpg" alt="Cover Art [If Available]">
                  </div>
                  <div class="info_text">
                      <h4>Artist Name: Testy Testerson</h4>
                      <h4>Album Name: Test</h4>
                      <h4>Year Released: 1987</h4>
                    </div>
                   </div>';

        $result=populateTable($input);
        $this->assertEquals($expectedOutput, $result);
    }

    public function testSuccessPopulateTableMinReqdFields()
    {
        $input=[['artist_firstname' =>'Testy', 'album' => 'Test', 'year' => 1987]];
        $expectedOutput=' 
                 <div class="collection_item">
                  <div>
                     <img src="no_img.jpg" alt="Cover Art [If Available]">
                  </div>
                  <div class="info_text">
                      <h4>Artist Name: Testy </h4>
                      <h4>Album Name: Test</h4>
                      <h4>Year Released: 1987</h4>
                    </div>
                   </div>';

        $result=populateTable($input);
        $this->assertEquals($expectedOutput, $result);
    }

    public function testExceptionPopulateTable()
    {
        $this->expectException(TypeError::class);
        $input = 'hello';
        populateTable($input);
    }


    public function testFailurePopulateTable()
    {
        $input=[['artist_firstname' =>'Testy', 'album' => 'Test', 'wrong_key' => 1987]];
        $expectedOutput = 'Incorrect Key Applied';
        $result=populateTable($input);
        $this->assertEquals($expectedOutput, $result);

    }

    public function testFailurePopulateTable2()
    {
        $input=[['artist_firstname' =>'Testy', 'wrong_key' => 'Test', 'year' => 1987]];
        $expectedOutput = 'Incorrect Key Applied';
        $result=populateTable($input);
        $this->assertEquals($expectedOutput, $result);

    }

    public function testFailurePopulateTable3()
    {
        $input=[['wrong_key' =>'Testy', 'album' => 'Test', 'year' => 1987]];
        $expectedOutput = 'Incorrect Key Applied';
        $result=populateTable($input);
        $this->assertEquals($expectedOutput, $result);

    }
}


