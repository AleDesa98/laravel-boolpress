<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {

            $newPost = new Post();

            $newPost->title = 'Titolo articolo ' . $i;
            $newPost->content = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut ratione harum magnam, blanditiis a accusantium ducimus dolorum architecto rem, modi debitis odit! Incidunt ut rerum, reprehenderit unde repellendus eveniet perspiciatis animi. Eum, rerum? Numquam necessitatibus ipsam ipsa adipisci eum? Fugit officiis ipsa dicta est magni totam reiciendis nemo soluta, quasi, sit porro dolor accusantium. Mollitia facilis minus deleniti nisi. Molestias tenetur recusandae cum magnam, reprehenderit illum corporis unde ut sunt eveniet officiis voluptas? Dolorem velit quos perspiciatis quae non omnis. Iure aperiam pariatur et minus sapiente deserunt atque, doloremque temporibus similique consequuntur, provident quae illum odio ex corrupti numquam! Inventore!';
            $newPost->slug = Str::slug($newPost->title,'-');

            $newPost->save();
        }
    }
}