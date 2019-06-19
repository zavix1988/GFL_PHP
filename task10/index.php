<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:29
 */

include 'config.inc.php';
include 'libs/ParentSQL.php';
include 'libs/SQLPDO.php';





$bazadan = new SQLPDO();





/*var_dump($bazadan->setTable('books')
                    ->setTable('book_author')
                    ->setTable('book_genre')
                        ->setField('books', 'id' )
                        ->setField('books', 'name' )
                        ->setField('books', 'slug' )
                        ->setField('books', 'price' )
                        ->setField('books', 'pubyear' )
                        ->setField('books', 'lang' )
                        ->setField('books', 'description' )
                        ->setField('book_author', 'author_id' )
                                ->setInnerJoin('books', 'id', 'book_author','book_id')
                                ->setInnerJoin('books', 'id', 'book_genre', 'book_id')
                                    ->setWhere('name', 'LIKE', '%book', false, 'books')
                                        ->setGroupBy('books', 'id')
                                            ->setLimit(10)
                                                ->select()

                        );*/

/*SELECT books.id, books.name, books.slug, books.price, books.pubyear, books.lang, books.description, authors.name, genres.name
FROM books
JOIN book_author ON book_author.book_id = books.id
JOIN authors ON book_author.author_id = authors.id
JOIN book_genre ON book_genre.book_id = books.id
JOIN genres ON book_genre.genre_id = genres.id*/


var_dump($bazadan->setTable('books')
    ->setTable('authors')
    ->setTable('genres')
    ->setTable('book_author')
    ->setTable('book_genre')
        ->setField('books', 'id' )
        ->setField('books', 'name' )
        ->setField('books', 'slug' )
        ->setField('books', 'price' )
        ->setField('books', 'pubyear' )
        ->setField('books', 'lang' )
        ->setField('books', 'description' )
        ->setField('authors', 'name', 'aname')
        ->setField('genres', 'name', 'gname')
            ->setInnerJoin('books', 'id', 'book_author','book_id')
            ->setInnerJoin('book_author', 'author_id', 'authors','id')
            ->setInnerJoin('books', 'id', 'book_genre', 'book_id')
            ->setInnerJoin('book_genre', 'genre_id', 'genres', 'id')
                ->setDistinct()->setGroupBy('books', 'id')->select()
);

//var_dump($bazadan->getJoins());
/*$book = ($bazadan->setTable('books')
                    ->setTable('book_author')
                    ->setTable('book_genre')
                        ->setField('books', 'id' )
                        ->setField('books', 'name' )
                        ->setField('books', 'slug' )
                        ->setField('books', 'price' )
                        ->setField('books', 'pubyear' )
                        ->setField('books', 'lang' )
                        ->setField('books', 'description' )
                        ->setField('book_author', 'author_id' )
                            ->setInnerJoin('books', 'id', 'book_author','book_id')
                            ->setInnerJoin('books', 'id', 'book_genre', 'book_id')
                                ->setWhere('author_id', '=', 10, 'OR', 'book_author')
                                ->setWhere('genre_id', '=', 0, false, 'book_genre')
                                    ->setGroupBy('books', 'id')
                                        ->select()
);*/







//var_dump($bazadan->setTable('task2')->delete());

/*var_dump($bazadan->setTable('books')
                        ->setValue('name','kniga')
                        ->setValue('slug','kniga')
                        ->setValue('price', '123')
                        ->setValue('pubyear', '2000')
                        ->setValue('lang', 'RUS')
                                ->insert());*/



/*var_dump($bazadan->setTable('books')
                    ->setValue('name','kniga')
                    ->setValue('slug','kniga')
                    ->setValue('price', '123')
                    ->setValue('pubyear', '2000')
                    ->setValue('lang', 'RUS')
                        ->setWhere('id', '=', 10)
                        ->update()
);*/

include 'templates/index.tpl.php';