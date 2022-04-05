<?

namespace app\models;

use \yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public $body;
    public $head;
    public $dateCreate;
    public $author;
    public $status;

    public static function tableName()
    {
        return 'post';
    }

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