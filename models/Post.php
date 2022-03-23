<?

namespace app\models;

use yii\base\Model;

class Post extends Model
{

    public $body;
    public $head;
    public $dateCreate;
    public $author;
    public $status;

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

}