<?php

namespace Tests;

use Illuminate\Support\Arr;
use Illuminate\Testing\TestResponse as IlluminateTestResponse;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Assert as PHPUnit;

class TestResponse extends IlluminateTestResponse
{
    /**
     * Assert that the response has the given JSON considering PHPUnit constraints.
     * https://tdomy.com/2020/12/alternative-to-assertjson/
     *
     * @param  array  $data
     * @return $this
     */
    public function assertExactJsonPartially(array $data): TestResponse
    {
        foreach (Arr::dot($data) as $key => $expected) {
            if (!$expected instanceof Constraint) {
                continue;
            }

            if (!Arr::has($this, $key)) {
                PHPUnit::fail("This response does not have the key '{$key}'");
            }

            $actual = Arr::get($this, $key);
            PHPUnit::assertThat($actual, $expected, "Failed asserting for '{$key}'");

            // Replace to actual value for assertExactJson
            Arr::set($data, $key, $actual);
        }

        return $this->assertExactJson($data);
    }
}
