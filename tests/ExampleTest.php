<?php

namespace Reached\TextWidget\Tests;

use Orchestra\Testbench\TestCase;
use Reached\TextWidget\EditorServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [EditorServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
