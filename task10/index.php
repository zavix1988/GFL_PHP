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
                            ->setDistinct()
                                ->setInnerJoin('books', 'id', 'book_author','book_id')
                                ->setInnerJoin('books', 'id', 'book_genre', 'book_id')
                                    ->setWhere('author_id', '=', '12', 'AND', 'book_author')
                                    ->setWhere('name', 'LIKE', '%book', false, 'books')
                                        ->setGroupBy('books', 'id')
                                            ->setLimit(10)
                                            ->select()
                        );







var_dump($bazadan->setTable('task2')->delete());

var_dump($bazadan->setTable('books')
                        ->setValue('name','kniga')
                        ->setValue('slug','kniga')
                        ->setValue('price', '123')
                        ->setValue('pubyear', '2000')
                        ->setValue('lang', 'RUS')
                                ->insert());


include 'templates/index.tpl.php';