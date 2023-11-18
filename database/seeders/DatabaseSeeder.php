<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Cover;
use App\Models\CategoryText;
use App\Models\CategoryWork;
use App\Models\Text;
use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::truncate();
//        Category::truncate();
//        Text::truncate();
//        Work::truncate();

        User::factory(1)->create([
            'name' => 'Duncan Smith',
            'username' => 'duncan.smith',
            'email' => 'duncanssmith@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Painting',
            'slug' => 'painting'
        ]);

        Category::create([
            'name' => 'Drawing',
            'slug' => 'drawing'
        ]);

        Category::create([
            'name' => 'Printmaking',
            'slug' => 'printmaking'
        ]);

        Category::create([
            'name' => 'Photography',
            'slug' => 'photography'
        ]);

        Category::create([
            'name' => 'Sculpture',
            'slug' => 'sculpture'
        ]);
        Category::create([
            'name' => 'Film/Video',
            'slug' => 'film-video'
        ]);

        Text::create([
            'title' => 'New Yorker Review',
            'slug' => 'first-text',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod ligula et eros fringilla, eu iaculis mauris ultricies. Nam sodales gravida dictum. Proin in molestie odio. Aliquam luctus et justo consequat elementum. Cras id eleifend lorem. Nam euismod, est at tempus dignissim, ipsum nunc viverra mi, ultricies commodo nisi erat eget libero. Praesent magna lectus, varius vestibulum vehicula sed, mattis at quam. Cras bibendum metus id nulla maximus, eu lacinia ex molestie. Fusce urna nulla, scelerisque sit amet egestas in, tincidunt vel lorem. In porttitor eget neque vel varius. Mauris at euismod sapien. Vivamus consectetur, neque eget posuere blandit, nibh magna convallis dui, suscipit mattis enim est eu augue. Maecenas eget lobortis dui. Nullam metus sem, venenatis et tristique et, vulputate quis lorem. Cras sagittis justo ut justo imperdiet aliquam. Sed eu malesuada mi.',
            'author' => 'Ana Hussain',
            'year' => '2019',
            'description' => 'A review of exhibition at Flowers East, London',
            'publication' => 'The New Yorker',
            'publication_date' => '2019-04-03'
        ]);

        Text::create([
            'title' => 'Observer Colour Magazine Review',
            'slug' => 'observer-colour-magazine-review',
            'body' => 'Suspendisse nec lectus dapibus, dignissim nunc a, cursus nulla. Integer elementum feugiat nisi sit amet elementum. Morbi porta finibus aliquet. Sed vel dolor ac mauris maximus ornare vitae id mi. Donec pellentesque luctus est, vitae tempus urna cursus in. Nulla facilisi. Phasellus et hendrerit turpis, tempus tincidunt lectus. Sed consequat dolor augue, euismod aliquet quam venenatis quis. Praesent elementum dolor lacinia nulla pretium tincidunt. Ut fermentum lacus eu ligula sagittis eleifend. Maecenas tincidunt quis elit vel pharetra.',
            'author' => 'Jane Verlinsky',
            'year' => '2014',
            'description' => 'A contemporary art survey in the Observer',
            'publication' => 'The Observer',
            'publication_date' => '2014-09-23'
        ]);

        Text::create([
            'title' => 'ArtForum review',
            'slug' => 'artforum-review',
            'body' => 'Praesent volutpat velit porta ante iaculis fermentum. Morbi odio turpis, maximus a rutrum non, facilisis at magna. Integer sed posuere orci. Sed posuere massa mi, vitae eleifend nibh tristique vel. Mauris sollicitudin congue tortor, sit amet placerat elit facilisis vitae. Etiam ut luctus ligula, vitae ullamcorper diam. Integer eget nisl a ligula aliquet pharetra ac a lorem. Duis venenatis fringilla orci, ut fringilla orci bibendum pulvinar. Duis volutpat neque nec tellus varius, sed ultricies justo venenatis. Aliquam ut mauris vestibulum, rhoncus sapien laoreet, maximus libero. Integer facilisis tempus ante eu efficitur. Praesent at quam quis velit pharetra rhoncus non ut odio. Phasellus placerat ex a ligula fermentum, id posuere quam ultricies. Ut tempus lorem sodales vestibulum tempor. Nullam sed mi nisi.',
            'author' => 'Zaha Wergen',
            'year' => '2014',
            'description' => 'A review',
            'publication' => 'Art Forum',
            'publication_date' => '2014-02-27'
        ]);

        Text::create([
            'title' => 'Art In America review',
            'slug' => 'art-in-america-review',
            'body' => 'Praesent ipsum sapien, dignissim tincidunt ipsum eu, pellentesque pulvinar ante. Cras porttitor lacus dui, vel faucibus diam pretium nec. Aenean venenatis id quam sit amet faucibus. Sed eleifend eros at nisl porta placerat. Ut vestibulum dolor in metus iaculis, id lacinia mauris feugiat. Quisque ultricies nulla vitae dictum aliquet. Integer pharetra sem sed velit luctus mollis. Aenean sodales egestas varius.',
            'author' => 'Josephine Crocker',
            'year' => '2009',
            'description' => 'Review in Art in America',
            'publication' => 'Art in America',
            'publication_date' => '2009-06-15'
        ]);

        Text::create([
            'title' => 'Arts Review',
            'slug' => 'arts-review',
            'body' => 'Post-minimalism is alive and well in dignissim tincidunt ipsum eu, pellentesque pulvinar ante. Cras porttitor lacus dui, vel faucibus diam pretium nec. Aenean venenatis id quam sit amet faucibus. Sed eleifend eros at nisl porta placerat. Ut vestibulum dolor in metus iaculis, id lacinia mauris feugiat. Quisque ultricies nulla vitae dictum aliquet. Integer pharetra sem sed velit luctus mollis. Aenean sodales egestas varius.',
            'author' => 'Albert Ross',
            'year' => '2017',
            'description' => 'Review in Arts Review ',
            'publication' => 'Arts Review',
            'publication_date' => '2017-08-15'
        ]);

        Work::create([
            'title' => 'Cat\'s Meow',
            'slug' => 'cats-meow',
            'thumbnail' => '01.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '30 x 50 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Painter\'s Block',
            'slug' => 'painters-block',
            'thumbnail' => '02.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '24 x 35 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Slap Happy',
            'slug' => 'slap-happy',
            'thumbnail' => '03.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '11 x 27 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Happy Hour II',
            'slug' => 'happy-hour-ii',
            'thumbnail' => '04.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '58 x 212 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Faster Pussycat!',
            'slug' => 'faster-pussycat',
            'thumbnail' => '05.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '168 x 225 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Angelina',
            'slug' => 'angelina',
            'thumbnail' => '06.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2007-03-14'
        ]);

        Work::create([
            'title' => 'City Of Tiny Lights',
            'slug' => 'city-of-tiny-lights',
            'thumbnail' => '07.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Baby Snakes',
            'slug' => 'baby-snakes',
            'thumbnail' => '08.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Tame Llama',
            'slug' => 'tame-llama',
            'thumbnail' => '09.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Everybody Knows',
            'slug' => 'everybody-knows',
            'thumbnail' => '10.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Windsocks',
            'slug' => 'windsocks',
            'thumbnail' => '11.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'High On The Hog',
            'slug' => 'high-on-the-hog',
            'thumbnail' => '12.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Moon River',
            'slug' => 'moon-river',
            'thumbnail' => '13.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'High Life',
            'slug' => 'high-life',
            'thumbnail' => '14.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Tossa De Mar',
            'slug' => 'tossa-de-mar',
            'thumbnail' => '15.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Box Jellyfish',
            'slug' => 'box-jellyfish',
            'thumbnail' => '16.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Telly Welly',
            'slug' => 'telly-welly',
            'thumbnail' => '17.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Work::create([
            'title' => 'Vital Sign',
            'slug' => 'vital-sign',
            'thumbnail' => '18.jpg',
            'media' => 'Flashe on plywood',
            'dimensions' => '10 x 20 cm',
            'work_date' => '2020-03-14'
        ]);

        Cover::create([
            'title' => 'Home page cover',
            'slug' => 'homepage-cover',
            'thumbnail' => '18.jpg',
            'media' => 'photograph',
            'dimensions' => '',
            'cover_date' => '2023-11-06'
        ]);


