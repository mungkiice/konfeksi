<?php

namespace Tests\Unit;

use App\Pesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuatPesananTest extends TestCase
{
	/** @test */
	public function jalur_1()
	{
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', '',  1, [], 'jne REG');
		$this->assertEquals(0, $pesanan->biaya);
	}

	/** @test */
	public function jalur_2()
	{
		$jumlah = array('S' => 10, 'M' => 2);
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', '', 1, $jumlah, 'jne REG');
		$this->assertEquals(array_sum($jumlah) * $this->produk->harga, $pesanan->biaya);
	}

	/** @test */
	public function jalur_3()
	{
		$jumlah = array('S' => 10, 'M' => 2);
		$pesanan = Pesanan::buat($this->user->id, $this->produk->id, 'catatan', 'example/file.png', 'Contoh Alamat', 1, $jumlah, 'jne REG');
		$this->assertGreaterThan(array_sum($jumlah) * $this->produk->harga, $pesanan->biaya);
	}
}
