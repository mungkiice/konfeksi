<?php

namespace Tests\Unit;

use App\RajaOngkirAPI;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OngkirTest extends TestCase
{
	/** @test */
	public function jalur_1()
	{
		$result = RajaOngkirAPI::ongkir(1, 2, null);
		$this->assertEquals(0, $result);
	}

	/** @test */
	public function jalur_2()
	{
		$result = RajaOngkirAPI::ongkir(1, 2, 'sicepat MANTAP');
		$this->assertEquals(0, $result);
	}

	/** @test */
	public function jalur_3()
	{
		$result = RajaOngkirAPI::ongkir(1, 2, 'jne MANTAP');
		$this->assertEquals(0, $result);
	}

	/** @test */
	public function jalur_4()
	{
		$result = RajaOngkirAPI::ongkir(1, 2, 'jne REG');
		$this->assertNotEquals(0, $result);
	}
}
