<?php


namespace app\modules\post\models;

use app\models\Post;
use app\models\User;
use yii\base\Model;

class PostForm extends Model
{

    public $author;
    public $body;
    public $head;
    public $dateCreate;
    public $status;
    /** @var User */
    public $user;

    public function rules()
    {
        return [
            [['body', 'head', 'dateCreate'], 'required'],
            ['status', 'in', 'range' => [0, 1, 2]],
            ['body', 'string', 'max' => 4096],
            ['head', 'string', 'min' => 4],
            ['author', 'safe'],
        ];
    }

    public function save()
    {
        return true;
    }

    public function publish()
    {
        $this->user->publish($this->generatePost());
    }

    public function unPublish()
    {
        $this->user->unPublish($this->generatePost());
    }

    private function generatePost()
    {
        return new Post([
            'body' => $this->body,
            'head' => $this->head,
            'dateCreate' => $this->dateCreate,
            'status' => $this->status,
            'author' => $this->author
        ]);
    }

}