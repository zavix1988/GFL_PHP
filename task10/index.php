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

/*SELECT books.id, books.name, books.slug, books.price, books.pubyear, books.lang, books.description FROM books 
            LEFT JOIN book_author ON books.id=book_author.book_id 
            LEFT JOIN book_genre ON books.id=book_genre.book_id 
        WHERE book_author.author_id = 13 OR book.name LIKE '%book' 
        GROUP BY books.id";*/


        
      
        
        
var_dump($bazadan->setTable('books')
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
                            ->setJoin('INNER JOIN', 'books', 'id', 'book_author','book_id')
                            ->setJoin('INNER JOIN', 'books', 'id', 'book_genre', 'book_id')
                                ->setWhere('author_id', '=', '12', false, 'book_author')
                                    ->setGroupBy('books', 'id')
                                        ->select()
                        );

















include 'templates/index.tpl.php';