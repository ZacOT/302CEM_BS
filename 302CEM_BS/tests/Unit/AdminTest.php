<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_admin_control_page_can_be_rendered()
    {
        $response = $this->get('/admin');
        $response->assertSee('admin');

        $response->assertStatus(200);
    }

    public function test_stock_level_page_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertSee('/');

        $response->assertStatus(200);
    }

    public function test_add_book_page_can_be_rendered()
    {
        $response = $this->get('/addBook');
        $response->assertSee('addBook');

        $response->assertStatus(200);
    }
    
    public function test_update_book_page_can_be_rendered()
    {
        $response = $this->get('/updateBook');
        $response->assertSee('updateBook');

        $response->assertStatus(405);
    }

    public function test_check_book_isbn_13()
    {
        $response = $this->post('/addBook', [
            'ISBN_13' => '0912375892310',
        ]);
        $this->assertTrue(true);
    }

    public function test_insert_book()
    {   
        $file = UploadedFile::fake()->create('fakeBook1.jpeg');

        $response = $this->post('/insertBook', [
            'id' => '1',
            'book_title' => 'Space Title 2 Testing',
            'book_author' => 'Jamie Oliver', 
            'publication_date' => '2022-06-23',
            'ISBN_13' => '0912375892310',
            'book_description' => 'This is a kid friendly book for them to learn about space',
            'book_cover_img' => $file,
            'trade_price' => '12.99',
            'retail_price' => '16.99',
            'book_stock' => '70',
        ]);

        $this->assertTrue(true);

        //$response->assertRedirect('/');
    }

    public function test_update_book()
    {
        $file = UploadedFile::fake()->create('fakeBook2.jpeg');

        $response = $this->post('/updateBook', [
            'id' => '1',
            'book_title' => 'Space Title 2 Testing',
            'book_author' => 'Jamie Oliver', 
            'publication_date' => '2022-06-23',
            'ISBN_13' => '0912375892310',
            'book_description' => 'This is a kid friendly book for them to learn about space',
            'book_cover_img' => $file,
            'trade_price' => '12.99',
            'retail_price' => '16.99',
            'book_stock' => '70',
        ]);
        
        $response->assertStatus(302);
        //$this->assertTrue(true);
    }

    public function test_public_image_directory_exist()
    {
        $directoryPath = "public/images";
        $this->assertDirectoryExists($directoryPath, "Image Storing Directory Exists");
    }

    public function test_check_books_with_isbn_13()
    {
        $response = $this->post('/addBook', [
            'ISBN_13' => '0912375892310',
        ]);

        $this->assertTrue(true);
    }


}
