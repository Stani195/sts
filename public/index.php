<?php


use project\Model\Article;
use project\Model\Categorie;
use project\Model\Comment;
use project\Model\Comments;
use project\Model\PostClass;
use project\Model\User;
use project\Database;

require_once '../vendor/autoload.php';



//$user = new User(1,'vais9969@gmail.com','2019-07-08 22:03:00', '2019-07-08 22:03:00');
//$user->getId();
//$user = User::find(1);

//Article::show();
//echo $user->getEmail();

//
//foreach (User::all() as $user){
//    echo $user->getId() . '. ' . $user->getEmail();
//    echo "<br/>";
//}
//$user = User::find(2);
//$user->delete();

//$user = new User(null, 'fdghfdjbhgkj@gmail.com', '[]p[opijiuglguy','2019-07-10 23:56:00', null);
//$user->save();
$post = new Comment(null, 'ffffffnavrio','2019-07-13 23:58:00', null,'3','1');
$post->save();

//
//$user = User::find(1);
//$user->setEmail('18956@gmail.com');
//$user->save();