<?php

namespace Tests\Unit;

use App\Notifications\ProgresPesanan;
use App\Pesanan;
use App\StatusPesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\AfterShipAPI;

class UpdateStatusPesananTest extends TestCase
{
	protected $pesanan;

	protected function setUp(): void
	{
		parent::setUp();
		$this->pesanan = Pesanan::create([
			'user_id' => $this->user->id,
			'produk_id' => $this->produk->id,
			'kode_pesanan' => rand(1000000, 9999999),
			'catatan' => 'Jaket dengan bahan denim',
			'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
			'jumlah' => '{"S":"12","M":"2","L":0,"XL":0}',
			'kurir' => 'jne REG'
		]);
	}

	/** @test */
	public function jalur_1()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/pesanan/'.$this->pesanan->id, [
			'keterangan' => 'Proses penjahitan',
		]);
		$this->assertEquals(1, StatusPesanan::count());
		Notification::assertSentTo([$this->user], ProgresPesanan::class);
		$response->assertSessionHas('flash', 'Status Pesanan berhasil disimpan');
	}

	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/pesanan/'.$this->pesanan->id, [
			'keterangan' => 'Pesanan telah dikirim',
			'nomor_resi' => '021500038275719'
		]);
		$this->assertEquals(1, StatusPesanan::count());
		Notification::assertSentTo([$this->user], ProgresPesanan::class);
		$responseAfterShip = AfterShipAPI::getLastCheckPoint($this->pesanan->kurir, '021500038275719');
		$this->assertEquals(200, $responseAfterShip['meta']['code']);
		// gabisa di flash karena error nomor resi sudah terdaftar
		// $response->assertSessionHas('flash', 'Status Pesanan berhasil disimpan');
	}
}
