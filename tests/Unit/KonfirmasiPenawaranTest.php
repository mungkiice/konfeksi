<?php

namespace Tests\Unit;

use App\Penawaran;
use App\Pesanan;
use App\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class KonfirmasiPenawaranTest extends TestCase
{
	protected $pesanan;
	protected $penawaran;

	protected function setUp(): void
	{
		parent::setUp();
		$this->pesanan = Pesanan::create([
			'user_id' => $this->user->id,
			'produk_id' => $this->produk->id,
			'kode_pesanan' => rand(1000000, 9999999),
			'deskripsi' => 'Jaket dengan bahan denim',
			'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
			'jumlah' => '{"S":"12","M":"2","L":0,"XL":0}',
		]);
		$this->penawaran = Penawaran::create([
			'pesanan_id' => $this->pesanan->id,
			'tenggat_waktu' => Carbon::now(),
			'biaya' => 10000000,
			'deskripsi' => 'deskripsi tambahan',
		]);
	}

	/** @test */
    public function jalur_1()
    {
    	$this->actingAs($this->user);
    	$response = $this->post('/penawaran/'.$this->penawaran->id.'/terima');
    	$this->assertEquals('diterima', Penawaran::latest()->first()->status);
    	$this->assertEquals(1, StatusPesanan::count());
    	// dd($response);
    	// $response->assertSessionHas('flash');
    	$response->assertSee('INVOICE');
    }
}
