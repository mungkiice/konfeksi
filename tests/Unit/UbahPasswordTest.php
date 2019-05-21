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
			'old_password' => null,
			'new_password' => 'newsecret',
			'new_password_confirmation' => 'newsecret'
		]);
		$response->assertSessionHasErrors('old_password');
	}


	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'old_password' => 'wrongsecret',
			'new_password' => 'newsecret',
		]);
		$response->assertSessionHasErrors('old_password');
	}

	/** @test */
	public function jalur_3()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'old_password' => 'secret',
			'new_password' => null,
		]);
		$response->assertSessionHasErrors('new_password');
	}

	/** @test */
	public function jalur_4()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'old_password' => 'secret',
			'new_password' => 'newsecret',
			'new_password_confirmation' => 'unmatchedsecret'
		]);
		$response->assertSessionHasErrors('new_password');
	}

	/** @test */
	public function jalur_5()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/user/password/edit', [
			'old_password' => 'secret',
			'new_password' => 'newsecret',
			'new_password_confirmation' => 'newsecret'
		]);
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Password Berhasil Diubah');
	}

	/** @test */
	public function jalur_6()
	{
		$this->actingAs($this->user);
		$response = $this->post('/user/password/edit', [
			'old_password' => 'secret',
			'new_password' => 'newsecret',
			'new_password_confirmation' => 'newsecret'
		]);
		$response->assertSessionHas('flash', 'Password Berhasil Diubah');
	}
}
