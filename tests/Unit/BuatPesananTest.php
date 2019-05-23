<?php

namespace Tests\Unit;

use App\Notifications\PesananBaru;
use App\Pesanan;
use App\StatusPesanan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BuatPesananTest extends TestCase
{
  /** @test */
  public function jalur_1()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => 1,
      'catatan' => null,
      'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
      'small' => 2,
      'medium' => 10,
      'alamat' => 'Jalan Sumbersari 2',
      'kota' => 1,
      'kurir' => 'jne REG'
    ]);
    $response->assertSessionHasErrors('catatan');
    $this->assertEquals(0, Pesanan::count());
    $this->assertEquals(0, StatusPesanan::count());
    Notification::assertNotSentTo($this->konfeksiUser, PesananBaru::class);
    $response->assertSessionMissing('flash');
  }

  /** @test */
  public function jalur_2()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => 1,
      'catatan' => 'Jaket dengan bahan denim',
      'file_desain' => null,
      'small' => 2,
      'medium' => 10,
      'alamat' => 'Jalan Sumbersari 2',
      'kota' => 1,
      'kurir' => 'jne REG'
    ]);
    $response->assertSessionHasErrors('file_desain');
    $this->assertEquals(0, Pesanan::count());
    $this->assertEquals(0, StatusPesanan::count());
    Notification::assertNotSentTo($this->konfeksiUser, PesananBaru::class);
    $response->assertSessionMissing('flash');
  }

  /** @test */
  public function jalur_3()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => $this->produk->id,
      'catatan' => 'Jaket dengan bahan denim',
      'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
      'small' => 2,
      'medium' => 10,
      'alamat' => 'Jalan Sumbersari 2',
      'kota' => 1,
      'kurir' => 'jne REG'
    ]);
    Storage::disk('public')->assertExists('pesanan/' . $file->hashName());
    $this->assertEquals(1, Pesanan::count());
    $this->assertEquals(1, StatusPesanan::count());
    Notification::assertSentTo([$this->konfeksiUser], PesananBaru::class);
    $response->assertRedirect('/');
    $response->assertSessionHas('flash', 'Pesanan berhasil dikirim');
    $response->assertSessionMissing('catatan');
    $response->assertSessionMissing('file_desain');
  }
}
