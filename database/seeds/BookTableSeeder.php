<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new \App\Book([
            'imagePath' => 'https://cdn.waterstones.com/bookjackets/large/9780/2611/9780261103344.jpg',
            'title' => 'The Hobbit',
            'author' => 'J.R.R.Tolkien',
            'publishedYear' => 1937,
            'category' => 'Fantasy',
            'description' => 'The Hobbit follows the quest of home-loving Bilbo Baggins, the titular hobbit, to win a share of the treasure guarded by Smaug the dragon.',
            'price' => 9.99
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://upload.wikimedia.org/wikipedia/en/thumb/6/6b/Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg/220px-Harry_Potter_and_the_Philosopher%27s_Stone_Book_Cover.jpg',
            'title' => 'Harry Potter and the Philosophers Stone',
            'author' => 'J.K.Rowling',
            'publishedYear' => 1997,
            'category' => 'Fantasy',
            'description' => 'The first novel in the Harry Potter series, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry.',
            'price' => 12.99
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://i.pinimg.com/236x/2d/67/6a/2d676ac5425d782a104e31dd25818b11--sci-fi-books-fiction-books.jpg',
            'title' => 'The War of the Worlds',
            'author' => 'H.G.Wells',
            'publishedYear' => 1898,
            'category' => 'Science Fiction',
            'description' => 'The novel is the first-person narrative of both an unnamed protagonist in Surrey and of his younger brother in London as southern England is invaded by Martians.',
            'price' => 8.29
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51MlxNgCsyL._AC_SY400_.jpg',
            'title' => 'And Then There Were None',
            'author' => 'Agatha Christie',
            'publishedYear' => 1939,
            'category' => 'Mystery Thriller',
            'description' => 'A thrilling murder mystery written by Agatha Christie. When ten people are invited to Soldier Island by a mysterious character, U. N. Owen, the guests find themselves in a dangerous situation as they watch each other get picked off one by one according to an old nursery rhyme.',
            'price' => 15.89
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://upload.wikimedia.org/wikipedia/en/thumb/d/dc/A_Song_of_Ice_and_Fire_book_collection_box_set_cover.jpg/220px-A_Song_of_Ice_and_Fire_book_collection_box_set_cover.jpg',
            'title' => 'A Song of Ice and Fire',
            'author' => 'George.R.R.Martin',
            'publishedYear' => 2011,
            'category' => 'Epic Fantasy',
            'description' => 'A Song of Ice and Fire takes place on the fictional continents Westeros and Essos. Three main stories interweave: a dynastic war among several families for control of Westeros.',
            'price' => 11.99
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1442239711l/472331.jpg',
            'title' => 'Watchmen',
            'author' => 'Alan Moore',
            'publishedYear' => 1986,
            'category' => 'Graphic Novel',
            'description' => 'In an alternate 1985 America, costumed superheroes are part of everyday life. When one of his former comrades is murdered, masked vigilante Rorschach uncovers a plot to kill and discredit all past and present superheroes.',
            'price' => 19.99
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://upload.wikimedia.org/wikipedia/en/thumb/2/2f/Big-short-inside-the-doomsday-machine.jpg/220px-Big-short-inside-the-doomsday-machine.jpg',
            'title' => 'The Big Short',
            'author' => 'Michael Lewis',
            'publishedYear' => 2010,
            'category' => 'Finance',
            'description' => 'The Big Short describes several of the main players in the creation of the credit default swap market that sought to bet against the collateralized debt obligation (CDO) bubble and thus ended up profiting from the financial crisis of 2007–08',
            'price' => 7.49
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://i.pinimg.com/originals/95/09/28/9509287081b30913015499852012b28f.jpg',
            'title' => 'Jaws',
            'author' => 'Peter Benchley',
            'publishedYear' => 1974,
            'category' => 'Thriller',
            'description' => 'It tells the story of a great white shark that preys upon a small resort town and the voyage of three men trying to kill it.',
            'price' => 13.99
        ]);
        $book->save();

        $book = new \App\Book([
            'imagePath' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9d/AdrianMoleFromMinorToMajor.jpg/220px-AdrianMoleFromMinorToMajor.jpg',
            'title' => 'Adrian Mole: From Minor to Major',
            'author' => 'Sue Townsend',
            'publishedYear' => 1991,
            'category' => 'Youn Adult',
            'description' => 'Adrian Mole: From Minor to Major is a compilation of the first three books The Secret Diary of Adrian Mole, Aged 13¾, The Growing Pains of Adrian Mole and The True Confessions of Adrian Albert Mole.',
            'price' => 24.99
        ]);
        $book->save();
    }
}
