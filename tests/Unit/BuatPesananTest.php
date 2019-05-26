<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuatPesananTest extends TestCase
{
	/** @test */
	public function jalur_1()
	{
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', '', '',  1, array(), 'jne REG');
		$this->Equals()
	}

	/** @test */
	public function jalur_3()
	{
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', '', '',  1, array(), 'jne REG');
		$this->Equals()
	}

	/** @test */
	public function jalur_3()
	{
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', '', '',  1, array('S' => 10, 'M' => 2), 'jne REG');
	}
}
