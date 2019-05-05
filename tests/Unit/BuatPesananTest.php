<?php

namespace Tests\Unit;

use App\Pesanan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BuatPesananTest extends TestCase
{
  use DatabaseMigrations;
  use RefreshDatabase;

  /** @test */
  public function jalur_1()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => 1,
      'deskripsi' => null,
      'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
      'small' => 2,
      'medium' => 10,
    ]);
    $this->assertEquals(0, Pesanan::count());
    $response->assertSessionHasErrors('deskripsi');
  }

  /** @test */
  public function jalur_2()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => 1,
      'deskripsi' => 'Jaket dengan bahan denim',
      'file_desain' => null,
      'small' => 2,
      'medium' => 10,
    ]);
    $this->assertEquals(0, Pesanan::count());
    $response->assertSessionHasErrors('file_desain');
  }

  /** @test */
  public function jalur_3()
  {
    $this->actingAs($this->user);
    $response = $this->post('/pesan', [
      'produk_id' => $this->produk->id,
      'deskripsi' => 'Jaket dengan bahan denim',
      'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
      'small' => 2,
      'medium' => 10,
    ]);
    $response->assertSessionHas('flash');
    $this->assertEquals(1, Pesanan::count());
    $response->assertRedirect('/');
    Storage::disk('public')->assertExists('pesanan/' . $file->hashName());
  }
}