//        Work::factory(3)->create();

        CategoryText::create([ 'category_id' => 1, 'text_id' => 4, 'order' => 1 ]);
        CategoryText::create([ 'category_id' => 2, 'text_id' => 5, 'order' => 2 ]);
        CategoryText::create([ 'category_id' => 2, 'text_id' => 4, 'order' => 3 ]);
        CategoryText::create([ 'category_id' => 3, 'text_id' => 3, 'order' => 4 ]);
        CategoryText::create([ 'category_id' => 3, 'text_id' => 1, 'order' => 5 ]);
        CategoryText::create([ 'category_id' => 4, 'text_id' => 1, 'order' => 6 ]);
        CategoryText::create([ 'category_id' => 4, 'text_id' => 2, 'order' => 7 ]);
        CategoryText::create([ 'category_id' => 5, 'text_id' => 2, 'order' => 8 ]);
        CategoryText::create([ 'category_id' => 5, 'text_id' => 5, 'order' => 9 ]);
        CategoryText::create([ 'category_id' => 6, 'text_id' => 1, 'order' => 10 ]);
        CategoryText::create([ 'category_id' => 6, 'text_id' => 3, 'order' => 11 ]);
        CategoryText::create([ 'category_id' => 6, 'text_id' => 4, 'order' => 12 ]);

//        CategoryWork::factory(12)->create();

        CategoryWork::create([ 'category_id' => 1, 'work_id' => 2, 'order' => 1 ]);
        CategoryWork::create([ 'category_id' => 1, 'work_id' => 3, 'order' => 2 ]);
        CategoryWork::create([ 'category_id' => 2, 'work_id' => 1, 'order' => 3 ]);
        CategoryWork::create([ 'category_id' => 2, 'work_id' => 6, 'order' => 4 ]);
        CategoryWork::create([ 'category_id' => 3, 'work_id' => 3, 'order' => 5 ]);
        CategoryWork::create([ 'category_id' => 3, 'work_id' => 6, 'order' => 6 ]);
        CategoryWork::create([ 'category_id' => 4, 'work_id' => 5, 'order' => 7 ]);
        CategoryWork::create([ 'category_id' => 4, 'work_id' => 6, 'order' => 8 ]);
        CategoryWork::create([ 'category_id' => 5, 'work_id' => 2, 'order' => 9 ]);
        CategoryWork::create([ 'category_id' => 5, 'work_id' => 3, 'order' => 10 ]);
        CategoryWork::create([ 'category_id' => 5, 'work_id' => 4, 'order' => 11 ]);
        CategoryWork::create([ 'category_id' => 6, 'work_id' => 1, 'order' => 12 ]);
        CategoryWork::create([ 'category_id' => 6, 'work_id' => 2, 'order' => 13 ]);
        CategoryWork::create([ 'category_id' => 6, 'work_id' => 5, 'order' => 14 ]);
        CategoryWork::create([ 'category_id' => 6, 'work_id' => 7, 'order' => 15 ]);
    }
}
