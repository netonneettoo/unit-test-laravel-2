<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Domain\UnitTestLaravel;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

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

    /**
     * @test
     */
    public function checkNameAndColor3()
    {
        $name = 'pedro';
        $color = 'green';
        $result = $name.' combina com '.$color;

        $this
            ->visit('/form')
            ->type($name, 'name')
            ->select($color, 'color')
            ->press('Enviar')
            ->see($result);
    }

    /**
     * @test
     */
    public function anotherTest()
    {
        $user = factory(\App\User::class)->create();
      //  dd(

            $this
                ->actingAs($user)
                ->visit('/home')
//                ->response
//                ->getContent()

     //   )
        ;
    }
}
