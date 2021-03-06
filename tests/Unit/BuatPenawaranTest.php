<?php

namespace Tests\Unit;

use App\Notifications\PenawaranBaru;
use App\Penawaran;
use App\Pesanan;
use App\Produk;
use App\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BuatPenawaranTest extends TestCase
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
		]);
	}

	/** @test */
	public function jalur_1()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tanggal_selesai' => null,
			'gambar' => $file = UploadedFile::fake()->image('penawaran.jpg'),
			'catatan' => 'catatan tambahan'
		]);
		$response->assertSessionHasErrors('tanggal_selesai');
		Storage::disk('public')->assertMissing('pesanan/'.$file->hashName());
		$this->assertEquals(0, Penawaran::count());
		$this->assertEquals(0, StatusPesanan::count());
		Notification::assertNotSentTo($this->user, PenawaranBaru::class);
		$response->assertSessionMissing('flash');
	}

	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tanggal_selesai' => Carbon::now(),
			'gambar' => $file = UploadedFile::fake()->image('penawaran.jpg'),
			'catatan' => 'catatan tambahan'
		]);
		$this->assertEquals(1, Penawaran::count());
		$this->assertEquals(1, StatusPesanan::count());
		Notification::assertSentTo([$this->user], PenawaranBaru::class);
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Penawaran berhasil dikirim');
		$response->assertSessionMissing('tanggal_selesai');
		$response->assertSessionMissing('biaya');
	}

	/** @test */
	public function jalur_3()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tanggal_selesai' => Carbon::now(),
			'gambar' => $file = UploadedFile::fake()->image('penawaran.jpg'),
			'catatan' => 'catatan tambahan'
		]);
		Storage::disk('public')->assertExists('pesanan/'.$file->hashName());
		$this->assertEquals(1, Penawaran::count());
		$this->assertEquals(1, StatusPesanan::count());
		Notification::assertSentTo([$this->user], PenawaranBaru::class);
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Penawaran berhasil dikirim');
	}
}
