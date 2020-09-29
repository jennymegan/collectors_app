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

    public function testExceptionPopulateTable()
    {
        $this->expectException(TypeError::class);
        $input = 'hello';
        populateTable($input);
    }

//    Not sure on this one

    public function testFailurePopulateTable()
    {
        $input=[['wrong_key' => 'test.jpg', 'wrong_key2' =>'Testy', 'wrong_key3' => 'Testerson', 'wrong_key4' => 'Test', 'wrong_key5' => 1987]];
        $array  = $input;
        $this->assertArrayHasKey('artist_firstname', $array, "Array doesn't contains 'artist_firstname' as key");

    }


}


