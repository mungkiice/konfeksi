<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UbahPasswordTest extends TestCase
{
	/** @test */
	public function jalur_1()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'password_lama' => null,
			'password_baru' => 'newsecret',
			'password_baru_confirmation' => 'newsecret'
		]);
		$response->assertSessionHasErrors('password_lama');
	}


	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'password_lama' => 'wrongsecret',
			'password_baru' => 'newsecret',
		]);
		$response->assertSessionHasErrors('password_lama');
	}

	/** @test */
	public function jalur_3()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'password_lama' => 'secret',
			'password_baru' => null,
		]);
		$response->assertSessionHasErrors('password_baru');
	}

	/** @test */
	public function jalur_4()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'password_lama' => 'secret',
			'password_baru' => 'newsecret',
			'password_baru_confirmation' => 'unmatchedsecret'
		]);
		$response->assertSessionHasErrors('password_baru');
	}

	/** @test */
	public function jalur_5()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/user/password/edit', [
			'password_lama' => 'secret',
			'password_baru' => 'newsecret',
			'password_baru_confirmation' => 'newsecret'
		]);
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Password Berhasil Diubah');
	}

	/** @test */
	public function jalur_6()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'password_lama' => 'secret',
			'password_baru' => 'newsecret',
			'password_baru_confirmation' => 'newsecret'
		]);
		$response->assertSessionHas('flash', 'Password Berhasil Diubah');
	}
}
