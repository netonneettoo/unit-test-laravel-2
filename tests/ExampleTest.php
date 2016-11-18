<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Domain\UnitTestLaravel;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')->see('Laravel');
    }

    /**
     * @test
     */
    public function checkNameAndColor1()
    {
        $name = 'pedro';
        $color = 'green';
        $result = $name.' combina com '.$color;

        $resultArray = UnitTestLaravel::check($name, $color);

        $this->assertEquals($result, $resultArray['result']);
    }

    /**
     * @test
     */
    public function checkNameAndColor2()
    {
        $name = 'pedro';
        $color = 'green';
        $result = $name.' combina com '.$color;

        $this
            ->json('post', '/form', [
                'name' => $name,
                'color' => $color
            ])
            ->seeJson([
                'result' => $result,
                'success' => true
            ]);
    }
}
